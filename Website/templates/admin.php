<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet"-->
    <style type="text/css">
        .row {
            margin-left:0px;
            margin-right:0px;
        }

        #wrapper {
            padding-left: 70px;
            transition: all .4s ease 0s;
            height: 100%
        }

        #sidebar-wrapper {
            margin-top: -15px;
            margin-left: -150px;
            left: 50px;
            width: 150px;
            background: #FFF;
            position: fixed;
            height: auto;
            z-index: 10000;
            transition: all .4s ease 0s;
            border-radius: 5px;
        }

        .sidebar-nav {
            display: block;
            float: left;
            width: 150px;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        #page-content-wrapper {
            padding-left: 0;
            margin-left: 0;
            width: 100%;
            height: auto;
        }
        #wrapper.active {
            padding-left: 150px;
        }
        #wrapper.active #sidebar-wrapper {
            left: 150px;
        }

        #page-content-wrapper {
          width: 100%;
        }

        #sidebar_menu li a, .sidebar-nav li a {
            color: #999;
            display: block;
            float: left;
            text-decoration: none;
            width: 150px;
            background: #252525;
            border-top: 1px solid #373737;
            border-bottom: 1px solid #1A1A1A;
            -webkit-transition: background .5s;
            -moz-transition: background .5s;
            -o-transition: background .5s;
            -ms-transition: background .5s;
            transition: background .5s;
        }
        .sidebar_name {
            padding-top: 25px;
            color: #fff;
            opacity: .7;
        }

        .sidebar-nav li {
          line-height: 40px;
          text-indent: 20px;
        }

        .sidebar-nav li a {
          color: #999999;
          display: block;
          text-decoration: none;
        }

        .sidebar-nav li a:hover {
          color: #000;
          background: rgba(255,255,255,0.2);
          text-decoration: none;
        }

        .sidebar-nav li a:active,
        .sidebar-nav li a:focus {
          text-decoration: none;
        }

        .sidebar-nav > .sidebar-brand {
          height: 65px;
          line-height: 60px;
          font-size: 18px;
        }

        .sidebar-nav > .sidebar-brand a {
          color: #999999;
        }

        .sidebar-nav > .sidebar-brand a:hover {
          color: #fff;
          background: none;
        }

        #main_icon
        {
            float:right;
           padding-right: 15px;
           padding-top:20px;
        }
        .sub_icon
        {
            float:right;
           padding-right: 15px;
           padding-top:10px;
        }
        .content-header {
          height: 65px;
          line-height: 65px;
        }

        .content-header h1 {
          margin: 0;
          margin-left: 20px;
          line-height: 65px;
          display: inline-block;
        }

        @media (max-width:767px) {
            #wrapper {
            padding-left: 70px;
            transition: all .4s ease 0s;
        }
        #sidebar-wrapper {
            left: 70px;
        }
        #wrapper.active {
            padding-left: 150px;
        }
        #wrapper.active #sidebar-wrapper {
            left: 150px;
            width: 150px;
            transition: all .4s ease 0s;
        }
        }

    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!--script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script-->
</head>
<body>
<div id="wrapper">
      
      <!-- Sidebar -->
            <!-- Sidebar -->
      <div id="sidebar-wrapper">
      <ul id="sidebar_menu" class="sidebar-nav">
           <li class="sidebar-brand"><a id="menu-toggle" href="#">Admin<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
      </ul>
        <ul class="sidebar-nav" id="sidebar">     
            <li><a>Block<span class="sub_icon glyphicon glyphicon-lock"></span></a></li>
            <li><a>Unlock<span class="sub_icon glyphicon glyphicon-lock"></span></a></li>
            <li><a>Close<span class="sub_icon glyphicon glyphicon-off"></span></a></li>
        </ul>
      </div>
      
    </div>
<script type="text/javascript">
$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
});
</script>
</body>
</html>
