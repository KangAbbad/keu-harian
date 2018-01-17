<?php

use Phalcon\Mvc\View;
use Phalcon\Security;

class LoginController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->pick("login/index");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function _registerSession(User $user)
    {
        $this->session->set('auth', array(
            'cabang_id' => $user->cabang_id,
            'username' => $user->username,
            'type' => $user->type,
        ));
    }

    public function aksiLoginAction()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = User::findFirst("username='$username'");
        
        // cek user ada atau tidak
        if($user) {
            if($this->security->checkHash(trim($password), trim($user->password))){
                //Cek password
                $this->_registerSession($user);
                $this->response->redirect('user');
            } else {
                $this->response->redirect('login');
            }
        } else {
            echo "Username tidak tersedia";
            return $this->response->redirect('login');
        }
    }
    
    public function aksiLogoutAction()
    {
        $this->session->destroy();
        return $this->response->redirect('login');
    }
}