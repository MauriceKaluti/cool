

<!DOCTYPE html>
<html>
<head>
    <title></title>


</head>

<body>



<nav class="navbar fixed-top navbar-dark bg-dark">
  <!-- Navbar content -->
<!-- <h4>  Hello</h4>


  <a style="align-self: right;" class="navbar-brand" href="#">Fixed top</a> -->
  <a class="navbar-brand" href="{{route('admin.index')}}">Cool Prints</a>
<p align="left" style="color: white;"><b> User:</b> {{Auth::user()->name}}</p>

<p align="left"><a class="btn btn-outline-secondary" href="{{url('/')}}">Front Page</a></p>

<p align="left"><a class="btn btn-outline-info" href="{{url('/logout')}}">Logout</a></p>
  </div>
</nav>

</nav>





</body>
</html>





