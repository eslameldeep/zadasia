<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;



// fields section
Breadcrumbs::for("dashboard.frontend.fields.index", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard");
    $trail->push(__("fields") , route("dashboard.frontend.fields.index") ); 
});
Breadcrumbs::for("dashboard.frontend.fields.create", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.fields.index");
    $trail->push(__("Create")." ".__("fields") , "dashboard.frontend.fields.create"); 
});
Breadcrumbs::for("dashboard.frontend.fields.edit", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.fields.index");
    $trail->push(__("Update")." ".__("fields") , "dashboard.frontend.fields.edit"); 
});


Breadcrumbs::for("dashboard.frontend.fields.fields_frameworks.index", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.fields.index");
    $trail->push(__("fields frameworks") , route("dashboard.frontend.fields.fields_frameworks.index" , request('field')) ); 
});
Breadcrumbs::for("dashboard.frontend.fields.fields_frameworks.create", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.fields.fields_frameworks.index" , [request('field')  ]);
    $trail->push(__("Create")." ".__("fields frameworks") , "dashboard.frontend.fields.fields_frameworks.create" , [request('field')]); 
});
Breadcrumbs::for("dashboard.frontend.fields.fields_frameworks.edit", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.fields.fields_frameworks.index" , request('field'));
    $trail->push(__("Update")." ".__("fields frameworks") , "dashboard.frontend.fields.fields_frameworks.edit" ); 
});
Breadcrumbs::for("dashboard.frontend.fields.fields_objectives.index", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.fields.index");
    $trail->push(__("fields objectives") , route("dashboard.frontend.fields.fields_objectives.index" , [request('field')  ]) ); 
});
Breadcrumbs::for("dashboard.frontend.fields.fields_objectives.create", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.fields.fields_objectives.index");
    $trail->push(__("Create")." ".__("fields objectives") , "dashboard.frontend.fields.fields_objectives.create"); 
});
Breadcrumbs::for("dashboard.frontend.fields.fields_objectives.edit", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.fields.fields_objectives.index");
    $trail->push(__("Update")." ".__("fields objectives") , "dashboard.frontend.fields.fields_objectives.edit"); 
});

// end fields section


// product section
Breadcrumbs::for("dashboard.frontend.products.index", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard");
    $trail->push(__("products") , route("dashboard.frontend.products.index") ); 
});
Breadcrumbs::for("dashboard.frontend.products.create", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.products.index");
    $trail->push(__("Create")." ".__("products") , "dashboard.frontend.products.create"); 
});
Breadcrumbs::for("dashboard.frontend.products.edit", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.products.index");
    $trail->push(__("Update")." ".__("products") , "dashboard.frontend.products.edit"); 
});


Breadcrumbs::for("dashboard.frontend.products.products_sensors.index", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.products.index");
    $trail->push(__("products sensors") , route("dashboard.frontend.products.products_sensors.index" , [request('product')]) ); 
});
Breadcrumbs::for("dashboard.frontend.products.products_sensors.create", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.products.products_sensors.index");
    $trail->push(__("Create")." ".__("products sensors") , "dashboard.frontend.products.products_sensors.create"); 
});
Breadcrumbs::for("dashboard.frontend.products.products_sensors.edit", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.products.products_sensors.index");
    $trail->push(__("Update")." ".__("products sensors") , "dashboard.frontend.products.products_sensors.edit"); 
});



Breadcrumbs::for("dashboard.frontend.products.products_features.index", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.products.index");
    $trail->push(__("products features") , route("dashboard.frontend.products.products_features.index" , [request('product')]) ); 
});
Breadcrumbs::for("dashboard.frontend.products.products_features.create", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.products.products_features.index");
    $trail->push(__("Create")." ".__("products features") , "dashboard.frontend.products.products_features.create"); 
});
Breadcrumbs::for("dashboard.frontend.products.products_features.edit", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.products.products_features.index");
    $trail->push(__("Update")." ".__("products features") , "dashboard.frontend.products.products_features.edit"); 
});

// end product section


// partner section


Breadcrumbs::for("dashboard.frontend.partners.index", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard");
    $trail->push(__("partners") , route("dashboard.frontend.partners.index") ); 
});
Breadcrumbs::for("dashboard.frontend.partners.create", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.partners.index");
    $trail->push(__("Create")." ".__("partners") , "dashboard.frontend.partners.create"); 
});
Breadcrumbs::for("dashboard.frontend.partners.edit", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.partners.index");
    $trail->push(__("Update")." ".__("partners") , "dashboard.frontend.partners.edit"); 
});

// end partner section


// challenge section

Breadcrumbs::for("dashboard.frontend.challenges.index", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard");
    $trail->push(__("challenges") , route("dashboard.frontend.challenges.index") ); 
});
Breadcrumbs::for("dashboard.frontend.challenges.create", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.challenges.index");
    $trail->push(__("Create")." ".__("challenges") , "dashboard.frontend.challenges.create"); 
});
Breadcrumbs::for("dashboard.frontend.challenges.edit", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.challenges.index");
    $trail->push(__("Update")." ".__("challenges") , "dashboard.frontend.challenges.edit"); 
});

// end challenge section


// software section

Breadcrumbs::for("dashboard.frontend.softwares.index", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard");
    $trail->push(__("software") , route("dashboard.frontend.softwares.index") ); 
});
Breadcrumbs::for("dashboard.frontend.softwares.create", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.softwares.index");
    $trail->push(__("Create")." ".__("software") , "dashboard.frontend.softwares.create"); 
});
Breadcrumbs::for("dashboard.frontend.softwares.edit", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.softwares.index");
    $trail->push(__("Update")." ".__("software") , "dashboard.frontend.software.edit"); 
});

// end software section


// article section

Breadcrumbs::for("dashboard.frontend.articles.index", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard");
    $trail->push(__("articles") , route("dashboard.frontend.articles.index") ); 
});
Breadcrumbs::for("dashboard.frontend.articles.create", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.articles.index");
    $trail->push(__("Create")." ".__("articles") , "dashboard.frontend.articles.create"); 
});
Breadcrumbs::for("dashboard.frontend.articles.edit", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.articles.index");
    $trail->push(__("Update")." ".__("articles") , "dashboard.frontend.articles.edit"); 
});

// end article section


// event section

Breadcrumbs::for("dashboard.frontend.events.index", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard");
    $trail->push(__("events") , route("dashboard.frontend.events.index") ); 
});
Breadcrumbs::for("dashboard.frontend.events.create", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.events.index");
    $trail->push(__("Create")." ".__("events") , "dashboard.frontend.events.create"); 
});
Breadcrumbs::for("dashboard.frontend.events.edit", function (BreadcrumbTrail $trail) { 
    $trail->parent("dashboard.frontend.events.index");
    $trail->push(__("Update")." ".__("events") , "dashboard.frontend.events.edit"); 
});

// end event section

//keep this lines for generator 
//__Breadcrumb_file