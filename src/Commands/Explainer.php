<?php

namespace Lemon\Explainer\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Lemon\Explainer\Explainer as ApiExplainer;
use Lemon\Explainer\Traits\Stubs;

class Explainer extends Command
{
    use Stubs;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'explain';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates api explainer data';


    protected $router;
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
        $explainer = new ApiExplainer();

        $this->storeJson($explainer);

        $this->copyAssets();
    }

    protected function storeJson(ApiExplainer $explainer)
    {
        $path = config('explainer.json_path');
        $directory = pathinfo($path)['dirname'];

        if(!file_exists($directory))
            mkdir($directory, 0755, TRUE);

        file_put_contents($path, $explainer);

        $this->comment("Explainer file has been created");
    }

    protected function copyAssets()
    {
        $filesmap = [
            'css' => ['explainerapp.css'],
            'js' => ['explainerapp.js'],
        ];

        foreach($filesmap as $directory => $files)
        {
            foreach($files as $file)
            {
                $target = public_path("$directory");
                $this->createDirectory($target);

                copy(__DIR__."/../../resources/$directory/$file", "$target/$file");
            }
        }

        $this->comment("Explainer assets has been copied");
    }
}
