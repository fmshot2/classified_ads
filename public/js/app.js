$(function () {
    'use strict';

    // Showing page loader
    $(window).load(function () {
        populateColorPlates();
        setTimeout(function () {
            $(".page_loader").fadeOut("fast");
        }, 100);

        if ($('body .filter-portfolio').length > 0) {
            $(function () {
                $('.filter-portfolio').filterizr(
                    {
                        delay: 0
                    }
                );
            });
            $('.filteriz-navigation li').on('click', function () {
                $('.filteriz-navigation .filtr').removeClass('active');
                $(this).addClass('active');
            });
        }

        if($("#map").length > 0) {
            var latitude = 51.541216;
            var longitude = -0.095678;
            var layout = $('#map').attr('data-map');
            var providerName = 'Hydda.Full';
            generateMap(latitude, longitude, providerName, layout);
        }

        if($("#contactMap").length > 0) {
            LoadMap('contactMap');
        }
    });


    // Magnify activation
    $('.portfolio-item').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {enabled: true}
    });


    // WOW animation library initialization
    var wow = new WOW(
        {
            animateClass: 'animated',
            offset: 100,
            mobile: false
        }
    );
    wow.init();

    // Banner slider
    (function ($) {
        //Function to animate slider captions
        function doAnimations(elems) {
            //Cache the animationend event in a variable
            var animEndEv = 'webkitAnimationEnd animationend';
            elems.each(function () {
                var $this = $(this),
                    $animationType = $this.data('animation');
                $this.addClass($animationType).one(animEndEv, function () {
                    $this.removeClass($animationType);
                });
            });
        }

        //Variables on page load
        var $myCarousel = $('#carousel-example-generic')
        var $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
        //Initialize carousel
        $myCarousel.carousel();

        //Animate captions in first slide on page load
        doAnimations($firstAnimatingElems);
        //Pause carousel
        $myCarousel.carousel('pause');
        //Other slides to be animated on carousel slide event
        $myCarousel.on('slide.bs.carousel', function (e) {
            var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
            doAnimations($animatingElems);
        });
        $('#carousel-example-generic').carousel({
            interval: 3000,
            pause: "false"
        });
    })(jQuery);

    // Page scroller initialization.
    $.scrollUp({
        scrollName: 'page_scroller',
        scrollDistance: 300,
        scrollFrom: 'top',
        scrollSpeed: 500,
        easingType: 'linear',
        animation: 'fade',
        animationSpeed: 200,
        scrollTrigger: false,
        scrollTarget: false,
        scrollText: '<i class="fa fa-chevron-up"></i>',
        scrollTitle: false,
        scrollImg: false,
        activeOverlay: false,
        zIndex: 2147483647
    });

    // Counter
    function isCounterElementVisible($elementToBeChecked) {
        var TopView = $(window).scrollTop();
        var BotView = TopView + $(window).height();
        var TopElement = $elementToBeChecked.offset().top;
        var BotElement = TopElement + $elementToBeChecked.height();
        return ((BotElement <= BotView) && (TopElement >= TopView));
    }

    $(window).scroll(function () {
        $(".counter").each(function () {
            var isOnView = isCounterElementVisible($(this));
            if (isOnView && !$(this).hasClass('Starting')) {
                $(this).addClass('Starting');
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 3000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            }
        });
    });


    // Countdown activation
    $(function () {
        // Add background image
        //$.backstretch('../img/nature.jpg');
        var endDate = "December  27, 2020 15:03:25";
        $('.countdown.simple').countdown({date: endDate});
        $('.countdown.styled').countdown({
            date: endDate,
            render: function (data) {
                $(this.el).html("<div>" + this.leadingZeros(data.days, 3) + " <span>Days</span></div><div>" + this.leadingZeros(data.hours, 2) + " <span>Hours</span></div><div>" + this.leadingZeros(data.min, 2) + " <span>Minutes</span></div><div>" + this.leadingZeros(data.sec, 2) + " <span>Seconds</span></div>");
            }
        });
        $('.countdown.callback').countdown({
            date: +(new Date) + 10000,
            render: function (data) {
                $(this.el).text(this.leadingZeros(data.sec, 2) + " sec");
            },
            onEnd: function () {
                $(this.el).addClass('ended');
            }
        }).on("click", function () {
            $(this).removeClass('ended').data('countdown').update(+(new Date) + 10000).start();
        });

    });

    $(".range-slider-ui").each(function () {
        var minRangeValue = $(this).attr('data-min');
        var maxRangeValue = $(this).attr('data-max');
        var minName = $(this).attr('data-min-name');
        var maxName = $(this).attr('data-max-name');
        var unit = $(this).attr('data-unit');

        $(this).append("" +
            "<span class='min-value'></span> " +
            "<span class='max-value'></span>" +
            "<input class='current-min' type='hidden' name='" + minName + "'>" +
            "<input class='current-max' type='hidden' name='" + maxName + "'>"
        );
        $(this).slider({
            range: true,
            min: minRangeValue,
            max: maxRangeValue,
            values: [minRangeValue, maxRangeValue],
            slide: function (event, ui) {
                event = event;
                var currentMin = parseInt(ui.values[0]);
                var currentMax = parseFloat(ui.values[1]);
                $(this).children(".min-value").text(currentMin + " " + unit);
                $(this).children(".max-value").text(currentMax + " " + unit);
                $(this).children(".current-min").val(currentMin);
                $(this).children(".current-max").val(currentMax);
            }
        });

        var currentMin = parseInt($(this).slider("values", 0));
        var currentMax = parseFloat($(this).slider("values", 1));
        $(this).children(".min-value").text(currentMin + " " + unit);
        $(this).children(".max-value").text(currentMax + " " + unit);
        $(this).children(".current-min").val(currentMin);
        $(this).children(".current-max").val(currentMax);
    });

    // Select picket
    $('.selectpicker').selectpicker();

    // Search option's icon toggle
    $(document).on('click', '.search-options-btn', function () {
        $('.search-section').toggleClass('show-search-area');
        $('.search-options-btn .fa').toggleClass('fa-chevron-down');
    });

    // Carousel with partner initialization
    (function () {
        $('#ourPartners').carousel({interval: 3600});
    }());

    (function () {
        $('.our-partners .item').each(function () {
            var itemToClone = $(this);
            for (var i = 1; i < 4; i++) {
                itemToClone = itemToClone.next();
                if (!itemToClone.length) {
                    itemToClone = $(this).siblings(':first');
                }
                itemToClone.children(':first-child').clone()
                    .addClass("cloneditem-" + (i))
                    .appendTo($(this));
            }
        });
    }());

    // Background video playing script
    $(".player").mb_YTPlayer();

    // Multilevel menuus

    // Megamenu activation
    $(".megamenu").on("click", function (e) {
        e.stopPropagation();
    });

    // Dropdown activation
    $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');


        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
            $('.dropdown-submenu .show').removeClass("show");
        });

        return false;
    });


    // Expending/Collapsing advance search content
    $(document).on('click', '.show-more-options', function () {
        if ($(this).find('.fa').hasClass('fa-minus-circle')) {
            $(this).find('.fa').removeClass('fa-minus-circle');
            $(this).find('.fa').addClass('fa-plus-circle');
        } else {
            $(this).find('.fa').removeClass('fa-plus-circle');
            $(this).find('.fa').addClass('fa-minus-circle');
        }
    });

    var videoWidth = $('.sidebar-widget').width();
    var videoHeight = videoWidth * .61;
    $('.sidebar-widget iframe').css('height', videoHeight);


    // Full  Page Search Activation
    $(function () {
        $('a[href="#full-page-search"]').on('click', function (event) {
            event.preventDefault();
            $('#full-page-search').addClass('open');
            $('#full-page-search > form > input[type="search"]').focus();
        });

        $('#full-page-search, #full-page-search button.close').on('click keyup', function (event) {
            if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
                $(this).removeClass('open');
            }
        });
    });


    // Slick Sliders
    $('.slick-carousel').each(function () {
        var slider = $(this);
        $(this).slick({
            infinite: true,
            dots: false,
            arrows: false,
            centerMode: true,
            centerPadding: '0'
        });

        $(this).closest('.slick-slider-area').find('.slick-prev').on("click", function () {
            slider.slick('slickPrev');
        });
        $(this).closest('.slick-slider-area').find('.slick-next').on("click", function () {
            slider.slick('slickNext');
        });
    });

    // Dropzone initialization
    Dropzone.autoDiscover = false;
    $(function () {
        $("div#myDropZone").dropzone({
            url: "/file-upload"
        });
    });


    function toggleChevron(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".fa")
            .toggleClass('fa-minus fa-plus');
    }

    $('.panel-group').on('shown.bs.collapse', toggleChevron);
    $('.panel-group').on('hidden.bs.collapse', toggleChevron);

    // Switching Color schema
    function populateColorPlates() {
        var plateStings = '<div class="option-panel option-panel-collased">\n' +
            '    <h2>Change Color</h2>\n' +
            '    <div class="color-plate" style="background: #95c41f" data-color="green"></div>\n' +
            '    <div class="color-plate" style="background: #2238d8" data-color="default"></div>\n' +
            '    <div class="color-plate" style="background: #ff214f" data-color="red"></div>\n' +
            '    <div class="color-plate" style="background: #00a8ff" data-color="blue"></div>\n' +
            '    <div class="color-plate" style="background: #18987f" data-color="green-light"></div>\n' +
            '    <div class="color-plate" style="background: #222f3e" data-color="dark-grey"></div>\n' +
            '    <div class="color-plate" style="background: #ff9f43" data-color="orange"></div>\n' +
            '    <div class="color-plate" style="background: #8e44ad" data-color="purple"></div>\n' +
            '    <div class="color-plate" style="background: #A14C10" data-color="brown"></div>\n' +
            '    <div class="color-plate" style="background: #b3c211" data-color="olive"></div>\n' +
            '    <div class="color-plate" style="background: #003171" data-color="dark-blue"></div>\n' +
            '    <div class="color-plate" style="background: #F7CA18" data-color="yellow"></div>\n' +
            '    <div class="setting-button">\n' +
            '        <i class="fa fa-gear"></i>\n' +
            '    </div>\n' +
            '</div>';
        $('body').append(plateStings);
    }

    $(document).on('click', '.color-plate', function () {
        var name = $(this).attr('data-color');
        $('link[id="style_sheet"]').attr('href', 'css/skins/' + name + '.css');
        $('.logo img').attr('src', 'img/logos/' + name + '-logo.png');
    });

    $(document).on('click', '.setting-button', function () {
        $('.option-panel').toggleClass('option-panel-collased');
    });

    function LoadMap(elementId) {
        var defaultLat = 40.7110411;
        var defaultLng = -74.0110326;
        var mapOptions = {
            center: new google.maps.LatLng(defaultLat, defaultLng),
            zoom: 15,
            scrollwheel: false,
            styles: [
                {
                    featureType: "administrative",
                    elementType: "labels",
                    stylers: [
                        {visibility: "off"}
                    ]
                },
                {
                    featureType: "water",
                    elementType: "labels",
                    stylers: [
                        {visibility: "off"}
                    ]
                },
                {
                    featureType: 'poi.business',
                    stylers: [{visibility: 'off'}]
                },
                {
                    featureType: 'transit',
                    elementType: 'labels.icon',
                    stylers: [{visibility: 'off'}]
                },
            ]
        };
        var map = new google.maps.Map(document.getElementById(elementId), mapOptions);
        var infoWindow = new google.maps.InfoWindow();
        var myLatlng = new google.maps.LatLng(40.7110411, -74.0110326);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
        (function (marker) {
            google.maps.event.addListener(marker, "click", function (e) {
                infoWindow.setContent("" +
                    "<div class='map-properties contact-map-content'>" +
                    "<div class='map-content'>" +
                    "<p class='address'>20-21 Kathal St. Tampa City, FL</p>" +
                    "<ul class='map-properties-list'> " +
                    "<li><i class='fa fa-phone'></i>  +0477 8556 552</li> " +
                    "<li><i class='fa fa-envelope'></i>  info@themevessel.com</li> " +
                    "<li><a href='index.html'><i class='fa fa-globe'></i>  http://www.example.com</li></a> " +
                    "</ul>" +
                    "</div>" +
                    "</div>");
                infoWindow.open(map, marker);
            });
        })(marker);
    }
});

// mCustomScrollbar initialization
(function ($) {
    $(window).resize(function () {
        $('#map').css('height', $(this).height() - 110);
        if ($(this).width() > 768) {
            $(".map-content-sidebar").mCustomScrollbar(
                {theme: "minimal-dark"}
            );
            $('.map-content-sidebar').css('height', $(this).height() - 110);
        } else {
            $('.map-content-sidebar').mCustomScrollbar("destroy"); //destroy scrollbar
            $('.map-content-sidebar').css('height', '100%');
        }
    }).trigger("resize");
})(jQuery);