<?php

namespace Modules\Bill\Filament\Resources\BillItemResource\Pages;

use Modules\Bill\Filament\Resources\BillItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBillItems extends ListRecords
{
    protected static string $resource = BillItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
