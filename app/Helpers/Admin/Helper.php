<?php

namespace App\Helpers\Admin;

use App\Models\User\AdminAccessRights;
use App\Models\User\UserСlass;
use Illuminate\Http\Request;

class Helper
{
    public static function multiple($value)
    {
        if (empty($value)) return;

        if (in_array('0', $value)) return null;

        $value = '|' . implode('|', $value ?? array()) . '|';

        return $value;
    }

    public static function multiple_info($MODEL, $value)
    {

        if (empty($value)) return 'Все';

        $value = trim($value, '|');
        $arr = explode('|', $value);

        if (empty($arr)) return 'Все';

        $names = '';
        $result = array();
        $items = $MODEL::whereIn('id', $arr)->get();
        if ($items) {
            $value = '';
            foreach ($items as $item) {
                $result[] = $item->name ?? '';
            }
        }
        $names = implode(', ', $result);

        return $names;
    }

    public static function multiple_filter($objects, $field, $select, $request)
    {

        if (empty($objects) || empty($field) || empty($select)) return $objects;

        $search_select = (int)$request->{$select} ?? 0;
        if (!empty($search_select)) {
            $objects->where(function ($query) use ($search_select, $field) {
                $query->where($field, 'LIKE', "%|" . $search_select . "|%")
                    ->orWhereNull($field)
                    ->orWhere($field, '0');
            });
        }

        return $objects;
    }

    public static function multiple_list($MODEL, $value, $where = [])
    {

        if (empty($MODEL)) return;

        $ids = explode('|', trim($value, '|'));
        $ids_str = implode(',', $ids);
        if (!empty($ids_str)) {
            $query = $MODEL::whereIn('id', $ids)
                ->orderByRaw("FIELD(id,{$ids_str})");
            self::multiple_list_where($query, $where);
            $list1 = $query->get();

            $query = $MODEL::whereNotIn('id', $ids)
                ->orderBy('name', 'asc');
            self::multiple_list_where($query, $where);
            $list2 = $query->get();

            $list = $list1->merge($list2);
        } else {
            $query = $MODEL::orderBy('name', 'asc');
            self::multiple_list_where($query, $where);
            $list = $query->get();
        }

        return $list;
    }

    public static function multiple_list_where($query, $where)
    {
        if (!empty($where)) {
            foreach ($where as $key => $value) {
                $query->where($key, $value);
            }
        }
        return $query;
    }

    public static function select_filter($objects, $field, $select, $request)
    {

        if (empty($objects) || empty($field) || empty($select)) return $objects;

        $search_select = (int)$request->{$select} ?? 0;
        if (!empty($search_select)) {
            $objects->where($field, $search_select);
        }

        return $objects;
    }

    public static function object_name($MODEL, $value)
    {
        if (empty($value)) return;

        $name = '';
        $object = $MODEL::where('id', $value)->first();
        if ($object) {
            $name = $object->name ?? '';
        }

        return $name;
    }

    public static function url_uniq($object, $model, $model_copy = null)
    {
        if (empty($object) || empty($model)) return;

        $url = $object->url ?? '';
        $id = $object->id ?? 1;
        if (empty($url)) return;

        $item = $model::where('url', $url)
            ->where('id', '<>', $id)
            ->first();
        if (!$item && $model_copy) {
            $item = $model_copy::where('url', $url)
                ->where('id', '<>', $id)
                ->first();
        }
        if ($item) {
            $object->url = $url . '-' . $id;
            $object->save();
        }
    }

    public static function search($objects, $search, $fields = array(), $extraSearch = [])
    {

        if (empty($search) || empty($fields)) return $objects;

        $objects->where(function ($query) use ($search, $fields, $extraSearch) {
            foreach ($fields as $field) {
                if ($field == 'id' || $field == 'catalog_products') {
                    $query->orWhere($field, $search);
                } else {
                    $query->orWhere($field, 'LIKE', "%" . str_replace(' ', '%', $search) . "%");
                }
                if (count($extraSearch)) {
                    foreach ($extraSearch as $key => $exsearch) {
                        $query->orWhere($field, 'LIKE', "%" . str_replace(' ', '%', $exsearch) . "%");
                    }
                }
            }
        });

        return $objects;
    }

    public static function card_format($val)
    {
        if (empty($val)) return;
        $val = preg_replace('/\d{4}/', "$0 ", $val);
        return $val;
    }

    public static function hash()
    {
        $hash = md5(uniqid(rand(), true));
        return $hash;
    }

    public static function date_save($date, $type = 'start')
    {
        if (empty($date)) return;
        $date = strtotime($date);
        $date = date('d.m.Y', $date);
        if ($type == 'start') $date .= ' 00:00';
        else $date .= ' 23:59';
        $date = strtotime($date);
        return $date;
    }

    public static function date_view($date)
    {
        if (empty($date)) return;
        $date = date('Y-m-d', $date);
        return $date;
    }

    public static function timestamp_save($date, $type = 'start')
    {
        if (empty($date)) return;
        $date = strtotime($date);
        $date = date('Y-m-d', $date);
        if ($type == 'start') $date .= ' 00:00';
        else $date .= ' 23:59';
        return $date;
    }

    public static function getAdminPathByUrl($url)
    {
        $path = app('router')->getRoutes()->match(app('request')->create($url))->getName();

        $path = str_replace('admin.', '', $path);
        $path = str_replace('.index', '', $path);
        $path = str_replace('.edit', '', $path);
        $path = str_replace('.history', '', $path);

        return $path;
    }


    public static function checkRights($url, $type)
    {
        $path = self::getAdminPathByUrl($url);

        if (auth()->user()->sudo) return true;

        $rights = auth()
            ->user()
            ->user_class
            ->rights()
            ->where('path', $path)
            ->where('type', $type)
            ->get();
        return (!$rights->isEmpty());
    }

    public static function code()
    {
        $out = '';
        $arr = array();
        for ($i = 97; $i < 123; $i++) $arr[] = chr($i);
        for ($i = 65; $i < 91; $i++) $arr[] = chr($i);
        for ($i = 0; $i < 10; $i++) $arr[] = $i;
        shuffle($arr);
        for ($i = 0; $i < 9; $i++) {
            $out .= $arr[mt_rand(0, sizeof($arr) - 1)];
        }
        $out = strtoupper($out);
        return $out;
    }

    static function getParams()
    {
        $all = \Request::all();
        $query = '';
        foreach ($all as $key => $value) {
            if (is_array($value)) continue;
            $query .= '&' . $key . '=' . $value;
        }
        $query = trim($query, '&');
        $query = '?' . $query;
        $query = rtrim($query, '?');
        return $query;
    }
}
