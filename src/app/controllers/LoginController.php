<?php

use Phalcon\Mvc\Controller;
session_start();
// login controller
class LoginController extends Controller
{
    public function indexAction()
    {
        // default login view
    }
    // login action page
    public function loginAction()
    {
        if ($this->request->isPost()) {
            $password1 = $this->request->getPost("password");
            $email1 = $this->request->getPost("email");
        }

        $collection = $this->mongo->Users;
        $m = $collection->findOne(["email" => $_POST['email'], "password" => $_POST['password']]);
        if ($m->email !== null) {

         
            $_SESSION['track'] = [
                'uemail' => $m->email,
                'toys' => 0,
                'ele' => 0,
                'clothing' => 0,

            ];
            $this->view->message = "LOGIN SUCCESSFULLY";
            $this->cookies->set('login', 1, time() + 15 * 86400);
            $this->response->redirect('product/index');
        } else {

            $this->view->message = "Not Login succesfully ";
            $this->response->redirect('login/index');
        }
    }
}
