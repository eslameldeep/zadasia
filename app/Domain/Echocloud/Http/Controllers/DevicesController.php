<?php

namespace App\Domain\Echocloud\Http\Controllers;

use App\Domain\Echocloud\Datatables\DeviceDatatable;
use App\Domain\Station\Models\Device;
use App\Domain\Station\Models\Template;
use App\Http\Controllers\Controller;
use App\Support\Dashboard\Crud\WithDatatable;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class DevicesController extends Controller
{

    use WithDatatable;
    protected string $datatable = DeviceDatatable::class;
    protected string $name      = 'Event';
    protected string $path      = 'echocloud.pages.devices';
    protected string $routes    = 'echocloud.devices';
    protected array $routeList   = [];

    
    public function index()
    {
        SEOMeta::setTitle(trans('Devices'));
        return $this->datatablePage($this->getDatatable());
    }


    public function show($id)
    {
        $device = Device::findOrFail($id);
        $Sensors  = $device->Sensors;
        $templates = $device->attached_templates_users()->wherePivot('user_id', auth()->user()->id)->get()->sortBy('sort');

        SEOMeta::setTitle(trans('Devices') . ' - ' . $device->device_name);

        $templateViews = $templates->map(function ($template) use ($device, $Sensors) {
            return [
                'template' => $template,
                'view' => $this->createTemplateView($template, $device, $Sensors)
            ];
        });

        $data = [
            'device' => $device,
            'templates' => $templateViews,
        ];

        return view('echocloud.pages.devices.show')->with($data);
    }

    private function createTemplateView($template, $device, $Sensors)
    {

        $content = Blade::render($template->content, ['device' => $device, 'template' => $template, 'sensors' => $Sensors]);
        return view('echocloud.pages.devices.template-tab')->with([
            'content' => $content,
            'device' => $device,
            'template' => $template,
        ]);
    }

    public function lastData(Device $device, $hours)
    {
        // Get the current time in UTC and format it
        $to = Carbon::now()->utc()->toIso8601String();
        // Subtract the desired number of hours, get the time in UTC, and format it
        $from = Carbon::now()->utc()->subHours($hours)->toIso8601String();

        
        // Fetch the data from the bucket within the specified time range
        $data = $device->getDataFromBucket($from, $to);

        // Return the response as JSON
        return response()->json(['status' => true, 'data' => $data], 200);
    }
}
