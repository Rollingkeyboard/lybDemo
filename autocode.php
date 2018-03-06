<?php 
session_start();
function ccode(){
	$big='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$sma='abcdefghijklmnopqrstuvwxyz';
	$num='123456789';
	$re=$big.$sma.$num;
	$len=strlen($re);
	$_SESSION['autocode']=$re[mt_rand(0,$len-1)].$re[mt_rand(0,$len-1)].$re[mt_rand(0,$len-1)].$re[mt_rand(0,$len-1)];	
	echo $_SESSION['autocode'];
}