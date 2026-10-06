<?php

namespace App\Models;


use CodeIgniter\Model;
use Config\Database;

class Order_m extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();

        $this->db = Database::connect('default');
    }

    public function Cnt_MyCart_Item($uid){
        $builder = $this->db->table('herb_shop_cart a');
        $builder->join('v_pharm_medicine b', 'a.fk_hncode = b.hn_code', 'inner');
        $builder->where('a.fk_uid',$uid);
        $builder->where('a.is_del',0);
        return $builder->countAllResults();
    }

}