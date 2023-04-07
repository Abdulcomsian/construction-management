<?php
namespace App\Exceptions;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];
    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];
    public function report(Throwable $e)
    {
        if ($this->shouldReport($e)) {
            Log::error($e);
            // $content['message'] = $exception->getMessage();
            // $content['file'] = $exception->getFile();
            // $content['line'] = $exception->getLine();
            // $content['trace'] = $exception->getTrace();
  
            // $content['url'] = request()->url();
            // $content['body'] = request()->all();
            // $content['ip'] = request()->ip();
            $message = "Error Message: " . $e->getMessage() . "\n\n" . "File Name: " . $e->getFile() . "\n\n" . "Line Number: " . $e->getLine() . "\n\n" . $e;
            Mail::raw($message, function($message) {
                $message->to('basitawan.abdul@gmail.com')
                        ->subject('Error Occurred in City Works');
            });
        }
        parent::report($e);
    }
    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}