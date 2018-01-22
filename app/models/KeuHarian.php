<?php

class KeuHarian extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(type="string", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=3, nullable=false)
     */
    public $cabang_id;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $tanggal;

    /**
     *
     * @var string
     * @Column(type="string", length=64, nullable=false)
     */
    public $nama_barang;

    /**
     *
     * @var string
     * @Column(type="string", length=3, nullable=false)
     */
    public $akun_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=3, nullable=false)
     */
    public $jml_barang;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $harga_satuan;

    /**
     *
     * @var string
     * @Column(type="string", length=8, nullable=false)
     */
    public $satuan_barang_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $total_harga;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $debit;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $kredit;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $keterangan;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=false)
     */
    public $pelaku;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("QODR");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'keu_harian';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return KeuHarian[]|KeuHarian
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return KeuHarian
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function getDataKeuHarian()
    {
        $requestData = $_REQUEST;
        // echo "<pre>".print_r($_REQUEST)."</pre>";
        $requestData = strtoupper($_REQUEST['search']['value']);

        $columns = array(
            0 => 'cabang_id',
            1 => 'tanggal',
            2 => 'nama_barang',
            3 => 'akun_id',
            4 => 'jml_barang',
            5 => 'harga_satuan',
            6 => 'satuan_barang_id',
            7 => 'total_harga',
            8 => 'debit',
            9 => 'kredit',
            10 => 'keterangan',
            11 => 'pelaku',
        );
        // b.cabang_id, b.tanggal, b.nama_barang, b.akun_id, b.jml_barang, b.harga_satuan, b.satuan_barang_id, b.total_harga, b.debit, b.kredit, b.keterangan, b.pelaku
        // $sql = "SELECT b.*, a.nama FROM KeuHarian AS b INNER JOIN RefCabang as a ON (b.cabang_id=a.id)";
        // $sql = "SELECT A.*,B.nama  FROM KeuHarian AS A INNER JOIN RefCabang as B ON A.cabang_id=B.id";
        // $sql = "SELECT kh.*, rc.nama as namacabang FROM RefCabang rc, KeuHarian kh WHERE kh.cabang_id = rc.nama";
        // $sql = "SELECT kh.*, rc.nama as namacabang FROM KeuHarian kh, RefCabang rc WHERE kh.cabang_id = rc.id GROUP BY kh.tanggal";

        $sql = "SELECT * FROM KeuHarian";
        $query = $this->modelsManager->executeQuery($sql);
        $totalData = count($query);
        $totalFiltered = $totalData;

        $no = $_REQUEST['start']+1;
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];

        if(!empty($requestSearch)) {
            //function mencari data user
            $sql = "SELECT * FROM KeuHarian WHERE cabang_id LIKE '%".$requestSearch."%'";
            $sql.= "OR tanggal LIKE '%".$requestSearch."%'";
            $sql.= "OR nama_barang LIKE '%".$requestSearch."%'";
            $sql.= "OR akun_id LIKE '%".$requestSearch."%'";
            $sql.= "OR jml_barang LIKE '%".$requestSearch."%'";
            $sql.= "OR harga_satuan LIKE '%".$requestSearch."%'";
            $sql.= "OR satuan_barang_id LIKE '%".$requestSearch."%'";
            $sql.= "OR total_harga LIKE '%".$requestSearch."%'";
            $sql.= "OR debit LIKE '%".$requestSearch."%'";
            $sql.= "OR kredit LIKE '%".$requestSearch."%'";
            $sql.= "OR keterangan LIKE '%".$requestSearch."%'";
            $sql.= "OR pelaku LIKE '%".$requestSearch."%'";
            $query = $this->modelsManager->executeQuery($sql);
            $totalFiltered = count($query);

            
            $sql.=" ORDER BY ". $columns[$_REQUEST['order'][0]['column']]."   ".$_REQUEST['order'][0]['dir']."   LIMIT ".$_REQUEST['start']." ,".$_REQUEST['length']."   "; 
            $query = $this->modelManager->executeQuery(sql);

        } else {
            //function menampilkan seluruh data
            
            // $sql = "SELECT A.*,B.nama  FROM KeuHarian AS A JOIN RefCabang as B ON A.cabang_id=B.id";
            // $sql = "SELECT a.*, SUM(h.kredit) as Pengeluaran, 
            //         date_format(h.tanggal, '%Y-%m') as Bulan,
            //         h.akun_id as Kode 
            //         FROM RefAkun a, KeuHarian h 
            //         WHERE h.akun_id = a.id 
            //         GROUP BY Bulan, h.akun_id";
            // $sql = "SELECT * FROM KeuHarian";
            // $sql = "SELECT k.*, c.nama FROM KeuHarian k, RefCabang c WHERE k.cabang_id = c.id";
            // $sql = "SELECT kh.*, rc.id FROM KeuHarian kh, RefCabang rc WHERE kh.cabang_id = rc.id";

            // $sql = "SELECT b.cabang_id , a.nama FROM KeuHarian AS b INNER JOIN RefCabang as a ON (b.cabang_id=a.id) limit $start,$length";
            // $sql = "SELECT * FROM KeuHarian limit $start,$length";

            $sql = "SELECT kh.*, rc.*, ra.*, sb.*, ru.* FROM KeuHarian kh, RefCabang rc, RefAkun ra, RefSatuanBarang sb, RefUser ru WHERE kh.cabang_id = rc.id AND kh.akun_id = ra.id AND kh.satuan_barang_id = sb.id AND kh.pelaku = ru.id ORDER BY kh.tanggal DESC limit $start, $length";
            $query = $this->modelsManager->executeQuery($sql);
        }

        $data = array();

        foreach($query as $key => $value) {
            $dataKeuHarian = array();
            $dataKeuHarian[] = $no;
            $dataKeuHarian[] = $value->rc->nama;
            $dataKeuHarian[] = $value->kh->tanggal;
            $dataKeuHarian[] = $value->kh->nama_barang;
            $dataKeuHarian[] = $value->ra->nama;
            $dataKeuHarian[] = $value->kh->jml_barang;
            $dataKeuHarian[] = $value->kh->harga_satuan;
            $dataKeuHarian[] = $value->sb->nama;
            $dataKeuHarian[] = $value->kh->total_harga;
            $dataKeuHarian[] = $value->kh->debit;
            $dataKeuHarian[] = $value->kh->kredit;
            $dataKeuHarian[] = $value->kh->keterangan;
            $dataKeuHarian[] = $value->ru->username;
            $dataKeuHarian[] = '
            <div class="btn-group-vertical">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default" onclick="return send_data_edit(\''.$value->kh->id.'\');">Edit</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete" onclick="return send_data_delete(\''.$value->kh->id.'\');">Delete</button>
            </div>
            ';

            $data[] = $dataKeuHarian;
            $no++;
        }

        $json_data = array(
                "draw" => intval($_REQUEST['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
        );

        return $json_data;
    }
}