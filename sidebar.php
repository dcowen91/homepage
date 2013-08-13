<!DOCTYPE html>
<html>
<head>
  <title>Landing Page</title>
  <style>

body, html {
    height: 100%;
    margin: 0;
    overflow:hidden;
    font-family: helvetica;
    font-weight: 100;
}
.container {
    position: relative;
    height: 100%;
    width: 100%;
    left: 0;
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
.main-content {
    width: 100%;
    height: 100%;
    padding: 10px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    position: relative;
}
.main-content .content{
    box-sizing: border-box;
    -moz-box-sizing: border-box;
padding-left: 60px;
width: 100%;
}
.main-content .content h1{
    font-weight: 100;
}
.main-content .content p{
    width: 100%;
    line-height: 160%;
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
<div class="container">
    <div id="sidebar">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Explore</a></li>
            <li><a href="#">Users</a></li>
                <li><a href="#">Sign Out</a></li>
        </ul>
    </div>
    <div class="main-content">
        <a href="#" data-toggle=".container" id="sidebar-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="content">
            <h1>Creating Swipeable Side Menu For the Web</h1>
            <p>"Lorem ipsum dolor sit amet laborum."</p>
        </div>
    </div>
    </div>
</div>

</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  $("[data-toggle]").click(function() {
    var toggle_el = $(this).data("toggle");
    $(toggle_el).toggleClass("open-sidebar");
  });
});


</script>

</html>