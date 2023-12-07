<?php
include 'config.php';

// select data yang akan diedit
$q_select = "SELECT * FROM tasks WHERE taskid = ?";
$stmt_select = $conn->prepare($q_select);
$stmt_select->bind_param("i", $_GET['id']);
$stmt_select->execute();
$d = $stmt_select->get_result()->fetch_object();

// proses edit data
if(isset($_POST['edit'])){
    $q_update = "UPDATE tasks SET tasklabel = ? WHERE taskid = ?";
    $stmt_update = $conn->prepare($q_update);
    $stmt_update->bind_param("si", $_POST['task'], $_GET['id']);
    $stmt_update->execute();

    header('Refresh:0; url=index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>To Do List</title>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
		* {
			padding:0;
			margin:0;
			box-sizing: border-box;
		}
		body {
			font-family: 'Roboto', sans-serif;
			background: #4e54c8;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #8f94fb, #4e54c8);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to right, #8f94fb, #4e54c8); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

		}
		.container {
			width: 590px;
			height: 100vh;
			margin:0 auto;
		}
		.header {
			padding: 15px;
			color: #fff;
		}
		.header .title {
			display: flex;
			align-items: center;
			margin-bottom: 7px;
		}
		.header .title i {
			font-size: 24px;
			margin-right: 10px;
			color: #fff;
		}
		.header .title span {
			font-size: 18px;
		}
		.header .description {
			font-size: 13px;
		}
		.content {
			padding: 15px;
		}
		.card {
			background-color: #fff;
			padding:15px;
			border-radius: 5px;
			margin-bottom: 10px;
		}
		.input-control {
			width:100%;
			display: block;
			padding:0.5rem;
			font-size: 1rem;
			margin-bottom: 10px;
		}
		.text-right {
			text-align: right;
		}
		button {
			padding:0.5rem 1rem;
			font-size: 1rem;
			cursor: pointer;
			background: #4e54c8;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #8f94fb, #4e54c8);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to right, #8f94fb, #4e54c8); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
			color: #fff;
			border:1px solid;
			border-radius: 3px;
		}
		.task-item {
			display: flex;
			justify-content: space-between;
		}
		.text-orange {
			color: orange;
		}
		.text-red {
			color: red;
		}
		.task-item.done span {
			text-decoration: line-through;
			color: #ccc;
		}

		@media (max-width: 768px){
			.container {
				width: 100%;
			}
		}
	</style>
</head>
<body>

	<div class="container">
		
		<div class="header">
			
			<div class="title">
				<a href="index.php"><i class='bx bx-chevron-left'></i></a>
				<span>Back</span>
			</div>

			<div class="description">
				<?= date("l, d M Y") ?>
			</div>

		</div>

		<div class="content">
			
			<div class="card">
				
				<form action="" method="post">
					
					<input type="text" name="task" class="input-control" placeholder="Edit task" value="<?= $d->tasklabel ?>">

					<div class="text-right">
						<button type="submit" name="edit">Edit</button>
					</div>

				</form>

			</div>

		</div>

	</div>

</body>
</html>