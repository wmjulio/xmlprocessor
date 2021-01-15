<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 * @package App\Models
 */
class Person extends Model
{
    use HasFactory;

    /** @var string  */
    protected $table = 'persons';

    /** @var array  */
    protected $fillable = [
        'id',
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function phones()
    {
        return $this->hasMany(Phone::class, 'person', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shiporders()
    {
        return $this->hasMany(ShipOrder::class, 'person', 'id');
    }
}
