/**
 * Created by usamaahmed on 5/18/17.
 */

window.$ = window.jQuery = require('jquery');
window.$.fn.transition = require('semantic-ui-transition');
window.$.fn.dropdown = require('semantic-ui-dropdown');
window.$.fn.popup = require('semantic-ui-popup');

$(document).ready(function() {
    console.log('jquery from frontend custome');
    $('.ui.dropdown').dropdown({allowCategorySelection: true});
    $('#test').on('click', function () {
        let getVal = $('.ui.dropdown.category').dropdown('get value');
        let getText = $('.ui.dropdown.category').dropdown('get text');
        console.log(getVal);
        console.log(getText);
    });
    //$('#category').on('click', function(e) {
    //    let categoryValue = $('#category').find(":selected").val();
    //    console.log(categoryValue);
    //    let category_id = $('.item.active.selected').attr('value');
    //    console.log(category_id);
    //})
    let getVal = $('.ui.dropdown#category').dropdown('get value');
    console.log(getVal)


    $('#area').on('click', function(e) {
        let area_id = $('.item.area.active.selected').attr('value');
        console.log(area_id);
    });

    $('.toottip-message').popup({
        on: 'focus',
        position: 'top center',
        offset : 10
    });
});
