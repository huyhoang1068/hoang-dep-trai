<?php

class Controller{

    public function app_Models($nameModel = '') {

        if (file_exists('./App/Models/' . $nameModel . '.php')){
            include './App/Models/' . $nameModel . '.php';

            $model = explode("/", $nameModel);
            $model = end($model);
            return new $model;
        }     
    }

    public function app_Views($nameView = '', $data_controller = []) {
        if (file_exists('./App/Views/' . $nameView . '.php')){
            include './App/Views/' . $nameView . '.php';
        }   
    }

}