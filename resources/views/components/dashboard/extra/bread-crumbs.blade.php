<div class="container-fluid ">
    <div class="row mb-2">
        <div class="col-sm-6">
            
            <div class="head-title">
                <h1>{{ __($name ?? 'Form') }}
                <span></span>
                </h1>
                
              </div>
              
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right text-decoration-none">
                {{ Breadcrumbs::render(Route::currentRouteName()) ?? "Make BreadCrumbs for ".Route::currentRouteName() }}
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->

<style>
.head-title{

}

.head-title h1 {
  text-transform: capitalize;
}
.head-title h1:before {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 60px;
  height: 2px;
  content: "";
  background-color: #c50000;
}

.head-title h1 span {
  font-size: 13px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 4px;
  line-height: 3em;
  padding-left: 0.25em;
  color: rgba(0, 0, 0, 0.4);
  padding-bottom: 10px;
}
.alt-head-title h1 {
  text-align:center;
}
.alt-head-title h1:before {
  left:50%; margin-left:-30px;
}
</style>