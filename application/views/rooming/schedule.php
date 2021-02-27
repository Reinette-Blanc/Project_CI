<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('rooming/inc/title')?>
</head>

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
    
</body>

</html>
