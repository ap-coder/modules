@extends('layouts.admin')
@section('content')
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
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-McodeFeature">
            <thead>
                <tr>
                    <th width="10"> </th>
                    <th> {{ trans('mcode::cruds.mcodeFeature.fields.id') }} </th> 
                    <th> {{ trans('mcode::cruds.mcodeFeature.fields.published') }} </th> 
                    <th> {{ trans('mcode::cruds.mcodeFeature.fields.mcode') }} </th> 
                    <th> {{ trans('mcode::cruds.mcodeFeature.fields.name') }} </th> 
                    {{-- <th> {{ trans('mcode::cruds.mcodeFeature.fields.defaults') }} </th> --}} 
                    <th> {{ trans('mcode::cruds.mcodeFeature.fields.categories') }} </th> 
                    <th> {{ trans('mcode::cruds.mcodeFeature.fields.models') }} </th> 
                    {{-- <th> {{ trans('mcode::cruds.mcode.fields.order') }} </th>  --}}
                    <th> &nbsp; </th> 
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
@can('mcode_feature_delete')
  let deleteButtonTrans = '{{ trans('mcode::global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mcode-features.massDestroy') }}",
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
    ajax: "{{ route('admin.mcode-features.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'id', name: 'id' },
        { data: 'published', name: 'published' },
        { data: 'mcode', name: 'mcode' },
        { data: 'name', name: 'name' },
        // { data: 'defaults', name: 'defaults' },
        { data: 'categories', name: 'categories.name' },
        { data: 'models', name: 'models.model' },
        // { data: 'order', name: 'order' },
        { data: 'actions', name: '{{ trans('mcode::global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };

  let table = $('.datatable-McodeFeature').DataTable(dtOverrideGlobals);

  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

});

</script>
@endsection
