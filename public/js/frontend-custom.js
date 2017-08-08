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
/******/ 	return __webpack_require__(__webpack_require__.s = 750);
/******/ })
/************************************************************************/
/******/ ({

/***/ 382:
/***/ (function(module, exports) {

/**
 * Created by usamaahmed on 5/18/17.
 */
$(document).ready(function () {
    console.log('jquery is ready ');
    // home (search form)
    var lang = $('#lang').text();
    $('#category').on('change', function () {
        // fetch the catId
        var catId = $('.dropdown.category').dropdown('get value');
        // fetch the cat type
        var catType = $('#cat-' + catId).data('type');
        // assign it to the input responsible for the cat --> wont make difference because i check in the api for the sub and main
        $('#cat_input').attr('name', catType);
        // hide all fields to start over
        $('.fields').addClass('hidden');
        // remove all html from brands and models
        $('#options-brand_id').html('');
        $('#options-model_id').html('');
        $('#options-type_id').html('');
        // fetch the brands only + all sub fields related to catID
        return axios.get('api/category/' + catId).then(function (res) {
            return res.data;
        }).then(function (data) {
            // show only the fields related + set the value to zero + set the text to default
            data.parent.fields.map(function (f) {
                $('#' + f.name).removeClass('hidden');
                $('#' + f.name).dropdown('set value', 0);
                $('#' + f.name).dropdown('set text', f.name);
            });
            // check if there are brands then move to brand_id div for models
            if ('brands' in data.parent) {
                data.parent.brands.map(function (b) {
                    var name = 'name_' + lang;
                    $('#options-brand_id').append('\n                        <div class="item" data-value="' + b.id + '" data-text="' + b[name] + '">\n                            <img class="ui avatar image" src="storage/uploads/images/thumbnail/' + b.image + '">\n                            ' + b[name] + '\n                        </div>\n                    ');
                });
            }
            if ('types' in data.parent) {
                data.parent.types.map(function (b) {
                    var name = 'name_' + lang;
                    $('#options-type_id').append('\n                        <div class="item" data-value="' + b.id + '" data-text="' + b[name] + '">\n                            ' + b[name] + '\n                        </div>\n                    ');
                });
            }
        }).catch(function (e) {
            return console.log(e);
        });
    });

    // home (search form) : after fetching brands .. prepare the models related
    $('#brand_id').on('change', function () {
        var brandId = $('.brand_id').dropdown('get value');
        $('#options-model_id').html('');
        axios.get('api/brand/' + brandId + '/models').then(function (res) {
            return res.data;
        }).then(function (data) {
            var name = 'name_' + lang;
            data.models.map(function (m) {
                $('#options-model_id').append('\n                        <div class="item" data-value="' + m.id + '" data-text="' + m[name] + '">\n                            ' + m[name] + '\n                        </div>\n                        ');
            });
        }).catch(function (e) {
            return console.log(e);
        });
    });

    // fetch all colors and sizes once the divs are ready
    // for the create-form
    $('#input-create-color_id').ready(function () {
        return axios.get('api/colors').then(function (res) {
            return res.data;
        }).then(function (data) {
            console.log(data);
            var name = 'name_' + lang;
            data.colors.map(function (c) {
                $('#input-create-color_id').append('\n                <option value="' + c.id + '">' + c[name] + '</option>\n                ');
            });

            data.sizes.map(function (s) {
                $('#input-create-size_id').append('\n                        <option value="' + s.id + '">' + s[name] + '</option>\n                ');
            });
        }).catch(function (e) {
            return console.log(e);
        });
    });
    // for the search-form
    $('#options-color_id').ready(function () {
        console.log('read color id started');
        return axios.get('api/colors').then(function (res) {
            return res.data;
        }).then(function (data) {
            var name = 'name_' + lang;
            data.colors.map(function (c) {
                $('#options-color_id').append('\n                <div class="item" data-value="' + c.id + '" data-text="' + c[name] + '">\n                            ' + c[name] + '\n                        </div>\n                ');
            });

            data.sizes.map(function (s) {
                $('#options-size_id').append('\n                <div class="item" data-value="' + s.id + '" data-text="' + s[name] + '">\n                            ' + s[name] + '\n                        </div>\n                ');
            });
        }).catch(function (e) {
            return console.log(e);
        });
    });

    // end of search form


    // tooltip
    $('.tooltip-message').popup({
        on: 'hover',
        position: 'top center'
    });

    $('.ui.dropdown').dropdown({ allowCategorySelection: true });
    $('.special.cards .image').dimmer({
        on: 'hover'
    });

    // Modals
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

    // Favorite Product Btn
    $('button[id^="favorite-"]').on('click', function () {
        var userId = $(this).data('user-id');
        var adId = $(this).data('ad-id');
        $('#favorite-icon-' + adId).toggleClass('outline');
        return axios.get('api/favorites/' + adId + '/' + userId).then(function (r) {
            return console.log(r);
        }).catch(function (e) {
            return console.log(e);
        });
    });

    // Email & Mobile Visibility
    $('.checkbox.mobile').checkbox({
        onChecked: function onChecked() {
            var userId = $('.checkbox.mobile').data('user-id');
            return axios.get('api/toggle/mobile/1/' + userId).then(function (r) {
                return console.log(r.data);
            }).catch(function (e) {
                return console.log(e);
            });
        },
        onUnchecked: function onUnchecked() {
            var userId = $('.checkbox.mobile').data('user-id');
            return axios.get('api/toggle/mobile/0/' + userId).then(function (r) {
                return console.log(r.data);
            }).catch(function (e) {
                return console.log(e);
            });
        }
    });

    $('.checkbox.email').checkbox({
        onChecked: function onChecked() {
            var userId = $('.checkbox.email').data('user-id');
            return axios.get('api/toggle/email/1/' + userId).then(function (r) {
                return console.log(r);
            }).catch(function (e) {
                return console.log(e);
            });
        },
        onUnchecked: function onUnchecked() {
            var userId = $('.checkbox.mobile').data('user-id');
            return axios.get('api/toggle/email/0/' + userId).then(function (r) {
                return console.log(r);
            }).catch(function (e) {
                return console.log(e);
            });
        }
    });

    // frontend // datatables
    $('#dataTable').DataTable({
        //"order": [[0, "desc"]],
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false
    });

    // ad.create categories
    $('#category-create').on('change', function (e) {
        // fetch the parent categoryID
        console.log('category-create change');
        var catId = e.target.value;
        // remove all sub categories
        $('#subCategories-create').html('');
        $('#input-create-brand_id').html('');
        $('#input-create-brand_id').append('\n            <option value=>choose brand</option>\n        ');
        $('#input-create-model_id').html('');
        $('div[id^="field-create-"]').addClass('hidden');
        return axios.get('api/category/' + catId).then(function (res) {
            return res.data;
        }).then(function (data) {
            console.log(data.parent);
            data.parent.fields.map(function (f) {
                var nameField = 'name_' + lang;
                $('#field-create-' + f.name).removeClass('hidden');
                $('#input-create-' + f.name).val(nameField);
            });
            data.parent.children.map(function (m) {
                var name = 'name_' + lang;
                $('#subCategories-create').append('\n                    <option class="" value="' + m.id + '"><span style="padding-left: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;' + m[name] + '</span></option>\n                ');
            });
            if ('brands' in data.parent) {
                data.parent.brands.map(function (m) {
                    var name = 'name_' + lang;
                    $('#input-create-brand_id').append('\n                        <option value="' + m.id + '">' + m[name] + '</option>\n                    ');
                });
            }
        }).catch(function (e) {
            return console.log(e);
        });
    });

    // this one for brand in ad.create route
    $('#input-create-brand_id').on('change', function (e) {
        var brandId = e.target.value;
        $('#input-create-model_id').html('');
        return axios.get('api/brand/' + brandId + '/models').then(function (res) {
            return res.data;
        }).then(function (data) {
            return data.models.map(function (m) {
                var name = 'name_' + lang;
                return $('#input-create-model_id').append('\n                    <option value="' + m.id + '">' + m[name] + '</option>\n                ');
            });
        }).catch(function (e) {
            return console.log(e);
        });
    });

    $('input[name="is_merchant"]').on('click', function (e) {
        var isMerchant = e.target.value;
        console.log(isMerchant);
        if (isMerchant == 1) {
            $('#category-register').removeClass('hidden');
        } else {
            $('#category-register').addClass('hidden');
        }
    });
});

/***/ }),

/***/ 750:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(382);


/***/ })

/******/ });