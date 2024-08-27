<?php
include 'config/config.php';

// Get current date
$currentDate = date('Y-m-d');

$result = $db->query("SELECT * FROM customer_managment WHERE credit_threshold < '$currentDate'");

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $customerID = $row['id'];
        $customerEmail = $row['email_id'];

        // Send reminder message (replace with your actual messaging code)
        $reminderMessage = "Dear customer, your subscription has expired. Please renew.";
        mail($customerEmail, "Subscription Reminder", $reminderMessage);

        
        $db->query("UPDATE customer_managment SET reminder_send='1' WHERE id = '$customerID'");

        echo "success";
    }
} else {
    echo "No expired customers found.";
}

$db->close();
?>
