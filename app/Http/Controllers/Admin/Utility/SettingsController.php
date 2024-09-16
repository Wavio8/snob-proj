<?php

namespace App\Http\Controllers\Admin\Utility;


use App\Http\Controllers\Controller;
use App\Models\Utility\Settings;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public $routersNames = ['GROUP' => '', 'NAME' => 'Настройки'];

    public function index(Request $request)
    {
        $object = Settings::first();
        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token']));
            $object->save();
            return redirect()->back()->with('message', 'Изменено');
        }
        return view('admin.utility.settings.index', compact('object'));
    }
}
