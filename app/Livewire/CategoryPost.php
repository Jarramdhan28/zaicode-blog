<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryPost extends Component
{
    use WithPagination;

    public function render()
    {
        $category = Category::latest()->paginate(9);

        return view('livewire.category-post', compact('category'));
    }
}
