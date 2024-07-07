<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    protected $fillable = ['title', 'descirption', 'price'];


    public function tags() {
        return $this->belongTo('App\Models\Tag');
    }

    public function resetData($session) {
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