<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service class';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $path = app_path("Services/{$name}.php");

        if (File::exists($path)) {
            $this->error("Service {$name} already exists!");
            return Command::FAILURE;
        }

        if (!File::isDirectory(app_path('Services'))) {
            File::makeDirectory(app_path('Services'), 0755, true);
        }

        $stub = <<<EOT
<?php

namespace App\Services;

class {$name}
{
    public function __construct()
    {
        // 
    }
}
EOT;

        File::put($path, $stub);
        $this->info("Service {$name} created successfully.");
        return Command::SUCCESS;
    }
}
