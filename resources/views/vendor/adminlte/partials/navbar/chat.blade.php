@if (Auth::user()->can('read_chat') && Route::has('dashboard.chat.index'))
    <!-- Language Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('dashboard.chat.index') }}">
            <span class="fas fa-comment-alt"></span>
        </a>

    </li>
@endif
