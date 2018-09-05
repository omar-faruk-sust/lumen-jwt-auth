<?php
/**
 * Created by PhpStorm.
 * User: omarf
 * Date: 9/4/2018
 * Time: 9:45 AM
 */

namespace App\Http\Controllers;

class BaseController extends Controller
{
    /**
     * @param $errcode
     * @param $errmsg
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($errcode, $errmsg)
    {
        return response()->json([
            'error_code' => $errcode,
            'error_message' => $errmsg
        ], 401);
    }

    /**
     * @param int $errcode
     * @param $validator
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorValidator($errcode = 40001, $validator)
    {
        return $this->error($errcode, $validator->errors());
    }
}