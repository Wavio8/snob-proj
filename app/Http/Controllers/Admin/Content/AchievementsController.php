<?php

namespace App\Http\Controllers\Admin\Content;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Content\Achievement;
use Illuminate\Http\Request;
use App\Enums\Content\BannersType;

class AchievementsController extends Controller
{
    public $routersNames = ['GROUP' => 'Контент', 'NAME' => 'Достижения'];

    public function index(Request $request)
    {
        $objects = Achievement::paginate(30)->appends(request()->query());


        if ($id = $request->delete) {
            $item = Achievement::find($id);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $path = 'content.achievements';
        return view('admin.content.achievements.index', compact('objects', 'path'));
    }

    public function edit(Request $request, $id = null)
    {
        $object = $id ? Achievement::findOrFail($id) : new Achievement();

        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token','image']));
            $object->save();
            if ($request->image)
                FileUpload::uploadImage('image', Achievement::class, 'image', $object->id, 1920, 1080, '/images/achievement', false, $request);

            return redirect()->route('admin.content.achievements.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }
        $types = BannersType::cases();
        $path = 'content.achievements';
        return view('admin.content.achievements.edit', compact('object', 'path', 'types'));
    }
}
