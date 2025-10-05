<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MakeTriatCommand extends Command
{
    protected $signature = 'make:trait {name}';
    protected $description = 'Create a new Trait class';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $path = app_path("Traits/{$name}.php");

        if (File::exists($path)) {
            $this->error("Trait {$name} already exists!");
            return Command::FAILURE;
        }

        if (!File::isDirectory(app_path('Traits'))) {
            File::makeDirectory(app_path('Traits'), 0755, true);
        }

        $stub = <<<EOT
<?php

namespace App\Traits;

Trait {$name}
{
    public function __construct()
    {
        // 
    }
}
EOT;

        File::put($path, $stub);
        $this->info("Trait {$name} created successfully.");
        return Command::SUCCESS;
    }
}
