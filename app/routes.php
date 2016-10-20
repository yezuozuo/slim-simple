<?php

$app->get('/','HomeController:index');

/**
 * lab
 */
$app->get('/db','HomeController:db');

$app->get('/contact',function ($request, $response){
    return $this->view->render($response,'/module/contacts.twig');
});

$app->get('/echarts',function ($request, $response){
    return $this->view->render($response,'/module/charts/echarts.twig');
});

$app->get('/echarts/bar',function ($request, $response){
    return $this->view->render($response,'/module/charts/bar.twig');
});

$app->get('/echarts/line',function ($request, $response){
    return $this->view->render($response,'/module/charts/line.twig');
});

$app->get('/echarts/pie',function ($request, $response){
    return $this->view->render($response,'/module/charts/pie.twig');
});
/**
 * end lab
 */