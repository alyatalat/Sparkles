$(document).ready(function(){
    $("#chatArrow").click(function(){


        var $this = $(this);

        $("#livechatContent").toggle("slow");


        $this.toggleClass("expanded");

        if ($this.hasClass("expanded")) {
            $this.html("&#9660;");

        } else {
            $("#chatArrow").html("&#9650;");
        }


    });



    $(".menu_icon").click(function(){

        if($(this).hasClass("active_icon")){
            $(".menu_icon").removeClass("active_icon");
            $("#search_bar_container").hide();
            $("#mobile-menu").hide();
        }
        else{

            $(".menu_icon").removeClass("active_icon");
            $(this).addClass("active_icon");

            if($(this).hasClass("search")){
                $("#search_bar_container").show();
                $("#mobile-menu").hide();
            }

            else if($(this).hasClass("hamburger")){
                $("#search_bar_container").hide();
                $("#mobile-menu").show();
            }
            else{
                $("#search_bar_container").hide();
                $("#mobile-menu").hide();
            }
        }
    });







    $(".minus").click(function(){



        $(this).parent().next().toggle("slow");



        $(this).toggleClass("plus");

        if ($(this).hasClass("plus")) {
            $(this).html("+");
            $(this).css({"float":"right", "font-size":"20px", "cursor":"pointer"});

        } else {
            $(this).html("&ndash;");
            $(this).css({"float":"right", "font-size":"20px", "cursor":"pointer"});
        }



    });







    if ($(window).width() < 768) {
        $(".toggle-footer").css("display", "none");

        $(".minus").show();




    }

    else{


        $(".minus").hide();

    }



});


$(window).resize(function(){


    if ($(window).width() < 768) {

        $(".minus").show();

        $(".minus").each(function(){
            if($(this).hasClass(".plus")){}
            else{
                $(this).addClass("plus");
                $(this).html("+");
                $(this).css({"float":"right", "font-size":"20px", "cursor":"pointer"});
            }
        });


        $(".toggle-footer").hide();



    }
    else{
        $(".minus").hide();
        $(".toggle-footer").show();

    }
});









