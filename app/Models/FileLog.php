<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Token;

class FileLog extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'file_logs';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'path',
        'token',
        'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany(LogDetail::class, 'file_log', 'id');
    }
}
