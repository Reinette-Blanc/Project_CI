<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('rooming/inc/title') ?>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/table.css">
<?php $this->load->view('rooming/inc/script') ?>
<?php $this->load->view('rooming/inc/css') ?>

<body>
	<?php $this->load->view('rooming/inc/header') ?>
	<p><?php echo $date; ?></p>

	<form method="get" action="<? echo base_url("Schedule")?>">
		<input type="hidden" id="date" name="date" value="<?php echo $date;?>">
		<label for="roomid">Choose a meeting room :</label>
		<select name="roomid" id="roomid">
			<?php foreach ($room as $rooms) { ?>
				<option value=<?php echo $rooms['room_id'] ?>> <?php echo $rooms['room_name']; ?> </option>
			<?php } ?>
		</select>
		<button class="btn btn-primary" type="submit"> Go </button>
	</form>
	<div class="table-center">
		<table>
			<?php for($i = 0; $i < count($starttime)-1; $i++) {?>
				<tr>
					<th><?php echo $time[$i];?></th>
					<?php foreach($reserve as $reserves) {
						if ($reserves['start']==$starttime[$i])
						{
							echo '<td colspan="4" rowspan="'.$reserves['length'].'" class="';
							if($reserves['subject']=="Free")
							{
								echo 'stage-mercury';
							}
							else
							{
								echo 'stage-venus';
							}
							echo '"';
							if($reserves['length']>=3)
							{
								echo 'style = "font-size:1.20rem;"';
							}
							echo '>';
							if($reserves['subject']=="Free")
							{
								echo '<a href="';
								echo base_url("Book?date=".$date."&starttime=".$reserves['start']."&length=".$reserves['length']).'"';
								echo '>Click here to book the meeting room.</a>';
							}
							else
							{
								echo $reserves['subject'].'<span>Reserve by '.$reserves['reserver'].'</span></td>';
							}	
						}
					}?>
				</tr>
			<?php }?>
		
		</table>
	</div>
</body>

<script>
	document.getElementById("roomid").selectedIndex = <?php echo $_GET['roomid'] - 1; ?>;
</script>

</html>