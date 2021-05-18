@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.edit') }}
                {{ trans('cruds.mcodeCategory.title_singular') }}:
                {{ trans('cruds.mcodeCategory.fields.id') }}
                {{ $mcodeCategory->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        @livewire('mcode-category.edit', [$mcodeCategory])
    </div>
</div>
@endsection