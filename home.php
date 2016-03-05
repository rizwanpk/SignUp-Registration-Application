<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
$res = mysql_query("SELECT * FROM users WHERE user_id=" . $_SESSION['user']);
$userRow = mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Welcome - <?php echo $userRow['user_email']; ?></title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        <div id="header">
            <div id="left">
                <label><?php echo $userRow['user_name']; ?></label>
            </div>
            <div id="right">
                <div id="content">
                    <a href="logout.php?logout">Sign Out</a>
                </div>
            </div>
        </div>
        <div id="body">
            <!--<AdHTML>-->
            <div id="Container" style="position:relative;padding:0px;margin-top:0px;margin-bottom:0px;margin-left:auto;margin-right:auto;padding-left:0px;width:980px;height:240px;background-color:#f74902;">
                <img id="img1" src="off1.jpg" style="opacity: 1;position:absolute;top:0;left:0;margin:0;padding:0;width:390px;height:240px;-webkit-transition:all 0.8s linear;" />
                <img id="img2" src="off2.jpg" style="opacity: 0;position:absolute;top:0;left:0;margin:0;padding:0;width:390px;height:240px;-webkit-transition:all 0.8s linear;" />

                <img id="Logo" src="logon.jpg" style="position:absolute;bottom:0;right:0;margin:0;padding:0;width:100px;height:100px;" />
                <div id="jobArea" style="z-index: 99999;margin:0px;padding:0px;position:absolute;top:0px;left:401px;width:570px;height:230px;border-top: none !important;border-bottom: none !important; display: block;-webkit-transform: translate3d(0px, 0px, 0px);-webkit-transform-style: preserve-3d;">
                    <p id="job1" style="visibility: visible;position: absolute;color:white;top: 20px;left: 0px;font-weight: bold;font-family: arial;font-size: 38px;text-align: center; overflow:hidden;">Work for a modern advertising agency</p></br>
                    <p id="job2" style="visibility: hidden;position: absolute;color:white;top: 20px;left: 30px;font-weight: bold;font-family: arial;font-size: 38px;text-align: center; overflow:hidden;">We're hiring web developers</p></br>
                    <input id="button1" type="button" class="button" value="Apply now!" style="display:inline-block;cursor: pointer;position: absolute;top: 150px;left: 210px;padding:7px 9px;background: #002654;border-radius:10px 10px 10px 10px;border: 0;font-size:25px;font-weight:600;color:#fff;text-decoration: none;-webkit-transition:all 0.4s linear;">
                </div>
            </div>
            <!--</AdHTML>-->
            <script>
                ImgAnim();
                function ImgAnim() {
                    window.setTimeout(function() {
                        document.getElementById("img1").style.opacity = "1";
                        document.getElementById("img2").style.opacity = "0";
                        document.getElementById("job1").style.visibility = "visible";
                        document.getElementById("job2").style.visibility = "hidden";
                    }, 1000);
                    window.setTimeout(function() {
                        document.getElementById("img1").style.opacity = "0";
                        document.getElementById("img2").style.opacity = "1";
                        document.getElementById("job1").style.visibility = "hidden";
                        document.getElementById("job2").style.visibility = "visible";
                    }, 3000);
                    window.setTimeout(function() {
                        ImgAnim();
                    }, 5000);
                }
            </script>
        </div>
    </body>
</html>