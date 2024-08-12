<?php

namespace Modules\Bill\Filament\Resources\BillItemRateResource\Pages;

use Modules\Bill\Filament\Resources\BillItemRateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBillItemRates extends ListRecords
{
    protected static string $resource = BillItemRateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
