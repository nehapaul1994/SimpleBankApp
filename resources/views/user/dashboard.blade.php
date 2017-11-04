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
      <li><a class="active" href="/user/dashboard">HOME</a></li>
      <li><a href="/user/deposit" name="deposit">DEPOSIT</a></li>
      <li><a href="/user/withdraw">WITHDRAW</a></li>
      <li><a href="/user/transfer">TRANSFER</a></li>
      <li><a href="/user/logout">LOGOUT</a></li>
    </ul>
    <div class="home">
         <form class="f4" action="">
             <h6>HOME</h6>
             <hr style="margin-bottom:35px;border: 2px solid #000">
             <div class="c">
              <label  for="welcome">Welcome : {{$user->name}}</label> <br>
            <label  for="id">Account No: {{$account->act_no}} </label><br>
            <label  for="balanc">Your Balance : {{$account->amount}}</label> 
             </div>
            
        </form>
       
  
</div>

</body>
</html>