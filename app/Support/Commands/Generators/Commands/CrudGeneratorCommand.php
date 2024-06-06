<?php

namespace App\Support\Commands\Generators\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CrudGeneratorCommand extends Command
{
    protected $signature = 'generate:crud {--domain=} {--model=} {--M|migration}';

    protected $description = 'Generate a new crud';

    public function handle()
    {
        $controller = $this->getController();
        $datatable = $this->getDatatable();
        $domain = $this->getDomain();
        $model = $this->getModel();
        $view = Str::replace('.', '/', $this->getView($domain, $model));
        $modelName = Str::snake(Str::pluralStudly($model));
        $routes = $this->buildRoute($domain);
        $breadCrumb = $this->buildBreadCrumb($domain);

        // add new Permission in CorePermissions
        $this->AddNewPermission($modelName);
        $this->AddRoutes($modelName, $domain, $controller);
        $this->AddBreadCrumb($modelName, $domain, $controller);

        $this->info("Creating(Domain)     :   App\Domain\\{$domain}");
        $this->info("Creating(Model)      :   App\Domain\\{$domain}\Models\\{$model}");
        $this->info("Creating(Datatable)  :   App\Domain\\{$domain}\Datatables\\{$datatable}");
        $this->info("Creating(Controller) :   App\Domain\\{$domain}\Http\Controllers\\{$controller}");
        $this->info("Creating(View)       :   views/{$view}");
        $this->info("Creating(Routes)     :   App\Domain\\{$domain}\Routes\\{$routes}");
        $this->info("Creating(BreadCrumb) :   App\Domain\\{$domain}\Breadcrumbs\\{$breadCrumb}");

        $this->createFormView($domain, $model);
        if ($this->option('migration')) {
            $table = Str::snake(Str::pluralStudly($model));
            $migrationName = "create_{$table}_table";
            $this->callSilent('make:migration', [
                'name' => $migrationName,
                '--create' => $table,
            ]);
            $this->info("Creating(migration)       :   database/migrations/{$migrationName}");
        }
    }

    private function getDomain(): ?string
    {
        return DomainGeneratorCommand::lastCreated();
    }


    private function AddNewPermission($modelName)
    {
        $permissionPath = app_path('/Domain/Core/Enums/CorePermissions.php');
        $search = '/**';
        $line_number = false;

        if ($handle = fopen($permissionPath, "r")) {
            $count = 0;
            while (($line = fgets($handle, 4096)) !== FALSE and !$line_number) {
                $count++;
                $line_number = (strpos($line, $search) !== FALSE) ? $count : $line_number;
            }
            fclose($handle);
        }

        $lines = file($permissionPath, FILE_IGNORE_NEW_LINES);

        $newLine = ["* @method static self {$modelName}()"];
        $searchIfExist = array_search("* @method static self {$modelName}()", $lines, true);
        if ($searchIfExist == false) {
            array_splice($lines, $line_number + 1, 0, $newLine);
            file_put_contents($permissionPath, implode("\n", $lines));
        }
    }

    private function buildRoute(string $domain)
    {
        $path =  app_path("/Domain/$domain/Routes/$domain.routes.php");
        $routDirectory = app_path("/Domain/$domain/Routes");
        if (!is_dir($routDirectory)) {
            // Create the directory
            mkdir($routDirectory, 0755, true);
        }

        $stub = Str::of(File::get(__DIR__ . '/../Stubs/Routes.stub'))
            ->replace('{{ domain }}', strtolower($domain))
            ->replace('{{ domainCapitaliz }}', ucfirst($domain));


        if (!file_exists($path)) {
            file_put_contents($path, $stub);
        }
        // if (! File::isFile($path)) {

        //     return File::put($path, $stub);
        // }

        return "{$domain}.routes.php";
    }

    private function AddRoutes($modelName, $domain, $controllerName)
    {

        $RoutesPath = app_path("/Domain/$domain/Routes/$domain.routes.php");
        $search = '//__Routes_file';

        $line_number = false;

        if ($handle = fopen($RoutesPath, "r")) {
            $count = 0;
            while (($line = fgets($handle, 4096)) !== FALSE and !$line_number) {
                $count++;
                $line_number = (strpos($line, $search) !== FALSE) ? $count : $line_number;
            }
            fclose($handle);
        }

        $lines = file($RoutesPath, FILE_IGNORE_NEW_LINES);


        $newLine = ["Route::resource('" . Str::snake(Str::pluralStudly($modelName)) . "', {$controllerName}::class);"];
        $searchIfExist = array_search("Route::resource('" . Str::snake(Str::pluralStudly($modelName)) . "', {$controllerName}::class);", $lines, true);
        if ($searchIfExist == false) {
            array_splice($lines, $line_number + 1, 0, $newLine);
            file_put_contents($RoutesPath, implode("\n", $lines));
        }
    }


