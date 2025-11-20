<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    protected $perPage;

    public function __construct()
    {
        $this->perPage = request()->get('per_page', 10);
        if ($this->perPage > 50) {
            $this->perPage = 50;
        }
    }
    public function sendDataCollection($data, $message = '', $extra = [])
    {
        if (method_exists($data, 'toArray')) {
            $response = $data->toArray(request());
        } else {
            $response = $data;
        }

        $response['meta'] = [
            'current_page' => $data->currentPage(),
            'last_page'    => $data->lastPage(),
            'per_page'     => $data->perPage(),
            'total'        => $data->total(),
        ];

        $response['links'] = [
            'first' => $data->url(1),
            'last'  => $data->url($data->lastPage()),
            'prev'  => $data->previousPageUrl(),
            'next'  => $data->nextPageUrl(),
        ];

        if (!empty($extra)) {
            foreach ($extra as $key => $value) {
                $response[$key] = $value;
            }
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $response,
        ], 200);
    }
    public function sendData($data, $message = '')
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], 200);
    }
    public function messageSuccess($message, $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
        ], $code);
    }

    public function sendError($message = 'error', $errorMessages = [], $code = 403)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errorMessages,
        ], $code);
    }

    public function messageError($message, $code = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }
}
