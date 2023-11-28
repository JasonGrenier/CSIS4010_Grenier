<?php
include("global.php");
$queryAppointments = "SELECT AppointmentDate, StartTime, EndTime FROM Appointment
                          WHERE AppointmentDate BETWEEN '$startDate' AND '$endDate'
                          AND StaffID IN (SELECT StaffID FROM Staff WHERE FirstName = '$stylistName')"

    $appointmentsResult = $connection->query($queryAppointments);

    $bookedAppointments = [];
    if ($appointmentsResult->num_rows > 0) {
        while ($row = $appointmentsResult->fetch_assoc()) {
            $bookedDate = $row['AppointmentDate'];
            $startTime = $row['StartTime'];
            $endTime = $row['EndTime'];

            $bookedAppointments[$bookedDate][] = ['start' => $startTime, 'end' => $endTime]
        }
    }

?>
