<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /** @var string  */
    protected $table = 'items';

    /** @var array  */
    protected $fillable = [
        'shiporder',
        'title',
        'note',
        'quantity',
        'price'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipOrder()
    {
        return $this->belongsTo(ShipOrder::class, 'shiporder', 'id');
    }
}
