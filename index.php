<!DOCTYPE html>
<html>
<head>
  <title>Landing Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link src="bootstrap.min.css" rel="stylesheet" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Abel|Open+Sans:400,600' rel='stylesheet'>
  <style>

  html {
    background: white no-repeat center center fixed;      
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }

  body {
    padding-top: 20px;
    font-size: 16px;
    font-family: "Open Sans",serif;
    background: transparent;
  }
  h1 {
    font-family: "Abel", Arial, sans-serif;
    font-weight: 400;
    font-size: 40px;
  }

  body, html {
    height: 100%;
    margin: 0;
    overflow: hidden;
  }

  .panel {
    background-color: rgba(255, 255, 255, 0.9);
  }

  .margin-base-vertical {
    margin: 40px 0;
  }

  .container.sidebar {
    position: relative;
    height: 100%;
    width: 100%;

    -webkit-transition:  left 0.4s ease-in-out;
    -moz-transition:  left 0.4s ease-in-out;
    -ms-transition:  left 0.4s ease-in-out;
    -o-transition:  left 0.4s ease-in-out;
    transition:  left 0.4s ease-in-out;
  }

  .container.open-sidebar {
    left: 240px;
  }

  #sidebar {
    position: absolute;
    left: -240px;
    background: #DF314D;
    width: 240px;
    height: 100%;
    box-sizing: border-box;
  }
  #sidebar ul {
    margin: 0;
    padding: 0;
    list-style: none;
  }
  #sidebar ul li {
    margin: 0;
  }
  #sidebar ul li a {
    padding: 15px 20px;
    font-size: 16px;
    font-weight: 100;
    color: white;
    text-decoration: none;
    display: block;
    border-bottom: 1px solid #C9223D;
    -webkit-transition:  background 0.3s ease-in-out;
    -moz-transition:  background 0.3s ease-in-out;
    -ms-transition:  background 0.3s ease-in-out;
    -o-transition:  background 0.3s ease-in-out;
    transition:  background 0.3s ease-in-out;
  }

  #sidebar ul li:hover a {
    background: #C9223D;
  }

  .main-content #sidebar-toggle {
    background: #DF314D;
    border-radius: 3px;
    display: block;
    position: relative;
    padding: 10px 7px;
    float: left;
  }
  .main-content #sidebar-toggle .bar{
   display: block;
   width: 18px;
   margin-bottom: 3px;
   height: 2px;
   background-color: #fff;
   border-radius: 1px;   
 }
 .main-content #sidebar-toggle .bar:last-child{
   margin-bottom: 0;   
 }


 </style>

</head>

<body>
  <div class="container sidebar">
    <div id="sidebar">
      <ul>
        <li> <a href="#">Home</a></li>
        <li> <a href="#">Blog</a></li>
        <li> <a href="#">Projects</a></li>
        <li> <a href="#">Contact</a></li>
        <li> <a href="#">Resume</a></li>
        <li> 
        </ul>
      </div>
    </div>

    <div class="container main-content">
      <a href="#" data-toggle=".container" id="sidebar-toggle">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </a>
      <div class="row">
        <div class="col-lg-6 col-offset-3" panel>

          <h1 class="margin-base-vertical">Drew Owen</h1>

          <p> 
            I am a software engineer interested in all realms of development!
          </p>

          <p>
            I study at the University of Arizona, seeking a degree in Computer Science. I will graduate in May 2014.
          </p>

          <p>
            This is My "Home Page". As of now, there really isn't much to see. Don't assume that there isn't much to me though! More is to come to this venue.
          </p>
        </div>
      </div>
    </div>
  </body>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
  <script src="bootstrap.min.js" rel="script"></script>

  <script type="text/javascript">
  $(document).ready(function() {
    $("[data-toggle]").click(function() {
      var toggle_el = $(this).data("toggle");
      $(toggle_el).toggleClass("open-sidebar");
    });
  });


  </script>



  </html>