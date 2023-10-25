<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = Lists::all();
        //messageは削除しましたなどのお知らせに使う
        return Inertia::render('tasks/Index',['tasks'=>$lists, 'message'=>session('message')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'task' => 'required|max:100',
            'memo' => 'required|max:255',
            'category' => 'required|max:10'
        ]);
        $list = new Lists($request->input());
        $list -> save();
        return redirect('lists')->with(['message'=>'登録しました',]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lists $lists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lists $lists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $list = Lists::find($id);
        $list->fill($request->input())->saveOrFail();
        return redirect('lists')->with([
            'message'=>'更新しました',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $list = Lists::find($id);
        $list -> delete();
        return redirect('books')->with([
            'message' => '削除しました',
        ]);
    }
}
