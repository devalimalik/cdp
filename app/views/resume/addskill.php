<?php
       require APPROOT . '/views/includes/head.php';
    ?>    

    <main id="main" style="margin-top: 10%;">
      <!-- ======= Section ======= -->
      <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <p>Resume Generator</p>
          </div>
          
          <div class="row">
              <hr>
              <p>Add Skill</p>
             
                <form action="<?php echo URLROOT; ?>/resumes/addskill" method="POST" role="form">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 form-group mb-3">
                        <input type="text" value="<?php if(isset($data['name']) && $data['name'] != ''){echo $data['name'];} ?>" name="name" class="form-control" autocomplete="off" id="name" placeholder="Skill" >
                        <div class="validate"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0 mb-3">
                        <input type="text" autocomplete="off" class="form-control" value="<?php if(isset($data['rid']) && $data['rid'] != ''){echo $data['rid'];} ?>" name="rid" id="rid" hidden>
                        <div class="validate"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <?php if(count($data['Error']) > 0 && ( $data['Error']['nameError'] !='')): ?>
                        <div class="gerror">
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
                    <div class=""><button class="btn btn-success" type="submit">Add</button></div>
                    </form>

                    
          </div>

        </div>
      </section><!-- Section -->
    </main>
      
    <?php
      require APPROOT . '/views/includes/foot.php';
    ?> 