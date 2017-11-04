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
    <ul style="padding-left:25%">
    
      <li><a  href="/user/dashboard">HOME</a></li>
      <li><a href="/user/deposit" class="active">DEPOSIT</a></li>
      <li><a href="/user/withdraw">WITHDRAW</a></li>
      <li><a href="/user/transfer">TRANSFER</a></li>
      <li><a href="/user/logout">LOGOUT</a></li>
    </ul>
    <div class="depo">
         <form class="f7" action="/user/deposit" method="post">
             <h6>DEPOSIT</h6>
             
             <hr style="border: 2px solid #000"> 
             <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
             <label for="amt">Amount :</label> 
             &nbsp;&nbsp;<input type="text" placeholder="Amount" name="amount">
             <input type="submit" value="Deposit">
            
        </form>
  
</div>
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


