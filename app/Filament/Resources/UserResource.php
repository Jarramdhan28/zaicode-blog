<?php

namespace App\Filament\Resources;

use App\Enums\UsersRole;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Tables\Actions\EditAction;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Create a User')->schema([
                    Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->revealable(),
                    Select::make('role')
                    ->options([
                        'ADMIN' => 'Admin',
                        'EDITOR' => 'Editor',
                    ])
                ])->columnSpan(2)->columns(2),
                Group::make()->schema([
                    Section::make('Add Photo Profile')->schema([
                        FileUpload::make('profile_photo_path')->label(''),
                    ])
                ])
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->modifyQueryUsing(function (Builder $query) {
            if (auth()->user()->role === 'ADMIN') {
                return $query->where('role', 'EDITOR')->orWhere('role', 'USER');
            }
        })
        ->columns([
            Tables\Columns\ImageColumn::make('profile_photo_path')
                ->label('Photo Profile')
                ->default('https://dummyimage.com/300x300&text=zaicode')
                ->circular()
                ->extraImgAttributes(['loading' => 'lazy']),
            Tables\Columns\TextColumn::make('name')
                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->searchable(),
            Tables\Columns\TextColumn::make('role')
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->date()
                ->searchable()
                ->sortable(),
        ])
        ->filters([
            SelectFilter::make('role')
            ->options([
                'USER' => 'User',
                'EDITOR' => 'Editor',
            ])
        ])
        ->actions([
            Tables\Actions\Action::make('changeRole')
            ->label('Change Role')
            ->action(function ($record, array $data) {
                $record->update(['role' => $data['role']]);
            })
                ->form([
                    Forms\Components\Select::make('role')
                    ->label('Role')
                    ->options([
                        'USER' => 'USER',
                        'EDITOR' => 'EDITOR',
                    ])
                        ->required(),
                ]),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            // 'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
