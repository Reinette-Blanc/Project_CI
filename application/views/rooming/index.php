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
        <a id = "link">View Schedule</a>
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

    var linkurl = document.getElementById('link');
    linkurl.setAttribute("href", "<?php echo base_url("Schedule?date=")?>"+myCalender.value.getFullYear()+"-"+(myCalender.value.getMonth()+1>10?myCalender.value.getMonth()+1:"0"+(myCalender.value.getMonth()+1))+"-"+(myCalender.value.getDate()>10?myCalender.value.getDate():"0"+myCalender.value.getDate()));

    myCalender.onValueChange((currentValue) => {
        linkurl.setAttribute("href", "<?php echo base_url("Schedule?date=")?>"+currentValue.getFullYear()+"-"+(currentValue.getMonth()+1>10?currentValue.getMonth()+1:"0"+(currentValue.getMonth()+1))+"-"+(currentValue.getDate()>10?currentValue.getDate():"0"+currentValue.getDate()));
        console.log(`The current value of the calendar is: ${currentValue}`);
    });
</script>

</html>
