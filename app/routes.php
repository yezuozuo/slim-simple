<?php

$app->get('/','HomeController:index');

/** lab **/
$app->get('/lab/db','HomeController:db');

$app->get('/lab/contact',function ($request, $response){
    return $this->view->render($response,'/module/contacts.twig');
});

$app->get('/lab/echarts',function ($request, $response){
    return $this->view->render($response,'/module/charts/echarts.twig');
});

$app->get('/lab/echarts/bar',function ($request, $response){
    return $this->view->render($response,'/module/charts/bar.twig');
});

$app->get('/lab/echarts/line',function ($request, $response){
    return $this->view->render($response,'/module/charts/line.twig');
});

$app->get('/lab/echarts/pie',function ($request, $response){
    return $this->view->render($response,'/module/charts/pie.twig');
});

$app->get('/lab/table',function ($request, $response){
    return $this->view->render($response,'/module/table.twig');
});

/** end lab **/