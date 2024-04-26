<ul>
    @foreach ($sub_menu as $menu)
        <li>
            <a href="{{ !empty($menu['url']) ? url($menu['url']) : 'javascript:;' }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="{{ !empty($menu['icon']) ? $menu['icon'] : 'activity' }}"></i></div>
                <div class="side-menu__title">
                    {{ $menu['title'] }}
                    @if (!empty($menu['sub_menu']))
                        <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                    @endif
                </div>
            </a>
            @if (!empty($menu['sub_menu']))
                @include('layouts.components.sidebar.side-sub-menu', ['sub_menu' => $menu['sub_menu']])
            @endif
        </li>
    @endforeach
</ul>