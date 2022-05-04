<?php 
 
 //include_once './Home.php';

 //$homeObject = new Home();

    $servername = "localhost";
    $username = "root";
    $password = "skola";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=stefan1", $username, $password);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //priprema upita + zastita od SQL injection
        $statement = $conn->prepare("SELECT * FROM sekcije");
        //izvrsavanje upita nad bazom
        $statement->execute();
        $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
        echo "Connected successfully"; 
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
       
        }
        
        $homeObject = $statement->fetchAll();
        
        foreach($homeObject as $element)
        {
           /* echo $element['id'];
            echo $element['slika'];
            echo $element['naslov'];
            echo $element['opis'];
            echo "<br>";*/
        }
        //die();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

  <style>
  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
    background-color: #1abc9c; /* Green */
    color: #ffffff;
  }
  .bg-2 { 
    background-color: #474e5d; /* Dark Blue */
    color: #ffffff;
  }
  .bg-3 { 
    background-color: #ffffff; /* White */
    color: #555555;
  }
  .bg-4 { 
    background-color: #2f2f2f; /* Black Gray */
    color: #fff;
  }
  .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
  }
  .navbar {
    padding-top: 15px;
    padding-bottom: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
    color: #1abc9c !important;
  }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Me</a>
    </div>
      <?php 

      ?>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        
      </ul>
    </div>
  </div>
</nav>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">What Am I?</h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
  <a href="#" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-search"></span> Search
  </a>
</div>
<?php
    //$nizSlika = $homeObject->getOpis();
?>
<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">    
  <h3 class="margin">Where To Find Me?</h3><br>
  <div class="row">
    <!--<?php   for($i = 0; $i < count($homeObject->slika); $i++): ?>
        <div class="col-sm-4">
            <h3> <?php echo $homeObject->naslov[$i]; ?> </h3>
            <p> <?php
                //echo $homeObject->getOpis()[$i];
                  echo $nizSlika[$i];
                ?> </p>
          <img src="<?php echo $homeObject->slika[$i]; ?>" class="img-responsive margin" style="width:100%" alt="Image">
        </div>
    <?php endfor; ?>
  </div>
    -->
    <?php foreach($homeObject as $element):?>
     <div class="col-sm-4">
            <h3> <?php echo $element['naslov'] ?> </h3>
            <p> <?php
                //echo $homeObject->getOpis()[$i];
                 echo $element['opis'] 
                ?> </p>
          <img src="<?php echo $element['slika']  ?>" class="img-responsive margin" style="width:100%" alt="Image">
          <button class="btn btn-primary" 
                  data-edit="<?php echo $element['id'] ?>"
                  onclick="editSection(this)"> 
          Edit </button>
     </div>
    <?php endforeach; ?>
</div>
<!--Button trigger modal -->
<button type="button"class="btn btn-primary"data-toggle="modal" data-target="#sekcija">
    Unesi sekciju</button>
<!--Modal -->
<div class="modal fade"id="sekcija"tabindex="-1"role="dialog"aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog"role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"id="exampleModalLabel">Modal title</h5>
                <button type="button"class="close"data-dismiss="modal"aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>
            <div class="modal-body">
                <span class="input-group-text">Naslob</span>
                <input type="text" class="form-control" id="naslov"/>
                <span class="input-group-text">Slika</span>
                <input type="text"  class="form-control"  id="slika"/>
                  <span class="input-group-text">Opis</span>
                <textarea type="text" class="form-control"  id="opis"></textarea>
            </div>
        <div class="modal-footer">
            <button type="button"class="btn btn-secondary"data-dismiss="modal">Close</button>
            <button type="button"class="btn btn-primary" id="sacuvaj">Save changes</button>
        </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Bootstrap Theme Made By <a href="https://www.w3schools.com">www.w3schools.com</a></p> 
</footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <script> 
    function editSection(element)
    {
       var element_id =  $(element).attr("data-edit");
       var data =  {
                    id : element_id,
                    action: "getSingleData"
                   };
       $.post("MainController.php", data,
                function(response)
                {
                    var parsedData = JSON.parse(response);
                        console.log(parsedData[0]['naslov']);
                        console.log(parsedData[0]['opis']);
                        console.log(parsedData[0]['slika']);
                        
                        $("#naslov").val(parsedData[0]['naslov']);
                }
             );
          //console.log(element_id);
    }
      
  $('document').ready(function(){
      
      $('#sacuvaj').on('click', function(){
        var naslov = $('#naslov').val();
        var slika = $('#slika').val();
        var opis = $('#opis').val();
        
        
        if(naslov.length == 0)
        {
            alert("Unesi naslov");
            return;
        }
        
        if(opis.length == 0)
        {
            alert("Unesi opis");
            return;
        }
        
        if(slika.lengtGettingh == 0)
        {
            alert("Unesi slika");
            return;
        }
        var data = { naslov : naslov,
                     slika : slika,
                     opis : opis,
                     action : "insert"
                   };
                   
        $.post('/MainController.php', data, 
            function(response)
            {
                    console.log(response);
            });
        
        
      });
      
      
      
    
  });
</script>
</body>
</html>
