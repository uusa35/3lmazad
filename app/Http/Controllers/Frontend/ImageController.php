<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\ImageStore;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery = auth()->user()->gallery()->first();
        $countImages = env('MAX_IMAGES') - auth()->user()->gallery()->first()->images()->count();
        return view('frontend.modules.image.create', compact('countImages', 'gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageStore $request)
    {
        $user = auth()->user();
        $this->saveGallery($user->gallery()->first(), $request, 'images', ['600', '450'], true);
        return redirect()->route('account')->with('success', trans('message.image_success'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->image->whereId($id)->delete()) {
            return redirect()->route('account')->with('success', trans('message.success_image_destroy'));
        }
        return redirect()->route('account')->with('error', trans('message.error_image_destroy'));
    }
}
