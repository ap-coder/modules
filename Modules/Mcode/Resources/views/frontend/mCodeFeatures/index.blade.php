@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('m_code_feature_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.m-code-features.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.mCodeFeature.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.mCodeFeature.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-MCodeFeature">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.template') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.feature_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.feature_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.published') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.mcode_categories') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mCodeFeature.fields.order') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mCodeFeatures as $key => $mCodeFeature)
                                    <tr data-entry-id="{{ $mCodeFeature->id }}">
                                        <td>
                                            {{ $mCodeFeature->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mCodeFeature->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mCodeFeature->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mCodeFeature->category ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mCodeFeature->template ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mCodeFeature->feature_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mCodeFeature->feature_code ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $mCodeFeature->published ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $mCodeFeature->published ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @foreach($mCodeFeature->mcode_categories as $key => $item)
                                                <span>{{ $item->published }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $mCodeFeature->order ?? '' }}
                                        </td>
                                        <td>
                                            @can('m_code_feature_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.m-code-features.show', $mCodeFeature->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('m_code_feature_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.m-code-features.edit', $mCodeFeature->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('m_code_feature_delete')
                                                <form action="{{ route('frontend.m-code-features.destroy', $mCodeFeature->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('m_code_feature_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.m-code-features.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-MCodeFeature:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('div#sidebar').on('transitionend', function(e) {
    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
  })
  
})

</script>
@endsection