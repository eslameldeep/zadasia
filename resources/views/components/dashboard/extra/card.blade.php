@props([
    'name' => $name ?? "Name " , 
    'class' => $class ?? "" , 
    'value' => $value ?? "value " , 
    'icon' => $icon ?? "" , 
])
<div class="small-box {{$class}}">
    <div class="inner">
        <h3>{{$value}}</h3>
        <p>{{$name}}</p>
    </div>
    <div class="icon">
        <i class="{{ $icon }}"></i>
    </div>
    @isset($slot)
        {{$slot}}
        @else

    @endisset
    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}

</div>
