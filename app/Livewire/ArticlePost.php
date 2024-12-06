<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ArticlePost extends Component
{
    use WithPagination;

    public function render()
    {
        $article = Article::where('status', 1)->latest()->paginate(9);
        $category = Category::get();

        return view('livewire.article', compact('article', 'category'));
    }
}
