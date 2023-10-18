<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;
    public function gadget()
    {
        return $this->belongsTo(Gadget::class);
    }
}
