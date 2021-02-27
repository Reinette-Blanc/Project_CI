<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('rooming/inc/title')?>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/table.css">
<?php $this->load->view('rooming/inc/script')?>
<?php $this->load->view('rooming/inc/css')?>

<body>
    <h1>Rooming</h1>
    <p><?php echo $date;?></p>
    <p><?php foreach($room as $rooms){echo $rooms['room_name']; echo "<br>";}?></p>
    <p><?php print_r($reserve);?></p>
    <p><?php foreach($reserve as $reserves){echo $reserves['subject']; echo " "; echo $reserves['reserver']; echo "<br>";}?></p>

<label for="room">Choose a meeting room :</label>

<select name="room" id="room">
    <?php foreach($room as $rooms) {?>
    <option value = <?php echo $rooms['room_id']?>> <?php echo $rooms['room_name'];?> </option>
    <?php }?>
</select>

<!-- Button trigger modal -->
<div data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  
<table>
	<body>
		<tr>
			<th>08:00</th>
			<td colspan="4" rowspan="2" class="stage-saturn">Welcome</td>
		</tr>
		<tr>
			<th>08:30</th>
		</tr>
		<tr>
			<th>09:00</th>
			<td colspan="4" class="stage-earth">Speaker One <span>Earth Stage</span></td>
		</tr>
		<tr>
			<th>09:30</th>
			<td colspan="4" class="stage-earth">Speaker Two <span>Earth Stage</span></td>
		</tr>
		<tr>
			<th>10:00</th>
			<td colspan="4" class="stage-earth">Speaker Three <span>Earth Stage</span></td>
		</tr>
		<tr>
			<th>10:30</th>
			<td colspan="4" class="stage-earth">Speaker Four <span>Earth Stage</span></td>
		</tr>
		<tr>
			<th>11:00</th>
			<td rowspan="5" class="stage-mercury">Speaker Five <span>Mercury Stage</span></td>
			<td rowspan="5" class="stage-venus">Speaker Six <span>Venus Stage</span></td>
			<td rowspan="5" class="stage-mars">Speaker Seven <span>Mars Stage</span></td>
			<td rowspan="2" class="stage-saturn">Lunch</td>
		</tr>
		<tr>
			<th>11:30</th>
		</tr>
		<tr>
			<th>12:00</th>
			<td rowspan="3" class="stage-saturn">Break</td>
		</tr>
		<tr>
			<th>12:30</th>
		</tr>
		<tr>
			<th>13:00</th>
		</tr>
		<tr>
			<th>13:30</th>
			<td colspan="4" rowspan="2" class="stage-earth">Speaker Eight <span>Earth Stage</span></td>
		</tr>
		<tr>
			<th>14:00</th>
		</tr>
		<tr>
			<th>14:30</th>
			<td colspan="4" rowspan="8" class="stage-saturn">Break</td>
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
		</tr>
		<tr>
			<th>17:30</th>
		</tr>
		<tr>
			<th>18:00</th>
		</tr>
		<tr>
			<th>18:30</th>
			<td colspan="4" class="stage-earth">Speaker Nine <span>Earth Stage</span></td>
		</tr>
		<tr>
			<th>19:00</th>
			<td colspan="2" rowspan="2" class="stage-earth">Speaker Ten <span>Earth Stage</span></td>
			<td colspan="2" rowspan="2" class="stage-jupiter">Speaker Eleven <span>Jupiter Stage</span></td>
		</tr>
		<tr>
			<th>19:30</th>
		</tr>
		<tr>
			<th>20:00</th>
			<td colspan="2" class="stage-mars">Speaker Twelve <span>Mars Stage</span></td>
			<td class="stage-jupiter">Speaker Thirteen <span>Jupiter Stage</span></td>
			<td class="stage-jupiter">Speaker Fourteen <span>Jupiter Stage</span></td>
		</tr>
		<tr>
			<th>20:30</th>
			<td colspan="4" rowspan="2" class="stage-saturn">Drinks</td>
		</tr>
		<tr>
			<th>21:00</th>
		</tr>
	</body>
</table>

</body>

</html>
