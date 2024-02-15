<?php include "navbar.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../config/check.css">
    <title>pdf</title>>

    <style>
        @media only screen and (max-width: 800px) {

            #no-more-tables table,
            #no-more-tables thead,
            #no-more-tables tbody,
            #no-more-tables th,
            #no-more-tables td,
            #no-more-tables tr {
                display: block;
            }

            #no-more-tables thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            #no-more-tables tr {
                border: 1px solid #ccc;
            }

            #no-more-tables td {
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
                white-space: normal;
                text-align: left;
            }

            #no-more-tables td:before {
                position: absolute;
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
                font-weight: bold;
            }

            #no-more-tables td:before {
                content: attr(data-title);
            }
        }

        button.btn.btn-info.view-button {
            color: white;
            background-color: #313866;
            border: none;
        }

        .page-link[aria-current="page"] {
            background-color: #313866;
            border: none;
        }
    </style>
</head>

<body>
    <?php
    $ddt1 = @$_POST['dt1'];
    $ddt2 = @$_POST['dt2'];
    $add_date = date('Y/m/d', strtotime($ddt2 . "+1 days"));
    ?>
    <div class="container-fluid mt-4 pt-5">
        <div class="card mb-4" style="background-color:#e3e3c0;">
            <div class="card-header">
                รายงานการแจ้งซ่อม
            </div>
            <div class="card-subheader mx-3" style="padding-top: 15px;">
                <form name="form" method="POST" action="read.php">
                    <div class="row">
                        <div class="col-sm-2">
                            <input type="date" name="dt1" class="form-control">
                        </div>
                        <div class="col-sm-2">
                            <input type="date" name="dt2" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> </button>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <div class="card-body" style="width:100%; background-color:white;">
                <form method="post" action="generate_pdf.php">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-print"></i></button>
                    <div id="no-more-tables">
                        <table class="col-md-12 table-striped table-condensed cf" id="read">
                            <thead class="cf">
                                <tr>
                                    <th style="text-align: center; border-top-left-radius:15px; width:50px;">
                                        <label class="check" style="text-align: center; justify-content: center; align-items: center; display: flex; margin:0;">
                                            <input type="checkbox" id="checkAll">
                                            <div class="checkbox"></div>
                                        </label>
                                    </th>
                                    <th>วันที่แจ้งซ่อม</th>
                                    <th>เลขที่</th>
                                    <th>อาคาร</th>
                                    <th>ห้อง</th>
                                    <th>ครุภัณฑ์</th>
                                    <th>รหัสครุภัณฑ์</th>
                                    <th>สถานะ</th>
                                    <th>ผู้แจ้ง</th>
                                    <th>สถานะผูแจ้ง</th>
                                    <th style="border-top-right-radius:15px;">ดูเพิ่มเติม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (($ddt1 != "") && ($ddt2 != "")) {
                                    echo "ค้นหาจากวันที่ $ddt1 ถึง $ddt2";

                                    $sql = "SELECT * FROM req WHERE date BETWEEN '$ddt1' AND '$add_date' ORDER BY date DESC";

                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        while ($row = mysqli_fetch_array($result)) { ?>
                                            <tr>
                                                <td>
                                                    <label class="check" style="text-align: center; justify-content: center; align-items: center; display: flex; margin:0;">
                                                        <input type="checkbox" class="checkbox" name="checkbox[]" value="<?= $row['req_id'] ?>">
                                                        <div class="checkbox"></div>
                                                    </label>
                                                </td>
                                                <td data-title="วันที่"><?= Date::thai_date($row["date"], 0, false); ?> </td>
                                                <td data-title="ลำดับ"><?= $row["req_id"]; ?></td>
                                                <td data-title="อาคาร"><?= $row["building"]; ?></td>
                                                <td data-title="ห้อง">ห้องปฎิบัติการคอมพิวเตอร์ <?= $row["room_id"]; ?></td>
                                                <td data-title="ครุภัณฑ์"><?= $row["name"]; ?></td>
                                                <td data-title="รหัสครุภัณฑ์" style="max-width: 200px; word-wrap: break-word;">
                                                    <?= $row["pro_id"]; ?>
                                                </td>
                                                <td data-title="สถานะ"><?= $row["status"]; ?></td>
                                                <td data-title="ชื่อผู้แจ้ง">
                                                    <div class="col"><?= $row["reporter_name"]; ?></div>
                                                </td>
                                                <td data-title="สถานะผู้แจ้ง"><?= $row["reporter_status"]; ?></td>
                                                <td data-title="ดูเพิ่มเติม" class="align-middle">
                                                    <button type="button" class="btn btn-info view-button" onclick="openModal('<?php echo $row['req_id']; ?>')">
                                                        <i class="fa-sharp fa-regular fa-magnifying-glass"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        mysqli_free_result($result);
                                    } else {
                                        echo "Query execution failed: " . mysqli_error($conn);
                                    }
                                } else {
                                    $sql = "SELECT * FROM req ORDER BY date DESC";
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        while ($row = mysqli_fetch_array($result)) { ?>
                                            <tr>
                                                <th style="text-align: center; border-top-left-radius:15px; width:50px;">
                                                    <label class="check" style="text-align: center; justify-content: center; align-items: center; display: flex; margin:0;">
                                                        <input type="checkbox" class="checkbox" name="checkbox[]" value="<?= $row['req_id'] ?>">
                                                        <div class="checkbox"></div>
                                                    </label>
                                                </th>
                                                <td data-title="วันที่"><?= Date::thai_date($row["date"], 0, false); ?> </td>
                                                <td data-title="ลำดับ"><?= $row["req_id"]; ?></td>
                                                <td data-title="อาคาร"><?= $row["building"]; ?></td>
                                                <td data-title="ห้อง">ห้องปฎิบัติการคอมพิวเตอร์ <?= $row["room_id"]; ?></td>
                                                <td data-title="ครุภัณฑ์"><?= $row["name"]; ?></td>
                                                <td data-title="รหัสครุภัณฑ์" style="max-width: 200px; word-wrap: break-word;">
                                                    <?= $row["pro_id"]; ?>
                                                </td>
                                                <td data-title="สถานะ"><?= $row["status"]; ?></td>
                                                <td data-title="ชื่อผู้แจ้ง">
                                                    <div class="col"><?= $row["reporter_name"]; ?></div>
                                                </td>
                                                <td data-title="สถานะผู้แจ้ง"><?= $row["reporter_status"]; ?></td>
                                                <td data-title="ดูเพิ่มเติม" class="align-middle">
                                                    <button type="button" class="btn btn-info view-button" onclick="openModal('<?php echo $row['req_id']; ?>')">
                                                        <i class="fa-sharp fa-regular fa-magnifying-glass"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                <?php
                                        }
                                        mysqli_free_result($result);
                                    } else {
                                        echo "Query execution failed: " . mysqli_error($conn);
                                    }
                                } ?>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<script>
    $('#read').DataTable({
        language: {
            url: "https://cdn.jsdelivr.net/gh/itsvc-dev/public/lastboss/json/datatables-th.json"
        },
        ordering: false,
        columnDefs: [{
            targets: 6,
            render: function(data, type, row) {
                var status = row[6];
                var color = 'black';

                if (status === 'รอการดำเนินการ') {
                    color = 'red';
                } else if (status === 'อยู่ระหว่างดำเนินการ') {
                    color = 'orange';
                } else if (status === 'ดำเนินการเสร็จสิ้น') {
                    color = 'green';
                }

                return `<span style="color:${color}">${status}</span>`;
            }
        }]
    });

    $(document).ready(function() {
        $("#checkAll").click(function() {
            var checked = $(this).prop("checked")
            $(".checkbox").prop("checked", checked);
        })
        $('#get-selected-btn').click(function() {
            var selectedIds = [];
            $('.checkbox:checked').each(function() {
                var reqId = $(this).val();
                selectedIds.push(reqId);
            });
            console.log(selectedIds);
        });
    });
</script>