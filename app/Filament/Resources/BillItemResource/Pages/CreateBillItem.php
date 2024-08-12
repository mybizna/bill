<?php

namespace Modules\Bill\Filament\Resources\BillItemResource\Pages;

use Modules\Bill\Filament\Resources\BillItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBillItem extends CreateRecord
{
    protected static string $resource = BillItemResource::class;
}
