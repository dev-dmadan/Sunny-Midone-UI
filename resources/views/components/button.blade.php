@props([
    'id' => null,
    'name' => null,
    'type' => 'button',

    // basic, basic-soft, basic-elevated, rounded, rounded-elevated, outline
    'styling' => 'basic',

    // primary, secondary, success, warning, pending, danger, dark
    'color' => 'primary',

    // sm, lg
    'size' => null
])

@php
    $config = [
        'styling' => [
            'basic-elevated' => [
                'primary' => 'btn-elevated-primary',
                'secondary' => 'btn-elevated-secondary',
                'success' => 'btn-elevated-success',
                'warning' => 'btn-elevated-warning',
                'pending' => 'btn-elevated-pending',
                'danger' => 'btn-elevated-danger',
                'dark' => 'btn-elevated-dark'
            ],
            'basic-soft' => [
                'primary' => 'btn-primary-soft',
                'secondary' => 'btn-secondary-soft',
                'success' => 'btn-success-soft',
                'warning' => 'btn-warning-soft',
                'pending' => 'btn-pending-soft',
                'danger' => 'btn-danger-soft',
                'dark' => 'btn-dark-soft'
            ],
            'basic' => [
                'primary' => 'btn-primary',
                'secondary' => 'btn-secondary',
                'success' => 'btn-success',
                'warning' => 'btn-warning',
                'pending' => 'btn-pending',
                'danger' => 'btn-danger',
                'dark' => 'btn-dark'
            ],
            'rounded-elevated' => [
                'primary' => 'btn-elevated-rounded-primary',
                'secondary' => 'btn-elevated-rounded-secondary',
                'success' => 'btn-elevated-rounded-success',
                'warning' => 'btn-elevated-rounded-warning',
                'pending' => 'btn-elevated-rounded-pending',
                'danger' => 'btn-elevated-rounded-danger',
                'dark' => 'btn-elevated-rounded-dark'
            ],
            'rounded' => [
                'primary' => 'btn-rounded-primary',
                'secondary' => 'btn-rounded-secondary',
                'success' => 'btn-rounded-success',
                'warning' => 'btn-rounded-warning',
                'pending' => 'btn-rounded-pending',
                'danger' => 'btn-rounded-danger',
                'dark' => 'btn-rounded-dark'
            ],
            'rounded-soft' => [
                'primary' => 'btn-rounded btn-primary-soft',
                'secondary' => 'btn-rounded btn-secondary-soft',
                'success' => 'btn-rounded btn-success-soft',
                'warning' => 'btn-rounded btn-warning-soft',
                'pending' => 'btn-rounded btn-pending-soft',
                'danger' => 'btn-rounded btn-danger-soft',
                'dark' => 'btn-rounded btn-dark-soft'
            ],
            'outline' => [
                'primary' => 'btn-outline-primary inline-block',
                'secondary' => 'btn-outline-secondary inline-block',
                'success' => 'btn-outline-success inline-block',
                'warning' => 'btn-outline-warning inline-block',
                'pending' => 'btn-outline-pending inline-block',
                'danger' => 'btn-outline-danger inline-block',
                'dark' => 'btn-outline-dark inline-block'
            ]
        ],
        'size' => [
            'sm' => 'btn-sm',
            'lg' => 'btn-lg'
        ],
        'color' => [
            'primary',
            'secondary',
            'success',
            'warning',
            'pending',
            'danger',
            'dark'
        ]
    ];

    $isStylingExists = !empty($styling) && array_key_exists($styling, $config['styling']);
    $isColorExists = !empty($color) && in_array($color, $config['color']);
    $isSizeExists = !empty($size) && in_array($size, $config['size']);

    $_color = $isColorExists ? $color : 'primary';
    $_styling = $isStylingExists ? $config['styling'][$styling][$_color] : $config['styling']['basic'][$_color];
    $_size = $isSizeExists ? $config['size'][$size] : "";

    $btnClassList = ["btn"];
    if(!empty($_styling)) {
        $btnClassList[] = $_styling;
    }
    
    if(!empty($_size)) {
        $btnClassList[] = $_size;
    }

    $btnClass = implode(" ", $btnClassList);
@endphp

<button 
    type="{{ $type }}"
    {{ !empty($id) ? "id={$id}" : "" }}
    {{ !empty($name) ? "name={$name}" : "" }} 
    {{ $attributes->merge(['class' => $btnClass]) }}>
    {{ $slot }}
</button>