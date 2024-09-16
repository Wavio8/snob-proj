<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Cart;
use App\Helpers\Admin\Helper;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use App\Services\Discounts\Bonuses\BonusSystem;
use App\Services\Notifications\NotificationsSystem;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/settings';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Войти или создать
    public function login_code(Request $request, Cart $cart) {
        $method = $request->input('method') ?? '';

        switch ($method) {
            case 'code_check': return self::code_check($request,$cart); break;
            case 'code_phone': return self::code_save($request, 'phone'); break;
            case 'code_email': return self::code_save($request, 'email'); break;
        }
        return;
    }

    //Код по номеру телефона
    private static function code_save($request, $type = 'phone') {

        User::saveCode($request->all());

        $send = 'send';

        return $send;
    }

    //Проверка кода
    private static function code_check($request, $cart) {

        $user = User::checkCode($request->all());

        if ($id = $user->id ?? 0) {
            Auth::loginUsingId($id); //авторизуем по Id
            $cart->sync();
            return 'login';
        }
        else{
            return $user;
        }
    }

    //Авторизация через соц.сети
    public function ulogin(Request $request, Cart $cart) {

        return; //попросили отключить Ulogin

        $token = $request->token ?? '';
        if (empty($token)) return;

        $get = file_get_contents("https://ulogin.ru/token.php?token={$token}&host=".$_SERVER['HTTP_HOST']);
        $new = json_decode($get, true);

        $network = $new['network'] ?? '';
        $login = $email = $new['email'] ?? '';

        if (empty($login)) return redirect()->route('main');

		$ulogin_id = $new['uid'] ?? '';
		$profile = $new['profile'] ?? '';
		$photo = $new['photo_big'] ?? '';
		if (empty($photo)) $photo = $new['photo'] ?? '';
		$name = $new['first_name'] ?? '';
		$lastname = $new['last_name'] ?? '';
		$city = $new['city'] ?? '';
		$country = $new['country'] ?? '';
		$verified_email = $new['verified_email'] ?? '';
		$birthday = $new['bdate'] ?? '';
		$gender = $new['sex'] ?? ''; //2 - мужской пол

        $field = '';
        switch($network) {
            case 'vkontakte': $field = 'ulogin_vkontakte'; break;
            case 'google': $field = 'ulogin_google'; break;
            case 'yandex': $field = 'ulogin_yandex'; break;
        }

        $user = User::where('email', $email)->first();
        if (!$user) {
            $user = new User();
            $user->email = $email;
            $user->is_admin = 0;
            $user->password = Hash::make(\Str::random(10)); //генерим случайный пароль
            if (empty($user->hash)) $user->hash = Helper::hash();

            // бонусы за регистрацию
            BonusSystem::accrueForRegistration($user->id);
            // письмо приветствие после регистрации
            NotificationsSystem::helloScript($user);

        }

        if (empty($user->name)) $user->name = $name;
        if (empty($user->lastname)) $user->lastname = $lastname;

        if (empty($user->ulogin_photo)) $user->ulogin_photo = $photo;

        if (empty($user->city)) $user->city = $city;
        if (empty($user->country)) $user->country = $country;

        if (empty($user->birthday) && !empty($birthday)) {
            $user->birthday = date('Y-m-d H:i:s', strtotime($birthday));
        }
        if (empty($user->gender) && !empty($gender)) {
            $user->gender = (int)$gender;
        }
        if (empty($user->email_verified_at) && !empty($verified_email)) {
            $user->email_verified_at = now();
        }
        $user->{$field} = $profile;
        $user->save();

        $id = $user->id ?? 0;

        Auth::loginUsingId($id); //авторизуем по Id
        $cart->sync();
        return redirect()->route('profile.main');
    }
}
