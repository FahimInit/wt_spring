<?php
include 'db.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql = "UPDATE students SET name='$name', email='$email', department='$department' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
    <style>
        body { 
            font-family: Arial; 
            padding: 40px; display: 
            flex; justify-content: center; 
        }
        
        form { 
            background: white; 
            padding: 30px; 
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
            width: 400px; 
        }
    </style>
</head>
<body>
    <form method="post">
        <h2>Update Student Info</h2>
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" style="width:100%"><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" style="width:100%"><br><br>
        
        <label>Department:</label><br>
        <select name="department" style="width:100%">
            <option value="CSE" <?php if($row['department'] == "CSE") echo "selected"; ?>>CSE</option>
            <option value="BBA" <?php if($row['department'] == "BBA") echo "selected"; ?>>BBA</option>
            <option value="EEE" <?php if($row['department'] == "EEE") echo "selected"; ?>>EEE</option>
            <option value="LLB" <?php if($row['department'] == "LLB") echo "selected"; ?>>LLB</option>
        </select><br><br>
        
        <input type="submit" name="update" value="Save Changes">
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>