<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryPage extends Component
{
    use WithPagination;

    public Category $category;

    public function render()
    {
        $article = Article::where('category_id', $this->category->id)->where('status', 1 )->latest()->paginate(9);

        return view('livewire.category-page', compact('article'));
    }
}
