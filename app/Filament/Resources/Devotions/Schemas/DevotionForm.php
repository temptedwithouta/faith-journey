<?php

namespace App\Filament\Resources\Devotions\Schemas;

use App\Models\Category;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DevotionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->label('Title')->minLength(2)->maxLength(100),
                TextInput::make('source')->label('Source')->url()->maxLength(200),
                Select::make('category_id')->label('Category')->options(Category::query()->pluck('name', 'id'))->searchable(),
                Repeater::make('bible_verse')->label('Bible Verse')->schema([
                    Select::make('book')->label('Book')->columnSpanFull(),
                    Repeater::make('verse')->hiddenLabel()->schema([
                        Repeater::make('')->hiddenLabel()->schema([
                            Select::make('chapter')->label('Chapter'),
                            Select::make('verse')->label('Verse')
                        ])->addable(false)->deletable(false)->reorderable(false)->defaultItems(2)->grid(2)->columns(2)
                    ])->columnSpanFull()->minItems(1)->addActionLabel('Add Verse'),
                ])->columnSpanFull()->minItems(1)->addActionLabel('Add Bible Verse'),
                RichEditor::make('body')->label('Body')->minLength(2)->toolbarButtons([
                    ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                    ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                    ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                    ['table'],
                    ['undo', 'redo'],
                ])->columnSpanFull(),
            ]);
    }
}
