@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.mCodeFeature.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.m-code-features.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $mCodeFeature->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $mCodeFeature->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.code') }}
                                    </th>
                                    <td>
                                        {{ $mCodeFeature->code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.category') }}
                                    </th>
                                    <td>
                                        {{ $mCodeFeature->category }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.template') }}
                                    </th>
                                    <td>
                                        {{ $mCodeFeature->template }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.feature_name') }}
                                    </th>
                                    <td>
                                        {{ $mCodeFeature->feature_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.feature_code') }}
                                    </th>
                                    <td>
                                        {{ $mCodeFeature->feature_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $mCodeFeature->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.published') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $mCodeFeature->published ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.mcode_categories') }}
                                    </th>
                                    <td>
                                        @foreach($mCodeFeature->mcode_categories as $key => $mcode_categories)
                                            <span class="label label-info">{{ $mcode_categories->published }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.order') }}
                                    </th>
                                    <td>
                                        {{ $mCodeFeature->order }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.feature_image') }}
                                    </th>
                                    <td>
                                        @if($mCodeFeature->feature_image)
                                            <a href="{{ $mCodeFeature->feature_image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $mCodeFeature->feature_image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.featured_image') }}
                                    </th>
                                    <td>
                                        @if($mCodeFeature->featured_image)
                                            <a href="{{ $mCodeFeature->featured_image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $mCodeFeature->featured_image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.m-code-features.index') }}">
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