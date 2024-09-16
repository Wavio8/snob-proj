<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class NavBar extends Component
{
    public $title;
    public $url;
    public $all;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $url, $all)
    {
        $this->title = $title;
        $this->url = $url;
        $this->all = $all;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.components.navbar');
    }
}
