<?php
require_once('../../Models/DbConnection.php');
require_once('../../Models/Newsletter.php');
require_once('../../Models/NewsletterDB.php');
?>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

<h3 class="page-header">Newsletters list</h3>
<table class="table table-striped">
    <tr>
        <td style="padding: 10px;"><b>Id</b></td>
        <td style="padding: 10px;"><b>Title</b></td>
        <td style="padding: 10px;"><b>Body</b></td>
        <td style="padding: 10px;"><b>Date Released</b></td>
    </tr>
    <?php

    $news=NewsletterDB::getNewsletters();


   // var_dump($news);
    foreach($news as $new){
        $id=$new->getID();
        echo "<tr>";
        echo "<td>".$new->getID()."</td>";
        echo "<td>".$new->getTitle()."</td>";
        echo "<td>".$new->getBody()."</td>";
        echo "<td>".$new->getDateReleased()."</td>";

        echo "<td style='padding: 5px'>
        <form action='editNewsletterForm.php' method='post' id='editNews'>
            <input type='hidden' name='newsId' value="."'$id'"."/>
            <input type='submit' name='Edit' value='Edit' class='btn btn-primary' />
         </form>
        </td>";

        echo "<td style='padding: 5px'>
        <form action='deleteNewsletter.php' method='post' id='deleteNews'>
            <input type='hidden' name='newsId' value="."'$id'"."/>
            <input type='submit' name='delete' value='Delete' class='btn btn-primary'/>
         </form>
        </td>";
        echo "<td style='padding: 5px'>
        <form action='sendNewsletter.php' method='post' >
            <input type='hidden' name='newsId' value="."'$id'"."/>
            <input type='submit' name='send' value='Email to Subscribers' class='btn btn-primary'/>
         </form>
        </td>";
        echo "</tr>";
    }
    ?>
</table>
<br/>
<br/>
<a href="createNewsletter.php" class="btn btn-primary">Create a Newsletter</a>
</body>
</html>
