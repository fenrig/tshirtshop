<?php if(session_id() == '') session_start(); ?>

<div id="vertical_menu">
  <script type="text/javascript" src="../misc/trolley.js"></script>
  <script type="text/javascript" src="../misc/pagecookie.js"></script>
<nav>
    <div class="menu-item alpha">
      <h4><a href="/">Home</a></h4>
      <p>E-TeeshirtShop @ Campus Denayer</p>
    </div>
       
    <div class="menu-item">
      <h4><a href="/tshirts">Browse</a></h4>
      <ul>
        <li><a href="#">Web</a></li>
        <li><a href="#">Print</a></li>
        <li><a href="#">Other</a></li>
      </ul>
    </div>
       
    <div class="menu-item">
      <h4><a href="#"><?php if(isset($_SESSION['username'])) echo $_SESSION['username']; else echo "<a href=\"#\" onclick=\"SavePage('/login')\">Login</a>"; ?></a></h4>
      <ul>
        <li><a href="#">------------</a></li>
        <li><a href="#">The Creators</a></li>
        <li><a href="#" onclick="SavePage('/logout')">Logout</a></li>
      </ul>
    </div>
       
    <div class="menu-item">
      <h4><a href="#">Trolley</a></h4>
      <ul>
        <li><a id="price" href="#"></a></li>
        <li><a id="quantity" href="#"></a></li>
        <li><a id="checkout" href="#">checkout</a></li>
      </ul>
    </div>
</nav>
</div>