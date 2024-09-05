<?php

namespace Modules\Bill\Filament\Resources\ItemRateResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Modules\Bill\Filament\Resources\ItemRateResource;

class ListItemRates extends ListRecords
{
    protected static string $resource = ItemRateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
