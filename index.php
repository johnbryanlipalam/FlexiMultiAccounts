<!DOCTYPE html>
<html>
  <head>
    <title>WFM Flex Schedule Portal: Log In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
<script>
  $('#myModal').on('shown.bs.modal', function () {
    $(this).find('.modal-dialog').css({width:'auto',
                               height:'auto', 
                              'max-height':'100%'});
});
</script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
</head>
<body>
<div class="container-fluid" style="background-color:#039be5;">
    <br><center><h1 style="font-size:60px;color:#FFFFFF">WFM FLEX</h1></center>
<center><h1 style="font-size:60px;color:#FFFFFF">SCHEDULE PORTAL</h1></center>
<center>
  <div class="container table-responsive" style="background-color:#e7e7e7;">
   <form role="form" action="login_auth.php" method="post">
    <br><br><br><br><br><br>
        <div class="col">
          <div class="input-group justify-content-center">
            <input type="text" class="col-sm-4 font-weight-bold" placeholder="Employee ID" name="nt_user" required>
            <span class="input-group-addon" id="basic-addon2"><img src=" Graphics/user.png"></span>
          </div>
        </div>
        
      <div class="w-50">
        <br>
      </div>
        <div class="col">
          <div class="input-group justify-content-center">
            <input type="password" class="col-sm-4 font-weight-bold" placeholder="Password" name="nt_pass" required>
            <span class="input-group-addon" id="basic-addon2"><img src=" Graphics/padlock.png"></span>
          </div>
        </div>
        <br>
        <div class="input-group justify-content-center">
            <button class="btn btn-primary" type="submit">LOG IN</button>
        </div>
        <br>
        <div class="input-group justify-content-center">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#forgotpw" data-whatever="@forgotpw">Forgot Password</button>
        </div>
        <br>
   </form>
  </div></center><!-- End of div container-->
  <br>
</div>
<br>

<!-- Start of modal div-->
<div class="container table-responsive">
  <div class="modal hidden-desktop" id="forgotpw" tabindex="-1" role="dialog" aria-labelledby="forgotpw" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="forgotpw">Forgot Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="passwordreset.php" method="post">
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">Employee ID</label>
              <input type="text" class="form-control" id="recipient-employeeid" placeholder="Employee ID" name="employeeid" required>
            </div>
            <div class="form-group">
              <label for="message-text" class="form-control-label">Name</label>
              <input type="text" class="form-control" id="recipient-email" placeholder="Name" name="name" required>
            </div>
            <div class="form-group">
              <label for="message-text" class="form-control-label">Email Address</label>
              <input type="email" class="form-control" id="recipient-email" placeholder="Email Address" name="emailadd" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="pwreset">Send message</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row justify-content-flex-end">
    <br><br>
    <img src=" Graphics/sykes.png">
  </div>
</div>
</body>
</html>

