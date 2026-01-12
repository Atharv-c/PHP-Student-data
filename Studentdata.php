<?php
$conn = mysqli_connect("localhost", "root", "", "student");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$name = $_POST['name'];
$roll_no = $_POST['roll_no'];
$contact_no = $_POST['contact_no'];

$mark1 = $_POST['mark1'];
$mark2 = $_POST['mark2'];
$mark3 = $_POST['mark3'];
$mark4 = $_POST['mark4'];


$sql = "INSERT INTO student (name, roll_no, contact_no)  VALUES ('$name', '$roll_no', '$contact_no')";

if (mysqli_query($conn, $sql)) {

    $student_id = mysqli_insert_id($conn);
    $sql_m = "INSERT INTO marks (student_id, mark1, mark2, mark3, mark4) VALUES ('$student_id', '$mark1', '$mark2', '$mark3', '$mark4')";
                 

    if (mysqli_query($conn, $sql_m)) {
        echo "Student and marks added successfully!";
    } else {
        echo "Error inserting marks: " . mysqli_error($conn);
    }
} else {
    echo "Error inserting student: " . mysqli_error($conn);
}

mysqli_close($conn);
?>