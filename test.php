<html>
    <?php
        require_once("connection.php");
        session_start();

     $query2 = "SELECT sum(amount) AS totalsales, month, year FROM auditsales WHERE month!= month(now()) AND year= year(now()) Group BY month,year";
     $result2 = mysqli_query($con, $query2);  
    ?>
  <head>
        <title>Lunatech Systems</title>
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom styles for this page -->
          <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(lineChart); 
         
               
               function lineChart()  
           {
                var data = google.visualization.arrayToDataTable([  
                          ['Month', 'Total Sales'],  
                          <?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row["month"]."', ".$row["totalsales"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {
                      title: 'Sales per Day',
                      curveType: 'function',
                      legend: { position: 'bottom'}
                     };  
                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));  
                chart.draw(data, options);  
           }
           </script>  
        

    </head>
    <body>
                                                    <div id="curve_chart" style="width: 100%; height: 100%;"></div> 
</body>
</html>