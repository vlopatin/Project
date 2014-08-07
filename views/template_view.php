<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Forum</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<style type="text/css">
* { margin:0px; padding:0px; }
</style>

<body>

<div id="header" style="background:#99FF99">
	<br>
	<h1 align="left" style="color:#006600">Welcome to Forum</h1>
	<hr>
</div>

<?php

include 'views/' . $content_view;

?>

</body>
</html>
