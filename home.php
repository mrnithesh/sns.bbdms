<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* CSS styles for the scrolling container */
        #scrollContainer {
            height: 300px;
            overflow: auto;
        }
        
        .card {
            width: 1500px;
            margin-right: 20px;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // JavaScript to implement auto scroll
            var scrollContainer = document.getElementById('scrollContainer');
            var scrollHeight = scrollContainer.scrollHeight;
            var scrollPosition = 0;
            var scrollSpeed = 50; // Adjust this value to control the scroll speed (in milliseconds)
            var scrollInterval;

            function autoScroll() {
                scrollPosition += 1;
                if (scrollPosition >= scrollHeight) {
                    scrollPosition = 0;
                    scrollContainer.scrollTop = 0; // Reset scroll position to the top
                } else {
                    scrollContainer.scrollTop = scrollPosition;
                }
            }

            function startScroll() {
                scrollInterval = setInterval(autoScroll, scrollSpeed);
            }

            function stopScroll() {
                clearInterval(scrollInterval);
            }

            startScroll();
        });
    </script>
</head>

<body>
<div class="header">
    <?php
    $active = "home";
    include('head.php');
    ?>
</div>

<?php include 'ticker.php'; ?>

<div id="page-container" style="margin-top:50px; position: relative; min-height: 84vh;">
    <div class="container">
        <div id="content-wrap" style="padding-bottom:75px;">
            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="image/1.jpg" alt="image/1.jpg" width="100%" height="500">
                    </div>
                    <div class="carousel-item">
                        <img src="image/2.jpg" alt="image\2.jpg" width="100%" height="500">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <br>
            <h1 style="text-align:center;font-size:45px;">Welcome to SNS Institution BloodBank & Donor Management System</h1>
            <br>
            <div class="row">
                <div id="scrollContainer" onmouseover="stopScroll()" onmouseout="startScroll()">
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <h4 class="card-header card bg-info text-white">The need for blood</h4>
                            <?php
                            include 'conn.php';
                            $sql = "select * from pages where page_type='needforblood'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['page_data'];
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <h4 class="card-header card bg-info text-white">Blood Tips</h4>
                            <p>
                                <?php
                                include 'conn.php';
                                $sql = "select * from pages where page_type='bloodtips'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo $row['page_data'];
                                    }
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <h4 class="card-header card bg-info text-white">Who you could Help</h4>
                            <p>
                                <?php
                                include 'conn.php';
                                $sql = "select * from pages where page_type='whoyouhelp'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo $row['page_data'];
                                    }
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <!-- Features Section -->
            <div class="row">
                <div class="col-lg-6">
                    <h2>BLOOD GROUPS</h2>
                    <p>
                        <?php
                        include 'conn.php';
                        $sql = "select * from pages where page_type='bloodgroups'";
                        $result = mysqli_query
                        ($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['page_data'];
                        }
                        }
                        ?>
                        </p>
                        </div>
                        <div class="col-lg-6">
                        <img class="img-fluid rounded" src="image\blood_donationcover.jpeg" alt="">
                        </div>
                        </div>
                        <h2>Blood Donor Names</h2>
        <div class="row">
            <?php
            include 'conn.php';
            $sql = "select * from donor_details join blood where donor_details.donor_blood=blood.blood_id order by rand() limit 6";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                        <br>
                        <div class="card" style="width:300px">
                            <img class="card-img-top" src="image\blood_drop_logo.jpg" alt="Card image" style="width:100%;height:300px">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $row['donor_name']; ?></h3>
                                <p class="card-text">
                                    <b>Blood Group : </b> <b><?php echo $row['blood_group']; ?></b><br>
                                    <b>Mobile No. : </b> <?php echo $row['donor_number']; ?><br>
                                    <b>Gender : </b><?php echo $row['donor_gender']; ?><br>
                                    <b>Age : </b> <?php echo $row['donor_age']; ?><br>
                                    <b>Address : </b> <?php echo $row['donor_address']; ?><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <p>
                      
                </p>
            <?php
                }
            }
            ?>
        </div>
    </div>
  
    <?php include('footer.php'); ?>
</div>
</div>
</body>
</html>
