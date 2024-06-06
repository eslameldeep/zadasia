<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;
use Validator;

// use App\Http\Controllers\CorePermissions ;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];

        $data['googleAnalyticsSection'] = (Auth::user()->can('read_frontend')) ?
            $this->googleAnalyticsSection() : null;

        return view('home')->with($data);
    }

    public function googleAnalyticsSection(): View
    {

        $fetchVisitorsAndPageViews = Analytics::fetchVisitorsAndPageViews(Period::days(7), 10);

        

        $fetchTotalVisitorsAndPageViews = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));
        $fetchTotalVisitorsAndPageViews = $fetchTotalVisitorsAndPageViews->map(function ($data) {
            $data['date'] = $data['date']->toDateTimeString();
            return $data;
        });
        
        
        $fetchTopCountries = Analytics::fetchTopCountries(Period::days(7), 10);
        $fetchUserTypes = Analytics::fetchUserTypes(Period::days(7));


        
        $fetchUserTypes = [
            "new" =>  $fetchUserTypes[0]["activeUsers"],
            "returning" =>  $fetchUserTypes[1]["activeUsers"],
        ];
        // $analyticsData = Analytics::fetchVisitors();

        return view('dashboard.home.sections.google-analytics-section', compact('fetchVisitorsAndPageViews', 'fetchTotalVisitorsAndPageViews', 'fetchTopCountries', 'fetchUserTypes'));
    }
}
