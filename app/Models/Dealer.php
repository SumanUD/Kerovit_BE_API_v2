<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $fillable = [
        'dealername', 'address1', 'address2', 'address3',
        'suburbs', 'city', 'state', 'pincode', 'phone',
        'fax', 'contactnumber', 'contactperson', 'dealertype',
        'google_link', '360degree', 'storecode'
    ];
}
