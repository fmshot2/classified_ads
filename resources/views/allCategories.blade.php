@extends('layouts.app')
@section('title', 'All Categories | ')
@section('content')

<style>
    .letters{
        font-size: 13px;
        font-weight: 500;
        text-transform: uppercase;
        color: #515151;
        position: relative;
        top: -58px;
        left: 60px;
        /* margin-right: 20px; */
        display: inline-block;
        padding: 10px;
    }
    .letters:hover{
        cursor: pointer;
        color: #ca8309;
    }
    @media (max-width: 768px){
        .alphabets{
            display: none
        }
    }
</style>

<div class="main">
    <div class="sub-banner" style="background-image:url({{asset('uploads/headerBannerImages/allcatbg.jpeg')}});">
        <div class="container">
            <div class="page-name">
                <div class="sub-banner-text-content">
                    <h1>All Categories</h1>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><span>/</span>All Categories</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="properties-section-body content-area categories-pg-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <!-- Option bar start -->
                    <div class="option-bar">
                        <div class="float-left">
                            <h4>
                                <span class="heading-icon bg-warning">
                                    <i class="fa fa-th-large"></i>
                                </span>
                                {{-- <span class="title-name">All Categories</span> --}}
                                <div class="alphabets">
                                    <a onclick="catAlphSort('all')" href="#" class="letters">ALL</a>
                                    <p onclick="catAlphSort('A')" class="letters">A</p>
                                    <p onclick="catAlphSort('B')" class="letters">B</p>
                                    <p onclick="catAlphSort('C')" class="letters">C</p>
                                    <p onclick="catAlphSort('D')" class="letters">D</p>
                                    <p onclick="catAlphSort('E')" class="letters">E</p>
                                    <p onclick="catAlphSort('F')" class="letters">F</p>
                                    <p onclick="catAlphSort('G')" class="letters">G</p>
                                    <p onclick="catAlphSort('H')" class="letters">H</p>
                                    <p onclick="catAlphSort('I')" class="letters">I</p>
                                    <p onclick="catAlphSort('J')" class="letters">J</p>
                                    <p onclick="catAlphSort('K')" class="letters">K</p>
                                    <p onclick="catAlphSort('L')" class="letters">L</p>
                                    <p onclick="catAlphSort('M')" class="letters">M</p>
                                    <p onclick="catAlphSort('N')" class="letters">N</p>
                                    <p onclick="catAlphSort('O')" class="letters">O</p>
                                    <p onclick="catAlphSort('P')" class="letters">P</p>
                                    <p onclick="catAlphSort('Q')" class="letters">Q</p>
                                    <p onclick="catAlphSort('R')" class="letters">R</p>
                                    <p onclick="catAlphSort('S')" class="letters">S</p>
                                    <p onclick="catAlphSort('T')" class="letters">T</p>
                                    <p onclick="catAlphSort('U')" class="letters">U</p>
                                    <p onclick="catAlphSort('V')" class="letters">V</p>
                                    <p onclick="catAlphSort('W')" class="letters">W</p>
                                    <p onclick="catAlphSort('X')" class="letters">X</p>
                                    <p onclick="catAlphSort('Y')" class="letters">Y</p>
                                    <p onclick="catAlphSort('Z')" class="letters">Z</p>
                                </div>
                            </h4>
                        </div>
                    </div>
                    <!-- grid properties start -->
                    <div class="services-2 categories-pg-area content-area-5 bg-grea-3">
                <div class="container">
                    <!-- Main title -->
                    <div class="main-title">
                        <h5>What service are you looking for?</h5>
                    </div>
                    @if(isset($categories))
                        <div class="row wow animated" id="categoryColumn">
                            @foreach($categories as $category)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 defaultData">
                                    <a href="{{ route('services', $category->slug) }}">
                                        <div class="service-info-5 animate__animated animate__fadeInUp">
                                            <img class="" src="{{asset('images')}}/{{$category->image}}" style=" border-radius: 10px; width: 50px; margin-bottom: 20px" alt="{{$category->name}}">
                                            <h4>{{$category->name}}</h4>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                    <!-- Page navigation start -->
                    {{-- <div class="pagination-box hidden-mb-45 text-center">
                        {{ $categories->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    column = document.getElementById('categoryColumn')

    function catAlphSort(letter) {
        $('.defaultData').remove()
        $.ajax({
            url: '/catpagesortby/' + letter,
            method: 'GET',
            success: function(data){
                categories = data
                console.log(categories)

                categories.forEach(category => {
                    column.innerHTML += `<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 defaultData">
                            <a href="/services/`+ category.slug +`">
                                <div class="service-info-5 animate__animated animate__fadeInUp">
                                    <img class="" src="/images/` + category.image +`" style=" border-radius: 10px; width: 50px; margin-bottom: 20px" alt="` + category.name +`">
                                    <h4>`+ category.name +`</h4>
                                </div>
                            </a>
                        </div>`
                })
            },
            statusCode: {
                500: function() {
                    column.innerHTML += `<h4 class="defaultData" style="text-align:center; width:100%">No category in the list!</h4>`
                }
            }
        });
    }
</script>

@endsection
