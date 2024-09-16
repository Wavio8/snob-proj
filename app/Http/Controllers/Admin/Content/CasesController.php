<?php

namespace App\Http\Controllers\Admin\Content;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Content\Banners;
use App\Models\Content\Cases;
use Illuminate\Http\Request;
use App\Enums\Content\BannersType;

class CasesController extends Controller
{
    public $routersNames = ['GROUP' => 'Контент', 'NAME' => 'Кейсы'];

    public function index(Request $request)
    {
        $objects = Cases::paginate(30)->appends(request()->query());


        if ($id = $request->delete) {
            $item = Cases::find($id);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $path = 'content.cases';
        return view('admin.content.cases.index', compact('objects', 'path'));
    }

    public function edit(Request $request, $id = null)
    {
        $object = $id ? Cases::findOrFail($id) : new Cases();

        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token','image']));
            $object->save();

            if ($request->image)
                FileUpload::uploadImage('image', Cases::class, 'image', $object->id, 1920, 1080, '/images/cases', false, $request);
            if ($request->logo)
                FileUpload::uploadImage('logo', Cases::class, 'logo', $object->id, 1920, 1080, '/images/cases/logo', false, $request);

            return redirect()->route('admin.content.cases.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }

        $path = 'content.cases';
        return view('admin.content.cases.edit', compact('object', 'path'));
    }
}
