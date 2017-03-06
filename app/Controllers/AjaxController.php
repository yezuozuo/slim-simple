<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class AjaxController
 *
 * @package App\Controllers
 */
class AjaxController extends Controller {

    /**
     * @param Request  $request
     * @param Response $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function line($request, $response) {
        return $response->withJson([
            'total' => 7,
            'data1' => [1,2,3,4,5,6,7],
            'data2' => [3,3,5,4,2,2,2],
            'data3' => [4,6,2,7,9,0,2],
        ]);
    }
}