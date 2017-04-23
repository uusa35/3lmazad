<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Contactus;
use App\Models\Country;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class ViewComposers
{
    public function getCountries(View $view)
    {
        $countries = Country::pluck('name', 'id');
        return $view->with(compact('countries'));
    }


    public function getCompaniesRoles(View $view)
    {
        $roles = Role::companies()->pluck('name', 'id');
        return $view->with(compact('roles'));
    }

    public function getIsAdmin(View $view)
    {
        $isAdmin = auth()->check() ? auth()->user()->isAdmin : false;
        return $view->with(compact('isAdmin'));
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

    public function getBreadCrumbs(View $view)
    {
        $link = '';

        $arrayFilter = ['index', 'create', 'update', 'store', 'destroy', 'delete', 'meta', 'attribute', 'edit'];

        $name = Route::currentRouteName();

        $routes = explode('.', $name);

        $routes = array_filter($routes, function ($item) use ($arrayFilter) {

            if (!in_array($item, $arrayFilter, true)) {

                return $item;

            }

        });

        $view->with('breadCrumbs', $routes);
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
        $categories = $category->parents()->has('children')->with('children.children')->featured()->get();
        return $view->with(compact('categories'));

    }
}

