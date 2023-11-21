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
						$endDate = date('Y-m-d', strtotime('+2 months', $userLoginTimestamp));
                        $startTime = strtotime($startDate);
                        $endTime = strtotime($endDate);
                        $interval = 30 * 60;
                        while ($startTime <= $endTime) {
                            $weekStartDate = date('l m/d', strtotime('last Monday', $startTime));
							$queryStartTime = date('Y-m-d', strtotime('last Monday', $startTime));
                        	$queryEndTime = date('Y-m-d', strtotime('Friday', $startTime));
                        	$weekEndDate = date('l m/d', strtotime('Friday', $userLoginTimestamp));
                            echo "<tr>";
    						echo "<td>$weekStartDate - $weekEndDate</td>";                            
							$availabilityQuery = "SELECT Staff.StaffID, Staff.FirstName, 
						    ((TIME_TO_SEC(TIMEDIFF(Availability.EndTime, Availability.StartTime)) - 
						    COALESCE(SUM(TIME_TO_SEC(TIMEDIFF(Appointment.EndTime, Appointment.StartTime))), 0)) / 1800) AS available_slots,
						    all_days.DayOfWeek
						FROM Staff
						CROSS JOIN (
						    SELECT 'Monday' AS DayOfWeek
						    UNION SELECT 'Tuesday'
						    UNION SELECT 'Wednesday'
						    UNION SELECT 'Thursday'
						    UNION SELECT 'Friday'
						    UNION SELECT 'Saturday'
						    UNION SELECT 'Sunday'
						) AS all_days
						LEFT JOIN Availability ON Staff.StaffID = Availability.StaffID
						    AND Availability.DayOfWeek = all_days.DayOfWeek
						LEFT JOIN Appointment ON Availability.StaffID = Appointment.StaffID
						    AND Availability.DayOfWeek = DAYNAME(Appointment.AppointmentDate)
						    AND Appointment.AppointmentDate BETWEEN '$queryStartTime' AND '$queryEndTime'
						GROUP BY Staff.StaffID, Availability.StartTime, Availability.EndTime, all_days.DayOfWeek;
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