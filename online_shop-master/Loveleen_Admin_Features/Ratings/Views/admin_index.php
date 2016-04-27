<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="Layout/Style/admin.css" />
<?php
require_once("Layout/admin_header.php");
?>
<div id="main">
    Select Category: <select name="category" id="category" style="height: 35px;">
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
                    var result="";
                   // var result ="<ul>";
                    $.each(data, function(index,product){
                        //result += "<li>"+product.Product_Id+ product.Product_Title+ product.Product_Description+ product.Rating+product.Votes+"</li>";
                        result += "<table class='table table-bordered'>"+"<tr>"+"<th>"+"Product ID"+"</th>"+"<th>"+"Product Title"+"<th>"+"Product Description"+"<th>"+"Product Rating"+"<th>"+"No. of Votes"+"</th>"+"</th>"+"</th>"+"</th>"+"</tr>"+
                            "<tr>"+"<td>"+product.Product_Id+"</td>"+
                            "<td>"+product.Product_Title+
                            "<td>"+product.Product_Description+
                            "<td>"+product.Rating+
                            "<td>"+product.Votes+"</td>"+"</tr>"+"</table>";



                        var pid = product.Product_Id;
                        result += "<form method='post' action='productDetails.php'>" +
                            "<input type='submit' value='View Details' class='btn btn-default'>" +
                            "<input type='hidden' value='"+pid+"' name='Id'>"    +
                            "</form>";
                    });
                   // result += "</ul>";

                    $('#prodlist').html(result);
                });
            })
        });
    </script>
    <div class="container-fluid">
        <div class="row">
            <?php
            require_once("Layout/admin_footer.php");
            ?>
            </div>
        </div>
</div> <!-- This closing tag must be at the end of your main content!! -->


