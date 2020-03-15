<li class="{{ classNames('nav-item', ['active' => $isActive]) }}">
    <a href="{{ route($route) }}" class="nav-link">
        {{ $title ?? route($route) }}
    </a>
</li>
