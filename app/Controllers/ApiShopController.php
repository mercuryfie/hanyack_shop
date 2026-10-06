<?php

namespace App\Controllers;

use App\DTOs\ResultDTO;
use CodeIgniter\API\ResponseTrait;
use Carbon\Carbon;

class ApiShopController extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {

    }

    public function Load_Shop_Medicine()
    {
        $sessinarr = $this->GetSessionData();
        if (!$sessinarr['islogin']) {
            return $this->respond(ResultDTO::fail('NoLogin', [], '로그인 세션이 만료되었습니다. 다시 로그인해 주세요.'));
        }
        if (!Check_Token($sessinarr)) {
            return $this->respond(ResultDTO::fail('Error001', [], '잘못된 토큰입니다.'));
        }
        $shopcode = MAIN_COM_CODE;
        if(empty($shopcode)){
            return $this->respond(ResultDTO::fail('Error003', [], '잘못된 접근입니다.'));
        }
        $params = $this->request->getPost('params') ?? [];
        if (!is_array($params) || empty($params)) {
            return $this->respond(ResultDTO::fail('Error004', [], '올바른 데이터 형식이 아닙니다.'));
        }

        $page = $params['page'] ?? 1;
        $datas = [
            'micode' => $shopcode,
            'sorting1' => $params['sorting1'] ?? 1,
            'sorting2' => $params['sorting2'] ?? 1,
            'page' => $page,
            'pcnt' => $params['pcnt'] ?? 1,
        ];

        $shop_m = model('Shop_m');
        $totalRs = $shop_m->Cnt_Shop_Medicine($shopcode);
        $sRs = $shop_m->Load_Shop_Medicine($datas);

        $i_arr = [
            'list' => $sRs,
            'tcnt' => count($sRs),
            'nPage' => $page+1,
            'totalRs' => $totalRs
        ];
        return $this->respond(ResultDTO::success($i_arr));
    }





}
