<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
 
  <!--===============================================================================================-->
  <link  rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
  <link  rel="stylesheet" href="fontawesome.min.css">
  <link  rel="stylesheet" href="/css/fontawesome-all.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <!--===============================================================================================-->
  <!link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!--===============================================================================================-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <!--===============================================================================================-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!--===============================================================================================-->
  <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <!--===============================================================================================-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!--===============================================================================================-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <style>

      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
      .nav-log:hover{
          color:red;
          text-decoration:none;
          background-color:white;
          padding:15px;
          border-radius:4px;
      }

      .tiles{
        display: inline-block;
        margin-left:10px;
        text-decoration: none;
        color: #008bc4;
    
      }
      .tiles-container{
        margin-left: 20%;
      }
      .nav-tab :hover{
        background-clolor:white;
      }
      .tiles :hover{
      background-color:green;
}

      .card:hover {
        box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
        
      }

      a .card:active{
        border:3px inset;
      }

      .tabs{
       
      }

      /*================================================================================================*/
        h5 .card-title i .fas:hover{
          color:pink;
        }


        .fas :hover{
          color:red;
        }
      /*================================================================================================*/



      @import "compass/css3";

// More practical CSS...
// using mobile first method (IE8,7 requires respond.js polyfill https://github.com/scottjehl/Respond)

$breakpoint-alpha: 480px; // adjust to your needs

.rwd-table {
  margin: 1em 0;
  min-width: 300px; // adjust to your needs
  
  tr {
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
  }
  
  th {
    display: none; // for accessibility, use a visually hidden method here instead! Thanks, reddit!   
  }
  
  td {
    display: block; 
    
    &:first-child {
      padding-top: .5em;
    }
    &:last-child {
      padding-bottom: .5em;
    }

    &:before {
      content: attr(data-th)": "; // who knew you could do this? The internet, that's who.
      font-weight: bold;

      // optional stuff to make it look nicer
      width: 6.5em; // magic number :( adjust according to your own content
      display: inline-block;
      // end options
      
      @media (min-width: $breakpoint-alpha) {
        display: none;
      }
    }
  }
  
  th, td {
    text-align: left;
    
    @media (min-width: $breakpoint-alpha) {
      display: table-cell;
      padding: .25em .5em;
      
      &:first-child {
        padding-left: 0;
      }
      
      &:last-child {
        padding-right: 0;
      }
    }

  }
  
  
}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">MickySoft Technologies</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
     
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a class="nav-log" href="#"><span class="fas fa-sign-out-alt"></span> Log Out</a></li>
    </ul>
  </div>
</nav>



</body>
</html>
