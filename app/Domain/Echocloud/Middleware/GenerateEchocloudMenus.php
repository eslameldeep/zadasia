<?php

namespace App\Domain\Echocloud\Middleware ;

use Closure;

class GenerateEchocloudMenus
{
    
    public function handle($request, Closure $next)
    {
        
        \Menu::make('echocloudAsideMenu', function ($menu) {
            $menu->add(trans('Dashboard') , ['class' => 'nav-item' , 'route' => 'echocloud.home'])
            ->prepend(view('echocloud.component.aside-icon' , ['icon' => 'icofont-home'])) ;
            
            $menu->add(trans('Menu') , ["class" => "nav-item mt-3"] ) ;
            
            $menu->add(trans('Profile') , ['class' => 'nav-item' , 'route' => 'echocloud.profile'])
            ->prepend(view('echocloud.component.aside-icon' , ['icon' => 'icofont-user'])) ;
           
            $menu->add(trans('Devices') , ['class' => 'nav-item' , 'route' => 'echocloud.devices.index'])
            ->prepend(view('echocloud.component.aside-icon' , ['icon' => 'icofont-micro-chip'])) ;
            
            $menu->add(trans('Alerts') , ['class' => 'nav-item' , 'route' => 'echocloud.profile'])
            ->prepend(view('echocloud.component.aside-icon' , ['icon' => 'icofont-bell-alt'])) ;
            
            
            

            
        });
    
        return $next($request);
    }
    
}
