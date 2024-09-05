<?php

namespace Modules\Bill\Filament\Resources\ItemResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Bill\Filament\Resources\ItemResource;

class EditItem extends EditRecord
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
