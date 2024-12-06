<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use League\CommonMark\CommonMarkConverter;

class Markdown extends Component
{
    public $text;

    public function __construct()
    {
    }

    public function render()
    {
        return view('components.markdown');
    }

    public function toHtml($markdown)
    {
        $converter = new CommonMarkConverter();
        return $converter->convertToHtml($markdown);
    }
}
