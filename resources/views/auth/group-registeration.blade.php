@extends('layouts.app')
@section('title', 'Register')

@section('content')


<div class="contact-section mt-0">
    <div class="container">
        <h3 class="text-center" style="color: #ca8309;">EF Contact Group Registeration</h3>
        <div class="login-box">
            <div class="col-md-12 align-self-center pad-0">
                <div class="form-section clearfix row">
                    @livewire('user.group-registeration')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection