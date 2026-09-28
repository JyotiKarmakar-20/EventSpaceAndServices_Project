<?php
session_start();
$conn = new mysqli("localhost","root","","event_management_system");

if($conn->connect_error){
    die("Connection Failed : " . $conn->connect_error);
}// database connection file

// Check user login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Notification 1 → Booking approved
$approved_query = mysqli_query($conn, "
    SELECT * FROM bookings
    WHERE user_id='$user_id'
    AND booking_status='confirmed'
    AND payment_status!='paid'
");

while ($row = mysqli_fetch_assoc($approved_query)) {

    $booking_id = $row['id'];

    // Check if notification already exists
    $check = mysqli_query($conn, "
        SELECT * FROM notifications
        WHERE booking_id='$booking_id'
        AND title='Booking Approved'
    ");

    if (mysqli_num_rows($check) == 0) {

        $message = "Your booking request has been approved. Pay now to confirm your booking.";

        mysqli_query($conn, "
            INSERT INTO notifications(user_id, booking_id, title, message, is_read, created_at)
            VALUES(
                '$user_id',
                '$booking_id',
                'Booking Approved',
                '$message',
                0,
                NOW()
            )
        ");
    }
}


// Notification 2 → Booking fully confirmed after payment
$paid_query = mysqli_query($conn, "
    SELECT * FROM bookings
    WHERE user_id='$user_id'
    AND booking_status='confirmed'
    AND payment_status='paid'
");

while ($row = mysqli_fetch_assoc($paid_query)) {

    $booking_id = $row['id'];

    // Check if notification already exists
    $check = mysqli_query($conn, "
        SELECT * FROM notifications
        WHERE booking_id='$booking_id'
        AND title='Booking Confirmed'
    ");

    if (mysqli_num_rows($check) == 0) {

        $message = "Your booking is fully confirmed successfully.";

        mysqli_query($conn, "
            INSERT INTO notifications(user_id, booking_id, title, message, is_read, created_at)
            VALUES(
                '$user_id',
                '$booking_id',
                'Booking Confirmed',
                '$message',
                0,
                NOW()
            )
        ");
    }
}


/*
|--------------------------------------------------------------------------
| MARK NOTIFICATION AS READ
|--------------------------------------------------------------------------
*/

if (isset($_GET['read'])) {

    $notification_id = $_GET['read'];

    mysqli_query($conn, "
        UPDATE notifications
        SET is_read = 1
        WHERE id='$notification_id'
        AND user_id='$user_id'
    ");

    header("Location: notifications.php");
    exit();
}


/*
|--------------------------------------------------------------------------
| FETCH ALL NOTIFICATIONS
|--------------------------------------------------------------------------
*/

$notifications = mysqli_query($conn, "
    SELECT * FROM notifications
    WHERE user_id='$user_id'
    ORDER BY created_at DESC
");
if(isset($_GET['read'])){

    $notification_id = $_GET['read'];

    mysqli_query($conn, "

    UPDATE notifications

    SET is_read=1

    WHERE id='$notification_id'
    AND user_id='$user_id'

    ");

    header("Location: notifications.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

body{
    background:
    linear-gradient(135deg, #cdb4db, #ffcccc);

    font-family:'Poppins',sans-serif;

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:40px 20px;
}

/* CONTAINER */

.notification-container{

    width:100%;

    max-width:850px;

    background:rgba(255,255,255,0.18);

    backdrop-filter:blur(20px);

    padding:35px;

    border-radius:35px;

    box-shadow:
    0 20px 50px rgba(0,0,0,0.12);
}

/* TOP BAR */

.top-bar{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:35px;

    flex-wrap:wrap;

    gap:15px;
}

.page-title{

    font-size:38px;

    font-weight:700;

    color:#2b2d42;
}

/* BACK BUTTON */

.back-btn{

    text-decoration:none;

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    color:white;

    padding:12px 22px;

    border-radius:14px;

    font-weight:600;

    transition:0.3s;

    box-shadow:
    0 8px 20px rgba(181,126,220,0.25);
}

.back-btn:hover{

    transform:translateY(-3px);

    color:white;
}

/* NOTIFICATION CARD */

.notification-box{

    background:rgba(255,255,255,0.88);

    backdrop-filter:blur(16px);

    padding:25px;

    border-radius:26px;

    margin-bottom:25px;

    box-shadow:
    0 15px 40px rgba(0,0,0,0.08);

    transition:0.35s;

    border-left:7px solid #b85fc6;
}

.notification-box:hover{

    transform:translateY(-5px);

    box-shadow:
    0 20px 45px rgba(181,126,220,0.22);
}

/* READ NOTIFICATION */

.notification-box.read{

    opacity:0.78;

    border-left:7px solid #34c759;

    background:rgba(240,255,244,0.88);
}

/* TITLE */

.title{

    font-size:24px;

    font-weight:700;

    color:#2b2d42;

    margin-bottom:12px;
}

/* MESSAGE */

.message{

    font-size:17px;

    line-height:1.7;

    color:#555;

    margin-bottom:18px;
}

/* DATE */

.date{

    font-size:14px;

    color:#777;
}

/* STATUS */

.status{

    display:inline-block;

    margin-top:16px;

    padding:7px 16px;

    border-radius:30px;

    font-size:13px;

    font-weight:600;
}

.unread{

    background:#fff3cd;

    color:#856404;
}

.read-status{

    background:#d4edda;

    color:#155724;
}

/* BUTTON */

.mark-read{

    display:inline-block;

    margin-top:18px;

    text-decoration:none;

    background:
    linear-gradient(135deg,#ff8fab,#b185db);

    color:white;

    padding:10px 18px;

    border-radius:12px;

    font-weight:600;

    transition:0.3s;
}

.mark-read:hover{

    transform:translateY(-2px);

    color:white;
}

/* EMPTY */

.empty{

    text-align:center;

    background:rgba(255,255,255,0.85);

    padding:60px 30px;

    border-radius:30px;

    font-size:22px;

    color:#777;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.08);
}

/* MOBILE */

@media(max-width:768px){

    .page-title{

        font-size:28px;
    }

    .notification-box{

        padding:20px;
    }

    .title{

        font-size:20px;
    }

    .message{

        font-size:15px;
    }

}

</style>

</head>
<body>

<div class="notification-container">

    <div class="top-bar">

    <h1 class="page-title">
        🔔 My Notifications
    </h1>

    <a href="dashboard.php" class="back-btn">

        ← Back to Dashboard

    </a>

</div>
    <?php

    if (mysqli_num_rows($notifications) > 0) {

        while ($noti = mysqli_fetch_assoc($notifications)) {

            $is_read = $noti['is_read'];

            ?>

            <div class="notification-box <?php echo ($is_read == 1) ? 'read' : ''; ?>">

                <div class="title">
                    <?php echo $noti['title']; ?>
                </div>

                <div class="message">
                    <?php echo $noti['message']; ?>
                </div>

                <div class="date">
                    <?php echo date("d M Y h:i A", strtotime($noti['created_at'])); ?>
                </div>

                <?php if($is_read == 0){ ?>

                    <div class="status unread">
                        Unread Message
                    </div>

                    <br>

                    <a class="mark-read"
                       href="notifications.php?read=<?php echo $noti['id']; ?>">
                        Mark as Read
                    </a>

                <?php } else { ?>

                    <div class="status read-status">
                        ✔ Already Read
                    </div>

                <?php } ?>

            </div>

            <?php
        }

    } else {

        ?>

        <div class="empty">
            No notifications available.
        </div>

        <?php
    }

    ?>

</div>

</body>
</html>