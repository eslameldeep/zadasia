<?php

namespace App\Domain\Echocloud\Http\Controllers;

use App\Domain\Core\Models\User;
use App\Domain\Station\Models\Device;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class EchoCloudDashboardController extends Controller
{
    public function Construct()
    {
        SEOMeta::setTitleDefault('Echocloud');
    }
    public function dashboard()
    {

        SEOMeta::setTitle(trans('Dashboard'));

        Config::set('echocloud.side-menu', true);
        $data = [];
        $user = auth()->user();
        
        $devices = Device::when($user->hasRole('Client'), function ($query) use ($user) {
            $accessibleDeviceId =  $user->devices()
                ->select('devices.id')
                ->groupBy('devices.id')
                ->pluck('devices.id');

            $query->whereIn('id', $accessibleDeviceId);
        })->paginate(10);


        $data['accessibleDevices'] = $devices;

        return view('echocloud.home')->with($data);
    }

    public function getCountriesAjax(Request $request)
    {

        if ($request->ajax()) {

            $term = trim($request->term);
            $posts = DB::table('countries')->selectRaw("iso as id , JSON_UNQUOTE(`name`-> '$." . app()->getLocale() . "') as text")
                ->where('name', 'LIKE', '%' . $term . '%')
                ->orderBy('name', 'asc')->simplePaginate(10);

            $morePages = true;
            $pagination_obj = json_encode($posts);

            if (empty($posts->nextPageUrl())) {
                $morePages = false;
            }
            $results = array(
                "results" => $posts->items(),
                "pagination" => array(
                    "more" => $morePages,
                ),
            );

            return \Response::json($results);
        } else {
            return abort(404);
        }
    }
}
