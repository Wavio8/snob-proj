<?php

namespace App\Http\Controllers\Admin\Content;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Content\TilesGroup;
use App\Models\Content\Tile;

use App\Models\Utility\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TilesController extends Controller
{

    public $routersNames = ['GROUP' => 'Контент', 'content.tileedit' => 'Плитки', 'NAME' => 'Группы плиток'];

    public function index(Request $request)
    {
        if ($id = $request->delete) {
            $object = TilesGroup::find($id);
            foreach ($object->tiles(true) as $tile) {
                if ($tile->image)
                    Storage::disk('public')->delete($tile->image);
                $tile->delete();
            }
            $object->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $objects = TilesGroup::paginate(30)->appends(request()->query());
        $path = 'content.tiles';
        return view('admin.content.tiles.index', compact('objects', 'path'));
    }

    public function edit(Request $request, $id = null)
    {
        $object = $id ? TilesGroup::findOrFail($id) : new TilesGroup();
        $path = 'content.tiles';


        if ($id = $request->delete) {
            $item = Tile::find($id);
            if ($item->image)
                Storage::disk('public')->delete($item->image);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }


        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token']));
            // $object->hide = empty($request->hide) ? 0 : 1;
            // $object->rating = $request->rating ?? 0;

            $object->save();

            return redirect()->route('admin.' . $path . '.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }

        $items = $object->tiles(true);

        $pages = Page::all();

        return view('admin.content.tiles.edit', compact('object', 'items', 'path', 'pages'));
    }
    public function tileEdit(Request $request, $id = null)
    {
        $object = $id ? Tile::findOrFail($id) : new Tile();

        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token', 'image']));
            $object->hide = empty($request->hide) ? 0 : 1;
            $object->groupID = $request->groupID ?? null;
            $object->save();
            if ($request->image)
                FileUpload::uploadImage('image', Tile::class, 'image', $object->id, 44, 44, '/images/tiles', false, $request);

            return redirect()->route('admin.content.tileedit.edit', ['groupID' => $object->groupID, 'id' => $object->id])->with('message', 'Сохранено');
        }
        $groups = TilesGroup::all();

        $path = 'content.tiles';
        return view('admin.content.tiles.tileedit', compact('object', 'path', 'groups'));
    }
}
