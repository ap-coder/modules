@extends('layouts.admin')
@section('content')
@can('mcode_product_model_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.mcode-product-models.create') }}">
                {{ trans('mcode::global.add') }} {{ trans('mcode::cruds.mcodeProductModel.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('mcode::cruds.mcodeProductModel.title_singular') }} {{ trans('mcode::global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-McodeProductModel">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('mcode::cruds.mcodeProductModel.fields.id') }}
                    </th>
                    <th>
                        {{ trans('mcode::cruds.mcodeProductModel.fields.model') }}
                    </th>
                    <th>
                        {{ trans('mcode::cruds.mcodeProductModel.fields.published') }}
                    </th>
                    <th>
                        {{ trans('mcode::cruds.mcodeProductModel.fields.slug') }}
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
@can('mcode_product_model_delete')
  let deleteButtonTrans = '{{ trans('mcode::global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mcode-product-models.massDestroy') }}",
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.mcode-product-models.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'model', name: 'model' },
{ data: 'published', name: 'published' },
{ data: 'slug', name: 'slug' },
{ data: 'actions', name: '{{ trans('mcode::global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-McodeProductModel').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

});

</script>
@endsection
