<?php

namespace App\Http\Controllers\Admin\Content;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Content\DoctorsCard;
use Illuminate\Http\Request;
use App\Enums\Content\BannersType;

class DoctorsCardsController extends Controller
{
    public $routersNames = ['GROUP' => 'Контент', 'NAME' => 'Карточки докоторов'];

    public function index(Request $request)
    {
        $objects = DoctorsCard::paginate(30)->appends(request()->query());


        if ($id = $request->delete) {
            $item = DoctorsCard::find($id);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $path = 'content.doctors_card';
        return view('admin.content.doctors.index', compact('objects', 'path'));
    }

    public function edit(Request $request, $id = null)
    {
        $object = $id ? DoctorsCard::findOrFail($id) : new DoctorsCard();

        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token']));
            $object->save();
            return redirect()->route('admin.content.doctors_card.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }
        $types = BannersType::cases();
        $path = 'content.doctors_card';
        return view('admin.content.doctors.edit', compact('object', 'path', 'types'));
    }
}
