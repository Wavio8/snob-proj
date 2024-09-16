<?php

namespace App\Http\Controllers\Admin\Ajax;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Events\AdminHideEvent;
use App\Helpers\FileUpload;
use App\Http\Controllers\Controller;

use App\Models\Catalog\Attributes\CatalogAttributesProducts;
use App\Models\Catalog\Attributes\CatalogAttributesValue;
use App\Models\Location\Storage\CatalogStorageMetro;
use App\Models\Catalog\Attributes\CatalogAttributes;
use App\Models\Catalog\Chars\CatalogCharsValue;
use App\Models\Catalog\Chars\CatalogChars;
use App\Models\Catalog\CatalogTags;
use App\Models\Gallery;
use App\Models\Files;
use App\Models\Items;

trait LegacyAjax
{


    private function changeRating($id, $className, $value, $field)
    {
        if (empty($field)) $field = 'rating';

        $value = (int)$value;

        if ($value == 0 && $field <> 'rate') $value = null;

        $object = $className::find($id);
        $object->{$field} = (int)$value;
        $object->save();

        echo 'success';
    }

    private function changeVideoRating($id, $value)
    {

        $value = (int)$value;

        if ($value == 0) $value = null;

        if (MainVideo::find($id)->changeRating($value)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    private function sortableRating($array, $className)
    {
        foreach ($array as $id => $rating) {
            $object = $className::find($id);
            if ($object) {
                $object->rating = (int)$rating;
                $object->save();
            }
        }
    }

    


    private function mainVideoDelete($id)
    {
        $image = MainVideo::find($id);

        if ($image && !empty($image->file)) {
            unlink(ROOT . '/upload/main_videos/' . $image->file);
            $image->delete();
            echo 'success';
        } else {
            echo 'error';
        }
    }

    private function bimVideoDelete($id)
    {
        $image = Bim::find($id);

        if ($image && !empty($image->value)) {
            unlink(ROOT . '/upload/bim/' . $image->value);
            $image->value = null;
            $image->save();
            echo 'success';
        } else {
            echo 'error';
        }
    }

    private function imgUpload()
    {
        FileUpload::editorUploadImage('file');
    }
    private function editorImageDelet($src)
    {
        $path = preg_replace("/http.+storage/", '', $src);
        Storage::delete($path);
    }
    private function fileDelete($id, $className, $path, $field)
    {
        $object = $className::find($id);

        if ($object && !empty($object->$field)) {
            unlink(ROOT . $path . '/' . $object->$field);
            $object->$field = null;
            $object->save();
            echo 'success';
        } else {
            echo 'error';
        }
    }

    private function mainFileDelete($id, $className, $path)
    {
        $object = $className::find($id);

        if ($object && !empty($object->value)) {
            unlink(ROOT . $path . '/' . $object->value);
            $object->value = null;
            $object->save();
            echo 'success';
        } else {
            echo 'error';
        }
    }



    private function items_add($table, $id, $type = '')
    {
        switch ($table) {
            case 'catalog_attributes_value':
                $model = new CatalogAttributesValue();
                $model->name = $value ?? '';
                $model->catalog_attributes = $id;
                $model->save();
                $item_id = $model->id ?? 0;
                echo view('admin.includes.items.item', compact('item_id', 'table'));
                break;
            case 'catalog_chars_value':
                $model = new CatalogCharsValue();
                $model->name = $value ?? '';
                $model->catalog_chars = $id;
                $model->save();
                $item_id = $model->id ?? 0;
                $placeholder = 'Название';
                $placeholder2 = 'Ссылка (необязательно)';
                $second = 'link';
                $catalog_chars = CatalogChars::where('id', $id)->first();
                $field = $catalog_chars->field ?? '';
                echo view('admin.includes.items.item', compact('item_id', 'table', 'placeholder', 'second', 'placeholder2', 'field'));
                break;
            case 'catalog_attributes_products':
                $model = new CatalogAttributesProducts();
                $model->name = $value ?? '';
                $model->catalog_products = $id;
                $model->catalog_attributes = $type;
                $model->save();
                $item_id = $model->id ?? 0;
                $catalog_attributes_value = CatalogAttributesValue::list();
                $values = $catalog_attributes_value[$type] ?? array();
                $input_class = '';
                $catalog_attributes = CatalogAttributes::where('id', $type)->first();
                if (!empty($catalog_attributes->unit)) $input_class = 'input-number';
                echo view('admin.includes.items.item', compact('item_id', 'table', 'type', 'values', 'input_class'));
                break;
            case 'catalog_tags':
                $model = new CatalogTags();
                $model->name = $value ?? '';
                if ($type == 'catalog_series') $model->catalog_series = $id;
                else $model->catalog_categories = $id;
                $model->save();
                $item_id = $model->id ?? 0;
                $placeholder = 'Название';
                $placeholder2 = 'Ссылка';
                $second = 'url';
                echo view('admin.includes.items.item', compact('item_id', 'table', 'placeholder', 'second', 'placeholder2'));
                break;
            case 'catalog_storage_metro':
                $model = new CatalogStorageMetro();
                $model->name = $value ?? '';
                $model->storage_id = $id;
                $model->save();
                $item_id = $model->id ?? 0;
                $placeholder = 'Название';
                $placeholder2 = 'Цвет';
                $second = 'color';
                echo view('admin.includes.items.item', compact('item_id', 'table', 'placeholder', 'second', 'placeholder2'));
                break;
            case 'items':
                if (empty($type) || empty($id)) return;
                $model = new Items();
                $model->type = $type;
                $model->ids = $id;
                $model->save();
                $item_id = $model->id ?? 0;
                if ($type == 'delivery') {
                    $placeholder = 'Описание';
                    $placeholder2 = 'Цена';
                    $placeholder3 = 'Доп. описание';
                    $second = 'name2';
                    $third = 'name3';
                    echo view('admin.includes.items.item', compact('item_id', 'table', 'placeholder', 'placeholder2', 'placeholder3', 'second', 'third'));
                } else if ($type == 'metro') {
                    $placeholder = 'Название станции метро';
                    $placeholder2 = 'Код цвета (например, #3A9ED6)';
                    $second = 'name2';
                    echo view('admin.includes.items.item', compact('item_id', 'table', 'placeholder', 'placeholder2', 'second'));
                }
                break;
        }
        return;
    }

    private function items_edit($table, $item_id, $value, $type = '')
    {
        switch ($table) {
            case 'catalog_attributes_value':
                $model = CatalogAttributesValue::where('id', $item_id)->first();
                if ($model) {
                    $model->name = $value ?? '';
                    $model->save();
                }
                break;
            case 'catalog_chars_value':
                $model = CatalogCharsValue::where('id', $item_id)->first();
                if ($model) {
                    $model->name = $value ?? '';
                    $model->save();
                }
                break;
            case 'catalog_attributes_products':
                $model = CatalogAttributesProducts::where('id', $item_id)->first();
                if ($model) {
                    $model->name = $value ?? '';
                    $model->save();
                }
                break;
            case 'catalog_tags':
                $model = CatalogTags::where('id', $item_id)->first();
                if ($model) {
                    $model->name = $value ?? '';
                    $model->save();
                }
                break;
            case 'catalog_storage_metro':
                $model = CatalogStorageMetro::where('id', $item_id)->first();
                if ($model) {
                    $model->name = $value ?? '';
                    $model->save();
                }
                break;
            case 'items':
                $model = Items::where('id', $item_id)->first();
                if ($model) {
                    $model->name = $value ?? '';
                    $model->save();
                }
                break;
        }
        return;
    }

    private function items_edit_checkbox($table, $item_id, $value, $field)
    {
        switch ($table) {
            case 'catalog_chars_value':
                $model = CatalogCharsValue::where('id', $item_id)->first();
                if ($model) {
                    $model->{$field} = $value ?? '';
                    $model->save();
                }
                break;
        }
        return;
    }

    private function items_edit2($table, $item_id, $value, $type = '')
    {
        switch ($table) {
            case 'catalog_tags':
                $model = CatalogTags::where('id', $item_id)->first();
                if ($model) {
                    $model->url = $value ?? '';
                    $model->save();
                }
                break;
            case 'catalog_chars_value':
                $model = CatalogCharsValue::where('id', $item_id)->first();
                if ($model) {
                    $model->link = $value ?? '';
                    $model->save();
                }
                break;
            case 'catalog_chars_value_brand':
                $model = CatalogCharsValue::where('id', $item_id)->first();
                if ($model) {
                    $model->show_storage_count_min = (int)$value ?? 0;
                    $model->save();
                }
                break;
            case 'catalog_storage_metro':
                $model = CatalogStorageMetro::where('id', $item_id)->first();
                if ($model) {
                    $model->color = $value ?? '';
                    $model->save();
                }
                break;
            case 'items':
                $model = Items::where('id', $item_id)->first();
                if ($model) {
                    $model->name2 = $value ?? '';
                    $model->save();
                }
                break;
        }
        return;
    }

    private function items_edit3($table, $item_id, $value, $type = '')
    {
        switch ($table) {
            case 'items':
                $model = Items::where('id', $item_id)->first();
                if ($model) {
                    $model->name3 = $value ?? '';
                    $model->save();
                }
                break;
        }
        return;
    }

    private function items_delete($table, $id, $type = '')
    {
        switch ($table) {
            case 'catalog_attributes_value':
                $model = CatalogAttributesValue::where('id', $id)->delete();
                break;
            case 'catalog_chars_value':
                $model = CatalogCharsValue::where('id', $id)->delete();
                break;
            case 'catalog_attributes_products':
                $model = CatalogAttributesProducts::where('id', $id)->delete();
                break;
            case 'catalog_tags':
                $model = CatalogTags::where('id', $id)->delete();
                break;
            case 'catalog_storage_metro':
                $model = CatalogStorageMetro::where('id', $id)->delete();
                break;
            case 'items':
                $model = Items::where('id', $id)->delete();
                break;
        }
        return;
    }

    private function items_delete_picker($product, $group)
    {
        CatalogAttributesProducts::where('catalog_products', $product)->where('group', $group)->delete();
        return;
    }

    private function items_edit_picker($item_id, $value)
    {
        $model = CatalogAttributesProducts::where('id', $item_id)->first();
        if ($model) {
            $model->name = $value ?? '';
            $model->save();
        }
        return;
    }

    private function items_add_picker($product)
    {
        $last = CatalogAttributesProducts::where('catalog_products', $product)->orderBy('group', 'desc')->first();
        if (!$last) return;
        $group = $last->group ?? 1;
        $group++;

        $array = array();
        $catalog_attributes_products = CatalogAttributesProducts::where('catalog_products', $product)->where('group', 1)->get();
        foreach ($catalog_attributes_products as $item) {
            $model = CatalogAttributesProducts::add($product, $item->catalog_attributes, $item->value, $group);

            $catalog_attributes_value = CatalogAttributesValue::where('id', $model->value)->first();
            $model->value_name = $catalog_attributes_value->name ?? '';

            $array[] = $model;
        }
        $product_id = $product;
        echo view('admin.includes.catalog.attributes_picker_group', compact('array', 'product_id'));
    }

    private function accordion($name, $value)
    {
        if (empty($name)) return;
        $str = Str::slug($name);
        session(['accordion_' . $str => $value]);
        return;
    }

    private function changeFileRating($id, $value)
    {
        Files::find($id)->fill(['rating' => $value])->save();
    }

    private function changeFileAlt($id, $value)
    {
        Files::find($id)->fill(['name' => $value])->save();
    }

    private function deleteFile($id)
    {
        $file = Files::find($id);
        Storage::delete($file->path);
        $file->delete();
    }
}
