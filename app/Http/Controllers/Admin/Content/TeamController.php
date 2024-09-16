<?php

namespace App\Http\Controllers\Admin\Content;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Content\Achievement;
use App\Models\Content\Team;
use Illuminate\Http\Request;
use App\Enums\Content\BannersType;

class TeamController extends Controller
{
    public $routersNames = ['GROUP' => 'Контент', 'NAME' => 'Команда'];

    public function index(Request $request)
    {
        $objects = Team::paginate(30)->appends(request()->query());


        if ($id = $request->delete) {
            $item = Team::find($id);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $path = 'content.team';
        return view('admin.content.team.index', compact('objects', 'path'));
    }

    public function edit(Request $request, $id = null)
    {
        $object = $id ? Team::findOrFail($id) : new Team();

        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token','image']));
            $object->save();
            if ($request->image)
                FileUpload::uploadImage('image', Team::class, 'image', $object->id, 1920, 1080, '/images/team', false, $request);

            return redirect()->route('admin.content.team.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }

        $path = 'content.team';
        return view('admin.content.team.edit', compact('object', 'path'));
    }
}
