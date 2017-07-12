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

//ad.show
Breadcrumbs::register('ad.show.category', function ($breadcrumbs, $element) {
    $parent = $element->category->parent->first();
    $breadcrumbs->parent('home');
    $breadcrumbs->push($parent->name, route('ad.index', ['parent' => $parent->id]));
});

Breadcrumbs::register('ad.show', function ($breadcrumbs, $element) {
    $breadcrumbs->parent('ad.show.category', $element);
    $breadcrumbs->push($element->title, route('ad.show', $element->id));
});


// ad.index
Breadcrumbs::register('category', function ($breadcrumbs, $element) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($element->parent->name, route('ad.index', ['parent' => $element->parent_id]));
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

// user profile
Breadcrumbs::register('user.profile', function ($breadcrumbs, $id) {
    if (auth()->user()->id === $id)
        $breadcrumbs->parent('account');
    else
        $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('general.profile'), route('user.show', $id));
});

// my ads page
Breadcrumbs::register('user.ads', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push(trans('general.ads'), route('user.ads', $id));
});

// user account
Breadcrumbs::register('account', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('general.account'), route('account'));
});

Breadcrumbs::register('user.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('account');
    $breadcrumbs->push(trans('general.profile_edit'), route('user.edit',auth()->user()->id));
});

// account.ads (list of ads from account)
Breadcrumbs::register('account.ads', function ($breadcrumbs) {
    $breadcrumbs->parent('account');
    $breadcrumbs->push(trans('general.ads'), route('account.ads'));
});

