<?php

namespace Modules\Bill\Filament\Resources\BillResource\Pages;

use Modules\Bill\Filament\Resources\BillResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBill extends CreateRecord
{
    protected static string $resource = BillResource::class;
}
