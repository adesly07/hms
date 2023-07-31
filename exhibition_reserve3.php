<?php
include ('umgt/includes/dbconnection.php');
if(!isset($_session)){
session_start();
}
 if(isset($_POST['submit']))
  {

 $space=$_POST['space'];
 $cat=$_POST['cat'];
 $name=$_POST['name'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $address=$_POST['address'];
 $sql1 = "SELECT * FROM space where myspace = '$space'";
$query1 = mysqli_query($db,$sql1);
while($rows = mysqli_fetch_assoc($query1)){
$price = $rows['price'];
}
 $sql3 = "INSERT INTO exhibition (id, space, price, cat, name, email, phone, address, date) VALUES ('', '$space', $price, '$cat', '$name', '$email', '$phone', '$address', CURRENT_TIMESTAMP)";
$result = mysqli_query($db, $sql3);

if($result){
	header('location:invoice.php');
//$msg = "Your room has been book successfully. Booking Number is $booknum";	
}else {
	die (mysqli_error());
// echo '<script>alert("Something Went Wrong. Please try again")</script>';}
}
}  
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Exhibition Space Reservation</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="umgt/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="umgt/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="umgt/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="umgt/css/icon-font.min.css" type='text/css' />
<script src="umgt/js/simpleCart.min.js"> </script>
<script src="umgt/js/amcharts.js"></script>	
<script src="umgt/js/serial.js"></script>	
<script src="umgt/js/light.js"></script>	
<!-- //lined-icons -->
<script src="umgt/js/jquery-1.10.2.min.js"></script>
   <!--pie-chart--->
<script src="umgt/js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<?php //include_once('umgt/includes/header.php');?>
				
				<!--content-->
			<div class="content">
<div class="women_main">
	<!-- start content -->
	<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Exhibition Space Reservation</h2>
					</div>
					<div class="panel panel-widget forms-panel">
						<div class="forms">
							<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
									<h4>====</h4>
								</div>
								<div class="form-body">
									
	<form action="exhibition_reserve.php" method="post">
					  <div class="form-group"> <label for="space">Space Type</label> <select type="text" name="space" id="space" value="" class="form-control" required="true">
<option value="" selected>Choose a Space Type</option>
    <?php 
$sql2 = "SELECT * from space";
$query2 = mysqli_query($db,$sql2);
while($rows = mysqli_fetch_assoc($query2)){
    ?>  
<option value="<?php echo $rows ['myspace'];?>"><?php echo $rows ['myspace'];?> @ <?php echo $rows ['price'];?></option>
 <?php } ?> 
              </select> 
					  </div>
                                                    <div class="form-group"> <label for="cat">Cartegory</label>  
                                                      <select name="cat" id="cat" class="form-control" >
                                                        <option value="Individual" selected>Individual</option>
                                                        <option value="Organization">Organization</option>
                                                      </select>
          </div>
                                                    <div class="form-group"> <label for="name">Full Name</label> <input name="name" type="text" class="form-control" id="name" value="" required='true'> </div>
                                                    <div class="form-group"> <label for="email">Email</label> <input name="email" type="email" class="form-control" id="email" value="" required='true'> </div>
                                                    
<div class="form-group"> <label for="phone">Phone Number</label>
  <input name="phone" type="text" class="form-control" id="phone" value="" required='true'> </div>                                                    
<div class="form-group"> <label for="address">Address</label>
                                      <textarea name="address" class="form-control" id="address" type="text" value=""></textarea> </div>
                                                    
                                  <button type="submit" class="btn btn-default" name="submit">Submit</button> </form> 
								</div>
							</div>
						</div>
					</div>
			
	
				</div>

	<!-- end content -->
	
<?php //include_once('umgt/includes/footer.php');?>
</div>

</div>
			<!--content-->
		</div>
</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
<div class="clearfix"></div>		
							</div>
				
<!--js -->
<script src="umgt/js/jquery.nicescroll.js"></script>
<script src="umgt/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="umgt/js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
   <!-- real-time -->
<script language="javascript" type="text/javascript" src="umgt/js/jquery.flot.js"></script>
	<script type="text/javascript">

	$(function() {

		// We use an inline data source in the example, usually data would
		// be fetched from a server

		var data = [],
			totalPoints = 300;

		function getRandomData() {

			if (data.length > 0)
				data = data.slice(1);

			// Do a random walk

			while (data.length < totalPoints) {

				var prev = data.length > 0 ? data[data.length - 1] : 50,
					y = prev + Math.random() * 10 - 5;

				if (y < 0) {
					y = 0;
				} else if (y > 100) {
					y = 100;
				}

				data.push(y);
			}

			// Zip the generated y values with the x values

			var res = [];
			for (var i = 0; i < data.length; ++i) {
				res.push([i, data[i]])
			}

			return res;
		}

		// Set up the control widget

		var updateInterval = 30;
		$("#updateInterval").val(updateInterval).change(function () {
			var v = $(this).val();
			if (v && !isNaN(+v)) {
				updateInterval = +v;
				if (updateInterval < 1) {
					updateInterval = 1;
				} else if (updateInterval > 2000) {
					updateInterval = 2000;
				}
				$(this).val("" + updateInterval);
			}
		});

		var plot = $.plot("#placeholder", [ getRandomData() ], {
			series: {
				shadowSize: 0	// Drawing is faster without shadows
			},
			yaxis: {
				min: 0,
				max: 100
			},
			xaxis: {
				show: false
			}
		});

		function update() {

			plot.setData([getRandomData()]);

			// Since the axes don't change, we don't need to call plot.setupGrid()

			plot.draw();
			setTimeout(update, updateInterval);
		}

		update();

		// Add the Flot version string to the footer

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
<!-- /real-time -->
<script src="umgt/js/jquery.fn.gantt.js"></script>
    <script>

		$(function() {

			"use strict";

			$(".gantt").gantt({
				source: [{
					name: "Sprint 0",
					desc: "Analysis",
					values: [{
						from: "/Date(1320192000000)/",
						to: "/Date(1322401600000)/",
						label: "Requirement Gathering", 
						customClass: "ganttRed"
					}]
				},{
					name: " ",
					desc: "Scoping",
					values: [{
						from: "/Date(1322611200000)/",
						to: "/Date(1323302400000)/",
						label: "Scoping", 
						customClass: "ganttRed"
					}]
				},{
					name: "Sprint 1",
					desc: "Development",
					values: [{
						from: "/Date(1323802400000)/",
						to: "/Date(1325685200000)/",
						label: "Development", 
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1325685200000)/",
						to: "/Date(1325695200000)/",
						label: "Showcasing", 
						customClass: "ganttBlue"
					}]
				},{
					name: "Sprint 2",
					desc: "Development",
					values: [{
						from: "/Date(1326785200000)/",
						to: "/Date(1325785200000)/",
						label: "Development", 
						customClass: "ganttGreen"
					}]
				},{
					name: " ",
					desc: "Showcasing",
					values: [{
						from: "/Date(1328785200000)/",
						to: "/Date(1328905200000)/",
						label: "Showcasing", 
						customClass: "ganttBlue"
					}]
				},{
					name: "Release Stage",
					desc: "Training",
					values: [{
						from: "/Date(1330011200000)/",
						to: "/Date(1336611200000)/",
						label: "Training", 
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Deployment",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1338711200000)/",
						label: "Deployment", 
						customClass: "ganttOrange"
					}]
				},{
					name: " ",
					desc: "Warranty Period",
					values: [{
						from: "/Date(1336611200000)/",
						to: "/Date(1349711200000)/",
						label: "Warranty Period", 
						customClass: "ganttOrange"
					}]
				}],
				navigate: "scroll",
				scale: "weeks",
				maxScale: "months",
				minScale: "days",
				itemsPerPage: 10,
				onItemClick: function(data) {
					alert("Item clicked - show some details");
				},
				onAddClick: function(dt, rowId) {
					alert("Empty space clicked - add an item!");
				},
				onRender: function() {
					if (window.console && typeof console.log === "function") {
						console.log("chart rendered");
					}
				}
			});

			$(".gantt").popover({
				selector: ".bar",
				title: "I'm a popover",
				content: "And I'm the content of said popover.",
				trigger: "hover"
			});

			prettyPrint();

		});

    </script>
		   <script src="umgt/js/menu_jquery.js"></script>
</body>
</html>