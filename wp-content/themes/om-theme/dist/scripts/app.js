"use strict";
(self["webpackChunkgrowwithomv2"] = self["webpackChunkgrowwithomv2"] || []).push([["/scripts/app"],{

/***/ "./resources/assets/scripts/app.js":
/*!*****************************************!*\
  !*** ./resources/assets/scripts/app.js ***!
  \*****************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _splidejs_splide__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @splidejs/splide */ "./node_modules/@splidejs/splide/dist/js/splide.esm.js");
/* harmony import */ var _splidejs_splide__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_splidejs_splide__WEBPACK_IMPORTED_MODULE_0__);
/*
 * @Author Kenny <kenny@growwithom.com>
 * @description Application entry point
 */


__webpack_require__(/*! slick-carousel */ "./node_modules/slick-carousel/slick/slick.js"); //If using vue comment or remove jQuery
// eslint-disable-next-line no-undef


jQuery(document).ready(function ($) {
  jQuery('.navbar-toggler').on('click', function (e) {
    jQuery('body').toggleClass('bg-shadow');
  });

  if (window.matchMedia('( hover: hover )').matches) {
    jQuery(".has-megamenu").mouseenter(function () {
      jQuery('.nav-ovraly').show();
    }).mouseleave(function () {
      jQuery('.nav-ovraly').hide();
    });
  } else {
    jQuery('.dropdown-toggle').on('click', function () {
      jQuery('.dropdown-toggle').not(this).removeClass('touch_show');
      jQuery(this).toggleClass('touch_show');
      jQuery('.nav-ovraly').show();
    });
    jQuery('.nav-ovraly').on('click', function () {
      jQuery('.dropdown-toggle.touch_show').removeClass('touch_show');
    });
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
    jQuery('.nav-ovraly').hide();
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
    dots: true
  });
  jQuery('.clientsayslider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    fade: true,
    autoplay: true,
    autoplaySpeed: 20000
  });
  jQuery('.careerpoints').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true
  });
  jQuery('.your-class').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true
  });
  jQuery('.employeeimageslider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    fade: true,
    autoplay: true,
    autoplaySpeed: 20000
  });
  jQuery('.careerlearningslider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true
  });
  jQuery('.joblistslider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    fade: true
  });
  jQuery('.careerreview').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    fade: true
  });
  jQuery('.careerlookingslider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    dots: true
  });
  jQuery('#page-gravure .sliders .slides-show').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '#page-gravure .sliders .slides'
  });
  jQuery('#page-gravure .sliders .slides').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '#page-gravure .sliders .slides-show',
    centerMode: true,
    focusOnSelect: true
  });
  jQuery('.growmobslider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true
  });
  jQuery('.mainteamslide').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true
  });
});
document.addEventListener('DOMContentLoaded', function () {
  new (_splidejs_splide__WEBPACK_IMPORTED_MODULE_0___default())('.splide', {
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
        gap: 62
      },
      767: {
        perPage: 1,
        perMove: 1,
        focus: 0,
        fixedWidth: '345px',
        gap: 30
      }
    }
  }).mount();
});
var caseStudySliderBlock = document.querySelector('.block-case-study-slider');

if (caseStudySliderBlock) {
  var viewportWidth;
  var ContainerWidth = document.querySelector('.container').clientWidth;
  var caseStudySlider = document.querySelector('.case-study-slider');
  var padding = 0;

  var setViewportWidth = function setViewportWidth() {
    viewportWidth = window.innerWidth || document.documentElement.clientWidth;
  };

  var logWidth = function logWidth() {
    if (viewportWidth > 767) {
      padding = (viewportWidth - ContainerWidth) / 1.9;
      caseStudySlider.style.paddingLeft = "".concat(padding, "px");
    } else {
      caseStudySlider.style.paddingLeft = "0px";
    }
  };

  setViewportWidth();
  logWidth();
  window.addEventListener('resize', function () {
    setViewportWidth();
    logWidth();
  }, false);
}

/***/ }),

/***/ "./resources/assets/styles/app.scss":
/*!******************************************!*\
  !*** ./resources/assets/styles/app.scss ***!
  \******************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/***/ (function(module) {

module.exports = window["jQuery"];

/***/ })

},
/******/ function(__webpack_require__) { // webpackRuntimeModules
/******/ var __webpack_exec__ = function(moduleId) { return __webpack_require__(__webpack_require__.s = moduleId); }
/******/ __webpack_require__.O(0, ["styles/app","/scripts/vendor"], function() { return __webpack_exec__("./resources/assets/scripts/app.js"), __webpack_exec__("./resources/assets/styles/app.scss"); });
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);