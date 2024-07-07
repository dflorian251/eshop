<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    protected $fillable = ['title', 'descirption', 'price'];


    public function tags() {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }

    public function setTitleAttribute($value) {
        $this->attributes['title'] = strtolower($value);
    }

    public function getTitleAttribute($value) {
        return strtoupper($value);
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