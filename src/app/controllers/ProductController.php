<?php

use Phalcon\Mvc\Controller;
session_start();

// defalut controller view
class ProductController extends Controller
{
    public function indexAction()
    {
        //   default action
    }
    public function toysAction()
    {
        $_SESSION['track']['toys']+=1;
        if ($this->cookies->has("login")) {
            $collection = $this->mongo->products;
            $m = $collection->find(["category"=>"toys"]);
            $this->view->data=$m;
            // echo $this->tag->linkTo(['logout', 'Logout', 'class' => 'btn btn-primary']);
        } else {
            echo "access denied :(";
            die;
            $this->response->redirect('login/index');
        }
    }
    public function clothingAction()
    {
        $_SESSION['track']['clothing']+=1;
        if ($this->cookies->has("login")) {
            $collection = $this->mongo->products;
            $m = $collection->find(["category"=>"clothing"]);
            $this->view->data=$m;
            // echo $this->tag->linkTo(['logout', 'Logout', 'class' => 'btn btn-primary']);
        } else {
            echo "access denied :(";
            die;
            $this->response->redirect('login/index');
        }
    }
    public function electronicsAction()
    {
        $_SESSION['track']['ele']+=1;
         if ($this->cookies->has("login")) {
            $collection = $this->mongo->products;
            $m = $collection->find(["category"=>"electronics"]);
            $this->view->data=$m;
            // echo $this->tag->linkTo(['logout', 'Logout', 'class' => 'btn btn-primary']);
        } else {
            echo "access denied :(";
            die;
            $this->response->redirect('login/index');
        }
    }
}
