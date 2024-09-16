<?php

namespace App\Http\Controllers\Admin\Content;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
//use App\Models\Content\Banners;
use App\Models\Content\Services;

use Illuminate\Http\Request;
use App\Enums\Content\BannersType;

class ServicesController extends Controller
{
    public $routersNames = ['GROUP' => 'Контент', 'NAME' => 'Услуги'];

    public function index(Request $request)
    {
        $objects = Services::paginate(30)->appends(request()->query());


        if ($id = $request->delete) {
            $item = Services::find($id);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $path = 'content.services';
        return view('admin.content.services.index', compact('objects', 'path'));
    }

    public function edit(Request $request, $id = null)
    {
        $object = $id ? Services::findOrFail($id) : new Services();

        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token','image']));
            $object->save();

//            if ($request->image)
//                FileUpload::uploadImage('image', Banners::class, 'image', $object->id, 1920, 1080, '/images/banners', false, $request);

            return redirect()->route('admin.content.services.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }
//        $types = BannersType::cases();
        $path = 'content.services';
        return view('admin.content.services.edit', compact('object', 'path'));
    }
}
