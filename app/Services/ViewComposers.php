<?php

namespace App\Services;

use App\Models\Area;
use App\Models\Category;
use App\Models\Color;
use App\Models\Contactus;
use App\Models\Country;
use App\Models\Field;
use App\Models\Post;
use App\Models\Size;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Tymon\JWTAuth\Facades\JWTAuth;

class ViewComposers
{
    public function getCountries(View $view)
    {
        if (!cache()->has('countries_' . app()->getLocale())) {
            $countries = Country::pluck('name_' . app()->getLocale(), 'id')->toArray();
            Cache::forever('countries_' . app()->getLocale(), $countries);
        }
        $countries = cache()->get('countries_' . app()->getLocale());
        return $view->with(compact('countries'));
    }

    public function getAreas(View $view)
    {
        $areas = Area::orderBy('id', 'asc')->pluck('name_' . app()->getLocale(), 'id');
        return $view->with(compact('areas'));
    }

    public function getColors(View $view)
    {
        $elements = Color::orderBy('id', 'asc')->get();
        return $view->with(compact('elements'));
    }

    public function getSizes(View $view)
    {
        $elements = Size::orderBy('id', 'asc')->get();
        return $view->with(compact('elements'));
    }

    public function getAllAreas(View $view)
    {
        $allAreas = Area::orderBy('id', 'asc')->get();
        return $view->with(compact('allAreas'));
    }


    public function getIsAdmin(View $view)
    {
        $isAdmin = auth()->check() ? auth()->user()->isAdmin : false;
        return $view->with(compact('isAdmin'));
    }

    public function getUser(View $view)
    {
        $user = auth()->user();
        return $view->with(compact('user'));
    }

    public function getAllCategoriesWithFeatured(View $view)
    {
        $categories = Category::parents()->with(['children' => function ($q) {
            $q->where('featured', true)->with('children');
        }])->get()->toArray();

        return $view->with(compact('categories'));
    }

    public function getAllCategoriesWithoutFeatured(View $view)
    {
        $categories = Category::parents()->with(['children' => function ($q) {
            $q->where('featured', true)->with('children');
        }])->get()->toArray();

        return $view->with(compact('categories'));
    }

    public function getContactusInfo(View $view)
    {
        $contactus = Contactus::first();
        return $view->with(compact('contactus'));
    }

    public function getChat(View $view)
    {
        $user = auth()->user() ? Auth::user()->with('user_meta')->first() : false;
        $chatCode = '';
        if ($user) {
            $chat = new iFlyChat(env('CHAT_APP_ID'), env('CHAT_API_KEY'));
            $userChat = array(
                'user_name' => $user->name, // string(required)
                'user_id' => strval($user->id),
                'is_admin' => $user->isAdmin, // boolean (optional)
                'user_avatar_url' => strval($user->user_meta->logo), // string (optional)
                'user_profile_url' => route('user.show', $user->id), // string (optional)
            );
            $chat->setUser($userChat);
            $chatCode = $chat->getHtmlCode();
        }
        return $view->with(compact('chatCode'));
    }

    public function setTokenElement(View $view)
    {
        if (auth()->check()) {
            $token = JWTAuth::fromUser(auth()->user());
            return $view->with(compact('token'));
        }
    }

    public function getCategories(View $view)
    {
        $category = new Category();
        $categories = $category->parents()->with('children')->get();
        return $view->with(compact('categories'));
    }

    public function getFields(View $view)
    {
        $fields = Field::all();
        $colors = Color::all();
        $sizes = Size::all();
        return $view->with(compact('fields', 'colors', 'sizes'));
    }
}

