<?php

namespace App\Controllers;

use App\Libraries\Auth;
use App\Libraries\Form;
use App\Libraries\Utils;
use CodeIgniter\API\ResponseTrait;

class MemberController extends BaseController
{

    use ResponseTrait;


    public function Login()
    {
        $sessinarr = $this->GetSessionData();

        helper(filenames: 'cookie');
        $saveid = get_cookie(index: COOKIE_SAVE_KEY);
        $autologin = get_cookie(index: COOKIE_KEY);

        $data = [
            'saveid' => $saveid,
            'autologin' => $autologin,
        ];
        $metaarr = [
            'h_title' => MAIN_COM_TITLE . ' 로그인',
            'h_type' => 1
        ];

        $form = new Form;
        $main_data = [
            'meta' => $form->fnMake_Meta($metaarr),
            'header' => $form->fnMake_Header($sessinarr),
            'body' => $data
        ];

        return view('web/common/login_View', $main_data);
    }

    public function LogOut()
    {
        $session = service('session');
        $session->remove(SESSION_KEY);
        $session->destroy();

        return redirect()->to('/')->deleteCookie(COOKIE_KEY, ROOT_COOKIE_DOMAIN, '/');
    }



    public function Join()
    {
        $sessinarr = $this->GetSessionData();

        helper(filenames: 'cookie');
        $saveid = get_cookie(index: 'dj_save');

        $prev_url = previous_url();
        if ($prev_url == '' || stripos($prev_url, 'login') !== false) {
            $rec_url = '';
        } else {
            $rec_url = $prev_url;
        }

        $data = [
            'saveid' => $saveid,
            'rec_url' => $rec_url
        ];

        $metaarr = [
            'h_title' => '로그인',
            'h_type' => 1
        ];

        $form = new Form;
        $main_data = [
            'meta' => $form->fnMake_Meta($metaarr),
            'header' => $form->fnMake_Header($sessinarr),
            'main' => $data
        ];

        return view('web/common/join_View', $main_data);
    }
}