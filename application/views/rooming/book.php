<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('rooming/inc/title') ?>
</head>

<?php $this->load->view('rooming/inc/script') ?>
<?php $this->load->view('rooming/inc/css') ?>

<body>
    <?php $this->load->view('rooming/inc/header') ?>
    <p>Book</p>
    <form method="post" action="<?php echo base_url("Book/add") ?>">

        <input type="hidden" id="starttime" name="starttime" value="<?php echo $starttime; ?>" />
        <input type="hidden" id="formlength" name="length" value="1" />
        <input type="hidden" name="date" value="<?php echo $date; ?>" />
        <input type="hidden" name="roomid" value="<?php echo $roomid; ?>" />

        <table>
            <tr>
                <td>
                    Start Time
                </td>
                <td>
                    <button type="button" class="btn btn-outline-primary btn-subtract">-</button>
                    <input type="text" value="00:00" id="input-time" readonly />
                    <button type="button" class="btn btn-outline-primary btn-add">+</button>
                </td>
            </tr>
            <tr>
                <td>
                    Duration
                </td>
                <td>
                    <button type="button" class="btn btn-outline-primary btn-subtract-minute">-</button>
                    <input type="text" value="30" id="duration" readonly />
                    <button type="button" class="btn btn-outline-primary btn-add-minute">+</button>
                    <label for="input-time" id="labelduration">minutes</label>
                </td>
            </tr>
            <tr>
                <td>
                    Subject
                </td>
                <td>
                    <input type="text" name="subject" required oninvalid="this.setCustomValidity('Please, enter subject.')"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="submit" />
                </td>
            </tr>
        </table>
    </form>
</body>

<script>
    $(function() {

        $('.btn-subtract').prop('disabled', true);
        $('.btn-subtract-minute').prop('disabled', true);
        var minLength = 1;
        var maxLength = <?php echo $length ?>;
        var currentLength = parseInt($("#duration").val());
        var hour = 1.0;
        var start = <?php echo $starttime ?>;
        var end = start + (maxLength * 50);
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
            changeTime(50);
        });
        $('.btn-subtract').on('click', function() {
            changeTime(-50);
        });
        
        function changeTime(time) {
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

            if (current == start) {
                $('.btn-subtract').prop('disabled', true);
            } else if (current == end) {
                $('.btn-add').prop('disabled', true);
            } else {
                $('.btn-add').prop('disabled', false);
                $('.btn-subtract').prop('disabled', false);
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
            if (currentLength / 30 == minLength) {
                $('.btn-subtract-minute').prop('disabled', true);
            } else if (currentLength / 30 == maxLength) {
                $('.btn-add-minute').prop('disabled', true);
            } else {
                $('.btn-add-minute').prop('disabled', false);
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
    });
</script>

</html>