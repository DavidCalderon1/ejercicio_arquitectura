<?php

if (!function_exists('internalResponse')) {
    /**
     * Estructura para comunicación interna entre archivos
     *
     * @param int $status
     * @param string $message
     * @param array $data
     * @return array
     */
    function internalResponse(int $status, string $message = '', array $data = []): array
    {
        $response = [
            'status' => $status,
            'message' => $message
        ];

        if (!empty($data)) {
            $response['data'] = $data;
        }

        return $response;
    }
}


if (!function_exists('responseJson')) {
    function responseJson(string $message, int $code): \Illuminate\Http\JsonResponse
    {
        $response = [];
        if ($code === 201) {
            $response = [$message];
        }
        if ($code === 200) {
            $response = [$message];
        }

        if ($code >= 400) {
            $response = [
                'errors' => [
                    [
                        'title' => array_key_exists($code, trans('shared.errors')) ?
                            trans('shared.errors.' . $code) :
                            trans('shared.process_error'),
                        'detail' => $message,
                        'status' => $code,
                    ]
                ]
            ];
        }

        return response()->json($response, $code);
    }
}

if (!function_exists('responseDataJson')) {
    /**
     * @param string $key
     * @param array $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    function responseDataJson(string $key, array $data, int $code): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => [
                $key => $data
            ]
        ], $code);
    }
}
