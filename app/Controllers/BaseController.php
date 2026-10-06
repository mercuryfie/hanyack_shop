<?php

namespace App\Controllers;

use App\Libraries\Auth;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Psr\Log\LoggerInterface;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 *
 * Extend this class in any new controllers:
 * ```
 *     class Home extends BaseController
 * ```
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */

    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->request = service('request');
    }

    /**
     * 키와 인증 대상 문자열을 조합하여 SHA-256 인증키 생성
     *
     * @param string $key 비밀키 (예: bear.herbshop_BARUN)
     * @param string $auth 인증 대상 문자열 (예: 디제이허브쇼핑몰_바른한방)
     * @return string SHA-256 해시값 (64자리 소문자 hex)
     */
    public function Make_AuthKey(string $key, string $auth): string
    {
        $base64Auth = base64_encode($auth);
        $combined = $key . '||' . $base64Auth;
        return hash('sha256', $combined);
    }


    public function Verify_AuthKey(string $key, string $auth, string $clientAuthKey): bool
    {
        $generatedKey = $this->Make_AuthKey($key, $auth);
        return hash_equals($generatedKey, $clientAuthKey);
    }

    public function GetSessionData()
    {
        $session = Services::session();
        $tstr = $session->get(SESSION_KEY);
        if($tstr==''){
            helper('cookie');
            $cstr = get_cookie(COOKIE_KEY);
            if($cstr==''){
                $data = [
                    'user' => '',
                    'islogin' => false
                ];
            }else{
                $auth = New Auth;
                $info = $auth->Open_Key($cstr);
                if(fn_ArrayCnt($info)<=0){
                    $data = [
                        'user' => '',
                        'islogin' => false
                    ];
                }else{
                    $user = [
                        'uid' => $info['uid'],
                        'userid' => $info['userid'],
                        'grade' => $info['grade'],
                        'name' => $info['name'],
                        'token' => $info['token']
                    ];

                    $data = [
                        'user' => $user,
                        'islogin' => true
                    ];
                    $session->set(SESSION_KEY,$cstr);
                }
            }
        }else{
            $auth = New Auth;
            $info = $auth->Open_Key($tstr);
            if(fn_ArrayCnt($info)<=0){
                $data = [
                    'user' => '',
                    'islogin' => false
                ];
            }else{
                $user = [
                    'uid' => $info['uid'],
                    'userid' => $info['userid'],
                    'grade' => $info['grade'],
                    'name' => $info['name'],
                    'token' => $info['token']
                ];

                $data = [
                    'user' => $user,
                    'islogin' => true
                ];
            }
        }
        return $data;
    }

}
