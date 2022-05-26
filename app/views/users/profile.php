<?php
  require APPROOT . '/views/includes/head.php';
?>   

   <main id="main pt-5 mt-5">
      <!-- ======= Login Section ======= -->
    <section id="book-a-table" class="book-a-table mt-5">
      <div class="container" data-aos="fade-up">
          
        <div class="section-title"style='text-align:center;'>
          <p>Profile</p>
        </div>

        <form action="<?php echo URLROOT; ?>/users/profile" method="POST" role="form" class="php-email-form">
          <div class="row">
            <div class="col-lg-6 col-md-6 form-group">
              <input type="text" value="<?php if(isset($data['username']) && $data['username'] != ''){echo $data['username'];}else { echo $_SESSION['username'];} ?>" name="username" class="form-control" autocomplete="off" id="username" placeholder="Your username" >
              <div class="validate"></div>
            </div>
            <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
              <input type="email" autocomplete="off" class="form-control" value="<?php if(isset($data['email']) && $data['email'] != ''){echo $data['email'];}else { echo $_SESSION['email'];} ?>" name="email" id="email" placeholder="Your Email" disabled >
              <div class="validate"></div>
            </div>
            <div class="col-lg-12 col-md-12 form-group">
              <input type="password" autocomplete="off" name="password" value="<?php if(isset($data['password']) && $data['password'] != ''){echo $data['password'];}?>" class="form-control" id="password" placeholder="New Password">
              <div class="validate"></div>
            </div>
          </div>
          <div class="mb-3">
            <?php if(count($data['Error']) > 0): ?>
            <div class="error-message">
              <ul>
                <?php 
                  foreach($data['Error'] as $error){
                    if($error != ''){
                      echo '<li>'.$error.'</li>';
                    }
                    
                  }
                  ?>
              </ul>
            </div>
            <?php endif; ?>
          </div>
          <div class="text-center"><button type="submit">Update</button></div>
        </form>

      </div>
    </section><!-- End Login Section -->
    </main>

<?php
  require APPROOT . '/views/includes/foot.php';
?> 