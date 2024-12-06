<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticlePage extends Component
{
    public Article $article;

    public function render()
    {
        return view('livewire.article-page', [
            'article' => $this->article
        ]);
    }
}
