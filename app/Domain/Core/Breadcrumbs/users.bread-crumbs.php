<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard.core.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(__('Users') , route('dashboard.core.users.index'));
});

Breadcrumbs::for('dashboard.core.users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.core.users.index');
    $trail->push(__('Create user'));
});

Breadcrumbs::for('dashboard.core.users.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.core.users.index');
    $trail->push(__('Update user'));
});