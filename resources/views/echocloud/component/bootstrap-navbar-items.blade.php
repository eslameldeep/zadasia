@foreach ($items as $item)

    @if ($item->url() != null)
        <li @lm_attrs($item) @if ($item->hasChildren()) class="nav-item dropdown" @endif @lm_endattrs>
            @if ($item->link)
                <a @lm_attrs($item->link) @if ($item->hasChildren())
                    class="nav-link dropdown-toggle" role="button" @data_toggle_attribute="dropdown" aria-haspopup="true"
                    aria-expanded="false"
                @else
                    class="nav-link"
            @endif @lm_endattrs href="{!! $item->url() !!}">
            {!! $item->title !!}

            @if ($item->hasChildren())
                <b class="caret"></b>
            @endif
            </a>
        @else
            <span class="navbar-text">
                {!! $item->title !!}

            </span>
    @endif
    @if ($item->hasChildren())
        <ul class="dropdown-menu">
            @include(config('laravel-menu.views.bootstrap-items'), ['items' => $item->children()])
        </ul>
    @endif
    </li>
@else
    <li @lm_attrs($item) @if ($item->hasChildren()) class="nav-item dropdown" @endif @lm_endattrs>
        <h6 class="ps-4 ms-2 mx-3 text-uppercase text-s font-weight-bolder opacity-6">{!! $item->title !!}</h6>
    </li>
@endif
@if ($item->divider)
    <li{!! Lavary\Menu\Builder::attributes($item->divider) !!}>
        </li>
@endif
@endforeach
