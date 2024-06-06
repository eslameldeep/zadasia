
<div class="col-lg-8 col-md-6 mb-md-0 mb-4">
      <div class="card">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-lg-6 col-7">
              <h6>{{__('Devices')}}</h6>
              <p class="text-sm mb-0">
                <i class="fas fa-microchip text-info" aria-hidden="true"></i>
                <span class="font-weight-bold ms-1">{{__(':count Accessible Devices ' , ['count' => $accessibleDevices->total()] )}}</span> 
              </p>
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
              <div class="dropdown float-lg-end pe-4">
                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-ellipsis-v text-secondary" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                  <li><a class="dropdown-item border-radius-md" href="{{ route('echocloud.devices.index') }}">{{__('View all')}}</a></li>
               </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('Device Name')}}</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{__('Moderators')}}</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('Type')}}</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('Status')}}</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('View')}}</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($accessibleDevices as $device)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        {{-- <img src="echocloud-assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd"> --}}
                      <i class=" avatar text-primary avatar-sm me-3 fa-solid fa-database"></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$device->device_name}}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="avatar-group mt-2">
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Ryan Tompson" data-bs-original-title="Ryan Tompson">
                        <img src="echocloud-assets/img/team-1.jpg" alt="team1">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Romina Hadid" data-bs-original-title="Romina Hadid">
                        <img src="echocloud-assets/img/team-2.jpg" alt="team2">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Alexander Smith" data-bs-original-title="Alexander Smith">
                        <img src="echocloud-assets/img/team-3.jpg" alt="team3">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Jessica Doe" data-bs-original-title="Jessica Doe">
                        <img src="echocloud-assets/img/team-4.jpg" alt="team4">
                      </a>
                    </div>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-xs font-weight-bold"> {{$device?->Bucket?->type}} </span>
                  </td>
                  <td class="align-middle text-center">
                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="{{$device?->VmqAuthAcl?->ClientStatus == true ? trans('connected') : trans('disconnected') }}" data-bs-original-title="{{$device?->VmqAuthAcl?->ClientStatus == true ? trans('connected') : trans('disconnected') }}">
                      <i class="fas fa-circle {{$device?->VmqAuthAcl?->ClientStatus == true ? "text-success" : "text-danger" }} "></i>
                    </a>
                  </td>
                  <td class="align-middle text-center">
                    
                    <a href="{{route('echocloud.devices.show' , $device)}}" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip">
                      <i class="fa-solid fa-arrow-up-right-from-square text-primary"></i>
                    </a>
                  </td>
                </tr>  
                @empty
                
                  
                @endforelse
                
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>