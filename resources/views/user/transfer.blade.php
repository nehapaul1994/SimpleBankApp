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
    <ul style="padding-left:2%">
       <ul style="padding-left:28%">
      <li><a  href="/user/dashboard">HOME</a></li>
      <li><a href="/user/deposit">DEPOSIT</a></li>
      <li><a href="/user/withdraw">WITHDRAW</a></li>
      <li><a href="/user/transfer" class="active">TRANSFER</a></li>
      <li><a href="/user/logout">LOGOUT</a></li>
    </ul>
    <div class="trans">
         <form class="f5" action="/user/transfer" method="post">
            <h6>TRANSFER</h6>
            <hr style="border: 2px solid #000">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
            <label for="email">Account No :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" placeholder="Account No" id="ac_id" name="ac_id"> 
            <br>   
            <label for="amt">Amount :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
             &nbsp;&nbsp;<input type="text" placeholder="Amount to Transfer" id="amount" name="amount">
            <input type="submit" value="Transfer">
            
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


