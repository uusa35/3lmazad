/**
 * Created by usamaahmed on 5/18/17.
 */
$(document).ready(function() {
    console.log('jquery is ready ');
    // home (search form)
    var lang = $('#lang').text();
    $('#category').on('change', function() {
        // fetch the catId
        $('#sub-fields').removeClass('hidden');
        let catId = $('.dropdown.category').dropdown('get value');
        // fetch the cat type
        let catType = $('#cat-' + catId).data('type');
        console.log(catType);
        console.log(catId);
        // assign it to the input responsible for the cat --> wont make difference because i check in the api for the sub and main
        $('#cat_input').attr('name', catType);
        // hide all fields to start over
        $('.fields').addClass('hidden');
        // remove all html from brands and models
        $('#options-brand_id').html('');
        $('#options-model_id').html('');
        $('#options-type_id').html('');
        // fetch the brands only + all sub fields related to catID
        return axios.get('api/category/' + catId).then(res => res.data).then(data => {
            console.log(data.parent);
            // show only the fields related + set the value to zero + set the text to default
            data.parent.fields.map(f => {
                $('#' + f.name).removeClass('hidden');
                $('#' + f.name).dropdown('set value', 0);
                $('#' + f.name).dropdown('set text', f.name);
            });
            // check if there are brands then move to brand_id div for models
            if ('brands' in data.parent) {
                data.parent.brands.map(b => {
                    let name = 'name_' + lang;
                    $('#options-brand_id').append(`
                        <div class="item" data-value="${b.id}" data-text="${b[name]}">
                            <img class="ui avatar image" src="storage/uploads/images/thumbnail/${b.image}">
                            ${b[name]}
                        </div>
                    `);
                });
            }
            if ('types' in data.parent) {
                data.parent.types.map(b => {
                    let name = 'name_' + lang;
                    $('#options-type_id').append(`
                        <div class="item" data-value="${b.id}" data-text="${b[name]}">
                            ${b[name]}
                        </div>
                    `);
                });
            }

        }).catch(e =>console.log(e));
    });

    // home (search form) : after fetching brands .. prepare the models related
    $('#brand_id').on('change', function() {
        let brandId = $('.brand_id').dropdown('get value');
        $('#options-model_id').html('');
        axios.get('api/brand/' + brandId + '/models').then(res => res.data).then(data => {
            let name = 'name_' + lang;
            data.models.map(m => {
                $('#options-model_id').append(`
                        <div class="item" data-value="${m.id}" data-text="${m[name]}">
                            ${m[name]}
                        </div>
                        `);
            });
        }).catch(e => console.log(e));
    });

    // fetch all colors and sizes once the divs are ready
    // for the create-form
    $('#input-create-color_id').ready(function() {
        return axios.get('api/colors').then(res => res.data).then(data => {
            console.log(data);
            let name = 'name_' + lang;
            data.colors.map(c => {
                $('#input-create-color_id').append(`
                <option value="${c.id }">${c[name]}</option>
                `);
            });

            data.sizes.map(s => {
                $('#input-create-size_id').append(`
                        <option value="${s.id }">${s[name]}</option>
                `);
            });
        }).catch(e => console.log(e));
    });
    // for the search-form
    $('#options-color_id').ready(function() {
        console.log('read color id started')
        return axios.get('api/colors').then(res => res.data).then(data => {
            let name = 'name_' + lang;
            data.colors.map(c => {
                $('#options-color_id').append(`
                <div class="item" data-value="${c.id}" data-text="${c[name]}">
                            ${c[name]}
                        </div>
                `);
            });

            data.sizes.map(s => {
                $('#options-size_id').append(`
                <div class="item" data-value="${s.id}" data-text="${s[name]}">
                            ${s[name]}
                        </div>
                `);
            });
        }).catch(e => console.log(e));
    });

    // end of search form


    // tooltip
    $('.tooltip-message').popup({
        on: 'hover',
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
    $('#dataTable').DataTable({
        //"order": [[0, "desc"]],
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false
    });

    // ad.create categories
    $('#category-create').on('change', function(e) {
        // fetch the parent categoryID
        console.log('category-create change');
        let catId = e.target.value;
        // remove all sub categories
        $('#subCategories-create').html('');
        $('#input-create-brand_id').html('');
        $('#input-create-brand_id').append(`
            <option value=>choose brand</option>
        `);
        $('#input-create-model_id').html('');
        $('div[id^="field-create-"]').addClass('hidden');
        return axios.get('api/category/' + catId).then(res => res.data).then(data => {
            console.log(data.parent);
            data.parent.fields.map(f => {
                let nameField = 'name_' + lang;
                $('#field-create-' + f.name).removeClass('hidden');
                $('#input-create-' + f.name).val(nameField);
            });
            data.parent.children.map(m => {
                let name = 'name_' + lang;
                $('#subCategories-create').append(`
                    <option class="" value="${m.id}"><span style="padding-left: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;${m[name]}</span></option>
                `);
            });
            if ('brands' in data.parent) {
                data.parent.brands.map(m => {
                    let name = 'name_' + lang;
                    $('#input-create-brand_id').append(`
                        <option value="${m.id }">${m[name]}</option>
                    `);
                });
            }
        }).catch(e => console.log(e));
    });

    // this one for brand in ad.create route
    $('#input-create-brand_id').on('change', function(e) {
        let brandId = e.target.value;
        $('#input-create-model_id').html('');
        return axios.get('api/brand/' + brandId + '/models').then(res => res.data).then(data => {
            return data.models.map(m => {
                let name = 'name_' + lang;
                return $('#input-create-model_id').append(`
                    <option value="${m.id }">${m[name]}</option>
                `);
            });
        }).catch(e => console.log(e));
    });

    $('input[name="is_merchant"]').on('click', function(e) {
        let isMerchant = e.target.value;
        console.log(isMerchant);
        if (isMerchant == 1) {
            $('#category-register').removeClass('hidden');
        } else {
            $('#category-register').addClass('hidden');
        }
    });
});

