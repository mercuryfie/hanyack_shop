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

    public function Load_MemberByUserid($params,$fields = ['ALL']){
        $separated_val = fn_Make_Fields($fields);
        $builder = $this->db->table('herb_shop_member');
        $builder->select($separated_val);
        $builder->where('userid', $params['userid']);
        $builder->where('is_use',1);
        $builder->where('fk_micode',$params['micode']);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function Load_MemberByPwd($params,$fields = ['ALL']){
        $separated_val = fn_Make_Fields($fields);
        $builder = $this->db->table('herb_shop_member');
        $builder->select($separated_val);
        $builder->where('userid', $params['userid']);
        $builder->where('is_use',1);
        $builder->where('fk_micode',$params['micode']);
        $builder->where("passwd = PASSWORD(" . $this->db->escape($params['passwd']) . ")", null, false);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function Load_MemberByUid($uid,$fields=['ALL']){
        $separated_val = fn_Make_Fields($fields);
        $builder = $this->db->table('herb_shop_member');
        $builder->select($separated_val);
        $builder->where('uid',$uid);
        $Query = $builder->get();
        return $Query->getResultArray();
    }



}
