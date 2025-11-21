<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class HelperCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:helper {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Eloquent helper trait (supports subfolders)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = Str::studly($this->argument('name')); 
        $path = app_path('helpers/' . str_replace('\\', '/', $name) . '.php');

        if (File::exists($path)) {
            $this->error("Trait helper {$name} already exists!");
            return Command::FAILURE;
        }

        File::ensureDirectoryExists(dirname($path));

        $namespace = 'App\\Helpers\\' . str_replace('/', '\\', dirname($this->argument('name')));

        if ($namespace === 'App\\Helpers\\.') {
            $namespace = 'App\\Helpers';
        }

        $className = class_basename($name);

        $stub = <<<EOT
<?php

namespace {$namespace};

class {$className}
{
  

}

EOT;

        File::put($path, $stub);

        $this->info("Helper " . app_path("Helpers/{$name}.php") . " created successfully.");

        return Command::SUCCESS;
    }
}
