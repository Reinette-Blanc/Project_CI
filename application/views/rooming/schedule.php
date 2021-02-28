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
		<input type="hidden" id="date" name="date" value="<?php echo $date; ?>">
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

			<!-- <tr>
				<th>08:00 - 08:30</th>

				<td colspan="4" rowspan="3" class="stage-saturn">
					<a href="Add" >Click here to add</a>
				</td>

			</tr>
			<tr>
				<th>08:30 - 09:00</th>
			</tr>
			<tr>
				<th>09:00 - 09:30</th>
				
			</tr>
			<tr>
				<th>09:30</th>
				<td colspan="4" rowspan="4" class="stage-earth">
					Meeting <span>Reserve by Bob</span>
				</td>
			</tr>
			<tr>
				<th>10:00</th>
			
			</tr>
			<tr>
				<th>10:30</th>
				
			</tr>
			<tr>
				<th>11:00</th>

			</tr>
			<tr>
				<th>11:30</th>
				<td colspan="4" rowspan="5" class="stage-saturn">
					<a href="Add" >Click here to add</a>
				</td>
			</tr>
			<tr>
				<th>12:00</th>
				
			</tr>
			<tr>
				<th>12:30</th>
			</tr>
			<tr>
				<th>13:00</th>
			</tr>
			<tr>
				<th>13:30</th>
				
			</tr>
			<tr>
				<th>14:00</th>
				<td colspan="4" rowspan="4" class="stage-earth">
					Meeting <span>Reserve by Bob</span>
				</td>
			</tr>
			<tr>
				<th>14:30</th>
	
			</tr>
			<tr>
				<th>15:00</th>
			</tr>
			<tr>
				<th>15:30</th>
			</tr>
			<tr>
				<th>16:00</th>
			</tr>
			<tr>
				<th>16:30</th>
			</tr>
			<tr>
				<th>17:00</th>
				<td colspan="1" rowspan="4" class="stage-earth">
					Meeting <span>Reserve by Bob</span>
				</td>
			</tr> -->

		</table>
	</div>
</body>

<script>
	document.getElementById("roomid").selectedIndex = <?php echo $_GET['roomid'] - 1; ?>;
</script>

</html>