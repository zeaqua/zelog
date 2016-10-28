<?php 
/*------------------------------------------------------------------------------*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*|||||||||||||||||||||||||||ZeLog project by ZeAqua||||||||||||||||||||||||||||*/
/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/
/*------------------------------------------------------------------------------*/

?>

<div class="search-page">
	<div class="form form_search">
		<h3>You can search for data in DB</h3>
		<form action="index.php?page=search" method="post"> 
			<input type="text" name="search" <?php if ($data['search']) echo "value='".$data['search']."'";?> placeholder="Enter something for search. Example 'test'"/>
			<button type="submit">Search</button>
			<p class="message"></p>
			<p class="message">Your account: <b><?php echo $_SESSION["username"];?></b> | All done? <a href="index.php?page=logout">Logout</a></p>
		</form> 
	</div>
</div>

<?php 
//print results
if (isset($data['results'])) {echo '<hr>';
foreach ($data['results'] as $res) {?>
	<div class="result">
		<!-- name -->
		<h2><b><?php echo $res['first_name'];?></b></h2>
		<!-- about -->
		<p><?php echo '<span>'.$res['last_name'].'</span>';?></p>
		<p><?php echo $res['player_profile'];?></p>
	</div>
	<hr>
<?php }} ?>
