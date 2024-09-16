<?php

namespace App\Helpers\Admin;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchCheckboxes
{
    public $items;
    public $data;
    public $class;
    public $name;
    public $title;
    public $title2;
    public $search;
    public $textboxes;

    public $allOpton;

    public function __construct(Collection $items = null, Request $request)
    {
        $this->items = $items;

        $this->data = $request->data;
        $this->class = $request->class;
        $this->name = $request->name;

        $this->allOpton = json_decode($request->allOption);

        $this->search = isset($request->search) ? $request->search : false;

        $this->search_filter = isset($request->search_filter) ? $request->search_filter : false;
    }

    public function view($textboxes = false)
    {
        $this->textboxes = $textboxes;

        if ($this->items) {
            if (!empty($this->search) || !empty($this->search_filter)) {
                $this->search();
                $this->setCheckedItems();

                return view('admin.includes.search_checkboxes_items', ['name' => $this->name,'objects'=>$this->items, 'textboxes' => $textboxes]);
            }
            else{
                $this->setCheckedItems();

                return view('admin.dialogs.search_checkboxes', [
                    'name' => $this->name,
                    'title' => $this->title,
                    'title2' => $this->title2,
                    'class' => $this->class,
                    'objects' => $this->items,
                    'textboxes' => $textboxes,
                    'allOption' => $this->allOpton
                ]);
            }

        }
    }

    public function setTitles($title, $title2)
    {
        $this->title = $title;
        $this->title2 = $title2;

        return $this;
    }

   private function setCheckedItems()
    {
        $data = $this->textboxes ? json_decode($this->data, true) : explode('|', $this->data);

        if (!empty($data) && !empty($this->items)) {
            foreach ($this->items as $value) {
                if ($this->textboxes){
                    foreach ($data as $value2){
                        if ($value->id == $value2['id']){
                            $value->checked = $value2['checked'];
                            $value->text = $value2['text'];
                        }
                    }
                }
                else{
                    if (in_array($value->id, $data))
                        $value->checked = 1;
                }
            }
        }
    }

    private function search()
    {
       $this->items = $this->items->filter(fn($item) => mb_stripos($item->name, $this->search) !== false);
    }

    public static function init($items, $request, $title1=null, $title2=null, $textboxes=false)
    {

        $search_checkboxes = new self($items, $request);

        if ($title1 && $title2)
            $search_checkboxes->setTitles($title1 , $title2);

        return $search_checkboxes->view($textboxes);
    }


}
