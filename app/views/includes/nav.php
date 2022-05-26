    <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto <?php if($data['title'] == "Home"){echo "active";} ?>" href="<?php echo URLROOT; ?>/">Home</a></li>
          <li><a class="nav-link scrollto <?php if($data['title'] == "CV"){echo "active";} ?>" href="<?php echo URLROOT; ?>/resume/index">Resume Generator</a></li>
          <li><a class="nav-link scrollto <?php if($data['title'] == "Universities"){echo "active";} ?>" href="<?php echo URLROOT; ?>/unis/index">Universities Info</a></li>
          <li><a class="nav-link scrollto <?php if($data['title'] == "Test"){echo "active";} ?>" href="<?php echo URLROOT; ?>/tests/index">Tests</a></li>
          <?php if(isset($_SESSION['user_id'])): ?>
            <li class="dropdown <?php if($data['title'] == "Profile"){echo "active";} ?>"><a href="#"><span><?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?></span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="<?php echo URLROOT.'/users/profile'; ?>">Profile</a></li>
                <li><a href="<?php echo URLROOT; ?>/users/logout">Logout</a></li>
              </ul>
            </li>
          <?php endif; ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->