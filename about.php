<?php
function connection($id)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "exdb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT content FROM `content` WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $str = implode(" ", $row);
            echo  $str;
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>About us - Value Inc.</title>
</head>

<body>
    <div class="site_wrapper">
        <header class="main_header space" id="logo">
            <a href="#">
                <img src="./picture/logo.jpg" alt="">
            </a>
        </header>
        <div class="content_wrapper">
            <section class="welcome space">
                <div class="chung_toi_la flex_element">
                    <h1 id="1" class="movitation">
                        <?php
                        // tiêu đề chính
                        connection("1");
                        ?>
                    </h1>
                    <span></span>
                </div>
            </section>
        </div>
    </div>

</body>

</html>