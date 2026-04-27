<!-- <?php

// variables
 $name = $age = $email = $password = $phone = $username = $website = $gender = $zipcode = "";
 $nameErr = $ageErr = $emailErr = $passwordErr = $phoneErr = $usernameErr = $websiteErr = $genderErr = $zipcodeErr = "";
 $success = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {

// name
 if (empty($_POST["name"])) {
 $nameErr = "Name is required";
 } else {
 $name = test_input($_POST["name"]);
 if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
 $nameErr = "Only letters and white space allowed";
 }
 }

// age
 if (empty($_POST["age"])) {
 $ageErr = "Age is required";
 } else {
 $age = test_input($_POST["age"]);
 if (!is_numeric($age)) {
 $ageErr = "Age must be a number";
 } elseif ($age < 10 || $age > 100) {
 $ageErr = "Age must be between 10 and 100";
 }
 }

// email
 if (empty($_POST["email"])) {
 $emailErr = "Email is required";
 } else {
 $email = test_input($_POST["email"]);
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $emailErr = "Invalid email format (must contain @)";
 }
 }

// password
 if (empty($_POST["password"])) {
 $passwordErr = "Password is required";
 } else {
 $password = $_POST["password"];
 if (strlen($password) < 8) {
 $passwordErr = "Password must be at least 8 characters";
 }
 }

// phone
 if (empty($_POST["phone"])) {
 $phoneErr = "Phone number is required";
 } else {
 $phone = test_input($_POST["phone"]);
 if (!preg_match("/^[0-9]{11}$/", $phone)) {
 $phoneErr = "Phone number must be exactly 11 digits";
 }
 }

// username
 if (empty($_POST["username"])) {
 $usernameErr = "Username is required";
 } elseif (!preg_match("/^[a-zA-Z0-9_]*$/", $_POST["username"])) {
 $usernameErr = "Only letters, numbers, and underscores allowed";
 } else {
 $username = test_input($_POST["username"]);
 }

// website
 if (empty($_POST["website"])) {
 $websiteErr = "Website is required";
 } elseif (!filter_var($_POST["website"], FILTER_VALIDATE_URL)) {
 $websiteErr = "Invalid URL format";
 } else {
 $website = test_input($_POST["website"]);
 }

// gender
 if (empty($_POST["gender"])) {
 $genderErr = "Gender is required";
 } elseif ($_POST["gender"] != "Male" && $_POST["gender"] != "Female" && $_POST["gender"] != "Other") {
 $genderErr = "Please select Male, Female, or Other";
 } else {
 $gender = test_input($_POST["gender"]);
 }

// zipcode
 if (empty($_POST["zipcode"])) {
 $zipcodeErr = "Zip Code is required";
 } elseif (!preg_match("/^[0-9]{5}$/", $_POST["zipcode"])) {
 $zipcodeErr = "Zip Code must be exactly 5 digits";
 } else {
 $zipcode = test_input($_POST["zipcode"]);
 }

 if (empty($nameErr) && empty($ageErr) && empty($emailErr) && empty($passwordErr) && empty($phoneErr) && empty($usernameErr) && empty($websiteErr) && empty($genderErr) && empty($zipcodeErr)) {
 $success = "Form submitted successfully! All fields are valid.";
 }
 }

 function test_input($data) {
 $data = trim($data); 
 return $data;
 }

 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
 <title>Student Registration</title>
 <style>
 body {
 font-family: Arial, sans-serif;
 margin: 50px;
 padding: 0 auto;
 }
 .error {
 color: red;
 font-size: 0.9em;
 }
 .success {
 color: green;
 font-size: 1.1em;
 }
 input[type="text"], input[type="email"], input[type="password"], input[type="number"], select {
 margin: 8px 0;
 padding: 8px;
 width: 320px;
 box-sizing: border-box;
 }
 label {
 font-weight: bold;
 }
 </style>
</head>
<body>

 <h2>Registration Form - PHP Validation</h2>

 <?php

// variables
 $name = $email = $username = $password = $confirm = $age = $gender = $course = $terms = "";
 $nameErr = $emailErr = $usernameErr = $passwordErr = $confirmErr = $ageErr = $genderErr = $courseErr = $termsErr = "";
 $success = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {

// name
 if (empty($_POST["name"])) {
 $nameErr = "Full Name is required";
 } else {
 $name = test_input($_POST["name"]);
 if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
 $nameErr = "Only letters and white space allowed";
 }
 }

// email
 if (empty($_POST["email"])) {
 $emailErr = "Email is required";
 } else {
 $email = test_input($_POST["email"]);
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $emailErr = "Invalid email format";
 }
 }

