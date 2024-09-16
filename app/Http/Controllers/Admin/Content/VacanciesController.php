<?php

namespace App\Http\Controllers\Admin\Content;

use App\Helpers\Admin\Helper;
use App\Helpers\Admin\RelationHelper;
use App\Http\Controllers\Controller;
use App\Models\Content\DoctorsCard;
use App\Models\Content\Faq;
use App\Models\Content\Vacancies;
use App\Models\Content\VacanciesGroups;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    public $routersNames = ['GROUP' => 'Контент', 'content.group_vacancies' => 'Категории вакансий', 'NAME' => 'Вакансии'];

    public function edit(Request $request, $id = null)
    {
        $object = $id ? Vacancies::findOrFail($id) : new Vacancies();



        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token']));
            $object->hide = empty($request->hide) ? 0 : 1;
            $object->groupID = $request->groupID ?? null;
            $object->rating = $request->rating ?? 0;

            $docbefore = $object->doctorsCards()->pluck('id')->toArray();
            $faqbefore = $object->faq()->pluck('id')->toArray();

            $faq = $request->faq;
            $doc = $request->doctorsCards;

            $add = array_diff($faq, $faqbefore);
            $remove = array_diff($faqbefore, $faq);

            foreach ($add as $value) {
                if ($value === '-1') continue;
                $object->addFaq($value);
            }

            foreach ($remove as $value) {
                if ($value === '-1') continue;
                $object->removeFaq($value);
            }



            $add = array_diff($doc, $docbefore);
            $remove = array_diff($docbefore, $doc);

            foreach ($add as $value) {
                if ($value === '-1') continue;
                $object->addDoc($value);
            }

            foreach ($remove as $value) {
                if ($value === '-1') continue;
                $object->removeDoc($value);
            }


            $object->save();
            return redirect()->route('admin.content.vacancies.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }
        $doctorsCards = DoctorsCard::all();

        $groups = VacanciesGroups::all();
        $faq = Faq::all();

        $doctorsCardsSelected = Helper::multiple($object->doctorsCards()->pluck('id')->toArray());
        $faqSelected = Helper::multiple($object->faq()->pluck('id')->toArray());

        $path = 'content.vacancies';
        return view('admin.content.vacancies.edit', compact('object', 'path', 'groups', 'faq', 'doctorsCards', 'doctorsCardsSelected', 'faqSelected'));
    }
    public function group(Request $request)
    {
        if ($id = $request->delete) {
            $object = VacanciesGroups::find($id);
            foreach ($object->vacancies(true) as $vacancy) {
                $vacancy->delete();
            }
            $object->delete();
            return redirect()->back()->with('message', 'Удалено');
        }

        $objects = VacanciesGroups::paginate(30)->appends(request()->query());
        $path = 'content.group_vacancies';
        return view('admin.content.vacancies.group', compact('objects', 'path'));
    }

    public function group_edit(Request $request, $id = null)
    {
        $object = $id ? VacanciesGroups::findOrFail($id) : new VacanciesGroups();
        $path = 'content.group_vacancies';


        if ($id = $request->delete) {
            $item = Vacancies::find($id);
            $item->clear();
            $item->delete();
            return redirect()->back()->with('message', 'Удалено');
        }


        if ($request->isMethod('post')) {
            $object->fill($request->except(['_token']));
            $object->hide = empty($request->hide) ? 0 : 1;
            $object->rating = $request->rating ?? 0;

            $object->save();

            return redirect()->route('admin.' . $path . '.edit', ['id' => $object->id])->with('message', 'Сохранено');
        }

        $items = $object->vacancies(true);


        return view('admin.content.vacancies.group_edit', compact('object', 'items', 'path'));
    }
}
