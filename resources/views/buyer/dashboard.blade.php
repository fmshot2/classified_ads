
@extends('layouts.app')

@section('title')
 Buyer Dashboard | 
@endsection

@section('content')

<div class="favorited-properties content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <!-- Avatar start -->
                <div class="edit-profile-photo">
                    <img src="{{asset('img/avatar/avatar-11.jpg')}}" alt="profile-photo" class="img-fluid">
                    <div class="change-photo-btn text-center">
                    	                	<div><i class="fa fa-user fa-3x"></i></div>

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
                            <a href="{{route('buyer.profile')}}">
                                <i class="flaticon-people"></i>My Profile
                            </a>
                        </li>
                        <li>
                            <a href="favorited-properties.html" class="active">
                                <i class="flaticon-favorite"></i>Favorited Services
                            </a>
                        </li>
                        <li>
                            <a href="{{route('buyer.messages')}}">
                                <i class="flaticon-internet"></i>My Messages
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
            <div class="col-lg-8 col-md-12 col-sm-12">
                <!-- Heading -->
                <h3 class="heading-2">Favorited Properties</h3>
                <div class="my-properties">
                    <table class="table brd-none">
                        <thead>
                        <tr>
                            <th>Seller</th>
                            <th>Message</th>
                            <th class="hedin-div">Date</th>
                            <th><span class="hedin-div">Status</span></th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        	                            @if(isset($buyerMessages))

                        	            @foreach($buyerMessages as $buyerMessage)

                        <tr>
                            <td class="image">
                                <a href="properties-details.html"><i class="fa fa-user fa-3x"></i>
<!--<img alt="properties-small" src="img/properties/small-properties-1.jpg" class="img-fluid">-->
</a>
                            </td>
                            <td>
                                <div class="inner">
              
                                    <div class="price-month">{{Str::limit($buyerMessage->description, 15)
}}</div>
                                </div>
                            </td>
                            <td class="hedin-div">7.02.2018</td>
                            <td> <span class="hedin-div">{{Str::limit($buyerMessage->description, 5)
}}</span></td>
                            <td class="actions">
                                <a href="#" class="edit"><i class="fa fa-pencil"></i>Edit</a>
                                <a href="#"><i class="delete fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                                   @endforeach

                                   @elseif(!isset($buyerMessages))


<tr>
                            
                            <td>
                                <div class="inner">
                                    <h5><a href="properties-details.html"></a>No Records Found Yet</h5>
                                   
                                </div>
                            </td>
                           
                        </tr>
@endif

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection