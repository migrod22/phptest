<?php 
    // Interactions with the DB, create, edit and delete
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'usersystem1');

	$name = "";
    $email = "";
    $birthday = "";
    $gender = "";
	$id = 0;
    $update = false;
    
    // Create User
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];

		mysqli_query($db, "INSERT INTO user_info (user_name, user_email, user_birthday, user_gender) VALUES ('$name', '$email', '$birthday', '$gender')"); 
		$_SESSION['message'] = "User created successfully"; 
		header('location: index.php');
    }

    // Edit User
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
    
        mysqli_query($db, "UPDATE user_info SET user_name='$name', user_email='$email', user_birthday='$birthday', user_gender='$gender' WHERE id=$id");
        $_SESSION['message'] = "User updated successfully"; 
        header('location: index.php');
    }
    
    // Delete User
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM user_info WHERE id=$id");
        $_SESSION['message'] = "User deleted successfully"; 
        header('location: index.php');
    }
?>