<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $article = Article::take(6)->where('status', 1)->latest()->get();
        $firstBestArticle = Article::withCount('likes')->orderBy('likes_count', 'desc')->first();
        $bestArticle = Article::take(2)->withCount('likes')->orderBy('likes_count', 'desc')->skip(1)->get();

        return view('livewire.home', compact('article', 'firstBestArticle', 'bestArticle'));
    }
}
