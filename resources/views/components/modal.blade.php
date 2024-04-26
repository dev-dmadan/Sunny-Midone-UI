@props([
    'id' => null,
    'size' => null,
    'static' => false,
    'header',
    'body',
    'footer',
    'close_button' => true
])

@php
    $config = [
        'size' => [
            'sm' => 'modal-sm',
            'lg' => 'modal-lg',
            'xl' => 'modal-xl'
        ]
    ];
    $_size = array_key_exists($size, $config['size']) ? "modal-dialog ".$config['size'][$size] : "modal-dialog";
@endphp

<div {{ !empty($id) ? "id={$id}" : "" }} class="modal" {{ $static ? 'data-tw-backdrop=static' : "" }} tabindex="-1" aria-hidden="true">
    <div class="{{ $_size }}">
        <div class="modal-content">
            @if ($close_button)
                <a data-tw-dismiss="modal" href="javascript:;"><i data-lucide="x" class="w-8 h-8 text-slate-400"></i></a>
            @endif

            @if (isset($header))
                <div {{ $header->attributes->class(['modal-header']) }}>{{ $header }}</div>
            @endif

            <div {{ $body->attributes->class(['modal-body']) }}>{{ $body }}</div>

            @if (isset($footer))
                <div {{ $footer->attributes->class(['modal-footer']) }}>{{ $footer }}</div>
            @endif
        </div>
    </div>
</div>