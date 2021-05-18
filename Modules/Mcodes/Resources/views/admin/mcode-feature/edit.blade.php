@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.edit') }}
                {{ trans('cruds.mcodeFeature.title_singular') }}:
                {{ trans('cruds.mcodeFeature.fields.id') }}
                {{ $mcodeFeature->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        @livewire('mcode-feature.edit', [$mcodeFeature])
    </div>
</div>
@endsection