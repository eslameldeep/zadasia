<?php

namespace App\Domain\Core\Listeners;

use JeroenNoten\LaravelAdminLte\Events\BuildingMenu as EventsBuildingMenu;

class BuildSideMenu
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EventsBuildingMenu $event): void
    {


        $event->menu->add(['header' => __('Dashboard')]);
        $event->menu->add([
            'text' => __('Dashboard'),
            'route' => 'dashboard.home',
            'icon' => 'fas fa-fw fa-home',
        ]);
        $event->menu->add(['header' => __('Settings'), 'can' => ['read_settings']]);
        $event->menu->add([
            'text' => __('Settings'),
            'icon' => 'fas fa-fw fa-cog',
            'can' => ['read_settings'],
            'submenu' => [
                [
                    'text' => __('countries'),
                    'route' => 'dashboard.core.countries.index',
                    'icon' => 'fas fa-fw fa-map',
                    'can' => ['read_settings'],
                ]
            ],
        ]);
        $event->menu->add(['header' => __('account_settings'), 'can' => 'read_profile']);
        $event->menu->add([
            'text' => __('profile'),
            'route' => 'dashboard.core.profile.edit',
            'icon' => 'fa-solid fa-user-gear',
            'can' => 'read_profile',
        ]);

        $event->menu->add(['header' => __('Administration'), 'can' => ['read_users', 'read_roles']]);
        $event->menu->add([
            'text' => __('Users'),
            'route' => 'dashboard.core.users.index',
            'icon' => 'fa-solid fa-users',
            'can' => ['read_users'],
        ]);
        $event->menu->add([
            'text' => __('Roles and permissions'),
            'route' => 'dashboard.core.roles.index',
            'icon' => 'fa-solid fa-shield-halved',
            'can' => ['read_roles'],
        ]);




        $event->menu->add(['header' => __('Website'), 'can' => ['read_frontend']]);
        $event->menu->add([
            'text' => __('Website'),
            'icon' => 'fas fa-fw fa-globe',
            'can' => ['read_frontend'],
            'submenu' => [
                [
                    'text' => __('Fields'),
                    'route' => 'dashboard.frontend.fields.index',
                    'icon' => 'fas fa-fw fa-globe',
                    'can' => ['read_frontend'],
                ],
                [
                    'text' => __('Products'),
                    'route' => 'dashboard.frontend.products.index',
                    'icon' => 'fas fa-fw fa-globe',
                    'can' => ['read_frontend'],
                ],
                [
                    'text' => __('Softwares'),
                    'route' => 'dashboard.frontend.softwares.index',
                    'icon' => 'fas fa-fw fa-globe',
                    'can' => ['read_frontend'],
                ],
                [
                    'text' => __('Challenges'),
                    'route' => 'dashboard.frontend.challenges.index',
                    'icon' => 'fas fa-fw fa-globe',
                    'can' => ['read_frontend'],
                ],
                [
                    'text' => __('Partners'),
                    'route' => 'dashboard.frontend.partners.index',
                    'icon' => 'fas fa-fw fa-globe',
                    'can' => ['read_frontend'],
                ],
                [
                    'text' => __('Articles'),
                    'route' => 'dashboard.frontend.articles.index',
                    'icon' => 'fas fa-fw fa-globe',
                    'can' => ['read_frontend'],
                ],
                [
                    'text' => __('Events'),
                    'route' => 'dashboard.frontend.events.index',
                    'icon' => 'fas fa-fw fa-globe',
                    'can' => ['read_frontend'],
                ],

                [
                    'text' => __('Categories'),
                    'route' => 'dashboard.frontend.categories.index',
                    'icon' => 'fas fa-fw fa-globe',
                    'can' => ['read_categories'],
                ],
                [
                    'text' => __('Reviews'),
                    'route' => 'dashboard.frontend.reviews.index',
                    'icon' => 'fas fa-fw fa-globe',
                    'can' => ['read_reviews'],
                ],
            ],
        ]);

    }
}
