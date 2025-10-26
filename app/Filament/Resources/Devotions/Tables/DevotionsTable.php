<?php

namespace App\Filament\Resources\Devotions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use stdClass;

class DevotionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')->label('No.')->state(fn(stdClass $rowLoop, Table $table): string => $rowLoop->index + ($table->getLivewire()->getTableRecordsPerPage() * ($table->getLivewire()->getTablePage() - 1)) + 1 . '.'),
                TextColumn::make('id')->label('Id'),
                TextColumn::make('title')->label('Title')->wrap(),
                TextColumn::make('bible_verse')->label('Bible Verse')->wrap(),
                TextColumn::make('source')->label('Source')->wrap(),
                TextColumn::make('body')->label('Body')->formatStateUsing(fn(string $state): string => Str::limit(strip_tags($state), 100))->wrap(),
                TextColumn::make('category.name')->label('Category')->wrap(),
                TextColumn::make('user.name')->label('Author')->wrap(),
                TextColumn::make('created_at')->label('Created At')->wrap(),
                TextColumn::make('updated_at')->label('Updated At')->wrap(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
