<div style="background-color: rgba(255, 255, 255, 0.76); padding: 0px; border-top: 10px solid #03a84d; border-bottom: 10px solid #03a84d;">
    {{-- border-top: 5px solid #03a84d65; border-bottom: 5px solid #03a84d65; --}}
    <marquee onmouseover="this.stop();" onmouseout="this.start();" direction="left" style="color: black; font-size: 15px; padding-top: 8px;">
        <strong>
            No. 1 E-COMMERCE DIRECTORY IN NIGERIA    ****    PROMOTING EMPLOYMENT BY GIVING YOUTHS ACCESS TO PROSPECTIVE EMPLOYERS NATIONWIDE    ****    PROVIDE GOVERNMENT SKILL ACQUISITION BENEFICIARIES ACCESS TO MARKET & ADVERTIZE THEIR PRODUCTS AND SERVICES    ****    PROMOTING THE SMALL AND MEDIUM BUSINESS ENTERPRISES. (SMES)    ****    PROVIDE A PLATFORM FOR EMPLOYERS TO POST THEIR JOB OPENINGS    ****    DRAWING BUSINESS TRAFFIC TO BUSINESSES FOR BETTER INCOME **** HELPING ARTISANS-CUSTOMERS FIND EACH OTHER
        </strong>
    </marquee>
</div>

<div class="banner homepage-top-banner" id="banner">
	<div id="bannerCarousole" class="carousel slide" data-ride="carousel" data-interval="5000">
		<div class="carousel-inner">
            @if ($sliders ?? '')
                @forelse ($sliders ?? '' as $slider)
                    <div class="carousel-item banner-max-height {{ $loop->index == 0 ? 'active' : '' }}">
                        <img class="d-block w-100" src="{{ asset('uploads/sliders') }}/{{ $slider->image ?? '' }}" alt="{{ $slider->title ?? '' }}">
                        <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-center">
                                    @if ($slider->buttonlocation != 'nobutton')
                                        @if ($slider->buttonlocation == 'left')
                                            <div class="btn-sections btn-sections-left">
                                                <a href="{{ $slider->links ?? ''}}" class="btn btn-lg btn-warning text-white">{{ $slider->buttontext ?? ''}}</a>
                                            </div>
                                        @elseif ($slider->buttonlocation == 'right')
                                            <div class="btn-sections btn-sections-right">
                                                <a href="{{ $slider->links ?? ''}}" class="btn btn-lg btn-warning text-white">{{ $slider->buttontext ?? ''}}</a>
                                            </div>
                                        @else
                                            <div class="btn-sections btn-sections-center">
                                                <a href="{{ $slider->links ?? ''}}" class="btn btn-lg btn-warning text-white">{{ $slider->buttontext ?? ''}}</a>
                                            </div>
                                        @endif
                                    @endif
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
