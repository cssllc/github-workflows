/*
 * @Author Kenny <kenny@growwithom.com>
 * @description Application entry point
 */

import Splide from '@splidejs/splide'

require('slick-carousel')

//If using vue comment or remove jQuery
// eslint-disable-next-line no-undef
jQuery(document).ready(function ($) {
    jQuery('.navbar-toggler').on('click', function (e) {
        jQuery('body').toggleClass('bg-shadow')
    })

    if ( window.matchMedia( '( hover: hover )' ).matches ) {

        jQuery(".has-megamenu").mouseenter(function () {
            jQuery('.nav-ovraly').show();
        }).mouseleave(function () {
            jQuery('.nav-ovraly').hide();
        });

    } else {

        jQuery( '.dropdown-toggle' ).on( 'click', function() {
            jQuery( '.dropdown-toggle' ).not( this ).removeClass( 'touch_show' );
            jQuery( this ).toggleClass( 'touch_show' );
            jQuery( '.nav-ovraly' ).show();
        } );

        jQuery( '.nav-ovraly' ).on( 'click', function() {
            jQuery( '.dropdown-toggle.touch_show' ).removeClass( 'touch_show' );
        } );

    }

    jQuery('.navbar .navbar-toggler').on('click', function (e) {
        jQuery('.hero-nav-hover-wrap, .inner_page_ovarlay').toggleClass("bg-shadow-tab");
        jQuery(".hero-nav-hover-wrap, .inner_page_ovarlay").addClass("nav-ovarlay-show");
        jQuery("html").toggleClass("nav-open");
    });

    jQuery(".inner-nav-xs").click(function () {
        jQuery(".inner_page_ovarlay").removeClass("nav-ovarlay-show");
    });

    jQuery(".inner-nav-xs").click(function () {
        jQuery(".hero-nav-hover-wrap").removeClass("nav-ovarlay-show");
    });

    jQuery('.nav-ovraly').on('click', function () {
        jQuery('html').removeClass("nav-open");
        jQuery( '.nav-ovraly' ).hide();
        jQuery('.navbar-collapse').collapse('hide');
        jQuery(".hero-nav-hover-wrap, .inner_page_ovarlay").removeClass("bg-shadow-tab");
        jQuery(".hero-nav-hover-wrap, .inner_page_ovarlay").removeClass("nav-ovarlay-show");
    });

    jQuery(".navbar-nav > .nav-item, .megamenu").mouseenter(function () {
        jQuery('.hero-nav-hover-wrap').addClass("add-nav-hover");
    }).mouseleave(function () {
        jQuery('.hero-nav-hover-wrap').removeClass("add-nav-hover");
    });

    jQuery('.maingrowslide').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
    })

    jQuery('.clientsayslider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        fade: true,
        autoplay: true,
        autoplaySpeed: 20000,
    })

    jQuery('.careerpoints').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
    })

    jQuery('.your-class').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
    })

    jQuery('.employeeimageslider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        fade: true,
        autoplay: true,
        autoplaySpeed: 20000,
    })

    jQuery('.careerlearningslider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
    })

    jQuery('.joblistslider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        fade: true,
    })

    jQuery('.careerreview').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        fade: true,
    })

    jQuery('.careerlookingslider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        dots: true,
    })

    jQuery('#page-gravure .sliders .slides-show').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '#page-gravure .sliders .slides',
    })

    jQuery('#page-gravure .sliders .slides').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '#page-gravure .sliders .slides-show',
        centerMode: true,
        focusOnSelect: true,
    })

    jQuery('.growmobslider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
    })

    jQuery('.mainteamslide').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
    })
})

document.addEventListener('DOMContentLoaded', function () {
    new Splide('.splide', {
        rewind: true,
        perPage: 1,
        perMove: 1,
        fixedWidth: '635px',
        gap: 50,
        drag: true,
        arrows: false,
        trimSpace: false,
        breakpoints: {
            991: {
                perPage: 2,
                focus: 0,
                fixedWidth: '390px',
                gap: 62,
            },
            767: {
                perPage: 1,
                perMove: 1,
                focus: 0,
                fixedWidth: '345px',
                gap: 30,
            },
        },
    }).mount()
})

const caseStudySliderBlock = document.querySelector('.block-case-study-slider')

if (caseStudySliderBlock) {
    let viewportWidth
    let ContainerWidth = document.querySelector('.container').clientWidth
    let caseStudySlider = document.querySelector('.case-study-slider')
    let padding = 0

    var setViewportWidth = function () {
        viewportWidth = window.innerWidth || document.documentElement.clientWidth
    }

    var logWidth = function () {
        if (viewportWidth > 767) {
            padding = (viewportWidth - ContainerWidth) / 1.9
            caseStudySlider.style.paddingLeft = `${padding}px`
        } else {
            caseStudySlider.style.paddingLeft = `0px`
        }
    }

    setViewportWidth()
    logWidth()

    window.addEventListener(
        'resize',
        function () {
            setViewportWidth()
            logWidth()
        },
        false
    )
}
