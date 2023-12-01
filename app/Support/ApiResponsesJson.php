<?php

namespace App\Support;

use Illuminate\Http\JsonResponse;

trait ApiResponsesJson
{
    /**
     * @param string $mess
     * @param int $statusCode
     * @return JsonResponse
     */
    public function resMessage(string $mess = "Fail", int $statusCode = 200): JsonResponse
    {
        return response()->json(["message" => $mess], $statusCode);
    }

    /*
     * Success : 200
     */
    public function resSuccess($data = [], string $mess = "Success", int $statusCode = 200): JsonResponse
    {
        $formatJson = [
            "message" => $mess,
            "data" => $data
        ];

        return response()->json($formatJson, $statusCode);
    }
}
