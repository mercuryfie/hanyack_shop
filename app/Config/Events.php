<?php

namespace Config;

use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;
use CodeIgniter\HotReloader\HotReloader;

/*
 * --------------------------------------------------------------------
 * Application Events
 * --------------------------------------------------------------------
 */


Events::on('pre_system', static function (): void {
    $domain = defined('BASE_DOMAIN') ? BASE_DOMAIN : '';

    $domainMain  = env('DOMAIN_MAIN', 'test.herbshop.kr');
    $domainCk    = env('DOMAIN_CK', 'ckshop.djherb.kr');
    $domainBarun = env('DOMAIN_BARUN', 'barun.djherb.kr');

    switch ($domain) {
        case $domainCk:
            defined('MAIN_COM_CODE')       || define('MAIN_COM_CODE', '73987727');
            defined('MAIN_COM_TITLE')      || define('MAIN_COM_TITLE', '씨케이 쇼핑몰');
            defined('SECRETKEY')           || define('SECRETKEY', 'bear.herbshop_ck');
            defined('AUTHKEY')             || define('AUTHKEY', '65SU7KCc7J207ZeI67iM7e87ZmV66qwX+uwlOultO2VnOuwqQ==');
            defined('APIKEY')              || define('APIKEY', '783ef9959648a12e2d9370b4c8035fb1c1ff7875954ca18a47ca546059d4c7b8');
            defined('SESSION_KEY')         || define('SESSION_KEY', 'CK_herbStr');
            defined('COOKIE_KEY')          || define('COOKIE_KEY', 'CK_herbStr');
            defined('COOKIE_SAVE_KEY')     || define('COOKIE_SAVE_KEY', 'CK_herbStr_Key');
            break;

        case $domainBarun:
            defined('MAIN_COM_CODE')       || define('MAIN_COM_CODE', '79390299');
            defined('MAIN_COM_TITLE')      || define('MAIN_COM_TITLE', '바른한방 쇼핑몰');
            defined('SECRETKEY')           || define('SECRETKEY', 'bear.herbshop_BARUN');
            defined('AUTHKEY')             || define('AUTHKEY', '65SU7KCc7J207ZeI67iM7e87ZmV66qwX+yUqOy8gA==');
            defined('APIKEY')              || define('APIKEY', '7885542dd7443196c8ca388d082ebc87fcb5b4e18374d6b63d08596ee283bbbf');
            defined('SESSION_KEY')         || define('SESSION_KEY', 'BR_herbStr');
            defined('COOKIE_KEY')          || define('COOKIE_KEY', 'BR_herbStr');
            defined('COOKIE_SAVE_KEY')     || define('COOKIE_SAVE_KEY', 'BR_herbStr_Key');
            break;

        case $domainMain:
        default:
            defined('MAIN_COM_CODE')       || define('MAIN_COM_CODE', '10000001');
            defined('MAIN_COM_TITLE')      || define('MAIN_COM_TITLE', '디제이허브');
            defined('SECRETKEY')           || define('SECRETKEY', 'bear.herbshop_MASTER');
            defined('AUTHKEY')             || define('AUTHKEY', '65SU7KCc7J207ZeI67iM7e87ZmV66qwX+usuOyKpO2EsA==');
            defined('APIKEY')              || define('APIKEY', '7ef8a1aa823c34a1796d194857b6f6aa25aa658df8a221f7c5e580e03e5c70c6');
            defined('SESSION_KEY')         || define('SESSION_KEY', 'DJ_herbStr');
            defined('COOKIE_KEY')          || define('COOKIE_KEY', 'DJ_herbStr');
            defined('COOKIE_SAVE_KEY')     || define('COOKIE_SAVE_KEY', 'DJ_herbStr_Key');
            break;
    }

    /*
     * --------------------------------------------------------------------
     * 프레임워크 기본 설정
     * --------------------------------------------------------------------
     */
    if (ENVIRONMENT !== 'testing') {
        $value = ini_get('zlib.output_compression');

        if (filter_var($value, FILTER_VALIDATE_BOOLEAN) || (int) $value > 0) {
            throw FrameworkException::forEnabledZlibOutputCompression();
        }

        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        ob_start(static fn ($buffer) => $buffer);
    }

    /*
     * --------------------------------------------------------------------
     * Debug Toolbar Listeners.
     * --------------------------------------------------------------------
     */
    if (CI_DEBUG && ! is_cli()) {
        Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
        service('toolbar')->respond();
        // Hot Reload route - for framework use on the hot reloader.
        if (ENVIRONMENT === 'development') {
            service('routes')->get('__hot-reload', static function (): void {
                (new HotReloader())->run();
            });
        }
    }
});