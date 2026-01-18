<?php

function stdnavbar(){
echo '
<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Portal</title>

<style>
* {
    box-sizing: border-box;
}

.stdnavbody {
    margin: 0;
    font-family: Arial, sans-serif;
    padding-top: 70px;
}

.stdtopnav {
    background-color: #eeefff;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 70px;
    display: flex;
    align-items: center;
    box-shadow: 0px 2px 10px #bbb;
}

.stdtopnav .stdnavbut,
.stdtopnav .stdlogo {
    color: #000;
    text-decoration: none;
    font-size: 18px;
    padding: 0 20px;
    height: 100%;
    display: flex;
    align-items: center;
    transition: 0.3s;
    border: none;
    background: none;
    cursor: pointer;
}

.stdtopnav .stdnavbut:hover {
    background-color: #fff;
}

.stdtopnav .stdlogo {
    font-size: 26px;
    color: #228aff;
    font-weight: bold;
}

.stdtopnav .stdlogo:hover {
    font-weight: 600;
}

.right {
    margin-left: auto;
    display: flex;
    height: 100%;
}

.stdtopnav .stdnavbut.profile:hover {
    background-color: #fff;
}

.stdtopnav .stdnavbut.stdlogout {
    background-color: #ce822a;
    color: white;
}

.stdtopnav .stdnavbut.stdlogout:hover {
    background-color: #cb2626;
}
</style>
</head>

<body class="stdnavbody">

<div class="stdtopnav">
<form method="get" action="../../core/router.php" style="display:flex; width:100%; height:100%; align-items:center;">

    <a href="?stdnavbar=Dashboard" class="stdlogo">TECSAMS</a>

    <input class="stdnavbut" type="submit" name="stdnavbar" value="Dashboard">
    <input class="stdnavbut" type="submit" name="stdnavbar" value="Medicals">
    <input class="stdnavbut" type="submit" name="stdnavbar" value="Complaints">
    <input class="stdnavbut" type="submit" name="stdnavbar" value="News">

    <div class="right">
        <input class="stdnavbut profile" type="submit" name="stdnavbar" value="Profile">
        <input class="stdnavbut logout" type="submit" name="stdnavbar" value="Logout">
    </div>

</form>
</div>

</body>
</html>';
}
?>
