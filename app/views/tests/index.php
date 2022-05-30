<?php
       require APPROOT . '/views/includes/head.php';
    ?>    

    <main id="main" style="margin-top: 10%;">
      <!-- ======= Section ======= -->
      <section id="why-us" class="why-us section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <p>Tests</p>
          </div>

          <div class="row">
              <?php $count = 0; ?>
             <?php if(count($data['tests']) > 0): ?>
                <?php foreach($data['tests'] as $test): ?>
                    <div class="col-lg-4 <?php if($count != 0){echo 'mt-4 mt-lg-0';} ?>">
                        <div class="box" data-aos="zoom-in" data-aos-delay="100">
                        <span><?php $count++; echo $count; ?></span>
                        <h4><?php echo $test->name; ?></h4>
                        <a href="<?php echo URLROOT.'/tests/take?test='.$test->id; ?>" class="btn btn-warning">Take Test</a>
                        </div>
                    </div>
                <?php endforeach; ?>
             <?php endif; ?>
            
          </div>

        </div>
      </section><!-- Section -->
    </main>
      
    <?php
      require APPROOT . '/views/includes/foot.php';
    ?> 