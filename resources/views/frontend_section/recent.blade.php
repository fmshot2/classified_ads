    @foreach($recentServices as $recentService)
<row>
<div class="property-box-5 no repeat">
                        <div class="property-photo  col-sm-3 col-pad mr-5">
                            <img class="img-fluid" src="img/properties/properties-3.jpg" alt="properties" style="height:180px; ">
                            <div class="date-box">For Rent</div>
                        </div>
                        <div class="detail">
                            <div class="heading">
                                <h3>
                                    <a href="properties-details.html" tabindex="-1">{{$recentService->user->name}}</a>
                                </h3>
                                <div class="location">
                                    <a href="properties-details.html" tabindex="-1">
                                        <i class="fa fa-map-marker"></i>{{$recentService->address}}
                                    </a>
                                </div>
                            </div>
                            <div class="properties-listing">
                                <span>3 Beds</span>
                                <span>2 Baths</span>
                                <span>980 sqft</span>
                            </div>
                        </div>
                </div>
         </row>
         @endforeach