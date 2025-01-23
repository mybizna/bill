<?php

namespace Modules\Bill\Filament\Resources;

use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Bill\Filament\Resources\ItemResource\Pages;
use Modules\Bill\Models\Item;

class ItemResource extends BaseResource
{
    protected static ?string $model = Item::class;

    protected static ?string $slug = 'bill/item';

    protected static ?string $navigationGroup = 'Bill';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


}
