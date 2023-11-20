<?php
include("global.php");
$slotStart = "";
$slotEnd = "";
$disabled = "";
$stylist = $_GET['stylist'];
if (isset($_GET['stylist'])) {
    $selectedStylist = $_GET['stylist'];
    switch ($selectedStylist) {
        case 'Mel':
            $stylistQuery = "SELECT * FROM Staff
                            WHERE FirstName = 'Mel'";
            break;
        case 'Kerri':
            $stylistQuery = "SELECT * FROM Staff
                            WHERE FirstName = 'Kerri'";
            break;
        default:
            echo "No stylist by the name " . $_GET['stylist'];
            break;
    }

} else {
    $stylistQuery = "SELECT * FROM Staff";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment Calendar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  
</head>

<body>
    <div class="container">
        <?php
        $stylistResult = $connection->query($stylistQuery);

        if ($stylistResult->num_rows > 0) {
            while ($row = $stylistResult->fetch_assoc()) {
                $staffID = $row["StaffID"];
                $firstName = $row["FirstName"];
                $lastName = $row["LastName"];
                //$lastAvailableTime = $row["LastAvailableTime"];
                //$firstAvailableTime = $row["FirstAvailableTime"];

                echo "<div class='card mt-4'>";
                echo "<div class='card-header'><h2>$firstName</h2></div>";
                echo "<div class='card-body'>";
                ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Week of Appointment</th>
                            <th>Available Appointments (30 minute Slots)</th>
                            <th>Book</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $userLoginTimestamp = time();
						
						$startDate = date('Y-m-d', $userLoginTimestamp);
						$weekEndDate = date('Y-m-d', strtotime('+2 months', $userLoginTimestamp));
						$endDate = date('Y-m-d', strtotime('+2 months', $userLoginTimestamp));
                        $startTime = strtotime($startDate);
                        $endTime = strtotime($endDate);
                        $interval = 30 * 60;

                        while ($startTime <= $endTime) {
                            $weekStartDate = date('l m/d', strtotime('Monday', $startTime));
							$queryStartTime = date('Y-m-d', strtotime('Monday', $startTime));
                        	$queryEndTime = date('Y-m-d', strtotime('Friday', $startTime));
                        	$weekEndDate = date('l m/d', strtotime('Friday', $userLoginTimestamp));
                            echo "<tr>";
    						echo "<td>$weekStartDate - $queryEndTime</td>";

                            
							$availabilityQuery = "SELECT Staff.StaffID, Staff.FirstName, 
						    ((TIME_TO_SEC(TIMEDIFF(availability_test.end_time, availability_test.start_time)) - 
						    COALESCE(SUM(TIME_TO_SEC(TIMEDIFF(appointments_test.end_time, appointments_test.start_time))), 0)) / 1800) AS available_slots,
						    all_days.day_of_week
						FROM Staff
						CROSS JOIN (
						    SELECT 'Monday' AS day_of_week
						    UNION SELECT 'Tuesday'
						    UNION SELECT 'Wednesday'
						    UNION SELECT 'Thursday'
						    UNION SELECT 'Friday'
						    UNION SELECT 'Saturday'
						    UNION SELECT 'Sunday'
						) AS all_days
						LEFT JOIN availability_test ON Staff.StaffID = availability_test.StaffID
						    AND availability_test.day_of_week = all_days.day_of_week
						LEFT JOIN appointments_test ON availability_test.StaffID = appointments_test.StaffID
						    AND availability_test.day_of_week = DAYNAME(appointments_test.appointment_date)
						    AND appointments_test.appointment_date BETWEEN '$queryStartTime' AND '$queryEndTime'
						GROUP BY Staff.StaffID, availability_test.start_time, availability_test.end_time, all_days.day_of_week;
						";
							$data = $connection->query($availabilityQuery);
							

						$stylists = [];
						
						foreach ($data as $entry) {
						    $staffID = $entry["StaffID"];
						    $slots = $entry["available_slots"];
						    if ($slots !== NULL) {
						        if (!isset($stylists[$staffID])) {
						            $stylists[$staffID] = 0; 
						        }
						        $stylists[$staffID] += $slots;
						    }
						}
							
							$staffID = $row["StaffID"];
                            echo "<td>$stylists[$staffID]</td>";
                            echo "<td><a href='book_expanded.php?slotStart=$queryStartTime&slotEnd=$queryEndTime&stylist=$stylist' class='btn btn-sm btn-primary' $disabled>Book</a></td>";
    						echo "</tr>";
    						$startTime = strtotime('+7 days', $startTime);
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                echo "</div>"; 
                echo "</div>"; 
            }
        } else {
            echo "No stylists available";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$connection->close();
?>
