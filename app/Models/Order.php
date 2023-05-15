<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function menu(){
        return $this->belongsToMany(Menu::class,'order_menus','order_id','menu_id');
    }
}
