<?php

namespace Modules\Bill\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Bill\Models\ItemRate;

class ItemRateResource extends BaseResource
{
    protected static ?string $model = ItemRate::class;

    protected static ?string $slug = 'bill/item/rate';

    protected static ?string $navigationGroup = 'Bill';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';



}
