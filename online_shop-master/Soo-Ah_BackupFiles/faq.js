
$(document).ready(function(){
    $("h3 span").click(function(){
        if($(this).hasClass('glyphicon-menu-down')) {
            $(this).parent().next().show();
            $(this).removeClass('glyphicon-menu-down');
            $(this).addClass('glyphicon-menu-up');
        }
        else{
            $(this).parent().next().hide();
            $(this).removeClass('glyphicon-menu-up');
            $(this).addClass('glyphicon-menu-down');
        }
    });
});

