<?php
/**
 * Created by PhpStorm.
 * User: Loveleen
 * Date: 2016-04-20
 * Time: 11:14 AM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Rating</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
Select Category: <select name="category" id="category">
</select>
<div id="prodlist">
</div>
<script>
    $(document).ready(function(){
        $.getJSON('adminRatingCategories.php', function(data){
            var cat = "";
            $.each(data, function(index,category){

                cat += '<option value="' + category.category + '">' + category.category + '</option>';
            })
            $('#category').html(cat);
        });

        $('#category').change(function(){
            var cateee = $('#category').val();
            //alert(cateee);
            $.getJSON('getProductsFromCategory.php',{cat : cateee}, function (data) {
                var result ="<ul>";
                $.each(data, function(index,product){
                    result += "<li>"+product.Product_Id+ product.Product_Title+ product.Product_Description+ product.Rating+product.Votes+"</li>";
                    var pid = product.Product_Id;
                    result += "<form method='post' action='productDetails.php'>" +
                        "<input type='submit' value='View Details'>" +
                        "<input type='hidden' value='"+pid+"' name='Id'>"    +
                        "</form>";
                });
                result += "</ul>";

                $('#prodlist').html(result);
            });
        })
    });
</script>
</body>
</html>