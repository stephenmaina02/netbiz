<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DbUpdater extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command runs migration for altering database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Deleting DbUpdater migration...');

        \DB::table('migrations')->where('migration','2020_08_11_224832_db_updater')->delete();

        $this->info('Deleted!');

        $this->call('migrate');

        return 0;
    }
}
