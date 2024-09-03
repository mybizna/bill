<?php

namespace Modules\Bill\Filament;

use Coolsam\Modules\Concerns\ModuleFilamentPlugin;
use Filament\Contracts\Plugin;
use Filament\Panel;

class BillPlugin implements Plugin
{
    use ModuleFilamentPlugin;

    public function getModuleName(): string
    {
        return 'Bill';
    }

    public function getId(): string
    {
        return 'bill';
    }

    public function boot(Panel $panel): void
    {
        // TODO: Implement boot() method.
    }
}
