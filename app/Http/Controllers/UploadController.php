<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessXml;
use App\Models\FileLog;
use App\Models\Status;
use App\Providers\LogServiceProvider;
use Illuminate\Http\Request;

/**
 * Class UploadController
 * @package App\Http\Controllers
 */
class UploadController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function formEnviar()
    {
        return view('upload.formEnviar');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function formAcompanhar()
    {
        return view('upload.formAcompanhar');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function upload(Request $request)
    {
        $token = LogServiceProvider::createToken();
        $message = 'Arquivo Enviado com sucesso.';

        try {
            $path = $request->file('submittedFile')->store('uploads');
        } catch (\Exception $e) {
            $message = 'Erro no recebimento do arquivo';
            LogServiceProvider::logError($message, $token, true);

            return view('upload.result', ['message' => $message, 'token' => $token]);
        }

        LogServiceProvider::logReceivedFile($path,  $request->file('submittedFile')->getClientOriginalName(), $token);

        ProcessXml::dispatch($path, $token);

        return view('upload.result', ['message' => $message, 'token' => $token]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function uploadDetails(Request $request)
    {

        $token = $request->only('fileToken');

        $log = FileLog::where('token', $token)->first();

        $log->details;
        $log->status = Status::find($log->status);

        return view('upload.details', ['log' => $log]);
    }
}
