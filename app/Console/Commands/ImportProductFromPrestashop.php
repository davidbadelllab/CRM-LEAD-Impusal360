<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportProductFromPrestashop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import-product:prestashop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import products from Prestashop';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
