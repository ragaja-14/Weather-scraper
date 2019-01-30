<?php
$report="";
   
  error_reporting(0);
ini_set(“display_errors”, 0 );

   if (array_key_exists('city', $_GET)&&$_GET['city']!='')
   { 
      $urlcontents=file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=cfb41c560561f1237d0e705e57993e6f");
      $weather_details=json_decode($urlcontents,true); 
     
      if($weather_details['cod']==200)
      {
          $report.='<div class="alert alert-success">The city location is at longitude: '.$weather_details[coord]
        [lon].', and latitude: '.$weather_details[coord][lat].'.<br>';
          $report.='The Avg Temp is '.$weather_details[main][temp]. 'and it varies between '.$weather_details[main][temp_min].'&degC and '.$weather_details[main][temp_max].'&degC .<br> The humidity is '.$weather_details[main][humidity].'.<b>The climate is likely to '.$weather_details[weather][0][description] .'.</b></div>';
      }
       else
       {
           $report="<div class='alert alert-danger'>Please check the selling and Enter a valid city.'</div>'";
       }
   }

   
   
?>
<!DOCTYPE HTML>
<html>
<head><title>WEATHER SCRAPER</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    </head>
    <style type="text/css">
        html{
            background: url(bg.jpg) no-repeat center center fixed;
            background-size:cover;
            -o-background-size:cover;
            -moz-background-size:cover;
            -webkit-background-size:cover;
             width:60%; margin:0 auto;
            margin-top: 140px;!important
        }
        
        .container{
           
            text-align: center;
            font-family: ;
            color:
        }
        body{
            color:white;
            background:transparent;
        }
       
    </style>
   <body>
      <div class="container">
      <div class="main1"> <h2>What's The Weather ??</h2>
          <br>
          <form method="get">
              <fieldset class="form-group">
          <label for='examplecity'>
              <h4>Enter The city Name</h4>
              </label>
                  
              <input type="text" class="form-control" name="city" value="<?php if(array_key_exists('city', $_GET)) echo $_GET['city']?>" placeholder="Eg:London" >
                  <br>
                  
                  <button class="btn btn-primary" >Submit</button>
                <br>
                  </fieldset>
          </form></div>
          <div><?php
           if(array_key_exists('city', $_GET))
           echo $report;
          ?></div>
          
       </div>
       
    </body>
   <script type="text/javascript">
    
   
    
    </script>
</html>