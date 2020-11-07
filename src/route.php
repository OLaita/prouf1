<?php

    function getRoute(){

        if(isset($_REQUEST['url'])){
            $url=$_REQUEST['url'];
        }else{
            $url="home";
        }

        switch($url){
            case 'profile':
                return 'profile';
            case 'login':
               return 'login';
            case 'home':
                return 'home';
            case 'login-register':
                return 'login-register';
            case 'registro':
                return 'registro';
            case 'logout':
                return 'logout';
            case 'allTask':
                return 'allTask';
            case 'newTask':
                return 'newTask';
            case 'task':
                return 'task';
            case 'taskNew':
                return 'taskNew';
            case 'udTask':
                return 'udTask';
            case 'updateTask':
                return 'updateTask';
            default:
                return 'home';
        }

    }