<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\Address;
use App\Models\Content\Subway;
use Illuminate\Http\Request;
use App\Models\Forms\Requests;
use Illuminate\Support\Facades\Storage;

class SubwayController extends Controller
{
    public $routersNames = ['GROUP' => 'Контент', 'NAME' => 'Метрополитены'];

    public function index(Request $request)
    {
        $objects = Subway::paginate(30)->appends(request()->query());

        if ($id = $request->delete) {
            $item = Requests::find($id);
            if ($item->file)
                Storage::disk('public')->delete($item->file);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $path = 'content.subway';

        return view('admin.content.subway.index', compact('objects', 'path'));
    }

    public function edit(Request $request, $id = null)
    {
        $object = $id ? Subway::findOrFail($id) : new Subway();

        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token']));
            $object->save();
            return redirect()->route('admin.content.subway.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }

        $path = 'content.subway';
        $subways = Subway::all();
        return view('admin.content.subway.edit', compact('object', 'path', 'subways'));
    }
}
