<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = 'tr_id';
    protected $primaryKey = 'tr_id';
    public $timestamps = false;

    // Other properties and methods specific to the "transactions" table
}
