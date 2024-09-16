<?php

namespace App\Http\Controllers\Admin\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forms\Requests;
use Illuminate\Support\Facades\Storage;

class RequestsController extends Controller
{
    public $routersNames = ['GROUP' => 'Формы', 'NAME' => 'Заявки'];

    public function index(Request $request)
    {
        $objects = Requests::paginate(30)->appends(request()->query());

        if ($id = $request->delete) {
            $item = Requests::find($id);
            if ($item->file)
                Storage::disk('public')->delete($item->file);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $path = 'forms.requests';
        return view('admin.forms.requests.index', compact('objects', 'path'));
    }

    public function edit(Request $request, $id = null)
    {
        $object = $id ? Requests::findOrFail($id) : new Requests();

        // if ($request->isMethod('post')) {
        //     $object->fill($request->except(['_token']));
        //     $object->save();
        //     return redirect()->route('admin.forms.requests.edit', ['id' => $object->id])->with('message', 'Сохранено');
        // }
        // $types = BannersType::cases();
        $path = 'forms.requests';
        return view('admin.forms.requests.edit', compact('object', 'path'));
    }
}
