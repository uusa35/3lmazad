/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 752);
/******/ })
/************************************************************************/
/******/ ({

/***/ 382:
/***/ (function(module, exports) {

/**
 * Created by usamaahmed on 5/18/17.
 */
$(document).ready(function () {
    console.log('jquery from frontend custome');
    var lang = $('#lang').text();
    console.log('the lang is ' + lang);
    $('#category').on('change', function () {
        // hide all classes
        $('div[id^="sub-fields"]').addClass('hidden');
        // remove the input name and value of all sub-fields
        $('input[id*="-input-"]').attr('name', '');
        $('input[id*="-input-"]').attr('value', '');
        // first : get the parent category / sub category / type of the category chosen
        var catName = $('.dropdown.category').dropdown('get text');
        console.log('name of the category is ' + catName);
        var catId = $('.dropdown.category').dropdown('get value');
        console.log('value of the category is ' + catId);
        var catParentId = $('#cat-' + catId).attr('parentId');
        var type = $('#cat-' + catId).attr('type');
        console.log('type case : ' + type + ' and parentId is ' + catParentId);
        // second : adjust the category input for main or sub + value of the category id
        $('#cat_input').attr('value', catId);
        $('#cat_input').attr('name', type);

        // third : show the div related to the category
        if (type === 'sub') {
            console.log('from sub case');
            $('#sub-fields-' + catParentId).toggleClass('hidden');
            // will repeat this for each input element
            // condition', 'manufacturing_year', 'type',
            //'transmission', 'room_no', 'floor_no', 'brand_id', 'model_id',
            //    'bathroom_no', 'rent_type', 'building_age', 'furnished', 'space'
            // brand
            $('#brand_id-input-' + catParentId).attr('name', 'brand_id');
            $('#model_id-input-' + catParentId).attr('name', 'model_id');
            $('#condition-input-' + catParentId).attr('name', 'condition');
            $('#type-input-' + catParentId).attr('name', 'type');
            $('#manufacturing_year-input-' + catParentId).attr('name', 'manufacturing_year');
            $('#transmission-input-' + catParentId).attr('name', 'transmission');
            $('#room_no-input-' + catParentId).attr('name', 'room_no');
            $('#floor_no-input-' + catParentId).attr('name', 'floor_no');
            $('#bathroom_no-input-' + catParentId).attr('name', 'bathroom_no');
            $('#rent_type-input-' + catParentId).attr('name', 'rent_type');
            $('#building_age-input-' + catParentId).attr('name', 'building_age');
            $('#furnished-input-' + catParentId).attr('name', 'furnished');
            $('#furnished-' + catParentId).dropdown('get value');
            $('#space-input-' + catParentId).attr('name', 'space');
        }
    });

    $('#area').on('click', function (e) {
        var getVal = $('.dropdown.area').dropdown('get value');
        $('#area_input').attr('value', getVal);
    });

    $('div[id^="brand_id-"]').on('change', function () {
        var catId = $('.dropdown.category').dropdown('get value');
        var catParentId = $('#cat-' + catId).attr('parentId');
        var brandId = $('#brand_id-input-' + catParentId).attr('value');
        $('#model_id-items-' + catParentId).html('');
        console.log('brandId ' + brandId);
        return axios.get('api/brand/' + brandId + '/models').then(function (res) {
            return res.data;
        }).then(function (data) {
            return data.map(function (m) {
                var name = 'name_' + lang;
                //$('model_id-items-' + catParentId).append('<div>test</div>');
                return $('#model_id-items-' + catParentId).append('\n                    <div class="item area" data-value="' + m.id + '" data-text="' + m[name] + '">\n                        <img class="ui avatar image" src="storage/uploads/images/thumbnail/' + m.image + '">\n                        ' + m[name] + '\n                    </div>\n                ');
            });
        }).catch(function (e) {
            return console.log(e);
        });
    });

    $('.tooltip-message').popup({
        on: 'hover',
        position: 'top center'
    });

    $('.ui.dropdown').dropdown({ allowCategorySelection: true });

    $('#myModal').modal('show');

    $('#productModal').modal('attach events', '.triggerModal', 'show');

    $('.triggerModal').on('click', function () {
        var price = $(this).data('price');
        var image = $(this).data('image');
        var description = $(this).data('description');
        var title = $(this).data('title');
        var category = $(this).data('category');
        var url = $(this).data('ad-url');
        var element = $(this).data('element');
        var fromDate = $(this).data('from-date');

        $('.modal-price').text(price);
        $('.modal-ad-url').attr('href', url);
        $('.modal-image').attr('src', 'storage/uploads/images/medium/' + image);
        $('.modal-description').text(description);
        $('.modal-title').text(title);
        $('.modal-category').text(category);
        $('.modal-from-date').text(fromDate);
        $('#productModal').attr('style', 'background-color : white; margin-top: 10%; width: 80%; min-height: 400px;');
    });

    $('button[id^="favorite-"]').on('click', function () {
        var userId = $(this).data('user-id');
        var adId = $(this).data('ad-id');
        console.log(adId);
        $('#favorite-icon-' + adId).toggleClass('outline');
        return axios.get('api/favorites/' + adId + '/' + userId).then(function (r) {
            return console.log(r);
        }).catch(function (e) {
            return console.log(e);
        });
    });
});

/***/ }),

/***/ 752:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(382);


/***/ })

/******/ });