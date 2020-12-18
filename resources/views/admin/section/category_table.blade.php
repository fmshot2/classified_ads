

  <div class="box" >
    <div class="box-header">
      <h3 class="box-title">Hover Export Data Table</h3>
      <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF &amp; Print</h6>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div id="example_wrapper" class="dataTables_wrapper"><div class="dt-buttons"><a class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example" href="#"><span>Copy</span></a><a class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="example" href="#"><span>CSV</span></a><a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="example" href="#"><span>Excel</span></a><a class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="example" href="#"><span>PDF</span></a><a class="dt-button buttons-print" tabindex="0" aria-controls="example" href="#"><span>Print</span></a></div><div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="example"></label></div><table id="example" class="table table-bordered table-hover display nowrap margin-top-10 dataTable" role="grid" aria-describedby="example_info">
        <thead>
          <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 296px;"> SL</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 458px;"> Name </th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 224px;"> Slug </th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 170px;"> Action </th></tr>
        </thead>
        <tbody>
          
          
          

          @foreach($category as $key => $categories)


          <tr role="row" class="odd">
            <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>


            <td> {{ $categories->name }} </td>
            <td> {{ $categories->slug }} </td>

<td class="text-center">

            <form method="post" class="delete_form" action="{{route('admin.category.delete',$categories->id)}}">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> </button>
            </form>

                        {{-- <a href="https://www.efcontact.com/admin/categories/16/edit" class="btn btn-warning "><i class="fa fa-pencil"></i></a> --}}
                        

                    </td>

          </tr>


          @endforeach

        </tbody>
        

      </table><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><a class="paginate_button previous disabled" aria-controls="example" data-dt-idx="0" tabindex="0" id="example_previous">Previous</a><span><a class="paginate_button current" aria-controls="example" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="example" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="example" data-dt-idx="3" tabindex="0">3</a><a class="paginate_button " aria-controls="example" data-dt-idx="4" tabindex="0">4</a><a class="paginate_button " aria-controls="example" data-dt-idx="5" tabindex="0">5</a><a class="paginate_button " aria-controls="example" data-dt-idx="6" tabindex="0">6</a></span><a class="paginate_button next" aria-controls="example" data-dt-idx="7" tabindex="0" id="example_next">Next</a></div></div>


    </div>
    <!-- /.box-body -->
  </div>


  <!-- /.content -->
</div>  



