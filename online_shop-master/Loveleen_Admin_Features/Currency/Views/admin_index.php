<?php
require_once('../Models/Database.php');
require_once ('../Models/Price_Convert.php');
require_once ('../Models/ConversionDB.php');
session_start();
?>
<div class="container-fluid">
    <div class="row">
        <?php
        require_once("Layout/admin_header.php");
        ?>
    </div>
</div>
<script
    src="https://code.jquery.com/jquery-2.2.2.min.js"
    integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="
    crossorigin="anonymous"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="Layout/Style/admin.css" />



<div id="main">
    <button id='currencies' type="submit" value="USDCAD" onclick="search_dollar(this.value);">Get the USD Value</button>
    <div id="showPrice"></div>
    <script>
        function search_dollar(val)
        {
            var value = val;
           // console.log(value);
            jQuery.ajax({
                type: "POST",
                url: 'getValue.php',
                dataType: 'json',
                data: {functionname: 'changePrice', arguments: $("#currencies").val()  },

                success: function (obj, textstatus) {
                    var rate = obj;
                    console.log("Here is the rate:",rate);
                    $.ajax({
                        type: "POST",
                        url: 'addCurrency.php',
                        dataType: 'json',
                        data: {functionname: 'InsertRate', arguments: rate},
                        success: function (obj, textstatus) {
                            console.log(textstatus);
                        }
                    });
                    document.getElementById("showPrice").innerHTML = "The value for Canadian Dollar is "+rate;
                }
            });
        }
    </script>
    <div class="container-fluid">
        <div class="row">
            <?php
            require_once("Layout/admin_footer.php");
            ?>
        </div>
    </div>
</div> <!-- This closing tag must be at the end of your main content!! -->


