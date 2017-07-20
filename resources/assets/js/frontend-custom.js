/**
 * Created by usamaahmed on 5/18/17.
 */
$(document).ready(function() {

    // search form
    var lang = $('#lang').text();
    $('#category').on('change', function() {
        // hide all classes
        $('div[id^="sub-fields"]').addClass('hidden');
        // remove the input name and value of all sub-fields
        $('input[id*="-input-"]').attr('name', '');
        $('input[id*="-input-"]').attr('value', '');
        // first : get the parent category / sub category / type of the category chosen
        let catName = $('.dropdown.category').dropdown('get text');
        console.log('name of the category is ' + catName);
        let catId = $('.dropdown.category').dropdown('get value');
        console.log('value of the category is ' + catId)
        let catParentId = $('#cat-' + catId).attr('parentId');
        let type = $('#cat-' + catId).attr('type');
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


    $('#area').on('click', function(e) {
        let getVal = $('.dropdown.area').dropdown('get value');
        $('#area_input').attr('value', getVal);
    });

    $('div[id^="brand_id-"]').on('change', function() {
        let catId = $('.dropdown.category').dropdown('get value');
        let catParentId = $('#cat-' + catId).attr('parentId');
        let brandId = $('#brand_id-input-' + catParentId).attr('value');
        $('#model_id-items-' + catParentId).html('');
        return axios.get('api/brand/' + brandId + '/models').then(res => res.data).then(data => {
            return data.map(m => {
                let name = 'name_' + lang;
                //$('model_id-items-' + catParentId).append('<div>test</div>');
                return $('#model_id-items-' + catParentId).append(`
                    <div class="item area" data-value="${m.id}" data-text="${m[name]}">
                        <img class="ui avatar image" src="/storage/uploads/images/thumbnail/${m.image}">
                        ${m[name]}
                    </div>
                `);
            });
        }).catch(e => console.log(e));
    });

    // end of search form


    // tooltip
    $('.tooltip-message').popup({
        on: 'hover',
        position: 'top center'
    });

    $('.ui.dropdown').dropdown({allowCategorySelection: true});
    $('.special.cards .image').dimmer({
        on: 'hover'
    });

    // Modals
    $('#myModal').modal('show');

    $('#productModal').modal('attach events', '.triggerModal', 'show');

    $('.triggerModal').on('click', function() {
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
    $('button[id^="favorite-"]').on('click', function() {
        var userId = $(this).data('user-id');
        var adId = $(this).data('ad-id');
        console.log(adId);
        $('#favorite-icon-' + adId).toggleClass('outline');
        return axios.get('api/favorites/' + adId + '/' + userId).then(r => console.log(r)).catch(e => console.log(e));
    });

    // Email & Mobile Visibility
    $('.checkbox.mobile').checkbox({
        onChecked: () => {
            var userId = $('.checkbox.mobile').data('user-id');
            return axios.get('api/toggle/mobile/1/' + userId).then(r => console.log(r.data)).catch(e => console.log(e));
        },
        onUnchecked: () => {
            var userId = $('.checkbox.mobile').data('user-id');
            return axios.get('api/toggle/mobile/0/' + userId).then(r => console.log(r.data)).catch(e => console.log(e));
        }
    });
    $('.checkbox.email').checkbox({
        onChecked: () => {
            var userId = $('.checkbox.email').data('user-id');
            return axios.get('api/toggle/email/1/' + userId).then(r => console.log(r)).catch(e => console.log(e));
        },
        onUnchecked: () => {
            var userId = $('.checkbox.mobile').data('user-id');
            return axios.get('api/toggle/email/0/' + userId).then(r => console.log(r)).catch(e => console.log(e));
        }
    });

    // frontend // datatables
    $('#adsTable').DataTable({
        "order": [[0, "desc"]],
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false
    });

    // ad.create categories
    $('#mainCategory').on('change', function(e) {
        $('div[id^="fields-"]').addClass('hidden');
        let categoryId = e.target.value;
        console.log(categoryId);
        $('#parentCategory').attr('value', categoryId);
        $('#subCategories').html('');
        return axios.get('/api/category/' + categoryId + '/children').then(res => res.data).then(data => {
            return data.map(m => {
                let name = 'name_' + lang;
                $('div[id="fields-' + categoryId + '"]').removeClass('hidden');
                return $('#subCategories').append(`
                    <option class="" value="${m.id}"><span style="padding-left: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;${m[name]}</span></option>
                `);
            });
        }).catch(e => console.log(e));
    });

    // this one for brand in ad.create route
    $('select[id^="brands-items-"]').on('change', function(e) {
        let catParentId = $(e.target).attr('parent_id');
        let brandId = e.target.value;
        $('#models-items-' + catParentId).html('');
        return axios.get('/api/brand/' + brandId + '/models').then(res => res.data).then(data => {
            return data.map(m => {
                let name = 'name_' + lang;
                return $('#models-items-' + catParentId).append(`
                    <option value="${m.id }">${m[name]}</option>
                `);
            });
        }).catch(e => console.log(e));
    });

});

