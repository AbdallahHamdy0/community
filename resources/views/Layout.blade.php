<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bird_Blog</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    @yield('icons')

   <style>
        a{
            text-decoration: none;
            Color:black;

        }
        a:hover{
            color:rgb(36, 94, 202);
        }
        .normal{
          background-color:#eaeaea;
        }
        .like_status{
          color: #fff;background-color: #dc3545;
        }
        .dislike_status{
          color: #fff; background-color: #757575;
        }
        .bb{
          margin-top: 510px;
        }
        </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 ">
        <a class="navbar-brand px-3" href="/">
            {{-- <img src="../img/bird.png" width="30" height="30" class="d-inline-block align-top p-1" alt="" > --}}
           <h3> Bird_Blog</h3>
          </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: space-between; ">
          <ul class="navbar-nav mr-auto">
            {{-- <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link" href="#">Contact us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Statistics">Statistics</a>
            </li>
            <li class="nav-item dropdown btn-group">
              <a class="nav-link dropdown-toggle dropdown-toggle-split"  id="navbarDropdown" role="button" data-bs-toggle="dropdown"  aria-expanded="false">
                Categories
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/category/Mobile">Mobile</a>
                <a class="dropdown-item" href="/category/Network">Network</a>
                
              </div> 
            </li>
            @if (Auth::check())
            @if(Auth::user()->hasRole('Admin'))
            <li class="nav-item">
              <a class="nav-link" href="/admin">Admin</a>
            </li>
            @endif
            @endif

          </ul>
           <ul class="navbar-nav text-right px-3">
            @if (Auth::check())
            <li class="nav-item dropdown btn-group">
              <a class="nav-link dropdown-toggle dropdown-toggle-split"  id="navbarDropdown" role="button" data-bs-toggle="dropdown"  aria-expanded="false">
                {{Auth::user()->name}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a href="/logout" class="dropdown-item" href="/category/Mobile">Log Out</a>
              </div> 
            </li>               
            @else
        
            <li class="nav-item text-right ">
              <a class="nav-link text-right" href="/register">Register</a>
            </li>
            <li class="nav-item text-right">
              <a class="nav-link text-right " href="/login">Login</a>
            </li>
           
            @endif
            {{-- <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li> --}}
          </ul>
          
        </div>
    </nav>
    
<div class="container px-4 px-lg-5 bg-light m-3 p-1">
    @yield('content')


</div>


</div>
</div>
</div>
</div>
<div class="bb bg-dark ">
    <footer class="border-top ">
        <div class=" px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        
                       
                    <div class="small text-center  text-muted fst-italic text-muted">Copyright &copy; Your Website 2021</div>
                    
                </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script type="text/javascript"  src="{{url('../js/like.js')}}"></script>
<script type="text/javascript">
  var url="{{ route('like') }}";
  var token="{{Session::token()}}";
  var url_dis="{{ route('dislike') }}";
</script>
</body>
</html>