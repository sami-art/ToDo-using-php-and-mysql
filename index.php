<?php  include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>To Do List in Php</title>
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
    <div class="container">
        <h1>To Do List App</h1>
    <form action="server.php" method="post">
        <input type="text" name="task" size="30" placeholder="Enter your task">
        <button type="submit" id="add-btn" name="add-btn" value="Add">Add</button>
    </form>
    <?php $results = mysqli_query($conn, "SELECT * FROM tasks"); ?>
    <table>
        <thead>
            <tr>
            <td>ID</td>
            <td>Tasks</td>
            </tr>
            </thead>
            <?php while ($row = mysqli_fetch_array($results)) { ?> 
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['task']?></td>
                <td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
            </tr>
            <?php } ?>
    </table>
    </div>
</body>
</html>