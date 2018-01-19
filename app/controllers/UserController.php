<?php
use Phalcon\Mvc\View;
use Phalcon\Security;
use Phalcon\Mvc\Model\Criteria;

class UserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        if(!$this->session->has('auth')){
            $this->response->redirect('login');
        }

        $data_user = User::find('');
        $this->view->data_user = $data_user;
    }

    public function getAjaxAction()
    {
        $user = new User();
        $json_data = $user->getDataUser();
        die(json_encode($json_data));
    }

    public function listUserAction()
    {
        $this->view->data_user = User::find();
        $this->view->pick("user/list");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function getDataAction($id)
    {
        $data_user = User::findFirst("id='$id'");
        die(json_encode($data_user));
    }

    public function searchAction()
    {
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "User", $this->request->getPost());
            $this->persistent->searchParams = $query->getParams();
        } 

        $parameters = array();

        if ($this->persistent->searchParams) {
            $parameters = $this->persistent->searchParams;
        }

        $user = User::find($parameters);
        $this->view->search=$user;
    }

    public function addUserAction()
    {
        $user = new User();

        if($this->request->isPost()){
            $cabang_id = $this->request->getPost('cabang_id');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $type = $this->request->getPost('type');
            $id = "ID-".$username;

            $user->assign(array(
                'id' => $id,
                'cabang_id' => $cabang_id,
                'username' => $username,
                'password' => $this->security->hash($password),
                'type' => $type
            ));

            if($user->save()){
                $notif['title']="Sukses";
                $notif['text']="Aktifkan status RBT&GRATIS ganti di *123*1819# atau telpon ke 1819. Rp5rb/30hr. Info:817";
                $notif['type']="info";
            } else {
                $pesan_error = $user -> getMessages();
                $data_pesan_error = "";
                foreach ($pesan_error as $pesanError) {
                    $data_pesan_error = "$pesanError";
                }
                $notif['title']="Error";
                $notif['text']="Waduh bang, data kaga kesimpen!";
                $notif['type']="error";
            }
            echo json_encode($notif);
            die();
        }
    }

    public function editUserAction()
    {
        if ($this->request->isPost()) {
            $id = $this->request->getPost('id');
            $cabang_id  = $this->request->getPost('cabang_id');
            $username  = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $type = $this->request->getPost('type');
            
            $user = User::findFirst("id='$id'");

            $user->assign(array(
                'id' => $id,
                'cabang_id' => $cabang_id,
                'username' => $username,
                'password' => $this->security->hash($password),
                'type' => $type
            ));

            if ($user->save()) {
                $notif['title']="Sukses";
                $notif['text']="Yuk gabung di *123*369*5# kamu bisa dapat hadiah Motor seharga 50jt lohh, buruan jangan sampai ketinggalan #GebyarBCA";
            }else{
                $pesan_error = $user->getMessages();
                $data_pesan_error ='';
                foreach ($pesan_error as $pesanError) {
                    $data_pesan_error="$pesanError";
                }
                $notif['title']="Error";
                $notif['text']="Waduh bang, data kaga kesimpen!";
                $notif['type']="error";
            }
            echo json_encode($notif);
            die();
        }
    }

    public function deleteUserAction()
    {
        if($this->request->isPost()){
            $id = $this->request->getPost('id');

            $user = User::findFirst("id='$id'");

            if($user->delete()){
                $notif['title'] = "Sukses";
                $notif['text'] = "Cek *123*92*5# untuk raih PULSA senilai 100rb+GRATIS RBT CS:817.";
                $notif['type'] = "success";
            } else {
                $pesan_error = $user -> getMessages();
                $data_pesan_error = "";
                foreach ($pesan_error as $pesanError) {
                    $data_pesan_error = "$pesanError";
                }
                $notif['title'] = "Error";
                $notif['text'] = "Waduh bang, data kaga kesimpen!";
                $notif['type'] = "error";
            }
            echo json_encode($notif);
            die();
        }
    }
}