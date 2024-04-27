<?php

namespace App\Http\Responses;

class ResponseHandler
{
    /**
     * Generate a success response.
     *
     * @param mixed $data
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($data, $status = 200)
    {
        return response()->json($data, $status);
    }

    /**
     * Generate an error response.
     *
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error($message, $status = 400)
    {
        return response()->json(['error' => $message], $status);
    }

    /**
     * Handle the response for an exception.
     *
     * @param \Exception $e
     * @param int $fallbackStatus
     * @return \Illuminate\Http\JsonResponse
     */
    public static function exception(\Exception $e, $fallbackStatus = 400)
    {
        $status = is_int($e->getCode()) && $e->getCode() > 0 ? $e->getCode() : $fallbackStatus;
        return self::error($e->getMessage(), $status);
    }
}
