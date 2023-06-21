<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DbBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:dbBackup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Database backup';

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
     * @return mixed
     */
    public function handle()
    {
        $fileName = "backup_".strtotime(now()).".sql";
        $command = "mysqldump --user=".env("DB_USERNAME")." --password=".env("DB_PASSWORD")." --host=".env("DB_HOST")." ".env("DB_DATABASE")." > ".storage_path()."/app/backup/".$fileName;
        exec($command);
    }
}
