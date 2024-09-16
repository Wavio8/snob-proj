<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Helper
{
    public static function phone($val) {
        if (empty($val)) return;

        $val = trim(explode(',', $val)[0]);

		$val = str_replace(" ", "", $val);
		$val = str_replace("(", "", $val);
		$val = str_replace(")", "", $val);
		$val = str_replace("-", "", $val);

		return $val;
    }

    public static function empty($val) {
        $val = !empty($val) ? $val : '';
        return $val;
    }

    public static function price_format($val) {
        $val = number_format($val, 0, '', ' ');
        return $val;
    }

    public static function clear($name) {
    	$name = strip_tags($name);
    	$name = str_replace('\n', ' ', $name);
    	$name = str_replace('  ', ' ', $name);
    	return $name;
    }

    public static function metro_clear($metro) {
    	$metro = str_replace(array('Ст. м.', 'Ст. М.', 'cт. м.', 'ст. м', 'Ст. м', 'Ст.м .', 'ст.м.', '«', '»', 'се. м.', '/'), '', $metro);
        $metro = trim($metro, '. ');
        $metro = str_replace('\\', ',', $metro);
    	return $metro;
    }

    public static function formatBytes($size, $precision = 2, $russian = false)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes =  $russian ? [' байтов', ' КБ', ' МБ', ' ГБ', ' ТБ'] : array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }

    public static function decl($number, $titles) {
		$cases = array (2, 0, 1, 1, 1, 2);
		return $titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];
	}

    public static function hash() {
		$hash = md5(uniqid(rand(), true));
		return $hash;
	}

    public static function rub() {
		return '<svg class="ruble" fill="none" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="m8 11h-2v2h2v2h-2v2h2v5h2v-5h5.95v-2h-5.95v-2h4.5c3.0376 0 5.5-2.4624 5.5-5.5 0-3.03757-2.4624-5.5-5.5-5.5h-6.5zm2 0v-7h4.5c1.933 0 3.5 1.567 3.5 3.5s-1.567 3.5-3.5 3.5z" fill="rgb(0,0,0)" fill-rule="evenodd"/></svg>';
	}

    public static function personal($name, $user = null) {
        $value = session('order_personal_'.$name, '');
        if (empty($value) && !empty($user)) $value = @$user->{$name} ?? '';
        return $value;
	}

    public static function validatePhoneNumber($phone_number)
    {
        return preg_match("/^\\+?\\d{1,4}?[-.\\s]?\\(?\\d{1,3}?\\)?[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,9}$/", $phone_number);
    }

    public static function generateTabList($tabs, &$html)
    {
        $html .= "<div class='type-group'>";
        foreach ($tabs as $tab){
            if ($tab->type <> 'main'){
                $html .= "<div class='type-wrapper'>";
                $html .= view('includes.catalog.left_sidebar_tab', ['value' => $tab]);

                $children = $tab->getChildren();
                if (!$children->isEmpty()) self::generateTabList($children, $html);

                $html .= "</div>";
            }
        }
        $html .= "</div>";
    }

    public static function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public static function multiple_save($value) {
        if (empty($value)) return;

        $arr = explode(',', $value);

        $value = '|'.implode('|', $arr ?? array()).'|';

        return $value;
    }

    public static function getMonth($month) {
        if (empty($month)) return;

        $monthsList = array('1'=>'Января','2'=>'Февраля','3'=>'Марта', '4'=>'Апреля','5'=>'Мая', '6'=>'Июня',
        '7'=>'Июля','8'=>'Августа','9'=>'Сентября', '10'=>'Октября','11'=>'Ноября','12'=>'Декабря');

        $month = $monthsList[$month];

        return $month;
    }

    public static function getTimeList() {
        $list = [];
        $hour = date('G') + 1;
        $ranges = ['10:00 - 13:00', '11:00 - 14:00', '12:00 - 15:00', '13:00 - 16:00', '14:00 - 17:00', '15:00 - 18:00', '16:00 - 19:00', '17:00 - 20:00', '18:00 - 21:00'];
        foreach ($ranges AS $key => $range) {
            $arr = explode('-', $range);
            $arr = explode(':', $arr[0]);
            $start = (int)trim($arr[0]);

            if ($hour <= $start) $disabled = '';
            else $disabled = 'disabled';

            if ($hour >= 21) $disabled = '';

            $list[$key]['value'] = $range;
            $list[$key]['disabled'] = $disabled;
        }
        return $list;
    }

    //расстояние в километрах между координатами
    public static function getDistance($lat1, $lon1, $lat2, $lon2) {
        if (empty($lat1) || empty($lon1) || empty($lat2) || empty($lon2)) return 0;
        $theta = abs($lon1 - $lon2);
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $km = round($dist * 60 * 1.853159616);
        return $km;
    }
}
