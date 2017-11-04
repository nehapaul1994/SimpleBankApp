<!DOCTYPE html>
<html>
<head>
     <title>ABC Bank</title>
     <link href={{   URL::asset('CSS/stylesheet.css')  }}  rel="stylesheet">
</head>
<body>
    <div class="header">
    <hr style="margin-top:35px;border: 1px solid #000">
    <div class="icon">
    <h1><a href="/" style="text-decoration:none;color:black">ABC Bank</a></h1>
    </div>
    <hr style="border: 2px solid #000">
        </div>
    <div class="reg">
         <form class="f2" action="/auth/register" method="post" role="form">
             <h6>REGISTER</h6>
             <hr style="border: 2px solid #000">
             <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
             <label for="name" >Name :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="name" placeholder="Your Name" id="name"> <br>
            <label for="email" >E-mail :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="email" name="email" placeholder="Email Address" id="email"> 
             <br>   
            <label for="pass">Password :</label> 
            <input type="password" placeholder="Password" id="password" name="password">
            <input type="submit" value="register" style="left:50%">&nbsp;&nbsp;&nbsp;&nbsp;<br>
             <label>Do You Have an Account? <a href="/auth/login">Login</a> </label>
             
            
        </form>
  
     </div>
    @if (\Session::get('error'))
            <div class="" style="left: 50%;
                      position: relative;
                       color: red;">
                <p>{{ \Session::get('error') }}</p>
            </div>
        @endif
    @if (\Session::get('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif 
    <div class="error">@if ($errors->any())
          <div class="" style="left: 50%;
                      position: relative;
                       color: red;">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li style="color:red">{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif</div>
    

</body>
</html>