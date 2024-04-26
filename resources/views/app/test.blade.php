@extends('layouts.main')

@section('breadcrumb')
    <x-breadcrumb :items="['Home', 'Application', 'Cihuy']"/>
@endsection

@section('content')

<x-button data-tw-toggle="modal" data-tw-target="#modal-test">Show modal</x-button>
<x-delete-modal id="modal-test" title="Success" message="hahaha"/>

@endsection