<?php

class RefCabang extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(type="string", length=3, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=false)
     */
    public $nama;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $alamat;

    /**
     *
     * @var string
     * @Column(type="string", length=16, nullable=false)
     */
    public $ketua;

    /**
     *
     * @var integer
     * @Column(type="integer", length=32, nullable=false)
     */
    public $lat;

    /**
     *
     * @var integer
     * @Column(type="integer", length=32, nullable=false)
     */
    public $long;

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
        return 'ref_cabang';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RefCabang[]|RefCabang
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RefCabang
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    // public function getData() 
    // {

    //    $requestData = $_REQUEST;

    //    $sql = "SELECT * FROM RefCabang";
    //    $query = $this->modelsManager->executeQuery($sql);

    //    $data = array();
    //    $no = $requestData['start']+1;

    //    foreach($query as $key => $value) {
    //       $dataCabang = array();
    //       $dataCabang[] = $no;
    //       $dataCabang[] = $value->id;
    //       $dataCabang[] = $value->nama;
    //       $dataCabang[] = $value->alamat;
    //       $dataCabang[] = $value->ketua;
    //       $dataCabang[] = $value->lat;
    //       $dataCabang[] = $value->long;
    //       $dataCabang[] = '
    //         <div class="btn-group-vertical">
    //             <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default" onclick="return send_data_edit(\''.$value->id.'\');">Edit</button>
    //             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete" onclick="return send_data_delete(\''.$value->id.'\');">Delete</button>
    //         </div>
    //         ';
          
    //       $data[] = $dataCabang;
    //       $no++;
    //    }

    //    $json_data = array(
    //       "draw"            => intval( $requestData['draw'] ),
    //       "recordsTotal"    => intval( $totalData ),
    //       "recordsFiltered" => intval( $totalFiltered ),
    //       "data"            => $data
    //    );

    //    return $json_data;
    // }
}
