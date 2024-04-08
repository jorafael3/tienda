<?php


class Controller
{

    protected $view;
    protected $model;
    protected $jsFiles = [];
    protected $phpFiles = [];
    protected $assets = [];

    function __construct()
    {
        // echo "<br>controlador base";
        $this->view = new View();
        //$this->logmodel = new LogModel();
    }

    function loadModel($model)
    {
        $url = 'models/' . $model . 'model.php';
        //echo $url;
        if (file_exists($url)) {
            require_once $url;
            $modelName = $model . 'Model';
            $this->model = new $modelName();
        } else {
        }
    }

    protected function SetAssetsToView(array $assets, string $view)
    {
        $this->assets[$view] = $assets;
    }

    protected function loadAssetsForView(string $view)
    {
        if (isset($this->assets[$view])) {
            $this->loadAssets($this->assets[$view]);
        }
    }

    protected function loadAssets(array $assets)
    {
        echo "<script src='funciones/functions.js'></script>";
        foreach ($assets as $asset) {
            // Verifica si el archivo es JavaScript o PHP y actúa en consecuencia
            if (pathinfo($asset, PATHINFO_EXTENSION) === 'php') {
                require_once 'funciones/' . $asset;
            } else {
                echo "<script src='funciones/$asset'></script>";
            }
        }
    }
}
