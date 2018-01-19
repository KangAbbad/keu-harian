<?php

use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class KeuHarianController extends \Phalcon\Mvc\Controller
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
        $keu_harian = new KeuHarian();
        $json_data = $keu_harian->getDataKeuHarian();
        die(json_encode($json_data));
    }

    public function listKeuHarianAction()
    {
        $this->view->data_keu_harian = KeuHarian::find();
        $this->view->pick("keu_harian/list");
        $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    public function getDataAction($id)
    {
        $data_keu_harian = KeuHarian::findFirst("id='$id'");
        die(json_encode($data_keu_harian));
    }

    public function addKeuHarianAction()
    {
        $keu_harian = new KeuHarian();

        if($this->request->isPost()){
            $cabang_id = $this->request->getPost('cabang_id');
            $tanggal = $this->request->getPost('tanggal');
            $nama_barang = $this->request->getPost('nama_barang');
            $akun_id = $this->request->getPost('akun_id');
            $jml_barang = $this->request->getPost('jml_barang');
            $harga_satuan = $this->request->getPost('harga_satuan');
            $satuan_barang_id = $this->request->getPost('satuan_barang_id');
            $total_harga = $this->request->getPost('total_harga');
            $debit = $this->request->getPost('debit');
            $kredit = $this->request->getPost('kredit');
            $keterangan = $this->request->getPost('keterangan');
            $pelaku = $this->request->getPost('pelaku');
            
            $date = new DateTime($tanggal);
            $tanggal_id = $date->format('ymd');
            $id = $cabang_id.$tanggal_id;

            $keu_harian->assign(array(
                'id' => $id,
                'cabang_id' => $cabang_id,
                'tanggal' => $tanggal,
                'nama_barang' => $nama_barang,
                'akun_id' => $akun_id,
                'jml_barang' => $jml_barang,
                'harga_satuan' => $harga_satuan,
                'satuan_barang_id' => $satuan_barang_id,
                'total_harga' => $total_harga,
                'debit' => $debit,
                'kredit' => $kredit,
                'keterangan' => $keterangan,
                'pelaku' => $pelaku
            ));

            if($keu_harian->save()){
                $notif['title']="Sukses";
                $notif['text']="Aktifkan status RBT&GRATIS ganti di *123*1819# atau telpon ke 1819. Rp5rb/30hr. Info:817";
                $notif['type']="info";
            } else {
                $pesan_error = $keu_harian -> getMessages();
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

    public function editKeuHarianAction()
    {
        if ($this->request->isPost()) {
            $id                 = $this->request->getPost('id');            
            $cabang_id          = $this->request->getPost('cabang_id');
            $tanggal            = $this->request->getPost('tanggal');
            $nama_barang        = $this->request->getPost('nama_barang');            
            $akun_id            = $this->request->getPost('akun_id');            
            $jml_barang         = $this->request->getPost('jml_barang');            
            $harga_satuan       = $this->request->getPost('harga_satuan');            
            $satuan_barang_id   = $this->request->getPost('satuan_barang_id');            
            $total_harga        = $this->request->getPost('total_harga');            
            $debit              = $this->request->getPost('debit');            
            $kredit             = $this->request->getPost('kredit');            
            $keterangan         = $this->request->getPost('keterangan');
            $pelaku             = $this->request->getPost('pelaku');            
            
            $keu_harian               = KeuHarian::findFirst("id='$id'");
            
            $keu_harian->assign(array(
                'id'                => $id,
                'cabang_id'         => $cabang_id,
                'tanggal'           => $tanggal,
                'nama_barang'       => $nama_barang, 
                'akun_id'           => $akun_id,
                'jml_barang'        => $jml_barang,
                'harga_satuan'      => $harga_satuan,
                'satuan_barang_id'  => $satuan_barang_id,
                'total_harga'       => $total_harga,
                'debit'             => $debit,
                'kredit'            => $kredit,
                'keterangan'        => $keterangan,
                'pelaku'            => $pelaku,
               
            ));

            if ($keu_harian->save()) {
                $notif['title']="Sukses";
                $notif['text']="Yuk gabung di *123*369*5# kamu bisa dapat hadiah Motor seharga 50jt lohh, buruan jangan sampai ketinggalan #GebyarBCA";
            }else{
                $pesan_error = $keu_harian->getMessages();
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

    public function deleteKeuHarianAction()
    {
        if($this->request->isPost()){
            $id = $this->request->getPost('id');

            $keu_harian = KeuHarian::findFirst("id='$id'");

            if($keu_harian->delete()){
                $notif['title'] = "Sukses";
                $notif['text'] = "Cek *123*92*5# untuk raih PULSA senilai 100rb+GRATIS RBT CS:817.";
                $notif['type'] = "success";
            } else {
                $pesan_error = $keu_harian -> getMessages();
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

