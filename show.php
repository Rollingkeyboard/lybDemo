<?php 
header("Content-type: text/html; charset=utf-8"); 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/jquery-2.0.0.min.js"></script>
<script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/jquery-ui"></script>
<link href="http://www.francescomalagrino.com/BootstrapPageGenerator/3/css/bootstrap-combined.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/bootstrap.min.js"></script>
</head>
<body >
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1 style="display: inline;">许愿墙</h1>
			<div class="hero-unit;">
				<?php 
				$link=mysqli_connect('localhost','root','wuruizhi','lyb');
				$result=mysqli_query($link,'SELECT * FROM marks');
				$data=mysqli_fetch_all($result,MYSQLI_ASSOC);
				// print_r($data);
				foreach ($data as $value) {
					$top=mt_rand(100,550);
					$left=mt_rand(0,1500);
				?>
				<div style="width: 250px;height: 250px;background-color: #FFEC8B;position:absolute;top: <?php echo $top; ?>px; left: <?php echo $left; ?>px;">
					<span style="display: inline;color: blue;font-size: 20;"><?php echo $value['wname']; ?></span>
					<div align="right" style="font-size: 15;color: #228B22;">NO.<?php echo $value['wid']; ?></div>
					<p><?php echo $value['wcontent']; ?></p>
					<p style="bottom: 0;left: 0;position: absolute;color: #8C8C8C;"><?php echo $value['wtime']; ?></p>
					<form method="get" action="./delete.php">
						<a href="./delete.php?id=<?php echo $value['wid']; ?>">
							<div style="bottom: 18;left: 220;position: absolute;">
								<input type="submit" name="" value="x" style="background-color: #FFEC8B;"/>
							</div>
						</a>
					</form>
				</div>
				<?php } ?>
			</div>
			<center><input type="button" verti style="position: absolute;top: 800; text-align: center;  width:100px;height: 58px;background-color: #EE7AE9;font-size: 20;color: white" value="我要许愿" onclick="location.href='./wish.php';"></input></center>
		</div>
	</div>
</div>
</body>
</html>