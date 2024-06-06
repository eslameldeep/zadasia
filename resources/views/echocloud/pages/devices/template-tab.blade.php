<div class="col-12 mt-4">
    <div class="card mb-4">
        <div class="card-header pb-0 p-3 ">
            <h5 class="mb-1 gradient-text">{{ $template->name }}</h5>
            <p class="text-sm">{{ $template?->description }}</p>
        </div>
        <div class="card-body p-3">
            {!! $content !!}
        </div>
    </div>
</div>
