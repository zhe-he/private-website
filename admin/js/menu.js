// JavaScript Document

$(function (){

    var CONTENT_WIDTH = $(window).width() - $('.left_menu').width();
    var IFRAME = null;


    //导航菜单
    function navList() {
        var $obj = $("#nav_dot");

        $obj.find("h4").click(function () {
            var $div = $(this).siblings(".list-item");
            if ($(this).parent().hasClass("selected")) {
                $div.slideUp(600);
                $(this).parent().removeClass("selected");
            }
            if ($div.is(":hidden")) {
                $("#nav_dot li").find(".list-item").slideUp(600);
                $("#nav_dot li").removeClass("selected");
                $(this).parent().addClass("selected");
                $div.slideDown(600);
            } else {
                $div.slideUp(600);
            }
        });
    }

    // 右边菜单
    function showRight(){
        var $a = $('#nav_dot .list-item').children();
        var $content = $('#main');

        // 技术分享.素年锦时.时间轴
        $a.on('click', function (){
            $content.html('');
            IFRAME = $('<iframe frameborder="0" height="437" width="'+CONTENT_WIDTH+'" src="'+$(this).attr('data-src')+'"></iframe>');
            $content.append(IFRAME);

            $a.removeClass('active');
            $(this).addClass('active');
        });
    }

    function init(){
        navList();
        showRight();
        $(window).on('resize', function (){
            CONTENT_WIDTH = $(window).width() - $('.left_menu').width();
            IFRAME.get(0).width = CONTENT_WIDTH;
        }); 
    }

    init();
});



