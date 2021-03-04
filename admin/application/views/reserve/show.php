<!-- Main Content -->
<div id="content">
    <?php $this->load->view("layout/menu-top") ?>
    <link rel="stylesheet" type="text/css" href="assets/css/table.css">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Home</a>
        </div>

        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form method="get" action="<?php echo base_url("Reserve") ?>">
                        <label for="start">Select Date : </label>
                        <input type="date" id="date" name="date" value="<?php echo $date; ?>" min="2021-01-01" max="2031-12-31" />
                        <br>
                        <label for="roomid">Select Room : </label>
                        <select name="roomid" id="roomid">
                            <?php foreach ($rooms as $room) { ?>
                                <option value="<?php echo $room['room_id']; ?>"><?php echo $room['room_name']; ?></option>
                            <?php } ?>
                        </select>
                        <input type="submit" value="submit" />
                    </form>

                    <table>

                        <body>
                            <?php for ($i = 0; $i < count($starttime) - 1; $i++) { ?>
                                <tr>
                                    <th><?php echo $time[$i]; ?></th>
                                    <?php foreach ($reserves as $reserve) {
                                        if ($reserve['start'] == $starttime[$i]) {
                                            echo '<td colspan="';
                                            if ($reserve['subject'] == "Free") {
                                                echo '4';
                                            } else {
                                                echo '2';
                                            }
                                            echo '" rowspan="' . $reserve['length'] . '" class="';
                                            if ($reserve['subject'] == "Free") {
                                                echo 'stage-mercury';
                                            } else {
                                                echo 'stage-venus';
                                            }
                                            echo '">';
                                            if ($reserve['subject'] == "Free") { ?>
                                                <form method="post" action="<? echo base_url("Reserve/addForm")?>">
                                                    <input type="hidden" id="starttime" name="starttime" value="<?php echo $reserve['start']; ?>">
                                                    <input type="hidden" id="length" name="length" value="<?php echo $reserve['length']; ?>">
                                                    <input type="hidden" id="date" name="date" value="<?php echo $date; ?>">
                                                    <input type="hidden" id="roomid" name="roomid" value="<?php echo $roomid; ?>">
                                                    <input id="submitButton" type="submit" value="Click here to book the meeting room.">
                                                </form>
                                            <?php
                                            } else {
                                                echo $reserve['subject'] . '<span>Reserved by ' . $reserve['reserver'] . '</span></td>'; ?>
                                                <td colspan="1" rowspan="<?php echo$reserve['length'];?>" class="stage-yellow">
                                                    <form method="post" action="<? echo base_url("Reserve/editForm")?>">
                                                        <input type="hidden" id="reserveid" name="reserveid" value="<?php echo $reserve['reserve_id']; ?>">
                                                        <input id="submitButton" type="submit" value="Edit">
                                                    </form>
                                                </td>
                                                <td colspan="1" rowspan="<?php echo$reserve['length'];?>" class="stage-red">
                                                    <form method="post" action="<? echo base_url("Reserve/delete")?>">
                                                        <input type="hidden" id="reserveid" name="reserveid" value="<?php echo $reserve['reserve_id']; ?>">
                                                        <input type="hidden" id="date" name="date" value="<?php echo $date; ?>">
                                                        <input type="hidden" id="roomid" name="roomid" value="<?php echo $roomid; ?>">
                                                        <input id="submitButton" type="submit" value="Delete">
                                                    </form>
                                                </td>
                                    <?php
                                            }
                                        }
                                    } ?>
                                </tr>
                            <?php } ?>
                        </body>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script>
    document.getElementById("roomid").selectedIndex = <?php echo ($roomid ? $roomid - 1 : 0) ?>;
</script>

</div>
<!-- End of Main Content -->