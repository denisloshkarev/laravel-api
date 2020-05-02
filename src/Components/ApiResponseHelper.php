<?php


namespace Dskripchenko\LaravelApi\Components;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

class ApiResponseHelper
{
    /**
     * @param array $data
     * @param int   $code
     *
     * @return JsonResponse
     */
    public static function say($data = [], $code = 200){
        $data = ArrayMergeHelper::merge(
            [
                'success' => Arr::pull($data, 'success', true)
            ],
            [
                'payload' => $data
            ]
        );
        return new JsonResponse($data, $code);
    }

    /**
     * @param array $data
     * @param int   $code
     *
     * @return JsonResponse
     */
    public static function sayError($data = [], $code = 200){
        return static::say(ArrayMergeHelper::merge($data, ['success' => false]), $code);
    }
}
