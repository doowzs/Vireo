<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * View homepage.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('home');
    }

    /**
     * View legal notice page.
     *
     * @return \Illuminate\View\View
     */
    public function legal()
    {
        return view('legal');
    }

    /**
     * Auto deploy webhook.
     */
    public function deploy(Request $request)
    {
        $payload = $request->getContent();
        $token   = env('APP_DEPLOY_SECRET');
        $localHash   = 'sha1='. hash_hmac('sha1', $payload, $token, false);
        $webhookHash = $request->header('X-Hub-Signature');
        if (hash_equals($webhookHash, $localHash)) {
            $process = new Process('cd ' . base_path() . '; ./auto-deploy.sh');
            $process->run(function ($type, $buffer) {
                echo $buffer;
            });
        } else {
            echo "Hash authentication failed.";
        }
    }
}
