<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มใบแจ้งซ่อมครุภัณฑ์</title>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url(https://ppc.itsvc.dev/font/THSarabunNew.ttf) format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url(https://ppc.itsvc.dev/font/THSarabunNewBold.ttf) format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url(https://ppc.itsvc.dev/font/THSarabunNewItalic.ttf) format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url(https://ppc.itsvc.dev/font/THSarabunNewBoldItalic.ttf) format('truetype');
        }

        body {
            font-family: "THSarabunNew";
            font-size: 1.5em;
        }

        .center-container {
            display: flex;
            justify-content: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid;
        }

        th,
        td {
            border: 1px solid;
            padding: 8px;
            text-align: center;
        }

        .right-align {
            text-align: right;
        }

        .descrp {
            max-width: 200px;
            /* Adjust the maximum width as needed */
            white-space: normal;
            /* Allow text to wrap */
            word-wrap: break-word;
            /* Break words if necessary */
        }

        .container {
            display: grid;
            grid-template-columns: 1fr
        }

        .custom-heading {
            font-size: 1.5em;
            /* Adjust the font size as needed */
            font-weight: bold;
            /* Optional: Apply bold font weight */
        }
    </style>
</head>
<?php
date_default_timezone_set('asia/bangkok');
$d = date('d');
$m = date('m');
$thaiMonths = array(
    '01' => 'มกราคม',
    '02' => 'กุมภาพันธ์',
    '03' => 'มีนาคม',
    '04' => 'เมษายน',
    '05' => 'พฤษภาคม',
    '06' => 'มิถุนายน',
    '07' => 'กรกฎาคม',
    '08' => 'สิงหาคม',
    '09' => 'กันยายน',
    '10' => 'ตุลาคม',
    '11' => 'พฤศจิกายน',
    '12' => 'ธันวาคม'
);
$thaiMonth = $thaiMonths[$m];
$y = date('Y');

$thaiYearBE = $y + 543;

?>

<body>
    <div class="center-container">
        <h1><img src="https://ppc.itsvc.dev/pdf/formal.png" width="75px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;บันทึกข้อความ</h1>
        <p><span class="custom-heading">ส่วนราชการ</span>&nbsp;วอศ.สฎฯ&nbsp;ฝ่ายวิชาการ&nbsp;แผนกวิชาคอมพิวเตอร์ธุรกิจ</p>
        <p><span class="custom-heading">ที่</span>.......................................................................<span class="custom-heading">วันที่</span>..................&nbsp;<?= $d ?>&nbsp;เดือน&nbsp;<?= $thaiMonth ?>&nbsp;พ.ศ.&nbsp;<?= $thaiYearBE ?>&nbsp;...................</p>
        <p><span class="custom-heading">เรื่อง</span>&nbsp;ขออนุมัติซ่อมครุภัณฑ์ห้องปฎิบัติการคอมพิวเตอร์</p>
        <p>เรียน&nbsp;ผู้อำนวยการวิทยาลัยอาชีวะศึกษาสุราษฎร์ธานี</p>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่&nbsp;ขาพเจ้า....&nbsp;<?= $_SESSION['fname'] ?>&nbsp;<?= $_SESSION['lname'] ?>&nbsp;....ตำแหน่ง....................................</p>
        <p>แผนกวิชาคอมพิวเตอร์ธุรกิจได้รับมอบหมานดูแลรับผิดชอบ</p>
        <p>ห้องปฎิบัติการคอมพิวเตอร์......อาคาร.........ชั้น.........</p>
        <p>ได้มีการสำรวจครุภัณ์&nbsp;จึงมีการประสงค์ขอนุมัติซ่อมครุภัณฑ์&nbsp;ดังรายการนี้</p>
        <table>
            <thead>
                <tr>
                    <th style="width: 50px;">ลำดับ</th>
                    <th>อาคาร</th>
                    <th>ห้อง</th>
                    <th>รหัสครุภัณฑ์</th>
                    <th>ครุภัณฑ์</th>
                    <th>อาการ</th>
                    <!-- Add more column headers here -->
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td style="width: 50px!important;"><?= $i ?></td>
                        <td><?= $row['building']; ?></td>
                        <td><?= $row['room_id']; ?></td>
                        <td><?= $row['pro_id']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td class="descrp">
                            <?= $row['descrp']; ?>
                        </td>
                        <!-- Add more table cells here -->
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อโปรดทราบ</p>
        <p class="right-align">(&nbsp;<?= $_SESSION['fname'] ?>&nbsp;<?= $_SESSION['lname'] ?>&nbsp;)</p>
        <p class="right-align">ตำแหน่ง&nbsp;.................................................</p>
        <p class="right-align">ความเห็นของหัวหน้าแผนกวิชาคอมพิวเตอร์ธุรกิจ</p>
        <p class="right-align">.............................................................................</p>
        <p class="right-align">.............................................................................</p>
        <p class="right-align">
            (นางชนานิศ&nbsp;มีพฤกษ์)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </p>
        <p>ความเห็นผู้อำนวยการวิทยาลัยอาชีวศึกษาสุราษฎร์ธานี</p>
        <p>................................................................................................................................................................................</p>
        <p>................................................................................................................................................................................</p>
        <center>
            <p>(นายพงษ์ศักดิ์&nbsp;นุ้ยเจริญ)</p>
        </center>
    </div>
</body>

</html>