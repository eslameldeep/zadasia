<?php

use App\Domain\Station\Models\Device;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;




Breadcrumbs::for("echocloud.home", function (BreadcrumbTrail $trail) { 
    $trail->push(__("Dashboard") , route("echocloud.home") ); 
});

Breadcrumbs::for("echocloud.profile", function (BreadcrumbTrail $trail) { 
    $trail->parent("echocloud.home");
    $trail->push(__("Profile") , route("echocloud.profile") ); 
});


Breadcrumbs::for("echocloud.devices.index", function (BreadcrumbTrail $trail) { 
    $trail->parent("echocloud.home");
    $trail->push(__("Devices") , route("echocloud.devices.index") ); 
});

Breadcrumbs::for("echocloud.devices.show", function (BreadcrumbTrail $trail) { 
    $trail->parent("echocloud.devices.index");
    $device = Device::findOrFail(request('device'));
    $trail->push($device->device_name , route("echocloud.devices.show" , request('device')) ); 
});

//keep this lines for generator 
//__Breadcrumb_file