<!DOCTYPE html>
<html>
<head>
     <title>ABC Bank</title>
     <link href={{   URL::asset('CSS/stylesheet.css')  }}  rel="stylesheet">
</head>
<body>
    <hr style="margin-top:35px;border: 1px solid #000">
    <div class="icon">
    <h1>ABC Bank</h1>
    </div>
    <hr style="border: 2px solid #000">
     <ul style="padding-left:28%">
      <li><a href="/user/dashboard">HOME</a></li>
      <li><a href="/user/deposit">DEPOSIT</a></li>
      <li><a href="/user/withdraw"  class="active">WITHDRAW</a></li>
      <li><a href="/user/transfer">TRANSFER</a></li>
      <li><a href="/user/logout">LOGOUT</a></li>
    </ul>
    <div class="withd">
         <form class="f6" action="/user/withdraw" method='post'>
             <h6>WITHDRAW</h6>
             <hr style="border: 2px solid #000"> 
             <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
             <label for="amt">Amount :</label> 
             &nbsp;&nbsp;<input type="text" placeholder="Amount" name="amount" >
             <input type="submit" value="Withdraw" >
            
        </form>
  
</div>
    @if (\Session::get('error'))
            <div class="" style="left: 50%;
                      position: relative;
                       color: red;">
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


