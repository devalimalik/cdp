    <?php
       require APPROOT . '/views/includes/head.php';
    ?>    

    <main id="main" style="margin-top: 10%;">
      <!-- ======= Section ======= -->
      <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <p>Program Finder</p>
          </div>
          
          <div class="row">
            <div class="col-md-12">
              <form method="POST" action="<?php echo URLROOT.''; ?>/unis/search">
                <div class="row">
                  <div class="col">
                    <select name="program" class="form-control">
                      <option value="" selected>Select Program</option>
                      <?php if(count($data['programs']) > 0): ?>
                        <?php foreach($data['programs'] as $prog): ?>
                          <option value="<?php echo $prog->name; ?>" <?php if($data['program'] == $prog->name){echo 'SELECTED';} ?>><?php echo $prog->name; ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                  </div>
                  <div class="col">
                    <select name="city" class="form-control">
                      <option value="" selected>Select City</option>
                      <?php if(count($data['cities']) > 0): ?>
                        <?php foreach($data['cities'] as $cit): ?>
                          <option value="<?php echo $cit->city; ?>" <?php if($data['city'] == $cit->city){echo 'SELECTED';} ?> ><?php echo $cit->city; ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                  </div>
                  <div class="col">
                    <input type="submit" class="btn btn-sm btn-warning">
                  </div>
                </div>
               
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <p>Total <?php echo count($data['courses']); ?>  <?php echo $data['program']; ?> Courses Offered in <?php echo $data['city'].',' ?> Pakistan </p>
            <div class="col-lg-12">
              <table class="table table-light table-bordered">
                <thead class="thead-light">
                  <tr>
                  <th>Institute</th>
                  <th>City</th>
                  <th>Degree</th>
                  <th>Duration</th>
                  <th>Fee</th>
                  <th>Deadline</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($data['courses']) > 0): ?>
                    <?php foreach($data['courses'] as $course): ?>
                      <tr>
                        <td><p><?php echo $course->uname; ?></p></td>
                        <td><p><?php echo $course->ucity; ?></p></td>
                        <td><p><?php echo $course->pdegree; ?></p></td>
                        <td><p><?php echo $course->pduration; ?></p></td>
                        <td><p><?php echo $course->cfee; ?></p></td>
                        <td><p><?php echo $course->dline; ?></p></td>
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