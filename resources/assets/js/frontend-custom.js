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
    $('#category').on('click', function(e) {
        let category_id = $('.item.category.active.selected').attr('value');
        console.log(category_id);
    })

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