    private function buildBreadCrumb(string $domain)
    {
        $path =  app_path("/Domain/$domain/Breadcrumbs/$domain.bread-crumbs.php");
        $breadCrumbsDirectory = app_path("/Domain/$domain/Breadcrumbs");
        if (!is_dir($breadCrumbsDirectory)) {
            // Create the directory
            mkdir($breadCrumbsDirectory, 0755, true);
        }

        $stub = Str::of(File::get(__DIR__ . '/../Stubs/breadcrumb.stub'));


        if (!file_exists($path)) {
            file_put_contents($path, $stub);
        }

        return "{$domain}.bread-crumbs.php";
    }


    private function AddBreadCrumb($modelName, $domain, $controllerName )
    {

        $BreadCrumbsPath = app_path("/Domain/$domain/Breadcrumbs/$domain.bread-crumbs.php");
        $search = '//__Breadcrumb_file';

        $line_number = false;

        if ($handle = fopen($BreadCrumbsPath, "r")) {
            $count = 0;
            while (($line = fgets($handle, 4096)) !== FALSE and !$line_number) {
                $count++;
                $line_number = (strpos($line, $search) !== FALSE) ? $count : $line_number;
            }
            fclose($handle);
        }

        $lines = file($BreadCrumbsPath, FILE_IGNORE_NEW_LINES);


        $newLine = ["Route::resource('" . Str::snake(Str::pluralStudly($modelName)) . "', {$controllerName}::class);"];
        $newLine = [
            'Breadcrumbs::for("'.$this->viewPathName($domain, $modelName).'.index", function (BreadcrumbTrail $trail) { ',
            '    $trail->parent("dashboard");',
            '    $trail->push(__("'.$modelName.'") , route("'.$this->viewPathName($domain, $modelName).'.index") ); ',
            '});' , 
            
            'Breadcrumbs::for("'.$this->viewPathName($domain, $modelName).'.create", function (BreadcrumbTrail $trail) { ',
                '    $trail->parent("'.$this->viewPathName($domain, $modelName).'.index");',
                '    $trail->push(__("Create")." ".__("'.$modelName.'") , "'.$this->viewPathName($domain, $modelName).'.create"); ',
                '});' , 
            
                'Breadcrumbs::for("'.$this->viewPathName($domain, $modelName).'.edit", function (BreadcrumbTrail $trail) { ',
                    '    $trail->parent("'.$this->viewPathName($domain, $modelName).'.index");',
                    '    $trail->push(__("Update")." ".__("'.$modelName.'") , "'.$this->viewPathName($domain, $modelName).'.edit"); ',
                    '});'
        
    
        ];



        $searchIfExist = array_search('Breadcrumbs::for("'.$this->viewPathName($domain, $modelName).'.index", function (BreadcrumbTrail $trail) { ', $lines, true);
        if ($searchIfExist == false) {
            array_splice($lines, $line_number - 2, 0, $newLine);
            file_put_contents($BreadCrumbsPath, implode("\n", $lines));
        }
    }

    private function getView($domain, $model): ?string
    {
        $this->runCommand(
            ViewGeneratorCommand::class,
            [
                'domain' => $domain,
                'name' => $model,
                '--silence' => 1,
            ],
            $this->getOutput()
        );

        return ViewGeneratorCommand::lastCreated();
    }

    private function getModel(): ?string
    {
        return ModelGeneratorCommand::lastCreated();
    }

    private function getDatatable(): ?string
    {
        return DatatableGeneratorCommand::lastCreated();
    }

    private function getController(): ?string
    {
        $this->runCommand(
            ControllerGeneratorCommand::class,
            [
                '--silence' => 1,
                '--domain' => $this->option('domain'),
                '--model' => $this->option('model'),
            ],
            $this->getOutput()
        );

        return ControllerGeneratorCommand::lastCreated();
    }

    protected function viewPathName(string $domain, string $name)
    {
        return 'dashboard.'.Str::kebab($domain).'.'.Str::of($name)
                                                       ->replace('Model', '')
                                                       ->plural()
                                                       ->kebab();
    }


    private function createFormView($domain, $model)
    {
        $this->callSilent(
            ViewFormGeneratorCommand::class,
            ['domain' => $domain, 'name' => $model, '--silence' => 1]
        );
    }
}
