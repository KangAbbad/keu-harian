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

            $sql="SELECT MAX(created_at) FROM KeuHarian";

            // $created_at=date('Y-m-d H:i:s');

            // $sql_at="INSERT INTO KeuHarian (created_at) VALUES ($created_at)";
            
            $row=$this->modelsManager->executeQuery($sql/*,$sql_at*/)->toArray();

            $last_id=$row['id'];
            
            $last2digit = (int)substr($last_id,-2,2);

            $new_last_id = $last2digit +1;

            if($new_last_id<10){
                $new_last_id='0'.$new_last_id;
            }

            $new_id = $id.$new_last_id;

            // if($new_id >= 1){
            //     $new_id++;
            // }
            
            // $query = "SELECT * FROM KeuHarian WHERE id LIKE '".$id."%' ";
            // $res = str_pad(mysqli_num_rows($query)+1, 2, "0", STR_PAD_LEFT);
            // $result = $id.$res;
            // $sql="SELECT id FROM KeuHarian ORDER BY created_at DESC limit 1";
            
            // $row=$this->modelsManager->executeQuery($sql)->toArray();
            
            // $last_id=$row['id'];
            // //echo "<pre>".print_r($row,1)."</pre>";die();
            
            // $last2digit = substr($last_id,-2,2);

            // $created_at=date('Y-m-d H:i:s');

            // $komponen_id = 'MGL'.date("dmy");

            // if($new_last_id<10){
            //     $new_last_id='0'.$new_last_id;
            // }

            // $new_last_id = $last2digit +1;

            // // $new_id=$komponen_id.$new_last_id;
            // if($new_id < 10){ 
            //     $new_id=$komponen_id.'0'.$new_last_id; 
            // }else{
            //     $new_id=$komponen_id.$new_last_id;
            // }

            // $new_id++;

            $keu_harian->assign(array(
                'id' => $new_id,
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
                $notif['text']="Berhasil input data";
                $notif['type']="info";
            } else {
                $pesan_error = $keu_harian -> getMessages();
                $data_pesan_error = "";
                foreach ($pesan_error as $pesanError) {
                    $data_pesan_error = "$pesanError";
                }
                $notif['title']="Error";
                $notif['text']="Isikan form data dengan benar!";
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
                $notif['text']="Data Telah Berhasil Di Edit";
            }else{
                $pesan_error = $keu_harian->getMessages();
                $data_pesan_error ='';
                foreach ($pesan_error as $pesanError) {
                    $data_pesan_error="$pesanError";
                }
                $notif['title']="Error";
                $notif['text']="Gagal Mengedit Data";
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
                $notif['text'] = "Berhasil Menghapus Data";
                $notif['type'] = "success";
            } else {
                $pesan_error = $keu_harian -> getMessages();
                $data_pesan_error = "";
                foreach ($pesan_error as $pesanError) {
                    $data_pesan_error = "$pesanError";
                }
                $notif['title'] = "Error";
                $notif['text'] = "Gagal Menghapus";
                $notif['type'] = "error";
            }
            echo json_encode($notif);
            die();
        }
    }
}

