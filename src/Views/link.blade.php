<li class="nav-item {{ ($isActive ? 'active' : '') }}">
    <a href="{{ route($route) }}" class="nav-link">
        {{ $title ?? route($route) }}
    </a>
</li>
