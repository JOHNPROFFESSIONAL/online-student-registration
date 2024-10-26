<?php
$fullname = $email = $phone = $gender = $field = '';
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $gender = htmlspecialchars($_POST['gender']);
    $field = htmlspecialchars($_POST['field']);

    // Simple validation: Check if phone number is numeric
    if (!is_numeric($phone)) {
        $error_message = 'Invalid phone number. Please enter a valid number.';
    } else {
        // Display the submitted information
        echo "<h1>Registration Successful</h1>";
        echo "<p>Full Name: $fullname</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Phone Number: $phone</p>";
        echo "<p>Gender: $gender</p>";
        echo "<p>Field of Study: $field</p>";
        exit; // Stop further execution after displaying results
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <h1>Student Registration Form</h1>
    <form id="registrationForm" method="POST" action="">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male" <?php if ($gender == 'male') echo 'selected'; ?>>Male</option>
            <option value="female" <?php if ($gender == 'female') echo 'selected'; ?>>Female</option>
            <option value="other" <?php if ($gender == 'other') echo 'selected'; ?>>Other</option>
        </select>

        <label for="field">Field of Study:</label>
        <select id="field" name="field" required>
            <option value="IT" <?php if ($field == 'IT') echo 'selected'; ?>>IT</option>
            <option value="CS" <?php if ($field == 'CS') echo 'selected'; ?>>Computer Science</option>
            <option value="IS" <?php if ($field == 'IS') echo 'selected'; ?>>Information Systems</option>
            <option value="SE" <?php if ($field == 'SE') echo 'selected'; ?>>Software Engineering</option>
        </select>

        <button type="submit">Submit</button>
    </form>

    <div style="color: red;"><?php echo $error_message; ?>
</div>
<script src="script.js"></script>


</body>
</html>
