<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser_CategoryRequest;
use App\Http\Requests\UpdateUser_CategoryRequest;
use App\Models\User_Category;

class UserCategoryController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser_CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_CategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_Category  $user_Category
     * @return \Illuminate\Http\Response
     */
    public function show(User_Category $user_Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_Category  $user_Category
     * @return \Illuminate\Http\Response
     */
    public function edit(User_Category $user_Category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_CategoryRequest  $request
     * @param  \App\Models\User_Category  $user_Category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_CategoryRequest $request, User_Category $user_Category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_Category  $user_Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Category $user_Category)
    {
        //
    }
}
