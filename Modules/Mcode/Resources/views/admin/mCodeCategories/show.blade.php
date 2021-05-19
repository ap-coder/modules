@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mCodeCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.m-code-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mCodeCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $mCodeCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mCodeCategory.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $mCodeCategory->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mCodeCategory.fields.name') }}
                        </th>
                        <td>
                            {{ $mCodeCategory->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mCodeCategory.fields.description') }}
                        </th>
                        <td>
                            {{ $mCodeCategory->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mCodeCategory.fields.slug') }}
                        </th>
                        <td>
                            {{ $mCodeCategory->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mCodeCategory.fields.order') }}
                        </th>
                        <td>
                            {{ $mCodeCategory->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mCodeCategory.fields.image') }}
                        </th>
                        <td>
                            @if($mCodeCategory->image)
                                <a href="{{ $mCodeCategory->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $mCodeCategory->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.m-code-categories.index') }}">
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
            @includeIf('admin.mCodeCategories.relationships.categoriesMcodeFeatures', ['mcodeFeatures' => $mCodeCategory->categoriesMcodeFeatures])
        </div>
    </div>
</div>

@endsection