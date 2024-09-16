<?php

namespace App\Http\Controllers\Admin\Content;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Content\Banners;
use Illuminate\Http\Request;
use App\Enums\Content\BannersType;

class BannersController extends Controller
{
    public $routersNames = ['GROUP' => 'Контент', 'NAME' => 'Баннеры'];

    public function index(Request $request)
    {
        $objects = Banners::paginate(30)->appends(request()->query());


        if ($id = $request->delete) {
            $item = Banners::find($id);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $path = 'content.banners';
        return view('admin.content.banners.index', compact('objects', 'path'));
    }

    public function edit(Request $request, $id = null)
    {
        $object = $id ? Banners::findOrFail($id) : new Banners();

        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token','image']));
            $object->save();

            if ($request->image)
                FileUpload::uploadImage('image', Banners::class, 'image', $object->id, 1920, 1080, '/images/banners', false, $request);

            return redirect()->route('admin.content.banners.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }
        $types = BannersType::cases();
        $path = 'content.banners';
        return view('admin.content.banners.edit', compact('object', 'path', 'types'));
    }
}
