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



                       @livewire('adminsortservices')

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
