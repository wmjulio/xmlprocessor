<?php

namespace Tests\Unit;

use App\Models\FileLog;
use App\Providers\LogServiceProvider;
use Tests\TestCase;

class FileTokenGeneratorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTokenGeneration()
    {
        $token = LogServiceProvider::createToken();

        $log = FileLog::where('token', $token)->first();

        $this->assertNull($log);
    }
}
