@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.view') }}
                {{ trans('cruds.mcodeCategory.title_singular') }}:
                {{ trans('cruds.mcodeCategory.fields.id') }}
                {{ $mcodeCategory->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            <table class="table table-view">
                <tbody class="bg-white">
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $mcodeCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeCategory.fields.published') }}
                        </th>
                        <td>
                            <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $mcodeCategory->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeCategory.fields.name') }}
                        </th>
                        <td>
                            {{ $mcodeCategory->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeCategory.fields.description') }}
                        </th>
                        <td>
                            {{ $mcodeCategory->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeCategory.fields.slug') }}
                        </th>
                        <td>
                            {{ $mcodeCategory->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeCategory.fields.order') }}
                        </th>
                        <td>
                            {{ $mcodeCategory->order }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <a href="{{ route('admin.mcode-categories.index') }}" class="btn btn-secondary">
                {{ trans('global.back') }}
            </a>
        </div>
    </div>
</div>
@endsection