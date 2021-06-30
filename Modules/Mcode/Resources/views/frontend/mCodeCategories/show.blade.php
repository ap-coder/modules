@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.mCodeCategory.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.m-code-categories.index') }}">
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
                                        {!! $mCodeCategory->description !!}
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
                                        {{ trans('cruds.mCodeCategory.fields.compatible_products') }}
                                    </th>
                                    <td>
                                        @foreach($mCodeCategory->compatible_products as $key => $compatible_products)
                                            <span class="label label-info">{{ $compatible_products->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.m-code-categories.index') }}">
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