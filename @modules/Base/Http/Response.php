<?php

namespace Modules\Base\Http;

class Response
{
    public static function make()
    {
        return new static();
    }

    public function default($data, $status = 200)
    {
        return response()->json($data, $status);
    }

    public function success($data, $status = 200)
    {
        return response()->json([
            'success' => true,
            'content' => $data
        ], $status);
    }

    public function message($message = 'ok', $status = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
        ], $status);
    }

    public function error($message = 'Something went wrong', $status = 500)
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], $status);
    }

    public function __construct()
    {
    }
}
