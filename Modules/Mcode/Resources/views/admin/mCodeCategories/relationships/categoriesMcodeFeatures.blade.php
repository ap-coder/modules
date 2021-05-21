<div class="m-3">
    @can('mcode_feature_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.mcode-features.create') }}">
                    {{ trans('mcode::global.add') }} {{ trans('mcode::cruds.mcodeFeature.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('mcode::cruds.mcodeFeature.title_singular') }} {{ trans('mcode::global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-categoriesMcodeFeatures">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('mcode::cruds.mcodeFeature.fields.id') }}
                            </th>
                            <th>
                                {{ trans('mcode::cruds.mcodeFeature.fields.published') }}
                            </th>
                            <th>
                                {{ trans('mcode::cruds.mcodeFeature.fields.mcode') }}
                            </th>
                            <th>
                                {{ trans('mcode::cruds.mcodeFeature.fields.name') }}
                            </th>
                            <th>
                                {{ trans('mcode::cruds.mcodeFeature.fields.product_models') }}
                            </th>
                            <th>
                                {{ trans('mcode::cruds.mcodeFeature.fields.categories') }}
                            </th>
                            <th>
                                {{ trans('mcode::cruds.mcodeFeature.fields.defaults') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mcodeFeatures as $key => $mcodeFeature)
                            <tr data-entry-id="{{ $mcodeFeature->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $mcodeFeature->id ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $mcodeFeature->published ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $mcodeFeature->published ? 'checked' : '' }}>
                                </td>
                                <td>
                                    {{ $mcodeFeature->mcode ?? '' }}
                                </td>
                                <td>
                                    {{ $mcodeFeature->name ?? '' }}
                                </td>
                                <td>
                                    @foreach($mcodeFeature->product_models as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($mcodeFeature->categories as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $mcodeFeature->defaults ?? '' }}
                                </td>
                                <td>
                                    @can('mcode_feature_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.mcode-features.show', $mcodeFeature->id) }}">
                                            {{ trans('mcode::global.view') }}
                                        </a>
                                    @endcan

                                    @can('mcode_feature_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.mcode-features.edit', $mcodeFeature->id) }}">
                                            {{ trans('mcode::global.edit') }}
                                        </a>
                                    @endcan

                                    @can('mcode_feature_delete')
                                        <form action="{{ route('admin.mcode-features.destroy', $mcodeFeature->id) }}" method="POST" onsubmit="return confirm('{{ trans('mcode::global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('mcode::global.delete') }}">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('mcode_feature_delete')
  let deleteButtonTrans = '{{ trans('mcode::global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mcode-features.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('mcode::global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('mcode::global.areYouSure') }}')) {
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
  let table = $('.datatable-categoriesMcodeFeatures:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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