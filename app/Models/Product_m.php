<?php

namespace App\Models;


use CodeIgniter\Model;
use Config\Database;

class Member_m extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();

        $this->db = Database::connect('default');
    }


}