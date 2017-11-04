<!DOCTYPE html>
<html>
<head>
     <title>ABC Bank</title>
     <link href={{   URL::asset('CSS/stylesheet.css')  }}  rel="stylesheet">
</head>
<body>
    <hr style="margin-top:35px;border: 1px solid #000">
    <div class="icon">
       <h1><a href="/" style="text-decoration:none;color:black">ABC Bank</a></h1>
    </div>
    <hr style="border: 2px solid #000">
   <!-- <ul>
      <li><a class="active" href="#home">Home</a></li>
      <li><a href="#news">News</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="#about">About</a></li>
    </ul>-->
    <div class="login">
        
         <form class="f1" action="/auth/login" method="post" role="form">
             
             <h6>LOGIN</h6>
             <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
          
            <hr style="border: 2px solid #000">
            <label for="email">E-mail :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" placeholder="Email Address" id="email" name="email"> 
             <br>   
            <label for="pass">Password :</label> 
            <input type="password" placeholder="Password" id="pass" name="password">
             <input type="submit" value="login"><br>
             <label style="left:10%">Don't Have an Account? <a href="/auth/register">Register</a> </label>
        </form>
  
     </div>
      @if (\Session::get('error'))
            <div class="">
                <p>{{ \Session::get('error') }}</p>
            </div>
        @endif
       <div class="error">@if ($errors->any())
          <div class="">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li style="color:red">{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif</div>

</body>
</html>


