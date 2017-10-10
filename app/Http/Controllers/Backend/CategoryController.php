<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Field;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->type == 0 || !request()->has('type')) {

            $elements = Category::where('parent_id', '=', request()->type)->with('children', 'fields')->get();

        } elseif (request()->type !== 0) {

            $elements = Category::where('parent_id', '=', request()->type)->with('parent', 'children')->get();

        }
        return view('backend.modules.category.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\Backend\CategoryStore $request)
    {
        $category = Category::create($request->all());

        if (!$category) {

            return redirect()->route('backend.category.index', ['type' => 0])->with('error', 'category not created successfully');

        }
        return redirect()->route('backend.category.index', ['type' => 0])->with('success', 'category created');
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
        $element = Category::whereId($id)->first();

        return view('backend.modules.category.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\Backend\CategoryUpdate $request, $id)
    {
        $category = Category::whereId($id)->first();

        if (!$category->update($request->all())) {

            return redirect()->route('backend.category.index', ['type' => $category->parent_id])->with('error', 'category not updated');
        }

        return redirect()->route('backend.category.index', ['type' => $category->parent_id])->with('success', 'category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::whereId($id)->with('children')->first();

        if ($category->ads()->count() > 0 || !$category->children->isEmpty()) {
            return redirect()->back()->with('error', 'category not deleted .. remove any products or services attached to this product before deleting');
        }

        Category::whereId($id)->first()->delete();

        return redirect()->back()->with('success', 'category deleted');

    }

    public function getAssignField($id)
    {
        $element = Category::whereId($id)->with('fields')->first();
        return view('backend.modules.category.assign', compact('element'));
    }

    public function postAssignField(Request $request, $id)
    {
        $element = Category::whereId($id)->first();
        $element->fields()->sync($request->except('_token'));
        if($element) {
            return redirect()->route('backend.category.index',['type' => 0])->with('success','process success');
        }
        return redirect()->route('backend.category.assign')->with('error','process success');
    }
}
