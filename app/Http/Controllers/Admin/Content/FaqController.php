<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\Faq;
use Illuminate\Http\Request;
use App\Enums\Content\BannersType;

class FaqController extends Controller
{
    public $routersNames = ['GROUP' => 'Контент', 'NAME' => 'Вопросы и ответы'];

    public function index(Request $request)
    {
        $objects = Faq::paginate(30)->appends(request()->query());


        if ($id = $request->delete) {
            $item = Faq::find($id);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $path = 'content.faq';
        return view('admin.content.faq.index', compact('objects', 'path'));
    }

    public function edit(Request $request, $id = null)
    {
        $object = $id ? Faq::findOrFail($id) : new Faq();

        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token']));
            $object->save();
            return redirect()->route('admin.content.faq.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }
        $types = BannersType::cases();
        $path = 'content.faq';
        return view('admin.content.faq.edit', compact('object', 'path', 'types'));
    }
}
