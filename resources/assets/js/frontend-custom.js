/**
 * Created by usamaahmed on 5/18/17.
 */
window.$ = window.jQuery = require('jquery');
window.$.fn.transition = require('semantic-ui-transition');
window.$.fn.dropdown = require('semantic-ui-dropdown');
window.$.fn.popup = require('semantic-ui-popup');
import axios from 'axios';

$(document).ready(function() {
    console.log('jquery from frontend custome');
    // category selection
    $('#category').on('click', function() {
        let type = $('.item.category_type.active.selected').attr('type');
        let getVal = $('.dropdown.category').dropdown('get value');
        $('#cat_input').attr('value', getVal);
        $('#cat_input').attr('name', type);
        if(type === 'sub') {
            console.log('sub started here');
            let brands = axios.get('/api/fetch/brands').then(r => r.data).catch(e => console.log(e));
            console.log(brands);
        }
    });

    $('#area').on('click', function(e) {
        let getVal = $('.dropdown.area').dropdown('get value');
        $('#area_input').attr('value', getVal);
    });

    $('.toottip-message').popup({
        on: 'focus',
        position: 'top center',
        offset: 10
    });

    $('.ui.dropdown').dropdown({allowCategorySelection: true});
});
