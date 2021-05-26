@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('mcode::global.show') }} {{ trans('mcode::cruds.mcode.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mcodes.index') }}">
                    {{ trans('mcode::global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcode.fields.id') }}
                        </th>
                        <td>
                            {{ $mcode->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcode.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $mcode->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcode.fields.name') }}
                        </th>
                        <td>
                            {{ $mcode->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcode.fields.photo') }}
                        </th>
                        <td>
                            @if($mcode->photo)
                                <a href="{{ $mcode->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $mcode->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcode.fields.models') }}
                        </th>
                        <td>
                            @foreach($mcode->models as $key => $models)
                                <span class="label label-info">{{ $models->model }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcode.fields.slug') }}
                        </th>
                        <td>
                            {{ $mcode->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('mcode::cruds.mcode.fields.desc') }}
                        </th>
                        <td>
                            {!! $mcode->desc !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.mcodes.index') }}">
                    {{ trans('mcode::global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
