<?php

namespace App\Controllers;

use App\DTOs\ResultDTO;
use App\Libraries\Auth;
use CodeIgniter\API\ResponseTrait;

class ApiCommonController extends BaseController
{
    use ResponseTrait;

    public function Process_Login()
    {
        $params = $this->request->getPost('params') ?? [];
        if (!is_array($params) || empty($params)) {
            return $this->respond(ResultDTO::fail('Error001', [], '올바른 데이터 형식이 아닙니다.'));
        }

        $userid  = trim($params['userid'] ?? '');
        $pwd     = trim($params['pwd'] ?? '');
        $is_auto = (int)($params['is_auto'] ?? 0);
        $is_save = (int)($params['is_save'] ?? 0);

        if (empty($userid) || empty($pwd)) {
            return $this->respond(ResultDTO::fail('Error002', [], '잘못된 접근입니다.'));
        }

        $datas = [
            'userid' => $userid,
            'passwd' => $pwd,
            'micode' => MAIN_COM_CODE
        ];

        $member_m = model('Member_m');
        $dRs = $member_m->Load_MemberByUserid($datas);
        if (empty($dRs)) {
            return $this->respond(ResultDTO::fail('Error003', [], '존재하지 않는 아이디 입니다.'));
        }

        $dRs2 = $member_m->Load_MemberByPwd($datas);
        if (empty($dRs2)) {
            return $this->respond(ResultDTO::fail('Error004', [], '입력된 아이디의 비밀번호가 일치하지 않습니다.'));
        }

        $auth = new Auth;
        $LoginInfo = [
            'uid'    => $dRs2[0]['uid'],
            'userid' => $dRs2[0]['userid'],
            'grade'  => $dRs2[0]['grade'],
            'name'  => $dRs2[0]['name'],
            'token' => $auth->Make_Key($dRs2[0]['token'])
        ];
        $security = $auth->Make_Key($LoginInfo);
        if (empty($security)) {
            return $this->respond(ResultDTO::fail('Error005', [], '회원정보 암호화에 실패 하였습니다.'));
        }

        helper('cookie');
        $session = service('session');
        $session->set(SESSION_KEY, $security);

        $redirectUrl = get_cookie('redirect_url');
        $rUrl = '';
        if (!empty($redirectUrl) && $redirectUrl !== 'null') {
            $decodedUrl = urldecode($redirectUrl);
            if (str_starts_with($decodedUrl, BASE_URL)) {
                $rUrl = $decodedUrl;
            }
            delete_cookie('redirect_url', '', '/');
        }

        if ($is_auto === 1) {
            delete_cookie(COOKIE_KEY, ROOT_COOKIE_DOMAIN, '/');
            $cookie = [
                'name'   => COOKIE_KEY,
                'value'  => $security,
                'expire' => 86400 * 30,
                'domain' => ROOT_COOKIE_DOMAIN,
                'path'   => '/',
                'prefix' => ''
            ];
            set_cookie($cookie);
        } else {
            delete_cookie(COOKIE_KEY, ROOT_COOKIE_DOMAIN, '/');
        }

        if ($is_save === 1) {
            $cookie = [
                'name'   => COOKIE_SAVE_KEY,
                'value'  => $userid,
                'expire' => 86400 * 365,
                'domain' => ROOT_COOKIE_DOMAIN,
                'path'   => '/',
                'prefix' => ''
            ];
            set_cookie($cookie);
        } else {
            delete_cookie(COOKIE_SAVE_KEY, ROOT_COOKIE_DOMAIN, '/');
        }

        $i_arr = [
            [
                'rUrl' => $rUrl ?: '/'
            ]
        ];
        return $this->respond(ResultDTO::success($i_arr));
    }




}