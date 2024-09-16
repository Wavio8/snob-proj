<?php

namespace App\Http\Controllers\Admin\Utility;



use App\Helpers\Admin\Helper;
use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\Utility\Page;
use App\Models\Page\PageSection;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User\AdminEventLogs;

class PageController extends Controller
{
    public $PATH = 'page';
    public $TITLE = ['Страницы', 'страницы'];
    public $MODEL = Page::class;
    public $routersNames = ['GROUP' => '', 'NAME' => 'Страницы'];

    public function index(Request $request)
    {
        $PATH = $this->PATH;
        $TITLE = $this->TITLE;

        $objects = $this->MODEL::orderBy('id', 'desc');

        if ($request->search) {
            $search = preg_replace("/http.+" . $_SERVER['SERVER_NAME'] . "\//", '', $request->search);
            $objects = Helper::search($objects, $search, ['title', 'url']);
        }

        if ($id = $request->delete) {
            $item = $this->MODEL::find($id);
            $item->clear();
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $objects = $objects->get();


        return view('admin.utility.' . $PATH . '.index', compact('objects', 'PATH', 'TITLE'));
    }

    public function edit(Request $request, $id = null)
    {
        $PATH = $this->PATH;
        $TITLE = $this->TITLE;

        $object = $id ? $this->MODEL::findOrFail($id) : new $this->MODEL();
        $object_logs = $object->getAttributes(); //для логов

        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token', 'url']));
            $object->hide = empty($request->hide) ? 0 : 1;
            $object->url = $request->url ?? Str::slug($request->name);
            $object->rating = $request->rating ?? 0;
            $object->save();

            Helper::url_uniq($object, $this->MODEL);

            if ($request->gallery) {
                FileUpload::uploadGallery(
                    'gallery',
                    $object->id,
                    'PAGE',
                    1920,
                    1080,
                    '/images/pages',
                    null,
                    $request
                );
            }



            return redirect()->route('admin.' . $PATH . '.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }


        return view('admin.utility.' . $PATH . '.edit', compact('object', 'PATH', 'TITLE'));
    }
}
