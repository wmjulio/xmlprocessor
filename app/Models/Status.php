<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'statuses';

    /** @var int */
    const STATUS_RECEIVED = 1;
    /** @var int */
    const STATUS_PROCESSED = 2;
    /** @var int */
    const STATUS_REJECTED = 3;
    /** @var int */
    const STATUS_PROCESSING = 4;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fileLogs()
    {
        return $this->hasMany(FileLog::class, 'status', 'id');
    }
}
