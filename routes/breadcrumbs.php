<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 5/29/17
 * Time: 1:25 PM
 */

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push(trans('general.home'), route('home'));
});

Breadcrumbs::register('login', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('general.login'), route('login'));
});

Breadcrumbs::register('register', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('general.register'), route('register'));
});

Breadcrumbs::register('reset_password', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('general.reset_password'), route('password.request'));
});

// plan.index
Breadcrumbs::register('plan', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('general.payment_plans'), route('plan.index'));
});

// cart.index
Breadcrumbs::register('cart', function ($breadcrumbs) {
    $breadcrumbs->parent('plan');
    $breadcrumbs->push(trans('general.cart'), route('cart.add'));
});

// checkout
Breadcrumbs::register('checkout', function ($breadcrumbs) {
    $breadcrumbs->parent('cart');
    $breadcrumbs->push(trans('general.checkout'), route('checkout.index'));
});

//ad.show
Breadcrumbs::register('ad.show', function ($breadcrumbs, $element) {
    $breadcrumbs->parent('sub', $element->category);
    $breadcrumbs->push($element->title, route('ad.show', $element->id));
});


Breadcrumbs::register('ad.create', function ($breadcrumbs) {
    $breadcrumbs->parent('account.user');
    $breadcrumbs->push(trans('general.create_ad'), route('ad.create'));
});


// ad.index
Breadcrumbs::register('parent', function ($breadcrumbs, $element) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($element->name, route('ad.index', ['id' => $element->id]));
});
Breadcrumbs::register('sub', function ($breadcrumbs, $element) {
    $breadcrumbs->parent('parent', $element->parent);
    $breadcrumbs->push($element->name, route('ad.index', ['id' => $element->id]));
});
// search case ad.index
Breadcrumbs::register('search', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('general.search_page_title'));
});

// favorites

Breadcrumbs::register('favorite', function ($breadcrumbs) {
    $breadcrumbs->parent('account.user');
    $breadcrumbs->push('favorite');
});


// all parent categories
Breadcrumbs::register('user.merchants-groups', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('general.merchants_groups'), route('user.merchants-groups'));
});

// fetch all users according to the parent category from merchant categories // the element is the ParentCategory
Breadcrumbs::register('user.index', function ($breadcrumbs, $element) {
    $breadcrumbs->parent('user.merchants-groups');
    $breadcrumbs->push($element->name, route('user.index', ['id' => $element->id]));
});

// user profile
Breadcrumbs::register('user.show', function ($breadcrumbs, $element) {
    if (auth()->check() && auth()->user()->id === $element->id) {
        $breadcrumbs->parent('account.user');
        $breadcrumbs->push(trans('general.profile'), route('user.show', $element->id));
    } else {
        $breadcrumbs->parent('home');
        $breadcrumbs->push(trans('general.profile'), route('user.show', $element->id));
    }
});

// my ads page
Breadcrumbs::register('user.ads', function ($breadcrumbs, $element) {
    $breadcrumbs->parent('user.show', $element);
    $breadcrumbs->push(trans('general.ads'), route('user.ads', $element->id));
});

// user account
Breadcrumbs::register('account.user', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('general.account'), route('account.user'));
});


Breadcrumbs::register('account.user.ads', function ($breadcrumbs) {
    $breadcrumbs->parent('account.user');
    $breadcrumbs->push(trans('general.my_ads_list'), route('account.user.ads'));
});


Breadcrumbs::register('user.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('account.user');
    $breadcrumbs->push(trans('general.profile_edit'), route('user.edit', auth()->user()->id));
});


Breadcrumbs::register('account.user.menu', function ($breadcrumbs) {
    $breadcrumbs->parent('account.user');
    $breadcrumbs->push(trans('general.menus_list'), route('account.menu.index'));
});

Breadcrumbs::register('account.user.menu.create', function ($breadcrumbs) {
    $breadcrumbs->parent('account.user.menu');
    $breadcrumbs->push(trans('general.menu_create'), route('account.menu.create'));
});

Breadcrumbs::register('account.user.menu.edit', function ($breadcrumbs,$element) {
    $breadcrumbs->parent('account.user.menu');
    $breadcrumbs->push(trans('general.menu_edit'), route('account.menu.edit',$element->id));
});

Breadcrumbs::register('account.user.menu.service', function ($breadcrumbs) {
    $breadcrumbs->parent('account.user.menu');
    $breadcrumbs->push(trans('general.service_list'), route('account.service.index'));
});

Breadcrumbs::register('account.user.menu.service.create', function ($breadcrumbs) {
    $breadcrumbs->parent('account.user.menu.service');
    $breadcrumbs->push(trans('general.service_create'), route('account.service.create'));
});

Breadcrumbs::register('account.user.menu.service.edit', function ($breadcrumbs,$element) {
    $breadcrumbs->parent('account.user.menu.service');
    $breadcrumbs->push(trans('general.service_edit'), route('account.service.edit',$element->id));
});


