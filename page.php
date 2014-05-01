<?php
//header('Content-Type: image/jpeg');
header('X-Frame-Options: GOFORIT'); 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Landing Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet" />
  <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" /> -->
  <link href='http://fonts.googleapis.com/css?family=Abel|Open+Sans:400,600' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="page.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" rel="script"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.js" rel="script"></script>
</head>
<body>
  <div class="panel">
    <div class="row pull-right">
      <ul class="inline">
        <li> <a id="homelink" class='active' href="#">Home</a></li><li> <a id="bloglink" href="#">Blog</a></li><li> <a href="#">Projects</a></li><li> <a id="contactlink" href="#">Contact</a></li><li> <a href="resume.pdf">Resume</a></li> 
      </ul>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-offset-3 panel" id="main">
        <div id ="home">
          <h1 class="margin-base-vertical">Drew Owen</h1>
          <p> 
            I am a software engineer interested in all things CS.
          </p>
          <p>
            I study at the University of Arizona, seeking a degree in Computer Science. I will graduate in May 2014.
          </p>
          <p>
            Feel free to look around!
          </p>
        </div>
        <div id="blog" style="display: none">
          <p>
            Blog
          </p>
          <button id="leftPost" type="button" class="btn btn-default btn-primary">Next</button>
          <button id="rightPost" type="button" class="btn btn-default btn-primary">Prev</button>  
        </div>
        <div id="contact" style="display: none">
          <h1 class="margin-base-vertical">Drew Owen</h1>
          <ul class="soc">
            <li><a class="soc-facebook" href="https://www.facebook.com/drew.owen.5" target="_newtab"></a></li>
            <li><a href="https://www.facebook.com/drew.owen.5" target="_newtab">Drew Owen</a></li><br>
            <li><a class="soc-email2" href="mailto:dcowen@email.arizona.edu" target="_newtab"></a></li><br>
            <li><a class="soc-linkedin" href="https://www.linkedin.com/pub/andrew-owen/45/6ba/47a" target="_newtab"></a></li><br>
            <li><a class="soc-github soc-icon-last" href="https://github.com/dcowen91" target="_newtab"></a> <ahref="https://github.com/dcowen91" target="_newtab">Github</a></li>
          </ul>
          <!-- Mussing around with PDF display -->
          <!-- <div><a href="resume.pdf">Direct Link</a></div>
          <object class='pdf' data="resume.pdf" type="application/pdf">
              <embed class='pdf' src="resume.pdf" type="application/pdf"/>
          </object> -->
        </div>
      </div>
    </div>
  </div>
  <div id="button">
    <button id="hide" type="button" class="btn btn-default btn-primary">Hide</button>
    <button id="newpic" type="button" class="btn btn-default btn-primary">New Pic</button>
  </div>
  <img id="hidden" src="images/Chief.png" alt="background">
  <img src="images/Loading.gif" id="loading" alt="loading" style="display:none">
  <script type="text/javascript">

  var pics;
  var url;

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
    url: "http://api.flickr.com/services/rest/?method=flickr.interestingness.getList&format=json&api_key=60f6a409572dcbbe23bd08661dbdd34a&date=" + dayfield() + "&per_page=50&page=1", 
    timeout:5000,
    type: "GET",
    cache: true,
    datatype:"jsonp",
  });

  function jsonFlickrApi (response) {
    $('#loading').show();
    pics = response.photos.photo;
    console.log("got the pics")
    $('#loading').hide();
    //setbackground();

  }


  function setbackground() {
    var num = Math.floor(Math.random()*pics.length);
    var img = pics[num];
    url = 'http://farm' + img.farm+ '.staticflickr.com/' +img.server + '/' + img.id  + '_' + img.secret+ '_b.jpg';
    $('#hidden').attr("src", url).load(function() {
      $('html').css('background', 'url(' + url + ') no-repeat center center fixed').css("background-size", "cover").fadeTo(7500, 1);
      $('#loading').hide();
    });
    pics.splice(num, 1);
  }

  function getLatestPost() {
    //TODO: fix this
    return 1;
  }

  $('#contactlink').click(function() {
    $('#home').hide();
    $('#blog').hide();
    $('#contact').show();
    
  });


  $('#bloglink').click(function() {
    //console.log("blog link");
    $('#bloglink').attr('href', "#1");
    var num = getLatestPost();
    getPost(num);
    checkButtonDisable(num);

  });

  $('#hide').click(function() {
    if ($('#hide').html() === 'Hide') {
      $('#main').slideUp();
      $('#hide').html('Show');
    }
    else {
     $('#main').slideDown();
     $('#hide').html('Hide');
   }
 });

  $('#newpic').click(function() {
    $('#loading').show();
    setbackground();
  });

  $('#homelink').click(function() {
    $('#bloglink').attr('href', "");
    showHome();
  });


  $(document).ready(function() {
    //console.log("ready")
    var currentState = window.location.hash;
    if (currentState.indexOf("#") != -1) {
      var state = currentState.substring(1);
      //console.log(state);   
      getPost(state);
      checkButtonDisable(state);
      
    }
  });

  function showHome() {
    $('#home').show();
    $('#blog').hide();
    $('#contact').hide();
  }

  function showBlog(message) {
    //console.log(message);
    //console.log(message['posted']);
    $('#home').hide();
    $('#contact').hide();
    $('#blog').show();
    $('#leftPost').show();
    $('#rightPost').show();
    var posted = new Date(message['posted']);
    $('#blog').html('<h1 class="margin-base-vertical">' + message['title'] + '</h1> <p>' + message['content'] +  '</p> <small> <em>' + 'posted on ' + posted.toLocaleDateString() + ' at ' + posted.toLocaleTimeString() + '</br> </small> </em> ' + '<button id="leftPost" type="button" class="btn btn-primary btn-xs">Next</button> <button id="rightPost" type="button" class="btn btn-primary btn-xs">Prev</button>');
    //checkButtonDisable(message['postnum']);
  }

  function getPost(postnum) {
    //console.log("in function");
    //console.log(postnum);
      $.ajax({
          type:"GET",
          contentType: "application/json",
          url: "getpost.php",
          async: false,
          data: {post: postnum},
          success: function(message) {
            showBlog(message);
          }, 
          error: function(message) {
            console.log("error");
            console.log(message);
          },
          dataType: "json"          
      });
      //console.log("done");
  }

  function checkButtonDisable(postnum) {
    seePostExists(postnum - 1, $('#leftPost'));
    seePostExists(postnum + 1, $('#rightPost'));
  }

  function seePostExists(num, button) {
    $.ajax({
          type:"GET",
          contentType: "application/json",
          url: "checkpost.php",
          async: false,
          data: {post: num},
          success: function(message) {
            //console.log(message);
            //console.log ('success' + num);
            if (!message) {
              button.attr('disabled', true);
            } else {
              button.attr('disabled', false);
            }
          }, 
          error: function(message) {
            // console.log ('fail' + num);
            // button.attr('disabled', true);
          },
          dataType: "json"          
      });
  }

  </script>

</body>
</html>