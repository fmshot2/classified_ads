
@extends('layouts.admin')

@section('title')
Pending Service | 
@endsection

@section('content')

<br>
<hr>

    <section class="content">


@include('admin/section/pending_service_table') 

</section>

@endsection