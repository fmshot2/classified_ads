<div class="banner homepage-top-banner" id="banner">
	<div id="bannerCarousole" class="carousel slide" data-ride="carousel" data-interval="5000">
		<div class="carousel-inner">
            <div class="carousel-item banner-max-height active">
				<img class="d-block w-100" src="{{ asset('mech2.jpg') }}" alt="banner">
				<div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
					<div class="carousel-content container">
						<div class="text-center">
							<div class="text-sections">
								<h3 class="text-uppercase">Boost Your Business</h3>
								<p>Advertise Your Skills</p>
							</div>
							<div class="btn-sections">
								<a href="{{route('register')}}" class="btn btn-lg btn-warning text-white" style="background-color: rgb(202, 131, 9); border: 2px solid #fff">Get Started Now</a>
								{{-- <a href="{{route('faq')}}" class="btn btn-lg btn-white-lg-outline">Learn More</a> --}}
							</div>
						</div>
					</div>
				</div>
			</div>

            <div class="carousel-item banner-max-height">
				<img class="d-block w-100" src="{{ asset('mech3.jpg') }}" alt="banner">
				<div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
					<div class="carousel-content container">
						<div class="text-center">
							<div class="text-sections">
								<h3 class="text-uppercase">Boost Your Business</h3>
								<p>Advertise Your Skills</p>
							</div>
							<div class="btn-sections">
								<a href="{{route('register')}}" class="btn btn-lg btn-warning text-white" style="background-color: rgb(202, 131, 9); border: 2px solid #fff">Get Started Now</a>
								{{-- <a href="{{route('faq')}}" class="btn btn-lg btn-white-lg-outline">Learn More</a> --}}
							</div>
						</div>
					</div>
				</div>
			</div>

            <div class="carousel-item banner-max-height">
				<img class="d-block w-100" src="{{ asset('uploads/sliders/advertisewithus-1612382084.png') }}" alt="banner">


			</div>

            <div class="carousel-item banner-max-height">
				<img class="d-block w-100" src="{{ asset('hair2.jfif') }}" alt="banner">
				<div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
					<div class="carousel-content container">
						<div class="text-center">
							<div class="text-sections">
								<h3 class="text-uppercase">Boost Your Business</h3>
								<p>Advertise Your Skills</p>
							</div>
							<div class="btn-sections">
								<a href="{{route('register')}}" class="btn btn-lg btn-warning text-white" style="background-color: rgb(202, 131, 9); border: 2px solid #fff">Get Started Now</a>
								{{-- <a href="{{route('faq')}}" class="btn btn-lg btn-white-lg-outline">Learn More</a> --}}
							</div>
						</div>
					</div>
				</div>
			</div>

            <div class="carousel-item banner-max-height">
				<img class="d-block w-100" src="{{ asset('uploads/sliders/efskyviewslider-1612364857.png') }}" alt="banner">


			</div>

            {{-- @if ($sliders ?? '')
                @forelse ($sliders ?? '' as $slider)
                    <div class="carousel-item banner-max-height {{ $loop->index == 1 ? 'active' : '' }}">
                        <img class="d-block w-100" src="{{ asset('uploads/sliders') }}/{{ $slider->image ?? '' }}" alt="{{ $slider->title ?? '' }}">
                        <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-center">
                                    <div class="btn-sections">
                                        <a href="{{ $slider->links ?? ''}}" class="btn btn-lg btn-warning text-white">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No Slider</p>
                @endforelse
            @endif --}}
        </div>
	</div>

	<a class="carousel-control-prev" href="#bannerCarousole" role="button" data-slide="prev">
		<span class="slider-mover-left" aria-hidden="true">
			<i class="fa fa-angle-left"></i>
		</span>
	</a>
	<a class="carousel-control-next" href="#bannerCarousole" role="button" data-slide="next">
		<span class="slider-mover-right" aria-hidden="true">
			<i class="fa fa-angle-right"></i>
		</span>
	</a>
</div>
