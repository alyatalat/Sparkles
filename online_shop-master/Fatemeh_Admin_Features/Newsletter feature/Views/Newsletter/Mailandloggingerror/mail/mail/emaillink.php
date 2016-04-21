<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Email Links</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        <div id="page">
            <div id="header"><h1>Email Links </h1></div>
            <div id="main">

            <table><tr>
            <td>
                <form action="message.php" method="post">
                    <label>From:</label>
                    <input type="text" name="from" size="40"/> Your email address<br />

                    <label>To:</label>
                    <input type="text" name="to" size="40"/> Your friend's email address<br />

                    <label>Subject:</label>
                    <input type="text" name="subject" size="40" value="YouTube Video Link"/><br />
                    <label>URL:</label>
                    <input type="text" name="url" size="40"/> URL<br />
                    <label>Message:</label>
                    <textarea name="message" cols="40" rows="6">I thought you might enjoy this video.</textarea>
                    <br />
                    <input type="submit" value="Email this Link"/>
                </form>
            </td></tr></table>   

            </div><!-- end main -->
        </div><!-- end page -->
    </body>
</html>
