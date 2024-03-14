<!DOCTYPE html>
<html>
<head>
<title>Basic MySQLi Commands</title>
</head>
<body>
    <?php
        $conn = mysqli_connect("localhost","root","","disty");
        // Check connection
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        $user_id=$_GET['id'];
        $query=mysqli_query($conn,"select * from user where user_id='$user_id'");
        $row=mysqli_fetch_array($query);
    ?>
	<h2>Edit</h2>
	<form method="POST" action="update.php?id=<?php echo $row['user_id']; ?>">
		<label>Username:</label><input type="text" value="<?php echo $row['username']; ?>" name="username">
		<label>Password:</label><input type="text" value="<?php echo $row['password']; ?>" name="password">
        <label>Nama Lengkap:</label><input type="text" value="<?php echo $row['nama_lengkap']; ?>" name="nama_lengkap">
        <input type="submit" name="submit">
		<a href="admin_table.php">Back</a>
	</form>
</body>
</html>