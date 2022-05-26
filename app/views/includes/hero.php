<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Career Determination Platform</span></h1>
          <h2>Trusted by many users!</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Features</a>
            <?php if(!isset($_SESSION['user_id'])):  ?>
              <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Get Started</a>
            <?php endif; ?>
          </div>
        </div>
        

      </div>
    </div>
  </section><!-- End Hero -->