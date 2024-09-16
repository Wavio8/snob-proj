<?php

namespace App\Http\Controllers\Admin\Content;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
//use App\Models\Content\Banners;
use App\Models\Content\Title;
use Illuminate\Http\Request;
use App\Enums\Content\BannersType;

class TitleController extends Controller
{
    public $routersNames = ['GROUP' => 'Контент', 'NAME' => 'Заголовки секций'];

    public function index(Request $request)
    {
        $objects = Title::paginate(30)->appends(request()->query());


        if ($id = $request->delete) {
            $item = Title::find($id);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $path = 'content.title';
        return view('admin.content.title.index', compact('objects', 'path'));
    }

    public function edit(Request $request, $id = null)
    {
        $object = $id ? Title::findOrFail($id) : new Title();

        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token','image']));
            $object->save();

//            if ($request->image)
//                FileUpload::uploadImage('image', Banners::class, 'image', $object->id, 1920, 1080, '/images/banners', false, $request);

            return redirect()->route('admin.content.title.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }
//        $types = BannersType::cases();
        $path = 'content.title';
        return view('admin.content.title.edit', compact('object', 'path'));
    }
}
