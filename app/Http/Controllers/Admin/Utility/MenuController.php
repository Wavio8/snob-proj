<?php

namespace App\Http\Controllers\Admin\Utility;

use App\Enums\Content\MenuType;
use App\Helpers\Admin\Helper;
use App\Http\Controllers\Controller;
use App\Models\Utility\Menu;
use App\Models\Utility\MenuItem;
use App\Models\Utility\Page;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public $PATH = 'menu';
    public $TITLE = ['Меню', 'Меню'];
    public $MODEL = Menu::class;

    public $routersNames = ['GROUP' => 'Меню', 'menu.item_edit' => 'Пункт меню', 'menu.item' => 'Меню', 'NAME' => 'Виды меню'];

    public function index(Request $request)
    {
        $path = $this->PATH;
        $title = $this->TITLE;

        $objects = $this->MODEL::orderBy('id', 'desc');

        if ($request->search) $objects = Helper::search($objects, $request->search, ['name']);

        $objects = Helper::select_filter($objects, 'section_id', 'select', $request);

        if ($id = $request->delete) {
            $item = $this->MODEL::find($id);

            MenuItem::where('menuID',  $item->id)->delete();


            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }


        $objects = $objects->paginate(30)->appends(request()->query());


        return view('admin.utility.' . $path . '.index', compact('objects', 'path', 'title'));
    }

    public function edit(Request $request, $id = null)
    {
        $path = $this->PATH;
        $title = ['', 'пункта'];

        $object = $id ? $this->MODEL::findOrFail($id) : new $this->MODEL();

        if ($itemID = $request->delete) {
            $item =  MenuItem::find($itemID);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }


        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token']));
            $object->save();
            return redirect()->route('admin.' . $path . '.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }


        $items = MenuItem::where('menuID', $id ?? 0)->get();


        foreach ($items as &$item) {
            $page = Page::find($item->pageID);
            if ($page) {

                if (!$item->name) {
                    $item->name = $page->name;
                }
                if (!$item->url) {
                    $item->url = $page->url;
                }
            }
        }


        $types = MenuType::cases();
        return view('admin.utility.' . $path . '.edit', compact('object', 'path', 'title', 'items', 'types'));
    }

    public function itemEdit(Request $request, $menuID, $id = null)
    {
        $path = $this->PATH;
        $TITLE = ['', 'пункта'];


        $menu = Menu::findOrFail($menuID);
        $object = $id ? MenuItem::findOrFail($id) : new MenuItem();


        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token', 'url']));
            $object->hide = empty($request->isIndexLock) ? 0 : 1;
            $object->rating = $request->rating ?? 0;
            $object->menuID = $menuID;

            if ($request->page) {
                $page = Page::find($request->page);
            }
            if ($request->url) {
                $object->url = $request->url;
            }


            $object->save();

            return redirect()->route('admin.' . $path . '.item_edit', ['menuid' => $menuID, 'id' => $object->id])->with('message', 'Сохранено');
        }

        $pages = Page::all();

        return view('admin.utility.' . $path . '.item_edit', compact('object', 'path', 'TITLE', 'menuID', 'pages',));
    }
}
