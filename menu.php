<?php

  if($_SESSION['role_ID'] == "1" )
  {
    echo ' <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image" style = "color:white">
    ROLE : ADMINISTRATOR
    </div>
    </div>
  <li class="nav-item menu-open">
    <a href="mainpage.php" class="nav-link active">
      <i class="nav-icon fas fa-home"></i>
      <p>
        Home
        <!--<i class="right fas fa-angle-left"></i>-->
      </p>
    </a>
  </li>

  <li class="nav-item">
    <a href="report.php" class="nav-link">
      <i class="nav-icon fas fa-chart-line"></i>
        Report
    </a>
  </li>

  <li class="nav-item">
    <a href="User.php" class="nav-link">
      <i class="nav-icon fas fa-user-graduate"></i>
        User
      </p>
    </a>
  </li>
  
  <li class="nav-item">
  <a href="logout.php" class="nav-link">
    <i class="nav-icon fas fa-power-off"></i>
    
      Log Out
      
    </p>
  </a>
</li>';
} else {
    echo '
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image" style = "color:white">
    ROLE : MODERATOR
    </div>
    </div><li class="nav-item menu-open">
    <a href="mainpage.php" class="nav-link active">
      <i class="nav-icon fas fa-home"></i>
      <p>
        Home
        <!--<i class="right fas fa-angle-left"></i>-->
      </p>
    </a>
  </li>

  <li class="nav-item">
    <a href="report.php" class="nav-link">
      <i class="nav-icon fas fa-chart-line"></i>
        Report
    </a>
  </li>
  <li class="nav-item">
  <a href="sections.php" class="nav-link">
    <i class="nav-icon fas fa-list"></i>
      Sections
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="subsections.php" class="nav-link">
    <i class="nav-icon fas fa-list"></i>
      Sub-Sections
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="terms.php" class="nav-link">
    <i class="nav-icon fas fa-list"></i>
      Terms
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="logout.php" class="nav-link">
    <i class="nav-icon fas fa-power-off"></i>
    
      Log Out
      
    </p>
  </a>
</li>';
}

?>
