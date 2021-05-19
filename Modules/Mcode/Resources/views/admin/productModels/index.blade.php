@extends('layouts.admin')
@section('content')
@can('product_model_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.product-models.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.productModel.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.productModel.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ProductModel">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.productModel.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.productModel.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.productModel.fields.published') }}
                        </th>
                        <th>
                            {{ trans('cruds.productModel.fields.slug') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productModels as $key => $productModel)
                        <tr data-entry-id="{{ $productModel->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $productModel->id ?? '' }}
                            </td>
                            <td>
                                {{ $productModel->name ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $productModel->published ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $productModel->published ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $productModel->slug ?? '' }}
                            </td>
                            <td>
                                @can('product_model_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.product-models.show', $productModel->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('product_model_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.product-models.edit', $productModel->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('product_model_delete')
                                    <form action="{{ route('admin.product-models.destroy', $productModel->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('product_model_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.product-models.massDestroy') }}",
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
  let table = $('.datatable-ProductModel:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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