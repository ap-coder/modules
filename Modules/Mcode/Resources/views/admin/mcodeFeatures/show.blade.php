@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('mcode::global.show') }} {{ trans('mcode::cruds.mcodeFeature.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mcode-features.index') }}">
                    {{ trans('mcode::global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcodeFeature.fields.id') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcodeFeature.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $mcodeFeature->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcodeFeature.fields.mcode') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->mcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcodeFeature.fields.name') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcodeFeature.fields.description') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcodeFeature.fields.source_string') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->source_string }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcodeFeature.fields.safe_source') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->safe_source }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcodeFeature.fields.client_name') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->client_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcodeFeature.fields.client_description') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->client_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcodeFeature.fields.state') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcodeFeature.fields.template') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->template }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcodeFeature.fields.product_models') }}
                        </th>
                        <td>
                            @foreach($mcodeFeature->product_models as $key => $product_models)
                                <span class="label label-info">{{ $product_models->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcodeFeature.fields.categories') }}
                        </th>
                        <td>
                            @foreach($mcodeFeature->categories as $key => $categories)
                                <span class="label label-info">{{ $categories->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcodeFeature.fields.defaults') }}
                        </th>
                        <td>
                            {{ $mcodeFeature->defaults }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mcode-features.index') }}">
                    {{ trans('mcode::global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection