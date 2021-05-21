@extends('layouts.admin')
@section('content')
@can('mcode_category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.mcode-categories.create') }}">
                {{ trans('mcode::global.add') }} {{ trans('mcode::cruds.mcodeCategory.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('mcode::cruds.mcodeCategory.title_singular') }} {{ trans('mcode::global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-McodeCategory">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('mcode::cruds.mcodeCategory.fields.id') }}
                    </th>
                    <th>
                        {{ trans('mcode::cruds.mcodeCategory.fields.published') }}
                    </th>
                    <th>
                        {{ trans('mcode::cruds.mcodeCategory.fields.name') }}
                    </th>
                    <th>
                        {{ trans('mcode::cruds.mcodeCategory.fields.order') }}
                    </th>
                    <th>
                        {{ trans('mcode::cruds.mcodeCategory.fields.image') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('mcode_category_delete')
  let deleteButtonTrans = '{{ trans('mcode::global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mcode-categories.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverridemcode::globals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.mcode-categories.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'published', name: 'published' },
{ data: 'name', name: 'name' },
{ data: 'order', name: 'order' },
{ data: 'image', name: 'image', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('mcode::global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-McodeCategory').DataTable(dtOverridemcode::globals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection