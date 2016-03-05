<?php
session_start();
include_once 'dbconnect.php';

if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
}

if (isset($_POST['btn-login'])) {
    $uname = mysql_real_escape_string($_POST['uname']);
    $email = mysql_real_escape_string($_POST['email']);

    $uname = trim($uname);
    $email = trim($email);

    $res = mysql_query("SELECT user_id, user_name FROM users WHERE user_email='$email'");
    $row = mysql_fetch_array($res);

    $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row

    if ($count == 1 && $row['user_name'] == $uname) {
        $_SESSION['user'] = $row['user_id'];
        header("Location: home.php");
    } else {
        ?>
        <script>alert('Username / Password Seems Wrong !');</script>
        <?php
    }
}

if (isset($_POST['btn-signup'])) {
    $uname = mysql_real_escape_string($_POST['uname']);
    $email = mysql_real_escape_string($_POST['email']);

    $uname = trim($uname);
    $email = trim($email);

    // email exist or not
    $query = "SELECT user_email FROM users WHERE user_email='$email'";
    $result = mysql_query($query);

    $count = mysql_num_rows($result); // if email not found then register

    if ($count == 0) {

        if (mysql_query("INSERT INTO users(user_name,user_email) VALUES('$uname','$email')")) {
            ?>
            <script>alert('successfully registered ');</script>
            <?php
        } else {
            ?>
            <script>alert('error while registering you...');</script>
            <?php
        }
    } else {
        ?>
        <script>alert('Sorry Email ID already taken ...');</script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Coding Cage - Login & Registration System</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
        <script src="http://mihaifrentiu.com/wp-content/themes/mf/js/jquery_1.7.1.min.js" type="text/javascript"></script>

        <!-- THIS IS MY GOOGLE ANALYTICS CODE -->
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.tabs .tab-links a').on('click', function(e) {
                    var currentAttrValue = jQuery(this).attr('href');

                    // Show/Hide Tabs
                    jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

                    // Change/remove current tab to active
                    jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

                    e.preventDefault();
                });
            });
        </script>
    </head>
    <body>
    <center>
        <div id="login-form">
            <form method="post">
                <div class="tabs">
                    <ul class="tab-links">
                        <li class="active"><a href="#tab1">Log In</a></li>
                        <li><a href="#tab2">Create an Account</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab1" class="tab active">
                            <form method="post">
                                <table align="center" border="0">
                                    <tr>
                                        <td><input type="text" name="uname" placeholder="Name" required /></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="email" placeholder="Your Email" required /></td>
                                    </tr>
                                    <tr>
                                        <td><button type="submit" name="btn-login">Log In</button></td>
                                    </tr>
                                </table> 
                            </form>
                        </div>

                        <div id="tab2" class="tab">
                            <form method="post">
                                <table align="center" border="0">
                                    <tr>
                                        <td><input type="text" name="uname" placeholder="Name" required /></td>
                                    </tr>
                                    <tr>
                                        <td><input type="email" name="email" placeholder="Your Email" required /></td>
                                    </tr>
                                    <tr>
                                        <td><button type="submit" name="btn-signup">Sign Up</button></td>
                                    </tr>
                                </table> 
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </center>
</body>
</html>