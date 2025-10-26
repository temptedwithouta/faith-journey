<?php

namespace App\Filament\Resources\Devotions\Pages;

use App\Filament\Resources\Devotions\DevotionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDevotion extends EditRecord
{
    protected static string $resource = DevotionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
