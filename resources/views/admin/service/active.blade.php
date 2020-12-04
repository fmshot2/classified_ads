@extends('layouts.admin')

@section('title')
Service | 
@endsection

@section('content')


<div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Invoice</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Country</th>
                </tr>
                <tr>
				  <td><a href="javascript:void(0)">Order #123456</a></td>
				  <td>Lorem Ipsum</td>
				  <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
				  <td>$158.00</td>
				  <td><span class="label label-danger">Pending</span></td>
				  <td>CH</td>
				</tr>
                <tr>
				  <td><a href="javascript:void(0)">Order #458789</a></td>
				  <td>Lorem Ipsum</td>
				  <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
				  <td>$55.00</td>
				  <td><span class="label label-warning">Shipped</span></td>
				  <td>US</td>
				</tr>
                <tr>
				  <td><a href="javascript:void(0)">Order #84532</a></td>
				  <td>Lorem Ipsum</td>
				  <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
				  <td>$845.00</td>
				  <td><span class="label label-danger">Prossing</span></td>
				  <td>IG</td>
				</tr>
                <tr>
				  <td><a href="javascript:void(0)">Order #48956</a></td>
				  <td>Lorem Ipsum</td>
				  <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
				  <td>$145.00</td>
				  <td><span class="label label-success">Paid</span></td>
				  <td>EN</td>
				</tr>
                <tr>
				  <td><a href="javascript:void(0)">Order #92154</a></td>
				  <td>Lorem Ipsum</td>
				  <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
				  <td>$450.00</td>
				  <td><span class="label label-warning">Shipped</span></td>
				  <td>UK</td>
				</tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>



@endsection