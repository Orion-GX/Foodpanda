<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSSTopnav.css" title="style">
    <link rel="stylesheet" type="text/css" href="CSSButton.css" title="style">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>FoodPanda - Login</title>
    <style>
        .clearfix {
            overflow: auto;
            background-color: antiquewhite;
            border: 5px solid #cc0066;
            width: 50%;
            padding: 3px;
        }

        .imgfix {
            width: 50%;
            float: right;
        }

        .tagP {
            text-align: left;
            font-size: 100%;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
</head>

<body style="background-image: url('img/background1.jpg'); ">
    <?php include 'header.php'; ?>

    <div style="margin-top:3%"></div>

    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
    <center>
        <table>
            <?php
            error_reporting(E_ALL ^ E_NOTICE);
            require_once './ActionDB.php';
            $id = $_REQUEST["id"];
            $connect = new connectDB();
            if ($connect->connect()) {
                $sql = "select * from food_order where id_order = ".$id."";
                $result = mysqli_query($connect->connect(), $sql);
            } else echo "Cannot connect!!!";
            $x = 0;
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<div class=clearfix>";
                echo "<p class=tagP >ชื่อลูกค้า : " . $row['cus_name'] . "</p>";
                echo "<p class=tagP >ชื่อร้านค้า : " . $row['shop'] . "</p>";
                echo "<p class=tagP >รายละเอียด : " . $row['detail'] . "</p>";
                echo "<p class=tagP >ที่อยู่ลูกค้า : " . $row['address'] . "</p>";
                echo "<br><center><button class=button onclick=myFunction() >ส่งของเรียบร้อย</button></center>";
                echo "</div>";
                
                echo "</tr>";
            }
            ?>
        </table>



    </center>
    <script language="javascript" type="text/javascript">
        function myFunction() {
            window.location.href = "workpage.php";
        }
    </script>

</body>

</html>