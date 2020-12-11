
@extends('layouts.app')

@section('title')
 Buyer Dashboard | 
@endsection

@section('content')

<div class="my-profile content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="clearfix">
                    <!-- Avatar start -->
                    <div class="edit-profile-photo">
                        <img src="{{asset('img/avatar/avatar-11.jpg')}}" alt="profile-photo" class="img-fluid">
                        <div class="change-photo-btn">
                            <div class="photoUpload">
                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                <input type="file" class="upload">
                            </div>
                        </div>
                    </div>
                    <!-- Avatar end -->
                    <!-- My account box start -->
                    <div class="my-account-box">
                        <ul>
                            <li>
                                <a href="my-profile.html" class="active">
                                    <i class="flaticon-people"></i>My Profile
                                </a>
                            </li>
                            <li>
                                <a href="favorited-properties.html">
                                    <i class="flaticon-favorite"></i>Favorited Properties
                                </a>
                            </li>
                            <li>
                                <a href="my-properties.html">
                                    <i class="flaticon-internet"></i>My Properties
                                </a>
                            </li>
                            <li>
                                <a href="submit-property.html">
                                    <i class="flaticon-cross"></i>Submit New Property
                                </a>
                            </li>
                            <li>
                                <a href="change-password.html">
                                    <i class="flaticon-lock"></i>Change Password
                                </a>
                            </li>
                            <li>
                                <a href="index.html">
                                    <i class="flaticon-exit"></i>Log Out
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- My account box end -->
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <!-- My address start-->
                <div class="my-address">
                    <h3 class="heading-2">My Account</h3>

                    <form action="https://storage.googleapis.com/theme-vessel/housy/index.html" method="GET">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" class="form-control input-text" name="your name" placeholder="John deo">
                        </div>
                        <div class="form-group">
                            <label>Your Title</label>
                            <input type="text" class=" form-control input-text" name="agent" placeholder="Your title">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control input-text" name="phone" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control input-text" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Personal Info</label>
                            <textarea class="form-control input-text" name="message" placeholder="Personal info"></textarea>
                        </div>
                        <a href="#" class="btn btn-md button-theme">Save Changes</a>
                    </form>
                </div>
                <!-- My address end -->
            </div>
        </div>
    </div>
</div>

@endsection