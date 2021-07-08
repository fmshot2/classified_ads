@extends('layouts.admin')

@section('title', 'All Services Table | ')

@section('content')

<style>
    .showApprovingBtn{
        display: block;
    }
    .hideApprovingBtn{
        display: none !important;
    }
</style>

<div class="content-wrapper" style="min-height: 518px;">

    <div class="container">
        @include('layouts.backend_partials.status')
    </div>

    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box" >
                    <div class="box-header">
                        <h3 class="box-title"> All Services </h3>
                        <h6 class="box-subtitle"> Sorting is from the most recent. </h6>
                    </div>



                    <div>
   
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
           <table class="display table table-bordered data_table_main">
               <thead>
                   <tr>
                       <th> SL </th>
                       <th> Image </th>
                       <th> Title </th>
                       <th> Phone </th>
                       <th> State </th>
                       <th> User name </th>
                       <th> Sub End Date </th>
                       <th> Status </th>
                       <th> Featured </th>
                       <th> Date </th>
                       <th> Actions </th>
                   </tr>
               </thead>
<tbody>
                                   @if(isset($mySortedServices))
                                   @foreach($mySortedServices as $key => $all_services)
                                   <tr id="curServiceDelete{{ $all_services->id }}">
                                       <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                       <td>
                                           <a href="#">
                                               <img src="{{asset('uploads/services')}}/{{$all_services->service_image}}" alt="{{ $all_services->name }}" width="60" class="img-responsive img-rounded">
                                           </a>
                                       </td>
                                       <td> {{ Str::limit($all_services->name, 25) }} </td>
                                       <td> {{ $all_services->phone }} </td>
                                       <td> {{ $all_services->state }} </td>
                                       <td> {{ $all_services->user->name }} </td>

                                       <td> {{ Carbon\Carbon::parse($all_services->user->subscriptions
                                       ->first()->subscription_end_date)->format('d/m/y') }} </td>


                                       <td>
                                           <a data-toggle="modal" data-target="#disapprovalReason{{ $all_services->id }}" id="disapproveBtn{{ $all_services->id }}" class="btn btn-warning {{ $all_services->status == 1 ? 'showApprovingBtn' : 'hideApprovingBtn' }}"> Deactive</a>

                                           <a onclick="approveService({{ $all_services->id }})" id="approveBtn{{ $all_services->id }}" class="btn btn-primary {{ $all_services->status == 0 ? 'showApprovingBtn' : 'hideApprovingBtn' }}"> Activate </a>


                                           {{-- @if($all_services->status == 1)
                                               <a href="{{ route('admin.service.status', $all_services->id) }} " class="btn btn-warning"> Deactive</a>
                                               @else
                                               <a href="{{ route('admin.service.status', $all_services->id) }} " class="btn btn-primary"> Activate </a>
                                               @endif --}}
                                           </td>

                                           <td> {{ $all_services->featured == 1 ? 'Yes' : 'No' }} </td>
                                           <td> {{ $all_services->created_at->format('d/m/Y') }} </td>


                                           <td class="center">
                                               <a href="{{ route('admin.view', $all_services->slug) }} " class="btn btn-warning " target="_blank"><i class="fa fa-eye"></i></a>
                                               <button onclick="deleteService({{ $all_services->id }})" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                           </td>
                                       </tr>

                                       <div class="modal fade" id="disapprovalReason{{ $all_services->id }}" tabindex="-1" role="dialog" aria-labelledby="disapprovalReason" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header">
                                                       <h3 class="modal-title" id="exampleModalLabel" style="display: inline-block">Reason?</h3>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <textarea name="reason" id="reason{{ $all_services->id }}" class="form-control" cols="30" rows="5" placeholder="Tell the provider why this service is been disapproved" required></textarea>
                                                   </div>
                                                   <div class="modal-footer">
                                                       <button onclick="disapproveService({{ $all_services->id }})" type="button" class="btn btn-danger">Disapprove</button>
                                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                       @endforeach
                                       @endif
                                   </tbody>

           </table>
       </div>

        <div>
        <!-- <div class="form-stretch">
           
           <div class="row">
               <div class="col-md-3">
                   <h3 class="box-title"> Sort By Date </h3>
               </div>
               <form class="form-horizontal form-element" 
               action="{{ route('admin.sort_ef_marketers_sales') }}" method="POST">
               @csrf
                   <div class="col-md-4">
                       <div class="form-group">
                           <label for="">From</label>
                           <input type="date" name="start_date" class="form-control">
                           @error('start_date')
                           <span class="error">
                               <strong class="text-danger">{{ $message }}</strong>
                           </span>
                           @enderror
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="form-group">
                           <label for="">To</label>
                           <input type="date" name="end_date" class="form-control">
                           @error('end_date')
                           <span class="error">
                               <strong class="text-danger">{{ $message }}</strong>
                           </span>
                           @enderror
                       </div>
                   </div>
                   <div class="col-md-1">
                       <div class="">
                           <button type="submit" class="btn btn-warning"> Submit </button>
                       </div>
                   </div>
               </form>
           </div>
       </div> -->
   </div>
   </div>


</div>




                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">

                            </div>
                        </div>



                        <!-- /.box-body -->
                    </div>


                <!-- /.content -->
            </div>
        </div>
    </div>
</section>

@endsection

@livewireScripts

<script>
    function deleteService(id) {
        event.preventDefault();
        var curServiceListDelete = document.getElementById('curServiceDelete'+id)
        swal({
            title: "Are you sure you want to delete this service?",
            text: "Please be sure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, dont bother!",
            cancelButtonColor: '#4CAF50',
            confirmButtonColor: '#dc3545',
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                $.ajax({
                    url: '/admin/dashboard/service/destroy/' + id,
                    method: 'get',
                    success: function(result){
                        swal("Done!", "Service Deleted!", "success");
                        curServiceListDelete.remove()
                    }
                });
            }
            else {
                e.dismiss;
            }
        })
    }

    function disapproveService(id) {
        var approveBtn = document.getElementById('approveBtn'+id)
        var disapproveBtn = document.getElementById('disapproveBtn'+id)
        var reason = document.getElementById('reason'+id).value

        if (reason == '') {
            toastr.info("Please enter a reason!");
            $("#disapprovalReason"+id).modal("show");
        }else{
            $.ajax({
                url: '/admin/dashboard/service/status/' + id,
                method: 'get',
                data: {reason:reason},
                success: function(result){
                    if (result == 'Disapproved') {
                        $("#disapproveBtn"+id).removeClass('showApprovingBtn')
                        $("#disapproveBtn"+id).addClass('hideApprovingBtn')
                        $("#approveBtn"+id).removeClass('hideApprovingBtn')
                        $("#approveBtn"+id).addClass('showApprovingBtn')
                    } else if (result == 'Approved') {
                        $("#disapproveBtn"+id).removeClass('hideApprovingBtn')
                        $("#disapproveBtn"+id).addClass('showApprovingBtn')
                        $("#approveBtn"+id).removeClass('showApprovingBtn')
                        $("#approveBtn"+id).addClass('hideApprovingBtn')
                    }
                    toastr.error("Service Disapproved!");
                    $(".modal").modal("hide");
                }
            });
        }
    }

    function approveService(id) {
        var approveBtn = document.getElementById('approveBtn'+id)
        var disapproveBtn = document.getElementById('disapproveBtn'+id)

        $.ajax({
            url: '/admin/dashboard/service/status/' + id,
            method: 'get',
            success: function(result){
                if (result == 'Approved') {
                    $("#disapproveBtn"+id).removeClass('hideApprovingBtn')
                    $("#disapproveBtn"+id).addClass('showApprovingBtn')
                    $("#approveBtn"+id).removeClass('showApprovingBtn')
                    $("#approveBtn"+id).addClass('hideApprovingBtn')
                } else if (result == 'Disapproved') {
                    $("#disapproveBtn"+id).removeClass('showApprovingBtn')
                    $("#disapproveBtn"+id).addClass('hideApprovingBtn')
                    $("#approveBtn"+id).removeClass('hideApprovingBtn')
                    $("#approveBtn"+id).addClass('showApprovingBtn')
                }
                toastr.success("Service Approved!");
            }
        });
    }
</script>
