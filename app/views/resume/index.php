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
              <p>Basic information</p>
             
                <form action="<?php echo URLROOT; ?>/resumes/index" method="POST" role="form">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 form-group mb-3">
                        <input type="text" value="<?php if(count($data['basic']) != 0){ echo $data['basic'][0]->name;}elseif(isset($data['name']) && $data['name'] != ''){echo $data['name'];} ?>" name="name" class="form-control" autocomplete="off" id="name" placeholder="Your name" >
                        <div class="validate"></div>
                        </div>
                        <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0 mb-3">
                        <input type="email" autocomplete="off" class="form-control" value="<?php if(count($data['basic']) != 0){ echo $data['basic'][0]->email;}elseif(isset($data['email']) && $data['email'] != ''){echo $data['email'];} ?>" name="email" id="email" placeholder="Your Email" >
                        <div class="validate"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0 mb-3">
                        <input type="text" autocomplete="off" class="form-control" value="<?php if(count($data['basic']) != 0){ echo $data['basic'][0]->contact;}elseif(isset($data['contact']) && $data['contact'] != ''){echo $data['contact'];} ?>" name="contact" id="contact" placeholder="Your contact" >
                        <div class="validate"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0 mb-3">
                        <input type="text" autocomplete="off" class="form-control" value="<?php if(count($data['basic']) != 0){ echo $data['basic'][0]->address;}elseif(isset($data['address']) && $data['address'] != ''){echo $data['address'];} ?>" name="address" id="address" placeholder="Your address" >
                        <div class="validate"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0 mb-3">
                        <input type="text" autocomplete="off" class="form-control" value="<?php if(count($data['basic']) != 0){ echo $data['basic'][0]->introduction;}elseif(isset($data['introduction']) && $data['introduction'] != ''){echo $data['introduction'];} ?>" name="introduction" id="introduction" placeholder="Your introduction" >
                        <div class="validate"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0 mb-3">
                        <input type="text" autocomplete="off" class="form-control" value="<?php if(count($data['basic']) != 0){ echo $data['basic'][0]->qualification;}elseif(isset($data['qualification']) && $data['qualification'] != ''){echo $data['qualification'];} ?>" name="qualification" id="qualification" placeholder="Your qualification" >
                        <div class="validate"></div>
                        </div>

                        <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0 mb-3">
                        <input type="text" autocomplete="off" class="form-control" value="<?php if(count($data['basic']) != 0){ echo $data['basic'][0]->experience;}elseif(isset($data['experience']) && $data['experience'] != ''){echo $data['experience'];} ?>" name="experience" id="experience" placeholder="Your experience" >
                        <div class="validate"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <?php if(count($data['Error']) > 0 && ( $data['Error']['eError'] !='' || $data['Error']['qError'] !='' || $data['Error']['introductionError'] !='' || $data['Error']['addressError'] !='' || $data['Error']['contactError'] !='' || $data['Error']['emailError'] !='' || $data['Error']['nameError'] !='')): ?>
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
                    <div class=""><button class="btn btn-success" type="submit">Save</button></div>
                    </form>

                    <hr class="mt-5">
                    <p>Intrests</p>
                    <?php if(count($data['basic']) != 0): ?>
                        <div class="mb-3">
                            <a class="btn btn-success" style="float:right;" href="<?php echo URLROOT.'/resumes/addintrest?rid='.$data['basic'][0]->id; ?>">Add</a>
                        </div>
                    <?php endif;  ?>
                    <?php if(count($data['intrests']) > 0): ?>
                        <ul>
                            <?php foreach($data['intrests'] as $intrest): ?>
                                <li class="mb-3"><?php print_r($intrest->name); ?> <a href="<?php echo URLROOT.'/resumes/deleteintrest?iid='.$intrest->id; ?>" class="btn btn-danger btn-sm">Delete</a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <hr>
                    <p>Skills</p>
                    
                    <?php if(count($data['basic']) != 0): ?>
                        <div class="mb-3">
                            <a class="btn btn-success" style="float:right;" href="<?php echo URLROOT.'/resumes/addskill?rid='.$data['basic'][0]->id;  ?>">Add</a>
                        </div>
                    <?php endif;  ?>

                    <?php if(count($data['skills']) > 0): ?>
                        <ul>
                            <?php foreach($data['skills'] as $skill): ?>
                                <li class="mb-3"><?php print_r($skill->name); ?> <a href="<?php echo URLROOT.'/resumes/deleteskill?iid='.$skill->id; ?>" class="btn btn-danger btn-sm">Delete</a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>


                    <hr>
                    <div class="mb-3">
                        <a class="btn btn-primary" style="float:right;" href="<?php echo URLROOT.'/resumes/download'?>">Download CV</a>
                    </div>
          </div>

        </div>
      </section><!-- Section -->
    </main>
      
    <?php
      require APPROOT . '/views/includes/foot.php';
    ?> 