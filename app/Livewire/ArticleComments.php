<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleComments extends Component
{
    use WithPagination;
    public Article $article;

    #[Rule('required|min:3|max:200')]
    public string $comment;

    public function postComment()
    {
        if (auth()->guest()){
            return;
        }

        $this->validateOnly('comment');
        $this->article->comments()->create([
            'comment' => $this->comment,
            'user_id' => auth()->id()
        ]);

        $this->reset('comment');
    }

    #[Computed()]
    public function comments()
    {
        return $this?->article->comments()->latest()->paginate(5);
    }

    public function render()
    {
        return view('livewire.article-comments');
    }
}
