<?php

namespace App\Console;

use Illuminate\Console\Command;
use App\Application\Commands\ParseAlegriaCommand;

class ParseAlegria extends Command
{
    protected $signature = 'parse:alegria';
    protected $description = 'Parse rentals from alegria-realestate.com';

    public function handle(ParseAlegriaCommand $command): int
    {
        $command();
        $this->info('Parsing completed');
        return self::SUCCESS;
    }
}