// username
 if (empty($_POST["username"])) {
 $usernameErr = "Username is required";
 } else {
 $username = test_input($_POST["username"]);
 if (strlen($username) < 5) {
 $usernameErr = "Username must be at least 5 characters long";
 }
 }

// password
 if (empty($_POST["password"])) {
 $passwordErr = "Password is required";
 } else {
 $password = $_POST["password"];
 if (strlen($password) < 6) {
 $passwordErr = "Password must be at least 6 characters long";
 }
 }

// confirm password
 if (empty($_POST["confirm"])) {
 $confirmErr = "Please confirm your password";
 } else {
 $confirm = $_POST["confirm"];
 if ($password !== $confirm) {
 $confirmErr = "Passwords do not match";
 }
 }

// age
 if (empty($_POST["age"])) {
 $ageErr = "Age is required";
 } else {
 $age = test_input($_POST["age"]);
 if (!is_numeric($age)) {
 $ageErr = "Age must be a number";
 } elseif ($age < 18) {
 $ageErr = "Age must be 18 or above";
 }
 }

// gender
 if (empty($_POST["gender"])) {
 $genderErr = "Gender is required";
 } else {
 $gender = test_input($_POST["gender"]);
 }

// course
 if (empty($_POST["course"])) {
 $courseErr = "Course selection is required";
 } else {
 $course = test_input($_POST["course"]);
 }

// terms
 if (empty($_POST["terms"])) {
 $termsErr = "You must agree to the Terms & Conditions";
 } else {
 $terms = test_input($_POST["terms"]);
 }

// success check
 if (empty($nameErr) && empty($emailErr) && empty($usernameErr) && empty($passwordErr) && empty($confirmErr) && empty($ageErr) && empty($genderErr) && empty($courseErr) && empty($termsErr)) {
 $success = "Registration Successful!<br><br>
 <strong>Submitted Details:</strong><br>
 Name: $name<br>
 Email: $email<br>
 Username: $username<br>
 Age: $age<br>
 Gender: $gender<br>
 Course: $course";
 }
 }

 function test_input($data) {
 $data = trim($data); 
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
 }

 ?>

 <?php if ($success): ?>
    <div class='success'><p><?php echo $success; ?></p></div>
 <?php else: ?>

 <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

 <label>Full Name:</label><br>
 <input type="text" name="name" value="<?php echo $name; ?>" >
 <span class="error">* <?php echo $nameErr; ?></span><br><br>

 <label>Email Address:</label><br>
 <input type="email" name="email" value="<?php echo $email; ?>" >
 <span class="error">* <?php echo $emailErr; ?></span><br><br>

 <label>Username:</label><br>
 <input type="text" name="username" value="<?php echo $username; ?>" >
 <span class="error">* <?php echo $usernameErr; ?></span><br><br>

 <label>Password:</label><br>
 <input type="password" name="password" >
 <span class="error">* <?php echo $passwordErr; ?></span><br><br>

 <label>Confirm Password:</label><br>
 <input type="password" name="confirm" >
 <span class="error">* <?php echo $confirmErr; ?></span><br><br>

 <label>Age:</label><br>
 <input type="number" name="age" value="<?php echo $age; ?>" min="18" >
 <span class="error">* <?php echo $ageErr; ?></span><br><br>

 <label>Gender:</label><br>
 <input type="radio" name="gender" value="Male" <?php if (isset($gender) && $gender == "Male") echo "checked"; ?> style="width: auto;"> Male
 <input type="radio" name="gender" value="Female" <?php if (isset($gender) && $gender == "Female") echo "checked"; ?> style="width: auto;"> Female
 <span class="error">* <?php echo $genderErr; ?></span><br><br>

 <label>Course Selection:</label><br>
 <select name="course">
    <option value="">Select a Course</option>
    <option value="Computer Science" <?php if ($course == "Computer Science") echo "selected"; ?>>Computer Science</option>
    <option value="Business Administration" <?php if ($course == "Business Administration") echo "selected"; ?>>Business Administration</option>
    <option value="Engineering" <?php if ($course == "Engineering") echo "selected"; ?>>Engineering</option>
    <option value="Arts" <?php if ($course == "Arts") echo "selected"; ?>>Arts</option>
 </select>
 <span class="error">* <?php echo $courseErr; ?></span><br><br>

 <input type="checkbox" name="terms" value="Accepted" <?php if (isset($terms) && $terms == "Accepted") echo "checked"; ?> style="width: auto;">
 <label style="display: inline;">I agree to the Terms & Conditions</label>
 <span class="error">* <?php echo $termsErr; ?></span><br><br>

 <input type="submit" value="Register" style="padding: 12px 25px; font-size: 16px; width: auto;">
 </form>

 <?php endif; ?>

</body>
</html> -->