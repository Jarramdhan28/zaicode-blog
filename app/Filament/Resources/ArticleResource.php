<?php

namespace App\Filament\Resources;

use App\Enums\StatusArticle;
use App\Enums\UsersRole;
use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Closure;
use Filament\Forms\Components;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\form;
use function Pest\Laravel\get;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Components\FileUpload::make('image')
                        ->label('Thumbnail')
                        ->disk('public')
                        ->directory('thumbnail')
                        ->visibility('public')
                        ->columnSpan([
                            'sm' => 2,
                        ]),
                    Components\TextInput::make('title')
                        ->live(debounce: 500)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                    Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255),
                    Components\Select::make('category_id')
                        ->label('Category')
                        ->options(Category::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required(),
                    Components\Hidden::make('user_id')
                        ->default(Auth::user()->id)
                        ->required(),
                    Components\MarkdownEditor::make('content')
                        ->columnSpan([
                            'sm' => 2,
                        ])
                        ->required(),
                    Toggle::make('status')->label('Status Publish')
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        $user = Auth::user()->id;

        return $table
            ->modifyQueryUsing(function (Builder $query) use ($user) {
                if (auth()->user()->role === 'ADMIN') {
                    return;
                }elseif(auth()->user()->role === 'EDITOR'){
                    $query->where('user_id', $user);
                }
            })
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('created_at')->searchable()->since(),
                TextColumn::make('category.name')->exists('category')->searchable(),
                TextColumn::make('user.name')->searchable(),
                ToggleColumn::make('status')->label('Status Publish'),
            ])
            ->filters([
                SelectFilter::make('category_id')
                ->multiple()
                ->options(Category::all()->pluck('name', 'id')),
                ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
