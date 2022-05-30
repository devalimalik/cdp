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
              <?php $count = 0; ?>
             <?php if(count($data['questions']) > 0): ?>
                <form method="POST" action="<?php echo URLROOT.'/tests/result'; ?>">
                <?php foreach($data['questions'] as $question): ?>
                    
                    <div class="col-lg-12">
                        <p><?php $count++; echo $count.'. '; echo $question->question; ?></p>
                    </div> 
                     
                    <div class="col-lg-12">
                        <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="answer<?php echo $count; ?>" value="<?php echo $question->op1; ?>" required> <?php echo $question->op1; ?>
                        </label>
                        </div>

                        <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="answer<?php echo $count; ?>" value="<?php echo $question->op2; ?>" required> <?php echo $question->op2; ?>
                        </label>
                        </div>

                        <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="answer<?php echo $count; ?>" value="<?php echo $question->op3; ?>" required> <?php echo $question->op3; ?>
                        </label>
                        </div>

                        <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="answer<?php echo $count; ?>" value="<?php echo $question->op4; ?>" required> <?php echo $question->op4; ?>
                        </label>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>
                    <div class="col-lg-12">
                        <input type="text" name="test_id" value="<?php echo $data['test']->id; ?>" hidden>
                    </div>
                    <input type="submit" value="Submit" name="submit" class="mt-4 btn btn-success">
                </form>
             <?php endif; ?>
             
          </div>

        </div>
      </section><!-- Section -->
    </main>
      
    <?php
      require APPROOT . '/views/includes/foot.php';
    ?> 