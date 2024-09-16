<?php

namespace App\Http\Controllers\Admin\Users;

use App\Services\Discounts\Bonuses\BonusSystem;
use App\Helpers\Admin\Helper;
use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Discounts\Bonuses\BonusesHistory;
use App\Models\Location\Phone_code;
use App\Models\Profile\ClientCard;
use App\Models\Profile\ClientType;
use App\Models\User\User;
use App\Models\User\UserСlass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Catalog\CatalogWishlist;
use App\Models\Profile\ClientTypeHistory;
use App\Models\Location\City;
use App\Models\Order\Order;
use App\Models\User\AdminEventLogs;

class UsersController extends Controller
{
    public $PATH = 'users.users';
    public $TITLE = ['Пользователи', 'пользователя'];
    public $routersNames = ['GROUP' => 'Пользователи', 'NAME' => 'Пользователь'];

    public function index(Request $request)
    {
        $type = $request->type ?? '';

        $path = $this->PATH;
        $title = $this->TITLE;
        if (!empty($type)) $title = ['Клиенты', 'клиента'];

        $objects = User::orderBy('id', 'desc');

        if ($request->search) $objects = Helper::search($objects, $request->search, ['name', 'lastname', 'middlename', 'phone', 'email']);

        $search_select = (int)$request->select ?? 0;
        if (!empty($search_select)) $objects = $objects->where('class', $search_select);

        if ($id = $request->delete) {
            $object = User::find($id);
            $object->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $objects = $objects->paginate(30)->appends(request()->query());
        foreach ($objects as $item) {
            $user_class = UserСlass::find($item->class ?? 0);
            $item->class_name = $user_class->name ?? '';
        }

        $select = UserСlass::all();
        $select_label = 'Класс пользователя:';

        $view = compact('objects', 'path', 'title', 'type');
        if (empty($type)) {
            $view['select'] = $select;
            $view['select_label'] = $select_label;
        }

        return view('admin.utility.users.users.index', $view);
    }

    public function edit(Request $request, $id = null)
    {
        $type = $request->type ?? '';

        $path = $this->PATH;
        $title = $this->TITLE;

        $object  = $id ? User::findOrFail($id) : new User();


        if ($request->isMethod('post')) {


            $object->email = $request->email ?? '';
            $unique = self::unique($object, 'email', $object->email, 'email', $type);

            if (!empty($unique)) return $unique;

            // if (!empty($request->phone)) {
            //     $phone = $request->phone ?? '';
            //     $phone_all = $phone;
            //     $unique = self::unique($object, 'phone', $phone_all, 'телефоном', $type);
            //     if (!empty($unique)) return $unique;
            //     $object->phone = $phone_all;
            // } else {
            //     $object->phone = null;
            // }

            $object->class = $request->class ?? null;

            if (!empty($request->password) || empty($id)) {
                $object->password = Hash::make($request->password);
            }

            $object->name = $request->name ?? '';

            $object->fill($request->except(['_token', 'email']));

            $object->save();

            return redirect()->route('admin.users.users.edit', ['id' => $object->id, 'type' => $type])->with('message', 'Сохранено');
        }

        $select_user_class = UserСlass::all();

        $view = 'admin.utility.users.users.edit_user';

        return view($view, compact(
            'path',
            'title',
            'object',
            'select_user_class',
        ));
    }

    private static function unique($object, $field, $value, $text, $type)
    {
        $value = trim($value);
        if (!empty($value)) {
            $user_other = User::where($field, $value)->where('id', '<>', $object->id)->first();
            if ($user_other) {
                $email = $object->email;
                return redirect()->route('admin.users.users.edit', ['id' => $object->id, 'type' => $type])->with('message_' . $field, 'Пользователь с таким ' . $text . ' уже существует: <strong>' . $value . '</strong>');
            }
        }
        return;
    }
}
