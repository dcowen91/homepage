<!DOCTYPE html>
<html>
<head>
  <title>Landing Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Abel|Open+Sans:400,600' rel='stylesheet'>
  <style>

  html {
    background: white no-repeat center center fixed;      
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    font-family: "Open Sans",serif;

  }

  body {
    /*  padding-top: 20px; */
    font-size: 16px;
    font-family: "Open Sans",serif;
    background: transparent;
  }
  h1 {
    font-family: "Abel", Arial, sans-serif;
    font-weight: 400;
    font-size: 40px;
  }
  .panel {
    background-color: rgba(255, 255, 255, 0.9);
    padding-bottom: 30px;
    border-radius: 5px;
  }

  .margin-base-vertical {
    margin: 20px 0;
  }

  .pull-right {
    float: right;
  }

  .inline {
    padding-right: 20px;
  }

  .inline  > li {
    display: inline-block;
    padding-right: 5px;
    padding-left: 5px;
  }

  #main {
    margin-top: -70px;
    /*padding-top: -100px;*/
    z-index: 1;

  }


  </style>

</head>
<body>
  <div class="panel">
    <div class="row pull-right">
      <ul class="inline">
        <li> <a href="#">Home</a></li><li> <a href="#">Blog</a></li><li> <a href="#">Projects</a></li><li> <a href="#">Contact</a></li><li> <a href="#">Resume</a></li> 
      </ul>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-offset-3 panel" id="main">
        <h1 class="margin-base-vertical">Drew Owen</h1>
        <p> 
          I am a software engineer interested in all things CS.
        </p>
        <p>
          I study at the University of Arizona, seeking a degree in Computer Science. I will graduate in May 2014.
        </p>
        <p>
          Feel free to look around, you might learn a thing or two about me!
        </p>
      </div>
    </div>
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" rel="script"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js" rel="script"></script>
  <script type="text/javascript">
  function dayfield() {
    var date = new Date();
    var month = date.getMonth()+1;
    var year = date.getFullYear();
    var day = date.getDate() - 5;
    if (day < 1) {
      day = 25;
      month--;
      if (month < 1) {
        month = 12;
        year--;
      }
    }
    if (day < 10)
      day = "0" + day;
    if (month < 10)
      month = "0" + month;
    return year + "-" + month + "-" + day;
  }

  $.ajax(
  {
    url: "http://api.flickr.com/services/rest/?method=flickr.interestingness.getList&api_key=60f6a409572dcbbe23bd08661dbdd34a&date=" + dayfield() + "&per_page=20&page=1", 
    timeout:5000,
    datatype:"json",
    success: function(a) {
      console.log("success");
      console.log(a);
      var x = JSON.parse(a);
      console.log(x);
    }
  });
  </script>

</body>
</html>