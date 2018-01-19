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

}
