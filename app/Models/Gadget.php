<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gadget extends Model
{
    use HasFactory;
    protected $fillable=[
        'client_id',
        'name',
        'serial_number',
        'description',
        'status',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function accessories()
    {
        return $this->hasMany(Accessory::class);
    }
}
