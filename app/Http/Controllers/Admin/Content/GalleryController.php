<?php

namespace App\Http\Controllers\Admin\Content;

use App\Enums\Content\GalleryType;
use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content\Gallery;

class GalleryController extends Controller
{
    public $routersNames = ['GROUP' => 'Контент', 'NAME' => 'Галереи'];

    public function index(Request $request)
    {
        $objects = Gallery::paginate(30)->appends(request()->query());


        if ($id = $request->delete) {
            $item = Gallery::find($id);
            $item->clear();
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $path = 'content.gallery';
        return view('admin.content.gallery.index', compact('objects', 'path'));
    }

    public function edit(Request $request, $id = null)
    {
        $object = $id ? Gallery::findOrFail($id) : new Gallery();

        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token']));
            $object->save();
            if ($request->gallery) {
                FileUpload::uploadGallery(
                    'gallery',
                    $object->id,
                    'GALLERY',
                    1920,
                    1080,
                    '/images/gallery',
                    null,
                    $request
                );
            }
            return redirect()->route('admin.content.gallery.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }
        $types = GalleryType::cases();
        $path = 'content.gallery';
        return view('admin.content.gallery.edit', compact('object', 'path', 'types'));
    }
}
