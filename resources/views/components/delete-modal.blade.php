@props([
    'id' => null,
    'title' => 'Are you sure?',
    'message' => 'Do you really want to delete these records?<br>This process cannot be undone.',
    'yes_button' => 'Yes, Delete',
    'no_button' => 'Cancel'
])

<x-modal :id="$id" :static="true" :close_button="false">
    <x-slot:body class="p-0">
        <div class="p-5 text-center">
            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
            <div class="text-3xl mt-5">{{ $title }}</div>
            @if (isset($message))
                <div class="text-slate-500 mt-2">{{ $message }}</div>
            @endif
        </div>
        <div class="px-5 pb-8 text-center">
            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">{{ $no_button }}</button>
            <button id="{{ $id }}_btn_delete" type="button" class="btn btn-danger w-24">{{ $yes_button }}</button>
        </div>
    </x-slot>
</x-modal>