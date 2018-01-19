<?php

class Helpers
{
    public function dataSatuanBarang($selected =  null)
    {
        $dataSatuanBarang = RefSatuanBarang::find();

        $satuanBarang = '<option value="">Pilih Satuan Barang</option>';
        foreach ($dataSatuanBarang as $key => $value) {
            if($selected == $value->id){
                $satuanBarang .='<option value="'.$value->id.'" selected>'.$value->nama." - ".$value->id.'</option>';
            }else{
                $satuanBarang .='<option value="'.$value->id.'">'.$value->nama." - ".$value->id.'</option>';
            }
        }

        return $satuanBarang;
    }

    public function dataAkun($selected =  null)
    {
        $dataAkun = RefAkun::find();

        $akun = '<option value="">Pilih Akun</option>';
        foreach ($dataAkun as $key => $value) {
            if($selected == $value->id){
                $akun .='<option value="'.$value->id.'" selected>'.$value->id." - ".$value->nama.'</option>';
            }else{
                $akun .='<option value="'.$value->id.'">'.$value->id." - ".$value->nama.'</option>';
            }
        }

        return $akun;
    }

    public function dataCabang($selected = null)
    {
        $dataCabang = RefCabang::find();

        $cabang = '<option value="">Pilih Cabang</option>';
        foreach ($dataCabang as $key => $value) {
            if($selected == $value->id){
                $cabang .='<option value="'.$value->id.'" selected>'.$value->nama.'</option>';
            }else{
                $cabang .='<option value="'.$value->id.'">'.$value->nama.'</option>';
            }
        }

        return $cabang;
    }

    public function dataUser($selected = null)
    {
        $dataUser = RefUser::find();

        $user = '<option value="">Pilih Tersangka</option>';
        foreach ($dataUser as $key => $value) {
            if($selected == $value->id){
                $user .='<option value="'.$value->id.'" selected>'.$value->username.'</option>';
            }else{
                $user .='<option value="'.$value->id.'">'.$value->username.'</option>';
            }
        }

        return $user;
    }
}