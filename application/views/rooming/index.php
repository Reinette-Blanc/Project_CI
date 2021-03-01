<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('rooming/inc/title')?>
</head>

<link rel="stylesheet" href="assets/css/CalendarPicker.style.css">
<?php $this->load->view('rooming/inc/script')?>
<?php $this->load->view('rooming/inc/css')?>

<body>
    <?php $this->load->view('rooming/inc/header')?>
    <div id = "calendar-wrp">
    <div id="showcase-wrapper">
        <div id="myCalendarWrapper"></div>
        <form class="d-flex" id="viewscheduleform" action="<? echo base_url("Schedule")?>">
            <input type="hidden" id="date" name="date" value="">
            <button class="btn" id="title" type="submit">View Schedule</button>
        </form>
    </div>
    </div>
</body>

<script>
    const nextYear = new Date().getFullYear() + 1;
    const myCalender = new CalendarPicker('#myCalendarWrapper', {
        // If max < min or min > max then the only available day will be today.
        min: new Date(),
        max: new Date(nextYear, 10) // NOTE: new Date(nextYear, 10) is "Sun Nov 01 <nextYear>"
    });

    $('#date').val(myCalender.value.getFullYear()+"-"+(myCalender.value.getMonth()+1>10?myCalender.value.getMonth()+1:"0"+(myCalender.value.getMonth()+1))+"-"+(myCalender.value.getDate()>10?myCalender.value.getDate():"0"+myCalender.value.getDate()));
    myCalender.onValueChange((currentValue) => {
        $('#date').val(currentValue.getFullYear()+"-"+(currentValue.getMonth()+1>10?currentValue.getMonth()+1:"0"+(currentValue.getMonth()+1))+"-"+(currentValue.getDate()>10?currentValue.getDate():"0"+currentValue.getDate()));
        console.log(`The current value of the calendar is: ${currentValue}`);
    });
</script>

</html>
