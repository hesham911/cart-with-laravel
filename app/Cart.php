<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * @var array
     */
    protected $fillable=['user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
   {
       return $this->belongsTo(User::class,'user_id');
   }
}
