<?php
//initialise variable to respective form data

$callerName = $_POST['callerName'];
$contactNo = $_POST['contactNo'];
$locationofIncident = $_POST['locationofIncident'];
$typeofIncident = $_POST['typeofIncident'];
$descriptionofIncident = $_POST['descriptionofIncident']

$cars = [];

request_once 'db.php';
$conn = new mysql(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

$sql = "SELECT patrolcar.patrolcar_id, patrolcar_status.patrolcar_status_desc FROM partolcar JOIN patrolcar_status ON patrolcar.patrolcar_status_id=patrolcar_status.patrolcar_status_id";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
	$id = $row ['patrolcar_id'];
	$status = $row ['patrolcar_status_desc'];
	$car = ["id" => $id, "status" => $status];

	$array_push($cars, $car);
}

?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		
		<title>Dispatch</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	</head>
	<body>
	<div class="container" style="width: 80%;">
		<?php request_once 'nav.php'; ?>

		<section style="margin-top: 20%;">
			<form action="dispatch.php" method="post">
				<div class="form-group row">
					<label for="callerName" class="col-sm-4 col-form-label">Caller's Name</label>
					<div class="col-sm-8">
						<?php echo $callerName; ?>					
							<input type="hidden" name="callerName" id="callerName" value="<<?php echo $callerName; ?>">
					</div>
				</div>

			<div class="form-group row">
					<label for="contactNo" class="col-sm-4 col-form-label">Contact Number</label>
					<div class="col-sm-8">
						<?php echo $contactNo; ?>					
							<input type="hidden" name="contactNo" id="contactNo" value="<<?php echo $contactNo; ?>">
					</div>
				</div>


	<div class="form-group row">
					<label for="locationofIncident" class="col-sm-4 col-form-label">Location Of Incident</label>
					<div class="col-sm-8">
						<?php echo $locationofIncident; ?>					
							<input type="hidden" name="locationofIncident" id="locationofIncident" value="<<?php echo $locationofIncident; ?>">
					</div>
				</div>


<div class="form-group row">
					<label for="typeofIncident" class="col-sm-4 col-form-label">Type Of Incident</label>
					<div class="col-sm-8">
						<?php echo $typeofIncident; ?>					
							<input type="hidden" name="typeofIncident" id="typeofIncident" value="<<?php echo $typeofIncident; ?>">
					</div>
				</div>


<div class="form-group row">
					<label for="descriptionofIncident" class="col-sm-4 col-form-label">Description Of Incident</label>
					<div class="col-sm-8">
						<?php echo $descriptionofIncident; ?>					
							<input type="hidden" name="descriptionofIncident" id="descriptionofIncident" value="<<?php echo $descriptionofIncident; ?>">
					</div>
				</div>



<div class="form-group row">
					<label for="patrolCars" class="col-sm-4 col-form-label">Choose Patrol Car(s)</label>
					<div class="col-sm-8">
						<?php echo $patrolCars; ?>					
							<input type="hidden" name="patrolCars" id="patrolCars" value="<<?php echo $patrolCars; ?>">
					</div>
				</div>


<div class="form-group row">
	<div class="col-sm-4"></div>
		<div class="col-sm-8" style="text-align: center;">
			<input type="submit" name="btnDispatch" class="btn btn-primary" value="Dispatch">
		</div>
</div>


		</form>
		</section>
		
<footer class="page-footer font-small blue pt-4 footer-copyright text-center py-3">
&copy;2022 Copyright
<a href="www.ite.edu.sg">ITE</a>	

</footer>

<script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>

<script type="text/javascript" src="js/popper.min.js"></script>

<script type="text/javascript" src="js/bootstrap.js"></script>

	</div>


	</body>
	</html>