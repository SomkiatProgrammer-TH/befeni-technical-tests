<?php

namespace Befeni\Model;

class ShirtOrderRepository
{
	private $conn;
    private $table = "ShirtOrderRepository";
    
    /**
     * The id of the shirt order repository
     *
     * @var integer
     */
    public $id;

    /**
     * The id of the shop order
     *
     * @var integer
     */
    public $shoporderId;
     
    /**
     * The data source
     *
     * @var string
     */
    public $source;
	
	public function __construct($conn) {
        $this->conn = $conn;
    }

    /**
     * Insert data into DB
     *
     * @return integer
     */
    public function insert() {

        $sql = "INSERT INTO `$this->table` SET 
        `shoporderId`='$this->shoporderId', 
        `source`='$this->source'
        ";

        return $this->conn->exec($sql);

    }
}