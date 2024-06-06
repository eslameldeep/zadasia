<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MigrationsDomainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $migrationsPath = database_path('migrations');
        $directories    = [];

        $scanForDominNames = scandir(app_path('Domain'));
        $filteredDominNames = array_diff($scanForDominNames, array('..', '.'));
        foreach ($filteredDominNames as $key => $domain_name) {
            $scanForDirNames =  scandir(app_path('Domain/' . $domain_name));
            $filteredDirNames =  array_diff($scanForDirNames, array('..', '.'));
        
            if (!is_dir(app_path('Domain/' . $domain_name . '/database'))) {
                continue;
            }
        
            $scanRoutesFiles = scandir(app_path('Domain/' . $domain_name . '/database'));
            $filterdRoutesFiles =  array_diff($scanRoutesFiles, array('..', '.'));
            
            foreach ($filterdRoutesFiles as $key => $file) {
                try {
                   $directories[] = app_path('Domain/' . $domain_name . '/database/migrations');
                } catch (\Throwable $th) {
                    //throw $th;
                }
            }
        }

        $paths          = array_merge([$migrationsPath], $directories);

        $this->loadMigrationsFrom($paths);

    }
}
