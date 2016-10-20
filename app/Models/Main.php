<?php

namespace App\Models;

use Venus\Database;

/**
 * Class Main
 *
 * @package App\Models
 */
class Main {
    /**
     * @var Database
     */
    public $db;

    /**
     * @var null|\Venus\SelectDB
     */
    public $sdb;

    public function __construct() {
        $config   = array(
            'dbms'       => 'mysql',
            'type'       => Database::TYPE_PDO,
            'host'       => getenv('host'),
            'port'       => getenv('port'),
            'user'       => getenv('user'),
            'password'   => getenv('password'),
            'name'       => getenv('dbname'),
            'charset'    => "utf8",
            'persistent' => false,
        );
        $this->db = new Database($config);
        $this->db->connect();
        $this->sdb = $this->db->dbApt;
    }
}