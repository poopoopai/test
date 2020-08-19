<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use JakubOnderka\PhpConsoleColor\ConsoleColor;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fast:model {name : 使用者的ID}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $arguments = $this->argument();
  
        $this->call('admin:make', [
            'name' => 'Admin\\Controller\\' . studly_case($arguments['name']) . "Controller" ,
            '--model' => 'App\\Entities\\' . studly_case($arguments['name']) ,
        ]);
    }

}
