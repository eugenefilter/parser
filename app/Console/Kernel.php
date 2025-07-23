<?php

namespace App\Console;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\ParseAlegria;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        ParseAlegria::class,
    ];
}
