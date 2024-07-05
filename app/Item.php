<?php

namespace App;

class Item {
    public function getItems($session) {
        if (!$session->has('items')) {
            $this->createDummyData($session);
        }
        return $session->get('items');
    }

    public function getItem($session, $id) {
        if (!$session->has('items')) {
            $this->createDummyData();
        }
        return $session->get('items')[$id];
    }

    public function addItem($session, $title, $description, $price) {
        if (!$session->has('items')) {
            $this->createDummyData($session);
        }
        $items = $session->get('items');
        array_push($items, ['title' => $title, 'description' => $description, 'price' => $price]);
        $session->put('items', $items);
    }

    // public function editItem($session, $id, $title, $description, $price) {
    //     if (!$session->has('items')) {
    //         $this->createDummyData($session);
    //     }
    //     $items = $session->get('items');
    //     $items[$id] =  ['title' => $title, 'description' => $description, 'price' => $price];
    //     $session->put('items', $items);
    // }

    private function createDummyData($session) {
        $items = [
            [
                'title' => 'Dummy Item',
                'description' => 'Dummy Item`s Description',
                'price' => '12.50'
            ]
        ];
        $session->put('items', $items);
    }
}

?>