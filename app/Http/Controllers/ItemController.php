<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class ItemController extends Controller
{
    public function getIndex(Store $session) {
        // $item = new Item();
        // // $item->resetData($session);
        // $items = $item->getItems($session); 
        $items = Item::all();
        return view('eshop.index', ['items' => $items]);
    }

    public function getAdminIndex(Store $session) {
       $items = Item::all();
        return view('admin.index', ['items' => $items]);
    }

    public function getItem(Store $session, $id) {
        $item = Item::find($id);
        return view('eshop.item', ['item' => $item]);
    }

    public function adminCreateItem(Store $session, Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:25',
            'description' => 'required',
            'price' => 'required'
        ]);
        $item = new Item([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price')
        ]);
        $item->save();
        return redirect()->route('admin.index')->with('info', 'Item created. Title is: ' . $request->input('title'));
    }

    public function getAdminEdit(Store $session, $id) {
        $item = Item::find($id);
        return view('admin.edit', ['item' => $item, 'itemId' => $id]);
    }
    
    public function adminUpdateItem(Store $session, Request $request) {
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
        return redirect()->route('admin.index')->with('info', 'Item edited. New Title is: ' . $request->input('title'));
    }
}
