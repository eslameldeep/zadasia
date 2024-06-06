@hasanyrole('Admin|Super Admin')
<div class="sidenav-footer mx-3 ">
    {{-- <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
        <div class="full-background"
            style="background-image: url('{{ asset('echocloud-assets/img/curved-images/white-curved.jpg') }}')"></div>
        <div class="card-body text-start p-3 w-100">
            <div
                class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
            </div>
            <div class="docs-info">
                <h6 class="text-white up mb-0">Need help?</h6>
                <p class="text-xs font-weight-bold">Please check our docs</p>
                <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard" target="_blank"
                    class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
            </div>
        </div>
    </div> --}}
    <a class="btn bg-gradient-primary mt-3 w-100"
        href="{{route('dashboard.home')}}">{{__('Control panel')}}</a>
</div>
@endhasanyrole
