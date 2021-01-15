<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Phone
 * @package App\Models
 */
class Phone extends Model
{
    use HasFactory;

    /** @var string  */
    protected $table = 'phones';

    /** @var array  */
    protected $fillable = [
        'person',
        'number'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(Person::class, 'person', 'id');
    }
}
