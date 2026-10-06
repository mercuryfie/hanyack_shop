<?php

namespace App\Controllers;


use App\Libraries\Form;
use CodeIgniter\API\ResponseTrait;


class MainController extends BaseController
{
    use ResponseTrait;

    public function Main()
    {
        $sessinarr = $this->GetSessionData();
        if (! ($sessinarr['islogin'] ?? false)) return fn_Href('/intro',true);
        $metaarr = [
            'h_title' => MAIN_COM_TITLE,
            'h_type' => 1
        ];

        $bodyData = [
            'pcnt' => 20
        ];

        $form = New Form;
        $main_data = [
            'meta' => $form->fnMake_Meta($metaarr),
            'header' => $form->fnMake_Header($sessinarr),
            'body' => $bodyData
        ];

        return view('web/common/main_View', $main_data);
    }
}
