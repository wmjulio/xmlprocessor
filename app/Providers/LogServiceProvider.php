<?php

namespace App\Providers;

use App\Models\FileLog;
use App\Models\LogDetail;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

/**
 * Class LogServiceProvider
 * @package App\Providers
 */
class LogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * @param string $path
     * @param string $originalName
     * @param string $token
     */
    public static function logReceivedFile(string $path, string $originalName, string $token)
    {
        $log = new FileLog();
        $log->path = $path;
        $log->name = $originalName;
        $log->status = Status::STATUS_RECEIVED;
        $log->token = $token;

        DB::beginTransaction();

        $log->save();

        $log->details()->create([
            'description' => 'Arquivo recebido',
        ]);

        DB::commit();
    }

    /**
     * @return string
     */
    public static function createToken(): string
    {
        $token = date('Y') . Str::random(8);

        $log = FileLog::where('token', $token)->first();

        if ($log) {
            return LogServiceProvider::createToken();
        }

        return $token;
    }

    /**
     * @param string $error
     * @param string $token
     * @param bool $newError
     */
    public static function logError(string $error, string $token, bool $newError = false): void
    {
        LogServiceProvider::log($error, $token, Status::STATUS_REJECTED, $newError);
    }

    /**
     * @param string $description
     * @param string $token
     * @param int $status
     * @param bool $newLog
     */
    public static function log(string $description, string $token, int $status, bool $newLog = false): void
    {
        $log = new FileLog();

        if (!$newLog) {
            $log = FileLog::where('token', $token)->first();
        }

        $log->status = $status;
        $log->token = $token;

        DB::beginTransaction();

        $log->save();

        $log->details()->create([
            'description' => $description,
        ]);

        DB::commit();

    }
}
