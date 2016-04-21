<!doctype html>
<html lang="en">
<head>
    <title>Newsletter</title>
</head>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
    $(document).ready(function(){
        $('#subscribe').submit(function(event){
           event.preventDefault();
            var email = $('#emailBox').val();
            $.getJSON('validateSubscriber.php',{email : email}, function (data) {
                if(data===""){
                   // alert("test");
                    $.getJSON('findSubscriber.php',{email : email}, function (data) {
                        console.log(data);
                        if(data!=false){
                               if(data.Active==0){
                                   $.getJSON('activateSubscriber.php',{email : email}, function (data) {
                                       $('#message').html(data);
                                   });
                               }
                               else{
                                   var message="You have already subscribed to our newsletter.";
                                   $('#message').html(message);
                               }
                        }
                        else if(data===false){
                            $.getJSON('addSubscriber.php',{email : email}, function (data) {
                                $('#message').html(data);
                            });
                        }
                    });
                }
                else{
                    $('#message').html(data);
                }
            })
        });
   });
</script>
<body>
    <form action="" method="post" id="subscribe">
        <input type="text" id="emailBox" name="email" size="15" />
        <input type="submit" id="submitNewsletter" name="submitNewsletter" value="Subscribe"/>
        <span id="message"></span>
    </form>
</body>
</html>