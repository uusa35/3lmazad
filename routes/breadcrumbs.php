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
    $breadcrumbs->parent('home');
    $breadcrumbs->push('favorite');
});

// account (user.index)
Breadcrumbs::register('user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('general.my_account'), route('user.index'));
});
// my ads page
Breadcrumbs::register('user.show', function ($breadcrumbs, $element) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push(trans('general.my_ads'), route('user.show', $element->id));
});

