@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mcodeCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mcode-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
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
                            <input type="checkbox" disabled="disabled" {{ $mcodeCategory->published ? 'checked' : '' }}>
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
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeCategory.fields.image') }}
                        </th>
                        <td>
                            @if($mcodeCategory->image)
                                <a href="{{ $mcodeCategory->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $mcodeCategory->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mcode-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#categories_mcode_features" role="tab" data-toggle="tab">
                {{ trans('cruds.mcodeFeature.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="categories_mcode_features">
            @includeIf('admin.mcodeCategories.relationships.categoriesMcodeFeatures', ['mcodeFeatures' => $mcodeCategory->categoriesMcodeFeatures])
        </div>
    </div>
</div>

@endsection