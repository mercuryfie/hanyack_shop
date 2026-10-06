<?php
namespace App\Libraries;

class Form
{

    public function fnMake_Meta($data){
        $meta = [
            'title' => $data['h_title'],
            'h_type' => $data['h_type']
        ];
        return $meta;
    }

    public function fnMake_Header($sessionarr,$param=[]){
        $header = [];
        $islogin = $sessionarr['islogin'];
        if($islogin=='true'){
            $target = '';

            $order_m = model('Order_m');
            $cartCnt = $order_m->Cnt_MyCart_Item($sessionarr['user']['uid']);

            $header = [
                'islogin' => 'true',
                'uid' => $sessionarr['user']['uid'],
                'userid' => $sessionarr['user']['userid'],
                'cartCnt' => $cartCnt,
                'token' => $sessionarr['user']['token']
            ];
        }else{
            $header = [
                'islogin' => 'false',
                'uid' => '',
                'userid' => '',
                'cartCnt' => 0,
                'token' => ''
            ];
        }
        if(fn_ArrayCnt($param)>0){
            $header['h_key'] = $param['skey'];
        }else{
            $header['h_key'] = '';
        }
        return $header;
    }

    public function fnMake_CHeader($sessionarr,$param=[]){
        $header = [];
        $islogin = $sessionarr['islogin'];
        if($islogin=='true'){
            $order_m = model('Order_m');
            $cartCnt = $order_m->Cnt_MyCart_Item($sessionarr['user']['uid']);

            $header = [
                'islogin' => 'true',
                'uid' => $sessionarr['user']['uid'],
                'userid' => $sessionarr['user']['userid'],
                'cartCnt' => $cartCnt,
                'token' => $sessionarr['user']['token']
            ];
        }else{
            $header = [
                'islogin' => 'false',
                'uid' => '',
                'userid' => '',
                'cartCnt' => 0,
                'token' => ''
            ];
        }
        if(fn_ArrayCnt($param)>0){
            $header['h_key'] = $param['skey'];
        }else{
            $header['h_key'] = '';
        }
        return $header;
    }

    public function fnMake_Search($s_data){
        $searchData = '';
        return $searchData;
    }

    public function fnMake_Left($sessionarr){
        $left = [];
        $islogin = $sessionarr['islogin'];
        if($islogin=='true'){
            $left = [
                'type' => $sessionarr['user']['mi_type'] ,
                'name' => $sessionarr['user']['mi_name']
            ];
        }else{
            $left = [
                'type' => '' ,
                'name' => '' 
            ];
        }
        return $left;
    }

}