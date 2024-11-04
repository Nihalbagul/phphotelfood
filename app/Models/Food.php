<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    // Specify the table name
    protected $table = 'foods'; // Make sure this matches the name of your database table

    // Define the relationship (if this Food can have many related foods)
    public function relatedFoods()
    {
        return $this->hasMany(Food::class, 'hotel_id'); // Assuming 'hotel_id' is the foreign key in the 'foods' table
    }
}
