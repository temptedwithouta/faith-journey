<?php

namespace App\Filament\Resources\Devotions\Pages;

use App\Filament\Resources\Devotions\DevotionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDevotion extends CreateRecord
{
    protected static string $resource = DevotionResource::class;
}
