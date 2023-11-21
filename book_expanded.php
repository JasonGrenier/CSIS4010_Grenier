<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Appointments</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    

    <?php
    $color = "green";
    $startDate = $_GET["slotStart"]; 
    $endDate = $_GET["slotEnd"];
    $stylistName = $_GET["stylist"];
    $disabled = "";
    echo "<div class='card mt-4'>";
    echo "<div class='card-header'><h2>$stylistName</h2></div>";
    echo "<div class='card-body'>";
    require_once("global.php");
    $startDate = $_GET["slotStart"]; 
    $endDate = $_GET["slotEnd"];
    $stylistName = $_GET["stylist"];

    $timeSlots = [];
    for ($day = strtotime($startDate); $day <= strtotime($endDate); $day = strtotime('+1 day', $day)) {
        $currentDate = date('Y-m-d', $day);

        $queryAvailability = "SELECT StartTime, EndTime FROM Availability 
                              WHERE StaffID IN (SELECT StaffID FROM Staff WHERE FirstName = '$stylistName') 
                              AND DayOfWeek = DAYNAME('$currentDate')";
        
        $availabilityResult = $connection->query($queryAvailability);

        if ($availabilityResult->num_rows > 0) {
            $availabilityData = $availabilityResult->fetch_assoc();
            $startAvailability = strtotime($currentDate . ' ' . $availabilityData['StartTime']);
            $endAvailability = strtotime($currentDate . ' ' . $availabilityData['EndTime']);

            while ($startAvailability < $endAvailability) {
                $timeSlots[$currentDate][] = date('H:i', $startAvailability);
                $startAvailability = strtotime('30 minutes', $startAvailability);
            }
        }
    }
    
    $queryAppointments = "SELECT AppointmentDate, StartTime, EndTime FROM Appointment 
                          WHERE AppointmentDate BETWEEN '$startDate' AND '$endDate' 
                          AND StaffID IN (SELECT StaffID FROM Staff WHERE FirstName = '$stylistName')";

    $appointmentsResult = $connection->query($queryAppointments);

    $bookedAppointments = [];
    if ($appointmentsResult->num_rows > 0) {
        while ($row = $appointmentsResult->fetch_assoc()) {
            $bookedDate = $row['AppointmentDate'];
            $startTime = $row['StartTime'];
            $endTime = $row['EndTime'];

            $bookedAppointments[$bookedDate][] = ['start' => $startTime, 'end' => $endTime];
        }
    }

    echo '<table class="table table-bordered">';
    echo '<thead class="thead-dark"><tr><th>Date</th><th>Time Slot</th><th>Status</th><th>Book</th></tr></thead>';
    echo '<tbody>';

    foreach ($timeSlots as $date => $slots) {
        foreach ($slots as $slot) {
            $status = 'Available';
            if (isset($bookedAppointments[$date])) {
                foreach ($bookedAppointments[$date] as $bookedSlot) {
                    if ($slot >= $bookedSlot['start'] && $slot < $bookedSlot['end']) {
                        $status = 'Booked';
                        $disabled = "disabled";
                        $color = "red";
                        break;
                    } else {
                    	$color = "green";
                    	}
                }
            }
			$dateFormatted = (int) strtotime($date);
			$dateFormatted = date("l, m/d", $dateFormatted);
			$startTime = date('h:i A', strtotime($slot));
			$endTime = date('h:i A', strtotime('+30 minutes', strtotime($slot)));
			echo "<tr><td>$dateFormatted</td><td>$startTime - $endTime</td><td style='color: $color'>$status</td>";
            $startTime = date('h:i A', strtotime($slot));
			
            if($status != "Booked"){
            	echo "<td><a href='external_api.php' class='btn btn-sm btn-primary' $disabled>Book</a></td></tr>";
            }
        }
    }

    echo '</tbody></table></div></div>';
    ?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
