<?php

namespace Modules\Bill\Filament\Resources\BillItemRateResource\Pages;

use Modules\Bill\Filament\Resources\BillItemRateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBillItemRate extends EditRecord
{
    protected static string $resource = BillItemRateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
