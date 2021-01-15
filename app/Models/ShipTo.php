<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipTo extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'shipto';

    /** @var array */
    protected $fillable = [
        'shiporder',
        'name',
        'address',
        'city',
        'country'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipOrder()
    {
        return $this->belongsTo(ShipOrder::class, 'shiporder', 'id');
    }
}
