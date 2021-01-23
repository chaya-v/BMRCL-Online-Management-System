<!DOCTYPE html>
<html>
<head>
  <title>DBMS Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

  <style type="text/css">

  .demo-content{
          padding: 150px;
          font-size: 18px;
          text-align: center;
          background: #8eccc6;
          margin:50px 22em 50px 22em;

        }
  .demo-content.bg-alt{
    background: #abb1b8;
  }
  .container {
  position: absolute;}

.container img {
  width: 1248px;
  height: 520px;
}

.container .btn1 {
  position: absolute;
  top: 20%;
  left: 10%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: solid;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}
.container .btn2 {
  position: absolute;
  top: 20%;
  left: 100%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: solid;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}

.container .btn1:hover {
  background: #3cc943;
}

.container .btn2:hover {
  background: #7e3878;
}

.modal1 {
  display: none; 
  position: fixed; 
  z-index: 1; 
  padding-top: 10px; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
}

.modal-content1 {
  background-color: #fff;
  margin: auto;
  padding-left: 50px;
  border: 1px solid #000000;
  font-size: 15px;
  width: 50%;
  height: 100%;
  border-radius: 5%;
}
.close1 {
  color: #aaaaaa;
  float: right;
  margin: 10px;
  font-size: 40px;
  font-weight: bold;
}

.close1:hover,
.close1:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal2 {
  display: none; 
  position: fixed; 
  z-index: 1; 
  padding-top: 10px; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
}

.modal-content2 {
  background-color: #fff;
  margin: auto;
  padding-left: 50px;
  border: 1px solid #000000;
  font-size: large;
  width: 50%;
  height: 100%;
  border-radius: 5%;
}
.close2 {
  color: #aaaaaa;
  float: right;
  margin: 10px;
  font-size: 40px;
  font-weight: bold;
}

.close2:hover,
.close2:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
  </style>

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="contact_us.php">Contact Us</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="smart_cardrequest.php">Smart Card Request</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="travel_info.php">Travel Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fare.php">Fare<span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="stations.php"><strong>Stations</strong></a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
  <img src="images/mapbg.jpg" alt="bg img">
  <button class="btn1" id ="myBtn1"><strong>Green Line</strong></button>
  <button class="btn2" id ="myBtn2"><strong>Purple Line</strong></button>
  <div id="myModal1" class="modal1">
  <div class="modal-content1">
    <span class="close1">&times;</span>
    <h4 class="py-2" style="text-align: center; color: green;" >Green Line</h4>
    <ul>
      <li>Nagasandra</li>
      <li>Dasarahalli</li>
      <li>Jalahalli</li>
      <li>Peenya Industry</li>
      <li>Peenya</li>
      <li>Goraguntepalya</li>
      <li>Yeshwanthpur</li>
      <li>Sandal Soap Factory</li>
      <li>Mahalakshmi</li>
      <li>Rajajinagar</li>
      <li>Kuvempu Road</li>
      <li>Srirampura</li>
      <li>Sampige road</li>
      <li>Majestic</li>
      <li>Chickpete</li>
      <li>K.R.Market</li>
      <li>National College</li>
      <li>Lalbagh</li>
      <li>South End Circle</li>
      <li>Jayanagar</li>
      <li>Banashankari</li>
      <li>J P Nagar</li>
      <li>Yelachenahalli</li>
    </ul>         
  </div>
</div>

<div id="myModal2" class="modal2">
  <div class="modal-content2">
    <span class="close2">&times;</span>
    <h4 class="py-2" style="text-align: center; color: purple;">Purple Line</h4>
    <ul>
      <li>Mysore Road</li>
      <li>Deepanjali Nagar</li>
      <li>Attiguppe</li>
      <li>Vijayanagar</li>
      <li>Hosahalli</li>
      <li>Magadi Road</li>
      <li>City Railway Station</li>
      <li>Majestic</li>
      <li>Sir.M.Visveshwaraya Station</li>
      <li>Vidhana Soudha</li>
      <li>Cubbon Park</li>
      <li>Mahatma Gandhi Road</li>
      <li>Trinity</li>
      <li>Halasuru</li>
      <li>Indiranagar</li>
      <li>Swami Vivekananda Road</li>
      <li>Baiyappanahalli</li>
    </ul>         
  </div>
</div>

</div>
<script>
var modal = document.getElementById("myModal1");

var btn = document.getElementById("myBtn1");

var span = document.getElementsByClassName("close1")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>
var modal2 = document.getElementById("myModal2");

var btn2 = document.getElementById("myBtn2");

var span2 = document.getElementsByClassName("close2")[0];

btn2.onclick = function() {
  modal2.style.display = "block";
}

span2.onclick = function() {
  modal2.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}
</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
