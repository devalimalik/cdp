    <?php
      require APPROOT . '/views/includes/auth-head.php';
    ?> 
    <main id="main pt-5">
      <!-- ======= Login Section ======= -->
    <section id="book-a-table" class="book-a-table mt-5">
      <div class="container" data-aos="fade-up">
        <div class="section-title"style='text-align:center;'>
          <h1 class="logo me-auto me-lg-0"><a href="<?php echo URLROOT.'/'; ?>">Career Determination Platform</a></h1>
        </div>
        <div class="section-title"style='text-align:center;'>
          <p>Login</p>
        </div>

        <form action="<?php echo URLROOT; ?>/users/login" method="POST" role="form" class="php-email-form">
          <div class="row" style="justify-content: center !important;">
            <div class="col-lg-8 col-md-8 form-group">
              <input type="email" value="<?php if($data['email']!=''){echo $data['email'];}  ?>" name="email" class="form-control" id="email" placeholder="Your email">
              <div class="validate"></div>
            </div>
            <div class="col-lg-8 col-md-8 form-group mt-3 mt-md-0">
              <input type="password" class="form-control" name="password" id="password" placeholder="Your password">
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
          <div class="text-center"><button type="submit">Login</button></div>
          <p style="text-align:center;">Don't have Account? <a href="<?php echo URLROOT; ?>/users/register">Register</a></p>
        </form>

      </div>
    </section><!-- End Login Section -->
    </main>
    <?php
      require APPROOT . '/views/includes/auth-foot.php';
    ?> 