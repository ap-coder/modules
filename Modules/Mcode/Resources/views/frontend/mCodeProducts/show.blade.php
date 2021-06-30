@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.mCodeProduct.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.m-code-products.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeProduct.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $mCodeProduct->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeProduct.fields.product') }}
                                    </th>
                                    <td>
                                        {{ $mCodeProduct->product->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeProduct.fields.pdf_cover') }}
                                    </th>
                                    <td>
                                        {{ $mCodeProduct->pdf_cover }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeProduct.fields.pdf_nicename') }}
                                    </th>
                                    <td>
                                        {{ $mCodeProduct->pdf_nicename }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeProduct.fields.product_image') }}
                                    </th>
                                    <td>
                                        {{ $mCodeProduct->product_image }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeProduct.fields.published') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $mCodeProduct->published ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeProduct.fields.model') }}
                                    </th>
                                    <td>
                                        {{ $mCodeProduct->model->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.m-code-products.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection