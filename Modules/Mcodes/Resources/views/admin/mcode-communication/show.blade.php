@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.view') }}
                {{ trans('cruds.mcodeCommunication.title_singular') }}:
                {{ trans('cruds.mcodeCommunication.fields.id') }}
                {{ $mcodeCommunication->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            <table class="table table-view">
                <tbody class="bg-white">
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeCommunication.fields.id') }}
                        </th>
                        <td>
                            {{ $mcodeCommunication->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeCommunication.fields.name') }}
                        </th>
                        <td>
                            {{ $mcodeCommunication->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeCommunication.fields.param') }}
                        </th>
                        <td>
                            {{ $mcodeCommunication->param }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mcodeCommunication.fields.description') }}
                        </th>
                        <td>
                            {{ $mcodeCommunication->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <a href="{{ route('admin.mcode-communications.index') }}" class="btn btn-secondary">
                {{ trans('global.back') }}
            </a>
        </div>
    </div>
</div>
@endsection