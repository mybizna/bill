<?php

namespace Modules\Bill\Filament\Resources\BillResource\Pages;

use Modules\Base\Filament\Resources\Pages\ListingBase;
use Modules\Bill\Filament\Resources\BillResource;

// Class List that extends ListBase
class Listing extends ListingBase
{
    protected static string $resource = BillResource::class;
}
