<?php

namespace App\Jobs;

use App\Http\Controllers\UploadController;
use App\Providers\UploadServiceProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProcessXml
 * @package App\Jobs
 */
class ProcessXml implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var string */
    private $path;
    /** @var string */
    private $token;

    /**
     * ProcessXml constructor.
     * @param UploadController $controller
     * @param $path
     */
    public function __construct($path, $token)
    {
        $this->path = $path;
        $this->token = $token;
    }

    /**
     * @param $content
     * @throws \Exception
     */
    public function handle()
    {
        $message = UploadServiceProvider::processUploadedFile($this->path, $this->token);

        echo $message;
    }
}
