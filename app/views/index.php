    <?php
       require APPROOT . '/views/includes/head.php';
    ?>    
      
    <?php
       require APPROOT . '/views/includes/hero.php';
    ?>

    <main id="main">
       <!-- ======= Test Section ======= -->
      <section id="home-test" class="home-sec home-test">
       <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="home-sec-img">
              <img src="<?php echo URLROOT.'/'; ?>assets/img/tests.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" style="z-index: 1;">
            <h3>Career Determination Tests</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Aptitude Test</li>
              <li><i class="bi bi-check-circle"></i> Skill Test</li>
            </ul>
            <p>
              <a class="btn btn-warning" href="<?php echo URLROOT.'/tests/index'; ?>">Take Test</a>
            </p>
          </div>
        </div>

       </div>
      </section><!-- End Test Section -->


      <!-- ======= CV Section ======= -->
      <section id="home-cv" class="home-sec home-cv">
       <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-2 content" style="z-index: 1;">
            <h3>Resume Generator</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Add Your Info</li>
              <li><i class="bi bi-check-circle"></i> Download Resume</li>
            </ul>
            <p>
              <a class="btn btn-warning" href="<?php echo URLROOT.'/resume/index'; ?>">Generate Resume</a>
            </p>
          </div>
          <div class="col-lg-6 order-1 order-lg-1" data-aos="zoom-in" data-aos-delay="100">
            <div class="home-sec-img">
              <img src="<?php echo URLROOT.'/'; ?>assets/img/cvs.jpg" alt="">
            </div>
          </div>
        </div>

       </div>
      </section><!-- End CV Section -->

      <!-- ======= CV Section ======= -->
      <section id="home-unis" class="home-sec home-unis">
       <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" style="z-index: 1;">
            <h3>Universities Info</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Check Universities Info</li>
            </ul>
            <p>
              <a class="btn btn-warning" href="<?php echo URLROOT.'/unis/index'; ?>">Check Universities</a>
            </p>
          </div>
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="home-sec-img">
              <img src="<?php echo URLROOT.'/'; ?>assets/img/unis.jpg" alt="">
            </div>
          </div>
        </div>

       </div>
      </section><!-- End CV Section -->
    </main>
      
    <?php
      require APPROOT . '/views/includes/foot.php';
    ?> 