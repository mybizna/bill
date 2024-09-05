<?php

namespace Modules\Bill\Filament\Resources\ItemResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Bill\Filament\Resources\ItemResource;

class CreateItem extends CreateRecord
{
    protected static string $resource = ItemResource::class;
}
