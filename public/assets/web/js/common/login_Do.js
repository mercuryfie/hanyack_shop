$(document).ready(function(){
    $('.pw_toggle').on('click', function () {
        const $pw = $('#passwd');
        const $icon = $(this).find('i');

        if ($pw.attr('type') === 'password') {
            $pw.attr('type', 'text');
            $icon.removeClass('fa-eye-slash').addClass('fa-eye');
        } else {
            $pw.attr('type', 'password');
            $icon.removeClass('fa-eye').addClass('fa-eye-slash');
        }
    });

    $('.id_clear').on('click', function () {
        $('#userid').val('').focus();
    });

    $('.pw_clear').on('click', function () {
        $('#passwd').val('').focus();
    });

    $('.clearBtn').on('click', function () {
        const target = $(this).data('target');
        $(target).val('').focus();
    });

    $('#userid, #passwd').on('keydown', function(e) {
        if (e.key === 'Enter') {
            Process_Login();
        }
    });

    $('#btn_login').on('click',function(e){
        console.log('11');
        e.preventDefault();
        Process_Login();
    });
});

async function Process_Login(){
    let userid = $('#userid').val();
    let pwd = $('#passwd').val();
    let is_auto = $('#autologin').is(':checked') ? 1 : 0;
    let is_save = $('#saveid').is(':checked') ? 1 : 0;
    const validations = [
        { val: userid,  msg: '아이디를 입력하세요..', target: $('#userid') },
        { val: pwd,  msg: '패스워드를 입력하세요.',      target: $('#passwd')}
    ];
    for (const rule of validations) {
        if (!formValidate(rule.val, rule.msg, rule.target)) return;
    }

    let params = {
        userid : userid,
        pwd : pwd,
        is_auto : is_auto,
        is_save : is_save
    };
    let response = await Model.common_m.Process_Login(params);
    if (!response) return;
    let targetUrl = (response) ? response.rUrl  : '/' ;
    location.href = targetUrl;
}

