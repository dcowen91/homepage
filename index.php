<!DOCTYPE html>
<html>
<head>
  <title>Drew Owen</title>
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
        <li> <a id="homelink" class='active'>Home</a></li><li> <a id="bloglink" >Blog</a></li><li> <a id='projectlink' >Projects</a></li><li> <a id="contactlink" >Contact</a></li><li> <a href="/resume.pdf">Resume</a></li> 
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
          <div id="blogInner" style="display: none">
          </div>
          <div id="disqus_thread"></div>
            <script type="text/javascript">
                var disqus_shortname = 'dowenblog';
                var disqus_identifier = 0;
                var disqus_url = window.location.origin + window.location.pathname;
                (function() {
                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                })();
              </script>
            <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
        </div>
        <div id="contact" style="display: none">
          <h1 class="margin-base-vertical">Drew Owen</h1>
          Contact me via<br> <a href="mailto:dcowen@email.arizona.edu" target="_newtab">Email</a>, <a href="https://www.facebook.com/drew.owen.5" target="_newtab">Facebook</a>, <a href="https://www.linkedin.com/pub/andrew-owen/45/6ba/47a" target="_newtab">LinkedIn</a>, or <a href="https://github.com/dcowen91" target="_newtab">GitHub</a>.
          <br>
          <ul class="soc">
            <li><a class="soc-email2" href="mailto:dcowen@email.arizona.edu" target="_newtab"></a></li>
            <li><a class="soc-facebook" href="https://www.facebook.com/drew.owen.5" target="_newtab"></a></li>
            <li><a class="soc-linkedin" href="https://www.linkedin.com/pub/andrew-owen/45/6ba/47a" target="_newtab"></a></li>
            <li><a class="soc-github soc-icon-last" href="https://github.com/dcowen91" target="_newtab"></a></li>
          </ul>
          <!-- Mussing around with PDF display -->
          <!-- <div><a href="resume.pdf">Direct Link</a></div>
          <object class='pdf' data="resume.pdf" type="application/pdf">
              <embed class='pdf' src="resume.pdf" type="application/pdf"/>
          </object> -->
        </div>
        <div id="project" style="display: none">
          <h1 class="margin-base-vertical">Projects</h1>
          <p>
            Check out my various odds and ends on <a href="https://github.com/dcowen91" target="_newtab">GitHub</a>!
          </p>
        </div>
      </div>
    </div>
  </div>
  <div id="button">
    <button id="hide" type="button" class="btn btn-default btn-primary">Hide</button>
    <button id="newpic" type="button" class="btn btn-default btn-primary">New Pic</button>
  </div>
  <img id="hidden" src="/images/Chief.png" alt="background">
  <img src="/images/Loading.gif" id="loading" alt="loading" style="display:none">
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

  function hideAll() {
    $('#home').hide();
    $('#blog').hide();
    $('#contact').hide();
    $('#project').hide();
  }

  $('#contactlink').click(function() {
    hideAll();
    $('#contact').show();
    var stateObj = {addr : "/contact/"};
    history.pushState(stateObj, "Contact", "/contact/")
    
  });

  $("#projectlink").click(function() {
    hideAll();
    $('#project').show();
    var stateObj = {addr : "/project/"};
    history.pushState(stateObj, "Project", "/project/")
  });


  function getCurrentPost() {
    return parseInt(window.location.pathname.substring(6));
  } 

  function rightClick() {
    // - 1
    num = getCurrentPost() - 1;
    getPost(num);
    var stateObj = {addr : "/blog/" + num};
    history.pushState(stateObj, "Blog", "/blog/" + num);
  }

  function leftClick() {
    // +  1
    num = getCurrentPost() + 1;
    getPost(num);
    var stateObj = {addr : "/blog/" + num};
    history.pushState(stateObj, "Blog", "/blog/" + num);

  }

  $('#bloglink').click(function() {
    //console.log("blog link");
    $.ajax({
      type: "GET",
      contentType: "application/json",
      url: "/getLatestPost.php",
      success: function(message) {
        num = message["postnum"];
        getPost(num);
        var stateObj = {addr : "/blog/" + num};
        history.pushState(stateObj, "Blog", "/blog/" + num);

      }, 
      error: function(message) {
        console.log("error");
        console.log(message);
      },
      dataType: "json"
    });

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
    hideAll();
    $('#home').show();
    var stateObj = {addr : "/"};
    history.pushState(stateObj, "Home", "/");
  
  });


  $(document).ready(function() {
    if (window.location.search!= 0) {
      var loc = window.location.search.split('=')[1];
      parseLocation(loc);
      var REblog = /blog/;
      if (REblog.test(loc)) {
        var num = loc.substring(6);
        getPost(num);
        var stateObj = {addr : loc};
        history.replacestate(stateObj, "Blog", loc);
      }
      else {
        var stateObj = {addr : loc};
        history.replacestate(stateObj, loc.substring(1, loc.length-1), loc);
      }
    }

  });


  function showBlog(message) {
    // console.log(message);
    //console.log(message['posted']);
    hideAll();
    $('#blog').show();
    $('#leftPost').show();
    $('#rightPost').show();
    $('#blogInner').show();
    var posted = new Date(message['posted']);
    $('#blogInner').html('<h1 class="margin-base-vertical">' + message['title'] + '</h1> <p>' + message['content'] +  '</p> <small> <em>' + 'posted on ' + posted.toLocaleDateString() + ' at ' + posted.toLocaleTimeString() + '</br> </small> </em> ' + '<button id="leftPost" type="button" onclick="leftClick()" class="btn btn-primary btn-xs">Next</button> <button id="rightPost" onclick="rightClick()" type="button" class="btn btn-primary btn-xs">Prev</button>');  
  }

  function getPost(postnum) {
    //console.log("in function");
    //console.log(postnum);
      $.ajax({
          type:"GET",
          contentType: "application/json",
          url: "/getpost.php",
          data: {post: postnum},
          success: function(message) {
            if (message == false) {
              //if requested postnum doesnt exist
              $("#bloglink").click();
            }
            else {
              showBlog(message);
              checkButtonDisable(postnum);
              DISQUS.reset({
                        reload: true,
                        config: function () {
                            this.page.identifier = postnum;
                            this.page.url = window.location.href;
                        }
                    });
            }
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
    var plus = postnum + 1;
    var minus = postnum - 1;
    seePostExists(plus, $('#leftPost'));
    seePostExists(minus, $('#rightPost'));
  }

  function seePostExists(num, button) {
    $.ajax({
          type:"GET",
          contentType: "application/json",
          url: "/checkpost.php",
          async: false,
          data: {post: num},
          success: function(message) {
            //console.log(message);
            //console.log ('success' + num);
            if (!message) {
              button.hide();
            } else {
              button.show();
            }
          }, 
          error: function(message) {
            // console.log ('fail' + num);
            // button.attr('disabled', true);
          },
          dataType: "json"          
      });
  }

  window.onpopstate =  function() {
    parseLocation(window.location.pathname);
  }



  function parseLocation(loc) {
    var REproj =   /project/;
    var REblog = /blog/;
    var REcont = /contact/;
    hideAll();

    if (REproj.test(loc)) {
      $('#project').show();
    }
    else if (REblog.test(loc)) {
      $('#blog').show();
      $('#leftPost').show();
      $('#rightPost').show();
      $('#blogInner').show();
    }
    else if (REcont.test(loc)) {
      $('#contact').show();
    }
    else {
      $('#home').show();  
    }
  }

  </script>

</body>
</html>