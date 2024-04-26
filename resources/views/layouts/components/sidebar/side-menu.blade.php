<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4 mt-3">
        <img alt="Midone - HTML Admin Template" class="w-6" src="{{ Vite::asset('resources/Midone-UI/images/logo.svg') }}">
        <span class="hidden xl:block text-white text-lg ml-3"> {{ config('app.name') }} </span> 
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        @foreach ($allMenu as $menu)
            @if (!$menu['is_divider'])
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
                        <ul class="">
                            @include('layouts.components.sidebar.side-sub-menu', ['sub_menu' => $menu['sub_menu']])
                        </ul>
                    @endif
                </li>
            @else
                <li class="side-nav__devider my-6"></li>
            @endif
        @endforeach
    </ul>
</nav>