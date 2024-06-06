<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;




Breadcrumbs::for("dashboard.core.roles.index", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard");
    $trail->push(__("roles") , route("dashboard.core.roles.index") ); 
});
Breadcrumbs::for("dashboard.core.roles.create", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.core.roles.index");
    $trail->push(__("Create").' '.__('roles') , "dashboard.core.roles.create"); 
});
Breadcrumbs::for("dashboard.core.roles.edit", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.core.roles.index");
    $trail->push(__("Update").' '.__('roles') , "dashboard.core.roles.edit"); 
});

Breadcrumbs::for("dashboard.core.countries.index", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard");
    $trail->push(__("countries") , route("dashboard.core.countries.index") ); 
});
Breadcrumbs::for("dashboard.core.countries.create", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.core.countries.index");
    $trail->push(__("Create")." ".__("countries") , "dashboard.core.countries.create"); 
});
Breadcrumbs::for("dashboard.core.countries.edit", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.core.countries.index");
    $trail->push(__("Update")." ".__("countries") , "dashboard.core.countries.edit"); 
});
//keep this lines for generator 
//__Breadcrumb_file