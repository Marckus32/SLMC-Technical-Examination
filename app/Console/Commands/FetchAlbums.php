<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;

class FetchAlbums extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'albums:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all comments and Migrate to Database';

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
        $request = Request::create("/albums/fetch", 'GET');
        $this->info(app()->make(\Illuminate\Contracts\Http\Kernel::class)->handle($request));
    }
}
