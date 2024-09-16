<?php

namespace App\Http\Controllers\Admin\Content;

use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Content\Address;
use App\Models\Content\Subway;
use Illuminate\Http\Request;
use App\Models\Forms\Requests;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Admin\Helper;

class AddressesController extends Controller
{
    public $routersNames = ['GROUP' => '', 'NAME' => 'Адреса'];

    public function index(Request $request)
    {
        $objects = Address::paginate(30)->appends(request()->query());

        if ($id = $request->delete) {
            $item = Address::find($id);
            $item->clear();
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $path = 'content.addresses';
        $fields = [['name' => 'id', 'label' => '#']];
        return view('admin.content.addresses.index', compact('objects', 'path', 'fields'));
    }

    public function edit(Request $request, $id = null)
    {
        $object = $id ? Address::findOrFail($id) : new Address();

        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token', 'image']));
            $object->save();

            if ($request->image)
                FileUpload::uploadImage('image', Address::class, 'image', $object->id, 1920, 1080, '/images/address', false, $request);


            $subwaysbefore = $object->subways()->pluck('id')->toArray();

            $subways = $request->subways;
            $doc = $request->doctorsCards;

            $add = array_diff($subways, $subwaysbefore);
            $remove = array_diff($subwaysbefore, $subways);

            foreach ($add as $value) {
                if ($value === '-1') continue;
                $object->addSubway($value);
            }

            foreach ($remove as $value) {
                if ($value === '-1') continue;
                $object->removeSubway($value);
            }

            return redirect()->route('admin.content.addresses.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }



        $subways = Subway::all();
        $subwaysSelected = Helper::multiple($object->subways()->pluck('id')->toArray());
        $path = 'content.addresses';
        return view('admin.content.addresses.edit', compact('object', 'path', 'subways', 'subwaysSelected'));
    }
}
