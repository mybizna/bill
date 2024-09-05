<?php

namespace Modules\Bill\Filament\Resources\ItemRateResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Bill\Filament\Resources\ItemRateResource;

class EditItemRate extends EditRecord
{
    protected static string $resource = ItemRateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
