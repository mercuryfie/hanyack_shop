<header>
    <div class="headerwrap">
        <div class="hbox pt20">
            <? if ($header['islogin'] == 'true') { ?>
                <div class="hbox1-1">
                    <div class="hbox1-1-1">
                        <input type="hidden" id="tUid" name="tUid" value="<?= $header["uid"] ?>"/>
                        <p class="name"><?= $header["userid"] ?>님</p>
                        <p><a href="javascript:void(0);" class="topLogout" >로그아웃</a></p>
                    </div>
                </div>
                <div class="hbox1-2 flexType3">
                    <div class="flexType2">
                        <div class="topbox1-1">
                            <img class="logo loggedin_logo" src="<?=ASSETS_PATH;?>/shop/logo/logo_<?=MAIN_COM_CODE;?>.png" alt="img" id="topMain" />
                        </div>
                        <div class="topbox1-2 flexType2">
                            <input class="main_search" type="search" name="h_sKey" id="h_sKey"
                                   value="<?= $header["h_key"] ?>"
                                   placeholder="약재를 검색하십시오">
                            <i class="fa-solid fa-magnifying-glass mag" id="btnHSearch" name="btnHSearch"></i>
                        </div>
                    </div>
                    <div class="topbox1-3 flexType3">
                        <div class="cart_box">
                            <i class="fa-solid fa-cart-shopping mr20 " onclick="go_cart();"></i>
                            <? if ($header['cartCnt'] > 0) { ?>
                                <div class="num_box flexType1" id="cart_badge_box" style="">
                                    <p class="num" id="cart_badge"><?= $header['cartCnt']; ?></p>
                                </div>
                            <? } ?>
                        </div>
                        <i class="fa-regular fa-user mr20" onclick="go_orderList();"></i>
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
                <div class="hbox1-3 flexType7 mb10">
                    <div class="menu_wrap">
                        <a href="javascript:;" class="top_menu active">약재관리</a>
                        <a href="javascript:;" class="top_menu">주문관리</a>
                        <a href="javascript:;" class="top_menu">약재관리</a>

                    </div>

                </div>
            <? } else { ?>
                <div class="hbox1-1 ">
                    <div class="hbox1-1-1">
                        <a href="javascript:void(0);" onclick="go_login();" class="text">로그인</a>
                        <span> | </span>
                        <a href="javascript:void(0);" onclick="go_join();" class="text">회원가입</a>
                    </div>
                </div>
                <div class="hbox1-2 flexType3">
                    <div class="flexType2">
                        <div class="topbox1-1">
                            <img class="logo" src="<?=ASSETS_PATH;?>/shop/logo/logo_<?=MAIN_COM_CODE;?>.png" id="topMain">
                        </div>
                        <div class="topbox1-2 flexType2">
                            <input type="search" class="main_search" name="h_sKey" id="h_sKey" value="" placeholder="약재를 검색하십시오">
                            <i class="fa-solid fa-magnifying-glass mag" id="btnHSearch" name="btnHSearch"></i>
                        </div>
                    </div>
                    <div class="right">

                    </div>
                </div>
                <div class="hbox1-3 flexType2 mb10">
                    <div class="menu_wrap">
                        <a href="javascript:;" class="top_menu active">약재관리</a>
                        <a href="javascript:;" class="top_menu">주문관리</a>
                        <a href="javascript:;" class="top_menu">약재관리</a>

                    </div>

                </div>
            <? } ?>

            <!--            <div class="hbox1-3">-->
            <!--                <p class="dd"> hello?</p>-->
            <!--            </div>-->
        </div>
    </div>
</header>
