<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeScopeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:scope {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Eloquent scope trait (supports subfolders)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = Str::studly($this->argument('name')); // Product/ProductScope
        $path = app_path('Scopes/' . str_replace('\\', '/', $name) . '.php');

        if (File::exists($path)) {
            $this->error("Trait scope {$name} already exists!");
            return Command::FAILURE;
        }

        // تأكد من وجود كل الفولدرات في المسار
        File::ensureDirectoryExists(dirname($path));

        // احسب الـnamespace الصحيح
        $namespace = 'App\\Scopes\\' . str_replace('/', '\\', dirname($this->argument('name')));

        // في حالة مفيش فولدر
        if ($namespace === 'App\\Scopes\\.') {
            $namespace = 'App\\Scopes';
        }

        $className = class_basename($name);

        // محتوى الترايت الجاهز
        $stub = <<<EOT
<?php

namespace {$namespace};

trait {$className}
{
    /**
     * Example scope
     */
    public function scopeActive(\$query)
    {
        return \$query->where('active', true);
    }

    // Add more scopes here...
}

EOT;

        File::put($path, $stub);

        $this->info("Scope ".app_path("Scopes/{$name}.php")." created successfully.");

        return Command::SUCCESS;
    }
}
