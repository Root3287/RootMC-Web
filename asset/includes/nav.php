<img src='/asset/img/Home-BG.png' class='bg-image' width="2122" height="1412 "/>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><?php echo $CONFIG['SERVERNAME'];?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <li<?php if($page==="home"){?> class="active" <?php }?>><a href="/">Home</a></li>
       <li<?php if($page==="forums"){?> class="active" <?php }?>><a href="/pages/Forums">Forums</a></li>
       <li<?php if($page==="play"){?> class="active" <?php }?>><a href="/pages/play">Online</a></li>
       <li<?php if($page==="donate"){?> class="active" <?php }?>><a href="/pages/donate">Donate</a></li>
       <li<?php if($page==="vote"){?> class="active" <?php }?>><a href="/pages/vote">Vote</a></li>
       <li<?php if($page==="infractions"){?> class="active" <?php }?>><a href="/pages/infractions">Infractions</a></li>
        <li><a href="#">Players</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Staff</a></li>
            <li><a href="#">Donors</a></li>
            <li><a href="#">Players</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
          if(Cookies::exists('Session_Id')){
          ?>
            <li><a href="#">Mail Box</a></li>
              <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
            
          <?php }else{?>
            
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
