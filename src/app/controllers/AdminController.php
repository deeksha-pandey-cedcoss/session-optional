<?php

use Phalcon\Mvc\Controller;
session_start();
// defalut controller view
class AdminController extends Controller
{
    public function indexAction()
    {
        //   default action

        echo "<pre>";
        print_r($_SESSION['track']);
        die;
    }

}
