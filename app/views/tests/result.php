<?php
       require APPROOT . '/views/includes/head.php';
    ?>    

    <main id="main" style="margin-top: 10%;">
      <!-- ======= Section ======= -->
      <section id="why-us" class="why-us section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <p><?php if($data['test']->name != ''){echo $data['test']->name;} ?></p>
          </div>

          <div class="row">
              <hr>
              <h1>Result</h6>
              <p>You scored <?php echo $data['score']; ?> out of <?php echo $data['total']; ?> Marks</p>
          </div>
          <hr>
          <div class="row">
              <a class="btn btn-success" href="<?php echo URLROOT.'/tests/history'; ?>">View Result History</a>
          </div>
        </div>
      </section><!-- Section -->
    </main>
      
    <?php
      require APPROOT . '/views/includes/foot.php';
    ?> 