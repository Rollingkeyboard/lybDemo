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
					echo "<div style=\"width: 250px;height: 200px;background-color:#FFEC8B;position: absolute; top: {$top}px;left: {$left}px;\">";

					echo "<p style=\"display:inline;color:blue;font-size:20;\">{$value['wname']}</p>";
					echo "<div align=\"right\" style=\"font-size: 15;color:#228B22\">NO.{$value['wid']}</div>";
						echo "<p>{$value['wcontent']}</p>";
						echo "<p style=\"bottom:0;left:0;position:absolute;color:#8C8C8C\">{$value['wtime']}</p>";
						// echo "<form method=\"get\" action =\"./delete.php\" ";
						echo "<a href=\"./delete.php?id={$value['wid']}\">";
						echo "<div style=\"bottom:18;left:220;position:absolute;\">";
							echo "<input type=\"submit\" value=\"x\" style=\"background-color:#FFEC8B\"></input>";
						echo "</div>";
						echo "</a>";
						// echo "</form>";
					echo "</div>";
				
				}
				// echo "<span>hello </span>";
				?>
			</div>
			<center><input type="button" verti style="position: absolute;top: 800; text-align: center;  width:100px;height: 58px;background-color: #EE7AE9;font-size: 20;color: white" value="我要许愿" onclick="location.href='./wish.php';"></input></center>
		</div>
	</div>
</div>
</body>
</html>