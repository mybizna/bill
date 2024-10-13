<?php

namespace Modules\Bill\Filament\Resources\ItemResource\Pages;

use Modules\Base\Filament\Resources\Pages\ListingBase;
use Modules\Bill\Filament\Resources\ItemResource;

// Class List that extends ListBase
class Listing extends ListingBase
{
    protected static string $resource = ItemResource::class;
}
