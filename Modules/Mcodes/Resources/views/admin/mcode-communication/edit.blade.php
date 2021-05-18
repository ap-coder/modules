@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.edit') }}
                {{ trans('cruds.mcodeCommunication.title_singular') }}:
                {{ trans('cruds.mcodeCommunication.fields.id') }}
                {{ $mcodeCommunication->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        @livewire('mcode-communication.edit', [$mcodeCommunication])
    </div>
</div>
@endsection