<?php include 'IP.php'; ?>

<html>
<head>
	<title>IP Filter & Proxy Test</title>
	<style type="text/css">
		h4 {color: rgb(83, 156, 248);font-size: 20;margin: 0px;}
		p {margin: 5px 0px 5px 15px;}
	</style>
</head>
<body>
	<h4>Your IP </h4>
	<p>Your IP is : <?php echo IP::getip() ?></p>
	<h4>Are your ip blocked?</h4>
	<p><?php echo IP::test() ?></p>
	<h4>Browsing using proxy?</h4>
	<p>Proxy is <?php echo (IP::proxy() == false) ? 'Disable' : 'Enable'; ?></p>
</body>
</html>