<!DOCTYPE html>
<html>

<head>
    <title>แบบฟอร์มใบแจ้งซ่อมครุภัณฑ์</title>
    <style>
        @font-face {
            font-family: Sarabun;
            font-style: normal;
            font-weight: 400;
            src: url(https://ppc.itsvc.dev/font/Sarabun.ttf) format('truetype');
        }

        @font-face {
            font-family: Sarabun;
            font-style: normal;
            font-weight: 700;
            src: url(https://ppc.itsvc.dev/font/Sarabun-Bold.ttf) format('truetype');
        }

        body {
            font-family: 'Sarabun', sans-serif;
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
    </style>
</head>

<body>
    <div class="center-container">
        <center>
            <p>แบบฟอร์มใบแจ้งซ่อมครุภัณฑ์</p>
        </center>
        <p class="right-align">วันที่.......เดือน.....................พ.ศ........</p>
        <p>ชื่อผู้แจ้งซ่อม.................................................................................................. ตำแหน่ง...................................</p>
        <p>สถานที่ติดต่อ(คณะ/หน่วยงาน).......................................... โทร..........................................</p>
        <table>
            <thead>
                <tr>
                    <th style="width: 50px;">ลำดับการแจ้งซ่อม</th>
                    <th>อาคาร</th>
                    <th>ห้อง</th>
                    <th>รหัสครุภัณฑ์</th>
                    <th>ครุภัณฑ์</th>
                    <th>อาการ</th>
                    <!-- Add more column headers here -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td style="width: 50px!important;"><?= $row['req_id']; ?></td>
                        <td><?= $row['building']; ?></td>
                        <td><?= $row['room_id']; ?></td>
                        <td><?= $row['pro_id']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td style="max-width: 200px; word-wrap: break-word;"><?= $row['descrp']; ?></td>
                        <!-- Add more table cells here -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <p class="right-align">(ลงชื่อ ............................... ผู้รับแจ้ง)</p>
        <p class="right-align" style="margin-right: 40px;">(...............................)&nbsp; &nbsp; </p>
        <p class="right-align" style="margin-right: 35px;">(........../.............../..........)</p>

        <br>
        <p>ความเห็นของหัวหน้า</p>
        <p>( ) ดำเนินการซ่อมแซมครุภัณฑ์ได้ : ( ) ไม่เห็นสมควรในการดำเนินการซ่อมแซม ..............................................</p>

    </div>
</body>

</html>