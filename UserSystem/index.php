<?php  include('phpcode.php'); ?>
<?php 
// SHOW USERS DATA TO BE EDITED
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM user_info WHERE id=$id");

		$n = mysqli_fetch_array($record);
		$user_name = $n['user_name'];
		$user_email = $n['user_email'];
		$user_birthday = $n['user_birthday'];
		$user_gender = $n['user_gender'];
	}
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<html>
<head>
	<title>User Management System - Miguel Rodrigues</title>
</head>
<body>
	<?php $query = mysqli_query($db, "SELECT * FROM user_info"); ?>

	<!--  LIST OF USERS -->
	<table>
	<tbody>
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Birthday</th>
				<th>Gender</th>
				<th colspan="2"></th>
			</tr>
		</thead>
		
			<?php while ($row = mysqli_fetch_array($query)) { ?>
				<tr>
					<td><?php echo $row['user_name']; ?></td>
					<td><?php echo $row['user_email']; ?></td>
					<td><?php echo $row['user_birthday']; ?></td>
					<td><?php echo $row['user_gender']; ?></td>
					<td>
						<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
					</td>
					<td>
						<a href="phpcode.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>			
	</table>

	<!-- INPUT DATA -->
	<form method="post" action="phpcode.php">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<?php if ($update == true): ?>
				<input type="text" name="name" value="<?php echo $user_name; ?>">
			<?php else: ?>
				<input type="text" name="name" value="">
			<?php endif ?>
		</div>
		<div class="input-group">
			<label>Email</label>
			<?php if ($update == true): ?>
				<input type="text" name="email" value="<?php echo $user_email; ?>">
			<?php else: ?>
				<input type="text" name="email" value="">
			<?php endif ?>
		</div>
		<div class="input-group">
			<label>Birthday</label>
			<?php if ($update == true): ?>
				<input type="text" name="birthday" value="<?php echo $user_birthday; ?>">
			<?php else: ?>
				<input type="text" name="birthday" value="" placeholder="YYYY-MM-DD">
			<?php endif ?>
		</div>
		<div class="input-group">
			<label>Gender</label>
			<?php if ($update == true): ?>
				<input type="text" name="gender" value="<?php echo $user_gender; ?>">
			<?php else: ?>
				<input type="text" name="gender" value="">
			<?php endif ?>
		</div>
		<div class="input-group">
		<?php if ($update == true): ?>
		<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
		</div>
	</form>

	<!-- INFO MESSAGE -->
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
</body>
</html>