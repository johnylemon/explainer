<?php

namespace Lemon\Explainer\Commands;

use Illuminate\Console\Command;
use Lemon\Explainer\Traits\Stubs;

class ExplainRoute extends Command
{
    use Stubs;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'explain:route {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Explain route';

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
        $name = $this->argument('name');

        $this->createDirectory($this->path());

        $this->stub('route', $this->path()."/$name", [
            'NAME' => $name
        ]);

        $this->comment("Route explain $name has been created");
    }

    protected function path()
    {
        return app_path("Explains");
    }
}
