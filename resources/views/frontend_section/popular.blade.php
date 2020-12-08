<div class="categories content-area-8 bg-grea-3">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Verified Businesses</h1>
        </div>
        @if(isset($approvedServices))

        <div class="row wow animated" style="visibility: visible;">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                        @foreach($approvedServices as $approvedService)

                    <div class="col-sm-3 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-2-bg" style="background-image: url({{asset('images')}}/{{$approvedService->image}})">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">{{$approvedService->user->name}},  {{$approvedService->name}}</a>
                                        </h3>
                                        <a href="properties-list-rightside.html d-flex" class="category-subtitle" style="float: left;"><i class="fa fa-map-marker"></i> {{$approvedService->state}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
@endif
               
                 <!--   <div class="col-sm-12 col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-3-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">Villa</a>
                                        </h3>
                                        <a href="properties-list-rightside.html" class="category-subtitle">98 Properties</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                     
                </div>
            </div>
       <!--  <div class="col-lg-5 col-md-12 col-sm-12 col-pad d-none d-xl-block d-lg-block">
                <div class="category">
                    <div class="category_bg_box category_long_bg cat-4-bg">
                        <div class="category-overlay">
                            <div class="category-content">
                                <h3 class="category-title">
                                    <a href="#">Farm</a>
                                </h3>
                                <a href="properties-list-rightside.html" class="category-subtitle">12 Properties</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
