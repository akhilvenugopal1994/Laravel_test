
<?php $__env->startSection('content'); ?>
    <section class="bnrsection">
         <!-- <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12 p-0">
                  <img src="dist/img/bnr.jpg" alt="">
               </div>
            </div>
         </div> -->
         <div class="container">
            <div class="row">
               <div class="offset-lg-1 col-lg-10 col-md-12 col-12 text-center">
                  <h1>Hi <span><?php echo e($user->name); ?></span> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h1>
                  <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
               </div>
               <div class="offset-lg-2 col-lg-8 offset-md-1 col-md-10 col-12 text-center">
                  <div class="formpart">
                     <form enctype="multipart/form-data" id="submitdataform">
                         <?php echo e(csrf_field()); ?>

                         <input type="hidden" value="<?php echo e($user->id); ?>" name="visitor_id">
                        <div id="slide03" style="display: block;">
                           <h3>Do you have a Previous Address?</h3>
                           <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label next02" for="flexRadioDefault1">
                              Yes
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                              No
                            </label>
                          </div>
                        </div>
                        
                        <div id="slide04" style="display:none;">
                           <h3>Enter your Previous Address</h3>
                            <div id="addresslist01">
                                <div class="mb-3 text-start addressbar01" id="addressbar011">
                                    <label class="form-label">Previous Address 1</label>
                                    <input type="text" class="form-control mb-3" name="line1[]" placeholder="Address line 1">
                                    <input type="text" class="form-control mb-3" name="line2[]" placeholder="Address line 2">
                                    <input type="text" class="form-control mb-3" name="line3[]" placeholder="Address line 3">
                                </div>
                            </div>
                            <div class="mb-3 text-center" id="submitoradd01">
                                <button type="button" class="btn btn-success" id="submitAddress01">Submit</button>
                                <p><a href="#" id="showadrs22">Add Another Address</a></p>
                                <p><a href="#slide04" id="remove44" style="display:none;">Remove Address</a></p>
                                <p><a href="#postaddrs2" id="back02"><< Back</a></p>
                            </div> 


<!--
                            <div id="postaddrs2" style="display:none">
                                <div class="mb-3 text-start">
                                    <label for="" class="form-label">Previous Address 2</label>
                                    <input type="text" class="form-control mb-3" id="" placeholder="Address line 1">
                                    <input type="text" class="form-control mb-3" id="" placeholder="Address line 2">
                                    <input type="text" class="form-control mb-3" id="" placeholder="Address line 3">
                                </div>

                                <div class="mb-3 text-center" id="submitoradd02">
                                    <button type="button" class="btn btn-success">Submit</button>
                                    <p><a href="#postaddrs3" id="showadrs3">Add Another Address</a></p>
                                    <p><a href="#slide04" id="remove3">Remove Address</a></p>
                                </div> 
                            </div>


                            <div id="postaddrs3" style="display:none">
                                <div class="mb-3 text-start">
                                    <label for="" class="form-label">Previous Address 3</label>
                                    <input type="text" class="form-control mb-3" id="" placeholder="Address line 1">
                                    <input type="text" class="form-control mb-3" id="" placeholder="Address line 2">
                                    <input type="text" class="form-control mb-3" id="" placeholder="Address line 3">
                                </div>

                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <p><a href="#slide04" id="remove4">Remove Address</a></p>
                                </div> 
                            </div>
-->
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function() {
    $("#flexRadioDefault2").on('click', function() {
        window.location.href='<?php echo e(route("greetings")); ?>'
    });
    
    $("#showadrs22").on('click', function() {
//        $( ".addressbar01" ).clone().appendTo("#addresslist01");
        var numItems = $('.addressbar01').length + 1;
        var newId = "addressbar011_"+numItems;
        var clone1 = $( "#addressbar011" ).clone();
        var string = "Previous Address " + numItems;
        clone1.find('.form-label').html(string);
        clone1.find('.addressbar01').attr("id",newId);
        $(clone1).appendTo("#addresslist01");
        $("#remove44").show();
    });
    
    $("#remove44").click(function () {
        $(".addressbar01:last").remove();
        var numItems = $('.addressbar01').length;
        if(numItems==1){
            $("#remove44").hide();
        }
    });
    
    $("#submitAddress01").click(function (event) {
//        event.preventDefault();
        var data = $("#submitdataform").serialize();
        $.ajax({
            url: "<?php echo e(route('addAddress')); ?>",
            type:'POST',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                data: data
            },
            success: function (response) {
                var url = '<?php echo e(route("greetings")); ?>';
                window.location.href=url;
            },
            error: function (response) {
                console.log(response); 
            }
        });
    });
});

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Test\laravel_test\resources\views/page02.blade.php ENDPATH**/ ?>