<?php
require_once('/../Models/DbConnection.php');
require_once('/../Models/DealProduct.php');
require_once('/../Models/DealDB.php');
?>
<html>
<head>

</head>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
    $(document).ready(function(){
        $.getJSON('getAllDeals.php', function (data) {
            var cat = '<tr>';
            $.each(data, function(index,product){
                cat += '<td>' + product.Product_Id +'</td>';
                cat += '<td>' + product.Product_Title +'</td>';
                cat += '<td>' + product.Category +'</td>';
                cat += '<td>' + product.Price +'</td>';
                cat += '<td>' + product.DiscountAmount +'</td>';
                cat += '</tr>';
                $('#products').html(cat);
            })
        });
        $('#all').click(function(event){
            event.preventDefault();
            $.getJSON('getAllDeals.php', function (data) {
                var cat = '<tr>';
                $.each(data, function(index,product){
                    cat += '<td>' + product.Product_Id +'</td>';
                    cat += '<td>' + product.Product_Title +'</td>';
                    cat += '<td>' + product.Category +'</td>';
                    cat += '<td>' + product.Price +'</td>';
                    cat += '<td>' + product.DiscountAmount +'</td>';
                    cat += '</tr>';
                    $('#products').html(cat);
                })
            })
        });
        $('.category').click(function(event){
            var cat=$(this).text();
            event.preventDefault();
            $.getJSON('getDealsByCat.php', {category: cat},function (data) {
                var cat = '<tr>';
                $.each(data, function(index,product){
                    cat += '<td>' + product.Product_Id +'</td>';
                    cat += '<td>' + product.Product_Title +'</td>';
                    cat += '<td>' + product.Category +'</td>';
                    cat += '<td>' + product.Price +'</td>';
                    cat += '<td>' + product.DiscountAmount +'</td>';
                    cat += '</tr>';
                    $('#products').html(cat);
                })
            })
        });
    });
</script>
<body>

<h3 class="page-header">Today's Deals</h3>
<a href="" id="all">All</a><br/>
<a href="" class="category">Apparel</a><br/>
<a href="" class="category">Shoes</a><br/>
<a href="" class="category">Jewelry</a>

<table id="products" class="table table-striped">
    <!--<tr>
        <td style="padding: 10px;"><b>Id</b></td>
        <td style="padding: 10px;"><b>Title</b></td>
        <td style="padding: 10px;"><b>Category</b></td>
        <td style="padding: 10px;"><b>Quantity</b></td>
        <td style="padding: 10px;"><b>Price</b></td>
        <td style="padding: 10px;"><b>Discount Amount</b></td>
    </tr>-->

</table>
</body>
</html>
