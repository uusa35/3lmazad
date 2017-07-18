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

Breadcrumbs::register('plan', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('general.payment_plans'), route('plan.index'));
});


//ad.show
Breadcrumbs::register('ad.show', function ($breadcrumbs, $element) {
    $breadcrumbs->parent('sub', $element->category);
    $breadcrumbs->push($element->title, route('ad.show', $element->id));
});


Breadcrumbs::register('ad.create', function ($breadcrumbs) {
    $breadcrumbs->parent('account');
    $breadcrumbs->push(trans('general.create_ad'), route('ad.create'));
});


// ad.index
Breadcrumbs::register('parent', function ($breadcrumbs, $element) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($element->name, route('ad.index', ['id' => $element->id]));
});
Breadcrumbs::register('sub', function ($breadcrumbs, $element) {
    $breadcrumbs->parent('parent', $element->parent->first());
    $breadcrumbs->push($element->name, route('ad.index', ['id' => $element->id]));
});

// favorites

Breadcrumbs::register('favorite', function ($breadcrumbs) {
    $breadcrumbs->parent('user.account');
    $breadcrumbs->push('favorite');
});


// all merchants  (user.index)
Breadcrumbs::register('user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('general.merchant'), route('user.index'));
});

Breadcrumbs::register('user.merchants-categories', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('general.merchants_categories'), route('user.merchants-categories'));
});

// user profile
Breadcrumbs::register('user.show', function ($breadcrumbs, $element) {
    if (auth()->check() && auth()->user()->id === $element->id) {
        $breadcrumbs->parent('account');
        $breadcrumbs->push(trans('general.profile'), route('user.show', $element->id));
    } else {
        $breadcrumbs->parent('home');
        $breadcrumbs->push(trans('general.profile'), route('user.show', $element->id));
    }
});

// my ads page
Breadcrumbs::register('user.ads', function ($breadcrumbs, $element) {
    $breadcrumbs->parent('user.show',$element);
    $breadcrumbs->push(trans('general.ads'), route('user.ads', $element->id));
});

// user account
Breadcrumbs::register('account', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('general.account'), route('account'));
});

Breadcrumbs::register('user.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('account');
    $breadcrumbs->push(trans('general.profile_edit'), route('user.edit', auth()->user()->id));
});

// account.ads (list of ads from account)
Breadcrumbs::register('account.ads', function ($breadcrumbs) {
    $breadcrumbs->parent('account');
    $breadcrumbs->push(trans('general.ads'), route('account.ads'));
});

