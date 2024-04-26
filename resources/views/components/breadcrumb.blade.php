@props([
    'items' => []
])

@if (is_array($items) && count($items) > 0)
    @php
        $breadcrumbs = [];
        $totalItem = count($items);
        for ($i=0; $i < $totalItem; $i++) { 
            $isFirstItem = $i == 0;
            $isLastItem = $i+1 == $totalItem;

            $item = $items[$i];
            $isArray = is_array($item);

            $breadcrumbs[] = [
                'title' => !$isArray ? $item : $item['title'],
                'active' => !$isArray ? $isLastItem : $item['active'],
                'url' => !$isArray ? null : $item['url']
            ];
        }
    @endphp

    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $item)
                @if ($item['active'])
                    <li class="breadcrumb-item active" aria-current="page">
                        @if (!empty($item['url']))
                            <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                        @else
                            {{ $item['title'] }}
                        @endif
                    </li>
                @else
                    <li class="breadcrumb-item">
                        @if (!empty($item['url']))
                            <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                        @else
                            {{ $item['title'] }}
                        @endif
                    </li>
                @endif
            @endforeach            
        </ol>
    </nav>
@endif