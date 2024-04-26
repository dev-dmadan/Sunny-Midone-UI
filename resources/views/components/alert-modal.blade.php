@props([
    'id' => null,
    'size' => null,
    'static' => false,
    'type' => 'success',
    'title' => '',
    'message'
])

<x-modal :id="$id" :static="$static" :size="$size" :close_button="false">
    <x-slot:body class="p-0">
        <div class="p-5 text-center">
            @if ($type == 'warning')
                <i data-lucide="x-circle" class="w-16 h-16 text-warning mx-auto mt-3"></i>
            @elseif ($type == 'danger')
                <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
            @else
                <i data-lucide="check-circle" class="w-16 h-16 text-success mx-auto mt-3"></i>           
            @endif

            <div class="text-3xl mt-5">{{ $title }}</div>
            @if (isset($message))
                <div class="text-slate-500 mt-2">{{ $message }}</div>
            @endif
        </div>
        <div class="px-5 pb-8 text-center">
            <button type="button" data-tw-dismiss="modal" class="btn w-24 btn-primary">Ok</button>
        </div>
    </x-slot>
</x-modal>