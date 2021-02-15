<div class="blog content-area bg-grea-3 hm-feat-ser-mid-sec">
    <div class="container">
            <!-- Main title -->
        <div class="main-title" style="margin-top: -50px;">
            <h1> Featured Services </h1>
        </div>

        <div class="row" id="featuredServicesRow">

        </div>



    </div>

    <div id="" class="search-section search-area-2">
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                <div class="form-group">
                    <a href="{{route('allSellers')}}" class="btn font-weight-bold btn-outline-warning">See all Featured Providers</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-2.2.0.min.js') }}"></script>
<script>
    $(document).ready(function () {
        var pageNumber = 1
        var lastPage = 1
        var currentPage = 1
        var featuredServicesRow = document.getElementById("featuredServicesRow")
        setInterval(() => {
            $.ajax({
                url: '/allfeat/?page=' + pageNumber,
                method: 'GET',
                success: function(result){
                    lastPage = result.last_page
                    currentPage = result.current_page
                    services = result.data
                    if (currentPage <= lastPage) {
                        services.forEach(service => {
                            console.log(service)
                            badge = service.badge_type
                            featuredServicesRow.innerHTML += `<a href="" class="property-img">
                                <div class="col-lg-3 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                    <div class="property-box">
                                        <div class="property-thumbnail">
                                            <div class="listing-badges">`+
                                                service.badge_type
                                            +`</div>
                                            <div class="price-ratings-box">
                                                <p class="price" style="text-transform: capitalize">
                                                    `+ service.user.name + `
                                                </p>
                                            </div>
                                            <img class="d-block w-100" src="/uploads/services/`+ service.image[0] + `" style="width: 100%; height: 15vw; object-fit: cover;" alt="properties">

                                        </div>
                                        <div class="detail">
                                            <div>
                                                <a class="title" href="">`+ service.name + `</a>
                                            </div>

                                            <ul class="d-flex flex-row justify-content-between info">
                                                <li>
                                                    <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> Likes
                                                </li>
                                                <li>
                                                    <a class="pull-right" href="">
                                                        <i class="fa fa-map-marker text-warning"></i> `+ service.state + `
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </a>`


                        });
                    }
                    else{
                        pageNumber = 1
                    }
                }
            });
            pageNumber++
            featuredServicesRow.innerHTML = ''
        }, 5000);


    })

</script>

