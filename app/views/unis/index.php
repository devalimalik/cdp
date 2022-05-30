    <?php
       require APPROOT . '/views/includes/head.php';
    ?>    

    <main id="main" style="margin-top: 10%;">
      <!-- ======= Section ======= -->
      <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <p>University Info</p>
          </div>
          
          <div class="row">
            <p>Total <?php echo count($data['programs']); ?> Programs Offered in Pakistan </p>
            <div class="col-lg-12">
              <table class="table table-light table-bordered">
                <thead class="thead-light">
                  <tr>
                  <th>Program</th>
                  <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($data['programs']) > 0): ?>
                    <?php foreach($data['programs'] as $program): ?>
                      <tr>
                        <td><p><?php echo $program->name; ?></p></td>
                        <td><a href="<?php echo URLROOT.'/unis/search?program='.$program->name; ?>" style="margin: 1% 5%;" class="btn btn-warning"> Universities</a><a href="<?php echo URLROOT.''; ?>/" class="btn btn-warning" style="margin: 1% 5%;"> Admission</a><a href="<?php echo URLROOT.''; ?>/" style="margin:1% 5%" class="btn btn-warning mr-2"> Career Scope</a></td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section><!-- Section -->
    </main>
      
    <?php
      require APPROOT . '/views/includes/foot.php';
    ?> 