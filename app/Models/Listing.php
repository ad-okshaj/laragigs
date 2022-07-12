<?php
namespace App\Models;

class Listing{
    public static function all(){
        return   [
            [  'id' => 1,
            'title' => 'Listing One',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi nam, enim ut sit aliquid beatae dolores magni, ex fugit aspernatur ea eos nisi porro voluptatem iure magnam et vitae vel!'],
            ['id' => 2,
            'title' => 'Listing Two',
            'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi nam, enim ut sit aliquid beatae dolores magni, ex fugit aspernatur ea eos nisi porro voluptatem iure magnam et vitae vel!']
        ];
    }

 public static function find($id){
$listings = self::all();

foreach($listings as $listing){
    if($listing['id'] == $id){
        return $listing;
    }
   }   
  }
} 