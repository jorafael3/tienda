<?php

class View
{
    public $jsFiles = [];
    public $phpFiles = [];
    function __construct()
    {
        //echo "<br> vista base";
    }
    function render($ViewName,$assets)
    {
        require 'views/header.php';
        require 'views/' . $ViewName . '.php';
        require 'views/footer.php';
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
