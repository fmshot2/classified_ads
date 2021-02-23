<div class="banner homepage-top-banner" id="banner">
	<div id="bannerCarousole" class="carousel slide" data-ride="carousel" data-interval="5000">
		<div class="carousel-inner">
            @if ($sliders)
                @forelse ($sliders as $slider)
                    <div class="carousel-item banner-max-height {{ $loop->index == 1 ? 'active' : '' }}">
                        <img class="d-block w-100" src="{{ asset('uploads/sliders') }}/{{ $slider->image }}" alt="{{ $slider->title }}">
                        <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-center">
                                    <div class="btn-sections">
                                        <a href="{{ $slider->links }}" class="btn btn-lg btn-warning text-white">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No Slider</p>
                @endforelse
            @endif
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
