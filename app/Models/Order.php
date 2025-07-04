<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // If your table name is not 'orders', specify it like this:
    // protected $table = 'your_table_name';

    // Specify which fields can be mass assigned (adjust to your DB columns)
    protected $fillable = [
        'user_id',
        'status',
        'total_amount',
        'payment_method',
        'shipping_address',
        // add other columns from your orders table here
    ];

    // Relationships example (optional)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function items() {
    return $this->hasMany(OrderItem::class);
}
// app/Models/Order.php

public function orderItems()
{
    return $this->hasMany(\App\Models\OrderItem::class);
}
public function deliveryPerson()
{
    return $this->belongsTo(DeliveryPerson::class, 'delivery_person_id');
}



    // Add other relationships if needed, e.g. order items
}
