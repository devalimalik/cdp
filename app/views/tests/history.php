<?php
       require APPROOT . '/views/includes/head.php';
    ?>    

    <main id="main" style="margin-top: 10%;">
      <!-- ======= Section ======= -->
      <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <p>Result History</p>
          </div>
          
          <div class="row">
            <p>Total Available Results = <?php echo count($data['results']); ?></p>
            <div class="col-lg-12">
              <table class="table table-light table-bordered">
                <thead class="thead-light">
                  <tr>
                  <th>Test Name</th>
                  <th>Score</th>
                  <th>Total</th>
                  <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($data['results']) > 0): ?>
                    <?php foreach($data['results'] as $result): ?>
                      <tr>
                        <td><p><?php echo $result->name; ?></p></td>
                        <td><p><?php echo $result->score; ?></p></td>
                        <td><p><?php echo $result->total; ?></p></td>
                        <td><p><?php echo $result->created_at; ?></p></td>
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