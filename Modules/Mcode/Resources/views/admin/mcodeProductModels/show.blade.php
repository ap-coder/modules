@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mcodeProductModel.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('mcode:admin.mcode-product-models.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeProductModel.fields.id') }}
                        </th>
                        <td>
                            {{ $mcodeProductModel->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeProductModel.fields.model') }}
                        </th>
                        <td>
                            {{ $mcodeProductModel->model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeProductModel.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $mcodeProductModel->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeProductModel.fields.slug') }}
                        </th>
                        <td>
                            {{ $mcodeProductModel->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('mcode:admin.mcode-product-models.index') }}">
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
            <a class="nav-link" href="#models_mcode_features" role="tab" data-toggle="tab">
                {{ trans('cruds.mcodeFeature.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#models_mcodes" role="tab" data-toggle="tab">
                {{ trans('cruds.mcode.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="models_mcode_features">
            @includeIf('admin.mcodeProductModels.relationships.modelsMcodeFeatures', ['mcodeFeatures' => $mcodeProductModel->modelsMcodeFeatures])
        </div>
        <div class="tab-pane" role="tabpanel" id="models_mcodes">
            @includeIf('admin.mcodeProductModels.relationships.modelsMcodes', ['mcodes' => $mcodeProductModel->modelsMcodes])
        </div>
    </div>
</div>

@endsection
