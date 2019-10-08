function mascara() {
    var masks = ['(00) 00000-0000', '(00) 0000-00009'];
    $(".masked-phone").mask(masks[1], {
        onKeyPress: function (val, e, field, options) {
            field.mask(val.length > 14 ? masks[0] : masks[1], options);
        }
    });
    $(".masked-cep").mask("99999-999");
    $(".masked-cpf").mask("999.999.999-99");
    $(".masked-cnpj").mask("99.999.999/9999-99");
    $(".masked-validity").mask("99/99");
    $(".masked-date").mask("99/99/9999");
    $('.masked-money').mask('000.000.000.000.000,00', {reverse: true});
}
function scrollPage(x) {
    var newbox = $(x);
    $('html, body').animate({scrollTop: newbox.offset().top - 50}, 600);
}
function menu(){
    if($(".main-menu").hasClass('display-1024-none')){
        $(".main-menu").removeClass('display-1024-none');
        $('body').addClass('overflow-h');
    }else{
        $(".main-menu").addClass('display-1024-none');
        $('body').removeClass('overflow-h');
    }
}
function openTags(){
    if($('.box-tags').hasClass('opened')){
        $('.box-tags').removeClass('opened');
    }else{
        $('.box-tags').addClass('opened');
    }
}
function topFix() {
    if($('.main-banner').length > 0){
        h = parseFloat($('.main-banner').innerHeight() + $('.false-header').innerHeight());
    }else{
        h = $('.false-header').innerHeight();
    }
    var fix = $(".top-fix").offset().top;
    if (fix > h) {
        $('header.main-header').addClass('in-scroll');
    } else {
        $('header.main-header').removeClass('in-scroll');
    }
}
function openText(el){
    var $index = el.index();
    el.parents('li').find('.box-content > div.active').removeClass('active');
    el.parents('li').find('.box-content > div').eq($index).addClass('active');
    el.parent().find('.active').removeClass('active');
    el.addClass('active');
}
$(document).ready(function () {
    mascara();
    $(window).resize(function () {
        topFix();
    });
    $(window).scroll(function () {
        topFix();
    });
    $(window).on('load', function () {
        topFix();
    });
    $(".pagination-gallery span").click(function(){
        openText($(this));
    });
});