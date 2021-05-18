@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.view') }}
                {{ trans('cruds.mcodeFeature.title_singular') }}:
                {{ trans('cruds.mcodeFeature.fields.id') }}
                {{ $mcodeFeature->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            <table class="table table-view">
                <tbody class="bg-white">
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeFeature.fields.id') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeFeature.fields.published') }}
                        </th>
                        <td>
                            <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $mcodeFeature->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeFeature.fields.state') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeFeature.fields.name') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeFeature.fields.content_name') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->content_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeFeature.fields.description') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeFeature.fields.content_description') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->content_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeFeature.fields.catagories') }}
                        </th>
                        <td>
                            @foreach($mcodeFeature->catagories as $key => $entry)
                                <span class="badge badge-relationship">{{ $entry->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeFeature.fields.communication_modes') }}
                        </th>
                        <td>
                            @foreach($mcodeFeature->communication_modes as $key => $entry)
                                <span class="badge badge-relationship">{{ $entry->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeFeature.fields.template') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->template }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeFeature.fields.mcode') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->mcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeFeature.fields.source_string') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->source_string }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeFeature.fields.safe_source') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->safe_source }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <a href="{{ route('admin.mcode-features.index') }}" class="btn btn-secondary">
                {{ trans('global.back') }}
            </a>
        </div>
    </div>
</div>
@endsection