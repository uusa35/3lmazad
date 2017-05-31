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

Breadcrumbs::register('ad', function ($breadcrumbs, $element) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($element->title, route('ad.show', $element->id));
});

Breadcrumbs::register('category', function ($breadcrumbs, $element) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($element->name, route('ad.index', ['parent' => $element->parent_id]));
});
