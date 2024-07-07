<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Models\Tag;

class ItemController extends Controller
{
    public function getIndex() {
        // // $item->resetData($session); 
        $items = Item::all();
        return view('eshop.index', ['items' => $items]);
    }

    public function getAdminIndex() {
        $items = Item::all();
        return view('admin.index', ['items' => $items]);
    }

    public function getItem($id) {
        $item = Item::find($id);
        return view('eshop.item', ['item' => $item]);
    }

    public function getAdminCreate() {
        $tags = Tag::all();
        return view('admin.create', ['tags' => $tags]);
    }

    public function adminCreateItem(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:25',
            'description' => 'required',
            'price' => 'required'
        ]);
        $item = new Item([
            'title' => $request->input('title'),
            'price' => $request->input('price')
        ]);
        $item->description = $request->input('description');
        $item->save();
        $item->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));
        return redirect()->route('admin.index')->with('info', 'Item created. Title is: ' . $request->input('title'));
    }

    public function getAdminEdit($id) {
        $item = Item::find($id);
        $tags = Tag::all();
        return view('admin.edit', ['item' => $item, 'itemId' => $id, 'tags' => $tags]);
    }
    
    public function adminUpdateItem(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:25',
            'description' => 'required',
            'price' => 'required'
        ]);
        
        $item = Item::find($request->input('id'));
        $item->title = $request->input('title');
        $item->description = $request->input('description');
        $item->price = $request->input('price');
        $item->save();
        $item->tags()->sync($request->input('tags') === null ? [] : $request->input('tags'));
        return redirect()->route('admin.index')->with('info', 'Item edited. New Title is: ' . $request->input('title'));
    }

    public function adminDeleteItem($id) {
        $item = Item::find($id);
        $item->tags()->detach();
        $item->delete();
        return redirect()->route('admin.index')->with('info', 'Item deleted.');
    }
}
