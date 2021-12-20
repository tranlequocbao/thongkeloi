<?php
session_start();
if (!$_SESSION['position']) {
	header('location:index.html');
	if (isset($_POST['logout'])) {
		session_destroy();
		header('location:index.html');
	}
}
?>
<script type="text/javascript">
	var postion = "<?php echo $_SESSION['position']; ?>";
	console.log(postion);
</script>
<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/tableList/css/material-icon.css">
	<link rel="stylesheet" href="vendor/awsome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/bootstrap/datetimePicker/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="vendor/css/sweetalert2.min.css">

	<link rel="stylesheet" href="assets/css/style.css">
	<title>ỨNG DỤNG THỐNG KÊ LỖI</title>
</head>

<body>
	<div class="container-fluid">
		<div class="nav-bar">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="#">
					<img src="assets/img/LOGO.jpg" width="160" height="40" class="d-inline-block align-top" alt="">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item ">
							<a class="nav-link" id="home" href="#"><i class="fa fa-home" aria-hidden="true"></i> Nhập lỗi </a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" id="list" href="#"><i class="fa fa-list" aria-hidden="true"></i> Danh sách lỗi<span class="sr-only"></span></a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-bar-chart" aria-hidden="true"></i> Biểu đồ
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">

								<a class="dropdown-item" href="#">Nhà máy</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Xưởng</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Tổ</a>

							</div>
						</li>
						<!-- <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li> -->
					</ul>
					<form class="form-inline my-2 my-lg-0">
						<!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
						<a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
					</form>
				</div>
			</nav>
		</div>
		<div class="content">

			<div class="container-xl">
				<div class="table-responsive">
					<div class="table-wrapper">
						<div class="table-title">
							<div class="row">
								<div class="col-sm-6">
									<h2>Danh sách <b>Lỗi</b></h2>
								</div>
								<!-- <div class="col-sm-6">
									<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
									<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
								</div> -->
							</div>
						</div>
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>
										<span class="custom-checkbox">
											<input type="checkbox" id="selectAll">
											<label for="selectAll"></label>
										</span>
									</th>
									<th>Số VIN</th>
									<th>Loại Body</th>
									<th>Loại lỗi</th>
									<th>Ngày</th>
									<th>Thao tác</th>
								</tr>
							</thead>
							<tbody id="listData">
								
								
							</tbody>
						</table>
						<div class="clearfix">
							<!-- <div class="hint-text">Showing <b>10</b> out of <b>25</b> entries</div>
							<ul class="pagination">
								<li class="page-item disabled"><a href="#">Previous</a></li>
								<li class="page-item"><a href="#" class="page-link">1</a></li>
								<li class="page-item"><a href="#" class="page-link">2</a></li>
								<li class="page-item active"><a href="#" class="page-link">3</a></li>
								<li class="page-item"><a href="#" class="page-link">4</a></li>
								<li class="page-item"><a href="#" class="page-link">5</a></li>
								<li class="page-item"><a href="#" class="page-link">Next</a></li>
							</ul> -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="deleteEmployeeModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form>
						<div class="modal-header">
							<h4 class="modal-title">Delete Employee</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<p>Are you sure you want to delete these Records?</p>
							<p class="text-warning"><small>This action cannot be undone.</small></p>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-danger" value="Delete">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
		<script type="text/javascript" src="assets/js/main.js"></script>
		<script type="text/javascript" src="assets/js/form.js"></script>

		<script src="vendor/jquery/jquery-3.6.js"></script>
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->


		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="vendor/js/moment.min.js"></script>
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
		<script type="text/javascript" src="vendor/bootstrap/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
		<!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


		<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script> -->
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" /> -->
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js" integrity="sha256-2JRzNxMJiS0aHOJjG+liqsEOuBb6++9cY4dSOyiijX4=" crossorigin="anonymous"></script>-->
		<!-- <link rel="stylesheet" href="vendor/font/css/font-all.css"> -->
		<script type="text/javascript" src="vendor/jquery/query-ui.js"></script>
		<script type="text/javascript" src="vendor/js/sweetalert2.all.min.js"></script>


		<script>
			var userSubmit='<?=$_SESSION['position'];?>';
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$(document).ready(function() {
					// Activate tooltip
					$('[data-toggle="tooltip"]').tooltip();

					// Select/Deselect checkboxes
					var checkbox = $('table tbody input[type="checkbox"]');
					$("#selectAll").click(function() {
						if (this.checked) {
							checkbox.each(function() {
								this.checked = true;
							});
						} else {
							checkbox.each(function() {
								this.checked = false;
							});
						}
					});
					checkbox.click(function() {
						if (!this.checked) {
							$("#selectAll").prop("checked", false);
						}
					});
					
					$('#home').click(function() {
						window.location.href = 'thongkeloi.php';
					})

					_doit.loadListError(userSubmit);
				});
			})
		</script>
</body>




</html>

<!-- Edit Modal HTML -->