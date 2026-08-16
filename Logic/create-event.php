<?php
include("db_connection.php"); // your DB connection file

if (isset($_POST['submit'])) {
    $title = trim($_POST['eventTitle']);
    $description = trim($_POST['eventDescription']);
    $category = $_POST['eventCategory'];
    $capacity = !empty($_POST['eventCapacity']) ? $_POST['eventCapacity'] : null;
    $tags = !empty($_POST['tags']) ? implode(",", $_POST['tags']) : null;

    $start_date = $_POST['startDate'] . " " . $_POST['startTime'];
    $end_date   = $_POST['endDate'] . " " . $_POST['endTime'];

    $location = trim($_POST['eventLocation']);
    $venue = !empty($_POST['eventVenue']) ? $_POST['eventVenue'] : null;

    $require_registration = isset($_POST['requireRegistration']) ? 1 : 0;
    $registration_deadline = !empty($_POST['registrationDeadline']) ? $_POST['registrationDeadline'] : null;
    $allow_waitlist = isset($_POST['allowWaitlist']) ? 1 : 0;
    $send_reminders = isset($_POST['sendReminders']) ? 1 : 0;
    $is_public = isset($_POST['isPublic']) ? 1 : 0;

    $contact_email = trim($_POST['contactEmail']);
    $contact_phone = !empty($_POST['contactPhone']) ? $_POST['contactPhone'] : null;

    // These can come from session/login later
    $organizer_id = 1; 
    $venue_id = 1; 
    $status = "active"; 
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");

    $sql = "INSERT INTO events 
        (title, description, category, capacity, tags, 
         require_registration, registration_deadline, allow_waitlist, 
         send_reminders, is_public, contact_email, contact_phone, 
         start_date, end_date, location, venue, venue_id, organizer_id, 
         status, created_at, updated_at)
        VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssissiiissssssiiisss",
        $title,
        $description,
        $category,
        $capacity,
        $tags,
        $require_registration,
        $registration_deadline,
        $allow_waitlist,
        $send_reminders,
        $is_public,
        $contact_email,
        $contact_phone,
        $start_date,
        $end_date,
        $location,
        $venue,
        $venue_id,
        $organizer_id,
        $status,
        $created_at,
        $updated_at
    );

    if ($stmt->execute()) {
        echo "✅ Event created successfully!";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
