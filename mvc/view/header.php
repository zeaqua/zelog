<?php 
/*------------------------------------------------------------------------------*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*|||||||||||||||||||||||||||ZeLog project by ZeAqua||||||||||||||||||||||||||||*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*------------------------------------------------------------------------------*/

?>
<!-- error test -->

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title ? $title : 'ZeLogDefHeader'; ?></title>
		<script>if ('<?php echo $data["error"];?>' != '') alert('<?php echo $data["error"];?>')</script>
		<link rel="icon" type="image/png" href="http://s1.iconbird.com/ico/2014/1/606/w512h5121390848145businessman512.png">
		<link rel="stylesheet" href="<?php Session::getHomeFolder();?>assets/main.css">  
	</head>
	<body>

<?php ?>
