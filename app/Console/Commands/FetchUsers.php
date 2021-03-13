<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;

class FetchUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all users and Migrate to Database';

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
        $request = Request::create("/users/fetch", 'GET');
        $this->info(app()->make(\Illuminate\Contracts\Http\Kernel::class)->handle($request));
    }
}
