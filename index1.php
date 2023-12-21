<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UltaSonic Sensor Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>  
<body class="p-3">
<div class="container p-3 bg-info" style="border-radius: 20px">

<div class="row">
<h2 class="text-center text-danger p-4">It is result of NodeMCU(esp8266) of capsule->#0001</h2>
</div>
<?php

$servername = "localhost";
$dbname = "id21683865_qazqazqaz";
$username = "id21683865_qazqazqaz";
$password = "Jk*M/!yR7";
 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
$sql = "SELECT id, SensorData, LocationData, value1, value2, value3, reading_time FROM ESPData ORDER BY id DESC";
 
?>
<table cellspacing="5" class="table" cellpadding="5">
      <tr> 
        <th scope="col" >ID</th> 
        <th scope="col">SensorData</th> 
        <th scope="col">LocationData</th> 
        <th scope="col">Value 1</th> 
        <th scope="col">Value 2</th>
        <th scope="col">Value 3</th> 
        <th scope="col">Timestamp</th> 
      </tr>
<?php

 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_SensorData = $row["SensorData"];
        $row_LocationData = $row["LocationData"];
        $row_value1 = $row["value1"];
        $row_value2 = $row["value2"]; 
        $row_value3 = $row["value3"]; 
        $row_reading_time = $row["reading_time"];
        
      
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_SensorData . '</td> 
                <td>' . $row_LocationData . '</td> 
                <td>' . $row_value1 . '</td> 
                <td>' . $row_value2 . '</td>
                <td>' . $row_value3 . '</td> 
                <td>' . $row_reading_time . '</td> 
              </tr>';
    }
    $result->free();
}
 
$conn->close();
?>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>