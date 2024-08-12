<?php

namespace Modules\Bill\Filament\Resources\BillItemResource\Pages;

use Modules\Bill\Filament\Resources\BillItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBillItem extends EditRecord
{
    protected static string $resource = BillItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
