<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlockRequest;
use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blocks = Block::all();
        return view('block.table-block', compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("block.form-block")->with(['action' => 'add']);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlockRequest $request)
    {
        Block::create($request->all());
        
        return redirect()->route('block.index')->with('message', 'The Action is successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $block = Block::findOrFail($id);

        return view('block.form-block', compact('block'))->with(['action' => 'update']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlockRequest $request, string $id)
    {
        $block = Block::find($id);

        $block->update($request->all());

        return redirect()->route('block.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $block = Block::find($id);

        $block->delete();

        return redirect()->route('block.index');
    }
}
