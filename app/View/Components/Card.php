<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $backgroundColor;
    public $icon;
    public $count;
    public $title;
    public $subTitle;

    public function __construct(
        $backgroundColor,
        $icon,
        $count,
        $title,
        $subTitle,
    )
    {
        $this->backgroundColor = $backgroundColor;
        $this->icon = $icon;
        $this->count = $count;
        $this->title = $title;
        $this->subTitle = $subTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
