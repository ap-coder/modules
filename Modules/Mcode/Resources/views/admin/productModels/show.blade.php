@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productModel.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-models.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productModel.fields.id') }}
                        </th>
                        <td>
                            {{ $productModel->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productModel.fields.name') }}
                        </th>
                        <td>
                            {{ $productModel->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productModel.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $productModel->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productModel.fields.slug') }}
                        </th>
                        <td>
                            {{ $productModel->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-models.index') }}">
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
            <a class="nav-link" href="#product_models_mcode_features" role="tab" data-toggle="tab">
                {{ trans('cruds.mcodeFeature.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="product_models_mcode_features">
            @includeIf('admin.productModels.relationships.productModelsMcodeFeatures', ['mcodeFeatures' => $productModel->productModelsMcodeFeatures])
        </div>
    </div>
</div>

@endsection