<!-- Main Content -->
<div id="content">

    <?php $this->load->view("layout/menu-top") ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Home</a>
        </div>
        
         <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                
                <div class="form-all" style="width: 500px;">
        <div class="form-group" style="text-align: center;">
            <span class="text-header">Book</span>
        </div>

        <form method="post" class="form-inline justify-content-left" action="<?php echo base_url("Book/add") ?>">
            <input type="hidden" id="starttime" name="starttime" value="<?php echo $starttime; ?>" />
            <input type="hidden" id="formlength" name="length" value="1" />
            <input type="hidden" name="date" value="<?php echo $date; ?>" />
            <input type="hidden" name="roomid" value="<?php echo $roomid; ?>" />

            <div class="form-group row" >
                <label class="col-form-label">Start Time</label>
                <div style="margin-left:10px;">
                <button type="button" class="btn btn-outline-primary btn-subtract">-</button>
                <input type="text" class="form-control" value="00:00" id="input-time" readonly />
                <button type="button" class="btn btn-outline-primary btn-add">+</button>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label">Duration</label>
                <div style="margin-left:20px;">
                <button type="button" class="btn btn-outline-primary btn-subtract-minute">-</button>
                <input type="text" class="form-control" value="30" id="duration" readonly />
                <button type="button" class="btn btn-outline-primary btn-add-minute">+</button>
                <label class="col-form-label" id="labelduration">minutes</label>
                </div>
            </div>

            <div class="form-group row" style="margin-bottom: 20px;">
                <label class="col-form-label">Subject</label>
                <input type="text" name="subject" class="form-control" style="margin-left:30px; width: 288px;" required oninvalid="this.setCustomValidity('Please, enter subject.')" /> 
            </div>

            <input type="submit" value="Reserve" style="width:75%; margin:auto" class="form-control btn btn-primary btn-user" />
        </form>
    </div>

                </div>
            </div>
        </div>
        
    </div>
    <!-- /.container-fluid -->

    <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
    <script>
    $(function() {

        $('.btn-subtract').prop('disabled', true);
        $('.btn-subtract-minute').prop('disabled', true);
        var minLength = 1;
        var maxLength = <?php echo $length ?>;
        var currentLength = parseInt($("#duration").val());
        var hour = 1.0;
        var start = <?php echo $starttime ?>;
        var end = start + ((maxLength-1) * 50);
        var current = start;
        var hourint = parseInt(current / 100);
        var hourtext = "00";
        var minutetext = ":00";
        var checkmin = current % 100;
        if (checkmin != 0) {
            minutetext = ":30";
        }
        if (hourint < 10) {
            hourtext = "0" + hourint;
        } else {
            hourtext = "" + hourint;
        }
        $('#input-time').val(hourtext+minutetext);

        $('.btn-add').on('click', function() {
            resetDuration();
            maxLength-=1;
            changeTime(50);
        });
        $('.btn-subtract').on('click', function() {
            resetDuration();
            maxLength+=1;
            changeTime(-50);
        });
        
        function changeTime(time) {
            console.log("max"+maxLength);
            console.log("min"+minLength);
            current += time;
            hourint = parseInt(current / 100);
            checkmin = current % 100;
            if (checkmin != 0) {
                minutetext = ":30";
            }
            else {
                minutetext = ":00";
            }
            if (hourint < 10) {
                hourtext = "0" + hourint;
            } else {
                hourtext = "" + hourint;
            }

            $('.btn-add').prop('disabled', false);
            $('.btn-subtract').prop('disabled', false);

            if (current == start) {
                $('.btn-subtract').prop('disabled', true);
            } else if (current == end) {
                $('.btn-add').prop('disabled', true);
            }
            
            if(minLength==maxLength)
            {
                $('.btn-add-minute').prop('disabled', true);
                $('.btn-subtract-minute').prop('disabled', true);
            }
            else
            {
                $('.btn-add-minute').prop('disabled', false);
            }
            $('#input-time').val(hourtext + minutetext);
            $('#starttime').val(current);

            
        }

        $('.btn-add-minute').on('click', function() {
            changeDuration(30);
        });
        $('.btn-subtract-minute').on('click', function() {
            changeDuration(-30);
        });

        function changeDuration(minute) {
            currentLength += minute;
            hour = currentLength / 60;
            $('#formlength').val(currentLength / 30);
            $('.btn-add-minute').prop('disabled', false);
            $('.btn-subtract-minute').prop('disabled', false);
            if (currentLength / 30 == minLength) {
                $('.btn-subtract-minute').prop('disabled', true);
            } else if (currentLength / 30 == maxLength) {
                $('.btn-add-minute').prop('disabled', true);
                $('.btn-subtract-minute').prop('disabled', false);
            } 
            if (hour == 1) {
                $("#duration").val(hour);
                $('#labelduration').html("hour");
            } else if (hour > 1) {
                $("#duration").val(hour);
                $('#labelduration').html("hours");
            } else {
                $("#duration").val(currentLength);
                $('#labelduration').html("minutes");
            }
        }

        function resetDuration() {
            currentLength = 30;
            $("#duration").val(30);
            $('#labelduration').html("minutes");
        }
    });
</script>
</div>
<!-- End of Main Content -->

