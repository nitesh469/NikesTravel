    <!-- ***** header Area calling ***** -->
    <?php require '../include/header.php'; ?>
    <!-- ***** databases cofig calling ***** -->
    <?php require '../config/config.php'; ?>

    <?php
        if (!isset($_SESSION['username'])) {
            header("location:" . APPURL . "");
        }


        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $user_bookings = $conn->query("SELECT * FROM bookings WHERE user_id='$id'");
            $user_bookings->execute();

            $allUserbookings = $user_bookings->fetchAll(PDO::FETCH_OBJ);
        } else {
            header('location:../404.php');
        }
    ?>

    <div class="container">
        <div class="row" style="margin-top: 120px; margin-bottom: 120px">
            <div class="col-lg-12">
                <table class="table table-hover" style="text-align:center">
                    <thead style="vertical-align:middle;background-color:#343131;color:white;text-align:center">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Number Of Guest</th>
                            <th scope="col">Checkin Date</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Status</th>
                            <th scope="col">Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allUserbookings as $Booking) : ?>
                            <tr>
                                <td> <?php echo $Booking->name; ?> </td>
                                <td> <?php echo $Booking->phone_number; ?> </td>
                                <td> <?php echo $Booking->num_of_guest; ?> </td>
                                <td> <?php echo $Booking->checkin_date; ?> </td>
                                <td> <?php echo $Booking->destination; ?> </td>
                                <td> <?php echo $Booking->status; ?> </td>
                                <td> <?php echo $Booking->payment; ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ***** Footer Area calling ***** -->
    <?php require '../include/footer.php'; ?>