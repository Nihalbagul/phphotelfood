<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    // Specify the table name
    protected $table = 'hotels'; // Ensure this matches your actual table name in the database

    // Define the relationship with foods
    public function foods()
    {
        return $this->hasMany(Food::class, 'hotel_id'); // Assuming 'hotel_id' is the foreign key in the 'foods' table
    }
}
