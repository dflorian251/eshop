<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class ItemController extends Controller
{
    public function getIndex(Store $session) {
        $item = new Item();
        // $item->resetData($session);
        $items = $item->getItems($session); 
        return view('eshop.index', ['items' => $items]);
    }

    public function getAdminIndex(Store $session) {
        $item = new Item();
        $items = $item->getItems($session);
        return view('admin.index', ['items' => $items]);
    }

    public function getItem(Store $session, $id) {
        $item = new Item();
        $item = $item->getItem($session, $id);
        return view('eshop.item', ['item' => $item]);
    }

    public function adminCreateItem(Store $session, Request $request) {
        // $this->validate($request, [
        //     'title' => 'required|min:5',
        //     'description' => 'required|min:10',
        //     'price' => 'required'
        // ]);

        $item = new Item();
        $item->addItem($session, $request->input('title'), $request->input('description'), $request->input('price'));
        return redirect()->route('admin.index')->with('info', 'Item created. Title is: ' . $request->input('title'));
    }

    public function getAdminEdit(Store $session, $id) {
        $item = new Item();
        $item = $item->getItem($session, $id);
        return view('admin.edit', ['item' => $item, 'itemId' => $id]);
    }
    
    public function adminUpdateItem(Store $session, Request $request) {
        // $this->validate($request, [
        //     'title' => 'required|min:5',
        //     'content' => 'required|min:10'
        // ]);
        $item = new Item();
        $item->editItem($session, $request->input('id'), $request->input('title'), $request->input('description'), $request->input('price'));
        return redirect()->route('admin.index')->with('info', 'Item edited. New Title is: ' . $request->input('title'));
    }

    // public function resetData(Store $session) {
    //     $item = new Item();
    //     $item->resetData($session);
    //     return redirect()->route('other.index');
    // }
}
