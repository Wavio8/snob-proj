<?php

namespace App\Http\Controllers\Admin\Users;

use App\Helpers\Admin\Helper;
use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;
use App\Models\User\AdminAccessRights;
use App\Models\User\UserСlass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

class UsersClassesController extends Controller
{
    public $PATH = 'users.classes';
    public $TITLE = ['Классы пользователей', 'класса'];
    public $MODEL = UserСlass::class;

    public $routersNames = ['GROUP' => 'Пользователи', 'NAME' => 'Классы пользователей'];

    public function index(Request $request)
    {
        $path = $this->PATH;
        $title = $this->TITLE;

        $objects = $this->MODEL::orderBy('id', 'desc');

        if ($request->search) {
            $objects = $objects->where('name', 'LIKE', '%' . str_replace(' ', '%', $request->search) . '%');
        }

        if ($id = $request->delete) {
            $item = $this->MODEL::find($id);
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $objects = $objects->get();

        return view('admin.utility.' . $path . '.index', compact('objects', 'path', 'title'));
    }

    public function edit(Request $request, $id = null)
    {

        $path = $this->PATH;
        $title = $this->TITLE;
        $rightsList = ['read' => 'Чтение', 'edit' => 'Редактирование', 'delete' => 'Удаление'];
        $object = $id ? $this->MODEL::findOrFail($id) : new $this->MODEL();

        $routes = Route::getRoutes();

        $portectedRoutes = [];

        foreach ($routes as $key =>  $value) {
            if (in_array('admin_access', $value->action['middleware'])) {
                $name = $value->getName();
                $name = str_replace(['admin.', '.edit', '.index'], '', $name);

                $tmp =  explode('.', $name);
                $group = $tmp[0];

                $controller = explode('@', $value->action['controller'])[0];
                $controller = new $controller();
                $names =  $controller->routersNames  ?? [];
                $portectedRoutes[$group]['name'] = $names ? $names['GROUP'] : '';



                if (!array_key_exists($group, $portectedRoutes)) {
                    $portectedRoutes[$group] = [];
                }
                if (!array_key_exists('routes', $portectedRoutes[$group])) {
                    $portectedRoutes[$group]['routes'] = [];
                }

                if (!array_key_exists($name, $portectedRoutes[$group]['routes'])) {

                    $portectedRoutes[$group]['routes'][$name] =  $names ? $names['NAME'] : '';

                    if (array_key_exists($name, $names)) {
                        $portectedRoutes[$group]['routes'][$name] = $names[$name];
                    }
                }
            }
        }




        if ($request->isMethod('post')) {

            $object->name = $request->name;
            $object->save();

            $oldRights = $object->rights;


            foreach ($portectedRoutes as $section) {

                foreach ($section['routes'] as $path => $name) {

                    $requestName = preg_replace("/\./", '_', $path);
                    $rights = $oldRights->filter(fn ($item) => $item->path === $path);

                    if ($request->{$requestName}) {
                        foreach ($rightsList as $right => $rightName) {
                            $dbRight = $rights->filter(fn ($item) => $item->type === $right)->first();
                            if ($dbRight) {
                                if (!in_array($right, $request->{$requestName})) {
                                    $dbRight->delete();
                                }
                            } else {
                                if (in_array($right, $request->{$requestName})) {
                                    $item = new AdminAccessRights();
                                    $item->path = $path;
                                    $item->type = $right;
                                    $item->user_class_id = $object->id;
                                    $item->save();
                                }
                            }
                        }
                    }
                }
            }

            return redirect()->route('admin.' . $this->PATH . '.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }

        return view('admin.utility.' . $this->PATH . '.edit', compact('object',  'path', 'title', 'portectedRoutes', 'rightsList'));
    }
}
