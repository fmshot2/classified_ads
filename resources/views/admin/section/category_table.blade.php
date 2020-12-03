


  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Category Table</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
        <tbody><tr>
          <th style="width: 10px">#</th>
          <th> Name</th>
          <th> Date </th>
          <th style="width: 40px"> Action </th>
        </tr>
        <tr>

           @foreach($category as $key => $categories)

          <td> {{ $key + 1 }} .</td>

          <td> {{ $categories->name }} </td>

          <td> {{ $categories->created_at->diffForHumans() }} </td>


          <td>
            <div class="progress progress-xs">
              <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
            </div>
          </td>

          
        </tr>

    @endforeach


      </tbody></table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <ul class="pagination pagination-sm pull-right">
        <li><a href="#">Previous</a></li>
        <li><a href="#" class="current">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">Next</a></li>
      </ul>
    </div>
  </div>
  <!-- /.box -->

