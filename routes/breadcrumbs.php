<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push(__('Dashboard'), route('dashboard.home'));
});

// dd(scandir(app_path('Domain/Core')));
$scanForDominNames = scandir(app_path('Domain'));
$filteredDominNames = array_diff($scanForDominNames, array('..', '.'));
foreach ($filteredDominNames as $key => $domain_name) {
    $scanForDirNames =  scandir(app_path('Domain/' . $domain_name));
    $filteredDirNames =  array_diff($scanForDirNames, array('..', '.'));

    if (!is_dir(app_path('Domain/' . $domain_name . '/Breadcrumbs'))) {
        continue;
    }

    $scanBreadcrumbFiles = scandir(app_path('Domain/' . $domain_name . '/Breadcrumbs'));
    $filterdBreadcrumbFiles =  array_diff($scanBreadcrumbFiles, array('..', '.'));
    
    foreach ($filterdBreadcrumbFiles as $key => $file) {
        //    include Breadcrumbs 
        try {
            include(app_path('Domain/' . $domain_name . '/Breadcrumbs/' . $file));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

// include(app_path().'/Domain/Core/Breadcrumbs/profile.bread-crumbs.php');
// include(app_path().'/Domain/Core/Breadcrumbs/users.bread-crumbs.php');
