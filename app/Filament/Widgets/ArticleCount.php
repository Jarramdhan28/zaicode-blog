<?php

namespace App\Filament\Widgets;

use App\Enums\UsersRole;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ArticleCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Card::make('Articles Publish', Article::where('status', '1')->count()),
            Card::make('Articles Unpublish', Article::where('status', '0')->count()),
            Card::make('Articles Categories', Category::count()),
            Card::make('Admin', User::where('role', UsersRole::ADMIN)->count()),
            Card::make('Users', User::where('role', UsersRole::USER)->count()),
            Card::make('Editor', User::where('role', UsersRole::EDITOR)->count()),
        ];
    }
}
