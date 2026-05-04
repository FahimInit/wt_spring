<?php 
include 'db.php'; 

$nameErr = $emailErr = $regNumberErr = $departmentErr = "";
$name = $email = $regNumber = $department = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $regNumber = mysqli_real_escape_string($conn, $_POST['regNumber']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);

    if (!empty($name) && !empty($email) && !empty($regNumber) && !empty($department)) {
        $sql = "INSERT INTO students (name, email, registration_no, department) 
                VALUES ('$name', '$email', '$regNumber', '$department')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Student Added Successfully!');</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}


// DELETE LOGIC 
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM students WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
    <style>

        body { 
            font-family: Arial; 
            padding: 20px; 
            background: #f4f7f6; 
        }
        
        form, table { 
            background: white; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
            margin-bottom: 20px; 
        }
        
        table { 
            width: 100%; 
            border-collapse: collapse; 
        }
        
        th, td { 
            border: 1px solid #ddd; 
            padding: 12px; text-align: left; 
        }
        
        th { 
            background-color: #28a745; 
            color: white; 
        }

        .btn-edit { 
            color: blue; 
            text-decoration: none; 
            margin-right: 10px; 
        }

        .btn-delete { 
            color: red; 
            text-decoration: none; 
        }

    </style>
</head>
<body>

    <h2>Add New Student</h2>
    <form method="post">
        <label>Full Name:</label><br>
        <input type="text" name="name" required><br><br>
        
        <label>Email Address:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Registration Number:</label><br>
        <input type="text" name="regNumber" required><br><br>
        
        <label>Department:</label><br>
        <select name="department" required>
            <option value="">Select</option>
            <option value="CSE">CSE</option>
            <option value="BBA">BBA</option>
            <option value="EEE">EEE</option>
            <option value="LLB">LLB</option>
        </select><br><br>
        
        <input type="submit" name="register" value="Add Student">
    </form>

    <h2>Student Records</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Reg No</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM students");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['registration_no']}</td>
                <td>{$row['department']}</td>
                <td>
                    <a class='btn-edit' href='update.php?id={$row['id']}'>Edit</a>
                    <a class='btn-delete' href='index.php?delete={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>