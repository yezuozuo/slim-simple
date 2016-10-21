<?php

namespace App\Controllers;

use App\Models\Main;

/**
 * Class HomeController
 *
 * @package App\Controllers
 */
class HomeController extends Controller {

    /**
     * @param $request
     * @param $response
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index($request, $response) {
        //$this->flash->addMessage('info', 'This is a message');
        //$this->flash->addMessage('error', 'This is a message');

        return $this->view->render($response, 'home.twig');
    }

    /**
     *
     */
    public function db() {
        $model = new Main();
        $sdb   = $model->sdb;
        $sdb->select('*'); //$sdb->select('*',true);
        $sdb->from('d_users');
        $sdb->where('id=1'); //$sdb->where('*id=1',true);
        $sdb->order('id desc');
        $sdb->limit(1);
        var_dump($sdb->getAll());
    }
}