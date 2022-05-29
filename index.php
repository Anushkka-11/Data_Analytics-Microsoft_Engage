<?php
include_once('connection.php');
//exportExcel();exit;
$get = $_GET;
$arrData = getDataFromTable($get);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Car Seraching Tool</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/grid/">

    <!-- Bootstrap core CSS container -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="pl-5 pr-5 mt-5">
        <div class="form mb-3">
            <h1>Filters</h1>
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Filter By Company" name="company" value="<?php echo (!empty($get['company']))?$get['company']:'' ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Filter By Minimum Price" name="min" value="<?php echo (!empty($get['min']))?$get['min']:'' ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Filter By Maximum Price" name="max" value="<?php echo (!empty($get['max']))?$get['max']:'' ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Filter By Fuel Type" name="fuel_type" value="<?php echo (!empty($get['fuel_type']))?$get['fuel_type']:'' ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Filter By Milege" name="milage" value="<?php echo (!empty($get['milage']))?$get['milage']:'' ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Filter By Car Body Type" name="body_type" value="<?php echo (!empty($get['body_type']))?$get['body_type']:'' ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Filter By Type" name="type" value="<?php echo (!empty($get['type']))?$get['type']:'' ?>">
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">MAKE</th>
                        <th scope="col">MODEL</th>
                        <th scope="col">VARIANT</th>
                        <th scope="col">Ex-Showroom Price</th>
                        <th scope="col">Cylinders</th>
                        <th scope="col">Fuel Type</th>
                        <th scope="col">Height</th>
                        <th scope="col">Length</th>
                        <th scope="col">Width</th>
                        <th scope="col">Body Type</th>
                        <th scope="col">City Mileage</th>
                        <th scope="col">Ground Clearance</th>
                        <th scope="col">Power Windows</th>
                        <th scope="col">Power</th>
                        <th scope="col">Torque</th>
                        <th scope="col">Seating Capacity</th>
                        <th scope="col">Type</th>
                        <th scope="col">Wheelbase</th>
                        <th scope="col">Audiosystem</th>
                        <th scope="col">Basic Warranty</th>
                        <th scope="col">Extended Warranty</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty(mysqli_num_rows($arrData))){
                    while ($row = $arrData->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['company'] ?></td>
                            <td><?php echo $row['model'] ?></td>
                            <td><?php echo $row['variant'] ?></td>
                            <td><?php echo $row['ex_showroom_price'] ?></td>
                            <td><?php echo $row['cylinders'] ?></td>
                            <td><?php echo $row['fuel_Type'] ?></td>
                            <td><?php echo $row['height'] ?></td>
                            <td><?php echo $row['length'] ?></td>
                            <td><?php echo $row['width'] ?></td>
                            <td><?php echo $row['body_type'] ?></td>
                            <td><?php echo $row['city_mileage'] ?></td>
                            <td><?php echo $row['ground_clearance'] ?></td>
                            <td><?php echo $row['power_windows'] ?></td>
                            <td><?php echo $row['power'] ?></td>
                            <td><?php echo $row['torqe'] ?></td>
                            <td><?php echo $row['seating_capacity'] ?></td>
                            <td><?php echo $row['type'] ?></td>
                            <td><?php echo $row['wheelbase'] ?></td>
                            <td><?php echo $row['Audiosystem'] ?></td>
                            <td><?php echo $row['basic_warranty'] ?></td>
                            <td><?php echo $row['extended_warranty'] ?></td>
                        </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>