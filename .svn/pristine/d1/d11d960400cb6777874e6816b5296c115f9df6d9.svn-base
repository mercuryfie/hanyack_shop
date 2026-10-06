<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class Shop_m extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = Database::connect('default');
    }

    public function Load_Shop_Medicine($params,$fields=['ALL']){
        $separated_val = fn_Make_Fields($fields);
        $builder = $this->db->table('v_pharm_medicine a');
        $builder->select($separated_val);
        $builder->where('fk_micode', $params['micode']);
        $builder->where('is_del',0);

        $sort = (($params['sorting2'] ?? 1) == 2) ? 'ASC' : 'DESC';
        if($params['sorting1']==1){
            $builder->orderby('sn',$sort);
        }else if($params['sorting1']==2){
            $builder->orderby('hn_name',$sort);
        }
        $offset = ($params['page'] - 1) * $params['pcnt'];
        $builder->limit($params['pcnt'], $offset);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function Cnt_Shop_Medicine($micode){
        $builder = $this->db->table('v_pharm_medicine a');
        $builder->where('fk_micode', $micode);
        $builder->where('is_del',0);
        return $builder->countAllResults();
    }


}