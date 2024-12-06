<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $article = Article::take(6)->where('status', 1)->latest()->get();
        return view('livewire.home', compact('article'));
    }
}
