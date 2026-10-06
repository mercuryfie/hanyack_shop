<?= $this->extend("/web/template/layout_default") ?>
<?= $this->section("content") ?>

<script src="<?= URL_COMMON_ASSETS ?>/main_Do.js?rnd=<?= rand(); ?>"></script>
<section class="mainbanner">
    <div class="mainwrap main_wrap_ver4">
        <div class="main1-1" id="mainTyp1">
            <div class="area area1 flexType3  pt10 mb20">
                <div class="left flexType2">
                    <div class="main_filter flexType2" id="filter1">
                        <a href="javascript:;" class="  f1 mr10 active" >최신순</a>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <div class="main_filter flexType2" id="filter2">
                        <a href="javascript:;" class="  f2 mr10">이름순</a>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                </div>
                <div class="right flexType2" id=" ">
                    <p class="text ">총</p>
                    <p class="text text2 ph10 ttlCnt" id="totalRs">0</p>
                    <p class="text ">건</p>
                </div>
            </div>
            <div class="area area2 merbox " id="dataArea">
            </div>
            <div class="common_page_box flexType1" id="pageArea" data-page="1" data-pcnt="<?=$body['pcnt'];?>">

            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>
