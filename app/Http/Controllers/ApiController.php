<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class ApiController
 *
 * @package App\Http\Controllers
 *
 * @SWG\Swagger(
 *     basePath="/api",
 *     host="modasti.uniative.com",
 *     schemes={"http"},
 *     @SWG\Info(
 *         version="1.0",
 *         title="Modasti API",
 *         @SWG\Contact(name="Modasti", url="http://modasti.uniative.com"),
 *     ),
 *     @SWG\Definition(
 *         definition="Error",
 *         required={"code", "message"},
 *         @SWG\Property(
 *             property="code",
 *             type="integer",
 *             format="int32"
 *         ),
 *         @SWG\Property(
 *             property="message",
 *             type="string"
 *         ),
 *
 *     )
 * )
 */
class ApiController extends Controller
{
    //
}
