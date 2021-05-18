@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('cruds.mcodeFeature.title_singular') }}
                {{ trans('global.list') }}
            </h6>

            @can('mcode_feature_create')
                <a class="btn btn-indigo" href="{{ route('admin.mcode-features.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.mcodeFeature.title_singular') }}
                </a>
            @endcan
        </div>
    </div>
    @livewire('mcode-feature.index')

</div>
@endsection