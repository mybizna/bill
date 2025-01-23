<?php

namespace Modules\Bill\Filament\Resources;

use Filament\Forms\Form;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Bill\Models\Bill;

class BillResource extends BaseResource
{
    protected static ?string $model = Bill::class;

    protected static ?string $slug = 'bill/bill';

    protected static ?string $navigationGroup = 'Bill';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }


}
