<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogDetail extends Model
{
    use HasFactory;

    /** @var string  */
    protected $table = 'log_details';

    /** @var array  */
    protected $fillable = [
        'description',
        'file_log'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fileLog()
    {
        return $this->belongsTo(FileLog::class, 'file_log', 'id');
    }
}
