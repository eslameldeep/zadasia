@props([
    'title' => 'Create',
    'class' => 'btn btn-success mb-5' , 
    'icon' => 'fas fa-plus' , 
    'route',

])

<a href="{{$route}}">
    <button type="button" class="{{$class}}">
        <i class="{{$icon}}"></i>  {{ __($title)}} </button>
    
</a>
    
