<!DOCTYPE html>
<html lang="en">

  <head>
    <title>User - Signup</title>
<?php echo link_tag('assests/vendor/bootstrap/css/bootstrap.min.css'); ?>
<?php echo link_tag('assests/vendor/fontawesome-free/css/all.min.css'); ?>
<?php echo link_tag('assests/css/sb-admin.css'); ?>
 
 <script>

  function addnewrow(){
          currentrow=jQuery('#counter').val();
          nextrow=eval(parseInt(currentrow)+1);
        
        var html =  '<tr id="'+nextrow+'"> <td><img src="<?=base_url()?>images/unchecked.gif" onclick="hiderow('+nextrow+')" alt="Delete" title="Delete" /><input type="hidden" value="0" id="deletedrow'+nextrow+'" name="deletedrow'+nextrow+'" /> &nbsp;</td><td><select class="form-control" name="exam_id'+nextrow+'"><option value="0">Select</option> <?php foreach ($exam as $row){?><option value="<?php echo $row->id?>"><?php echo $row->name?></option><?php }?></select></td><td><select class="form-control" name="uni_id'+nextrow+'"><option value="0">Select</option><?php foreach ($uni as $row){?><option value="<?php echo $row->id?>"><?php echo $row->name?></option><?php } ?></select></td><td><select class="form-control" name="board_id'+nextrow+'"><option value="0">Select</option><?php foreach ($board as $row){ ?> <option value="<?php echo $row->id?>"><?php echo $row->name?></option><?php  }?></select></td><td><input type="text" name="result'+nextrow+'" id="result'+nextrow+'" style="text-align:right" class="small"  /> </td></tr>' ;

          jQuery("#"+currentrow).after(html);
          jQuery('#counter').val(nextrow);
  
  }
 
   function training_table(){
      if (jQuery("#training_yes").prop("checked", true)){
    // alert(jQuery('#training_counter').val())
        currentrow=jQuery('#training_counter').val();
          nextrow=eval(parseInt(currentrow)+1);
        
      var html =  '<table class="table table-bordered" id="training"><tr ><td>Action</td><td>Training Name</td><td>Training Details</td></tr><tr id="training1"><td><input type="hidden" value="0" id="training_deletedrow'+nextrow+'" name="training_deletedrow'+nextrow+'" /></td><td><input type="text" name="training_name1" id="training_name1" style="text-align:right" class="small"  /></td><td><input type="text" name="training_details1" id="training_details1" style="text-align:right" class="small"  /></td></tr><tr><td colspan="3"><img style="float:right;margin-right:8px;" onclick="add_training_row()" src="<?=base_url()?>images/select.gif" width="25" height="25" alt="Add more" title="Add More" /></td></tr></table>' ;

          //jQuery("#"+currentrow).after(html);
          jQuery('#training_counter').val(nextrow);
          jQuery( "#training_table" ).append(html);
    }
          
   
  }
   function add_training_row(){
    //alert("222");
          currentrow=jQuery('#training_counter').val();
          nextrow=eval(parseInt(currentrow)+1);
        
        var html2 =  '<tr id="training'+nextrow+'"> <td><img src="<?=base_url()?>images/unchecked.gif" onclick="training_hiderow('+nextrow+')" alt="Delete" title="Delete" /><input type="hidden" value="0" id="training_deletedrow'+nextrow+'" name="training_deletedrow'+nextrow+'" /> &nbsp;</td><td><input type="text" name="training_name'+nextrow+'" id="training_name'+nextrow+'" style="text-align:right" class="small"  /></td><td><input type="text" name="training_details'+nextrow+'" id="training_details'+nextrow+'" style="text-align:right" class="small"  /></td></tr>' ;

          jQuery("#training"+currentrow).after(html2);
          jQuery('#training_counter').val(nextrow);

   //jQuery( "#training_table" ).append(html);
   
  }
  function hiderow(id)
    {
     // alert(id);
      jQuery('#deletedrow'+id).val(1);
      jQuery('#'+id).css('display','none');
     
        currentrow=jQuery('#counter').val();
        nextrow=eval(parseInt(currentrow)+1);
      
    } 
    function training_hiderow(id)
    {
     // alert(id);
      jQuery('#training_deletedrow'+id).val(1);
      jQuery('#training'+id).css('display','none');
     
        currentrow=jQuery('#training_counter').val();
        nextrow=eval(parseInt(currentrow)+1);
      
    }
  function delete_training()
    {
     // alert("444")
      jQuery('#training').css('display','none');
      jQuery('#training').remove();
      jQuery('#training_counter').val(0);   
      
    }
 </script>
  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
<!---- Success Message ---->
    <?php if ($this->session->flashdata('success')) { ?>
    <p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
    </div>


    <?php } ?>

<!---- Error Message ---->

<?php if ($this->session->flashdata('error')) { ?>
<p style="color:red; font-size:18px;"><?php echo $this->session->flashdata('error');?></p>

<?php } ?>  



  <?php echo form_open_multipart('user/signup', ['id'=>"registration-form"]);?>
  
   <div class="form-horizontal">
    
    
  <div class="form-group">
    <div class="form-row">
      <label class="col-md-3" >Email</label>
      <div class="col-md-9 form-label-group">
          <?php echo form_input(array('name'=>'email','id'=>'email','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('email')));?>
          <?php echo form_label('Enter valid email', 'email'); ?>
          <?php echo form_error('email',"<div style='color:red'>","</div>");?>
          </div>
      </div>
    </div>
    <div class="form-group">
        <div class="form-row">
          <label class="col-md-3" >Name</label>
          <div class="col-md-9 form-label-group">
              <?php echo form_input(array('name'=>'name','id'=>'name','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('name')));?>
              <?php echo form_label('Enter your name', 'name'); ?>
              <?php echo form_error('name',"<div style='color:red'>","</div>");?>
          </div>
         </div>
      </div>
    <div class="form-group">
          <div class="form-row">
                    <div class="col-md-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>Division</label>
                        <select class="form-control" name="division" id="division" >
                          <option value="0">Select</option>
                         <?php 
                        foreach ($division as $row){
                        ?>
                          <option value="<?php echo $row->id?>"><?php echo $row->name?></option>
                         <?php 
                         }
                          ?> 
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <!-- select -->
                      <div class="form-group">
                        <label>District</label>
                       <select class="form-control" name="district" id="district">
                          <option value="0">Select</option>
                       
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Upazila</label>
                         <select class="form-control" name="upazila" id="upazila">
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
              <label class="col-md-3" >Address</label>
              <div class="col-md-9 form-label-group">
                      <?php echo form_input(array('name'=>'address','id'=>'address','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('address')));?>
                      <?php echo form_label('Enter your address', 'address'); ?>
                      <?php echo form_error('address',"<div style='color:red'>","</div>");?>
                  </div>
                </div>
              </div>
                <div class="form-group">
                  <div class="form-row">
                      <label class="col-md-4" >Language</label>
                    <div class="col-md-8 row">
                      
                      <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" id="language_bangla" name="language_bangla" value="Bangla" type="checkbox">
                          <label class="custom-control-label" for="language_bangla">Bangla</label>
                      </div>
                    <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" id="language_english" name="language_english" value="English" type="checkbox">
                          <label class="custom-control-label" for="language_english">English</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" id="language_french" name="language_french" value="French" type="checkbox">
                          <label class="custom-control-label" for="language_french">French</label>
                      </div>
                   </div>
                  </div>
                  <div class="form-group">
                    <label>Education Qualification</label>
                    <div class="table-responsive">
                        
                  <input class="text-input" type="hidden" value="1" name="counter" id="counter" />
                  <table class="table table-bordered">
                      <tr>
                          <td>D</td>
                          <td>Exam</td>
                          <td>University</td>
                          <td>Board</td>
                          <td>Result</td>
                      </tr>
                      <tr id="1">                      
                        <td >&nbsp; <input class="text-input" type="hidden" value="0" id="deletedrow1" name="deletedrow1" /> 
                          </td>
                       <td><select class="form-control" name="exam_id1">
                         <option value="0">Select</option>
                      <?php 
                        foreach ($exam as $row){
                        ?>
                       <option value="<?php echo $row->id?>"><?php echo $row->name?></option>
                          <?php 
                        }
                          ?>
                        </select></td>
                               
                        <td><select class="form-control" name="uni_id1">
                         <option value="0">Select</option>
                      <?php 
                        foreach ($uni as $row){
                        ?>
                       <option value="<?php echo $row->id?>"><?php echo $row->name?></option>
                          <?php 
                        }
                          ?>
                        </select></td>
                         <td><select class="form-control" name="board_id1">
                         <option value="0">Select</option>
                      <?php 
                        foreach ($board as $row){
                        ?>
                       <option value="<?php echo $row->id?>"><?php echo $row->name?></option>
                          <?php 
                        }
                          ?>
                        </select></td>
                        <td><input type="text" name="result1" id="" class="small" style="text-align:right" /></td>                      
                      </tr>
                      
                      <tr>
                          <td colspan="5" >
                              <img style="float:right;margin-right:8px;" onclick="addnewrow()" src="<?=base_url()?>images/select.gif" width="25" height="25" alt="Add more" title="Add More" />
                          </td>
                      </tr>
                  </table>
                      </div>
                  </div>
                <div class="form-group">
                  <div class="form-row">
                      <label class="col-md-3" >Photo</label>
                      <div class="col-md-9">
                        <input type="file" class="file" name="file1" id="file1" >
                        <label class="custom-file-label" for="file1">Choose Photo</label>
                    </div>
                   </div>
                  </div>
                  <div class="form-group">
                  <div class=" form-row">
                    <label class="col-md-3" for="cv_attach">CV Attachment</label>
                    <div class="col-md-9">
                      <input type="file" class="custom-file-input" name="cv_attach" id="cv_attach">
                      <label class="custom-file-label" for="cv_attach">Choose file</label>
                    </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <div class=" form-row">
                      <label class="col-md-4">Training</label>
                    <div class="col-md-8">
                      <input class="text-input" type="hidden" value="0" name="training_counter" id="training_counter" />
                      <input onclick="training_table()" id="training_yes" value="1" type="radio" name="training">Yes
                      <input onclick="delete_training()" id="training_no" value="0" type="radio" name="training">No   
                    </div>
                  </div>
                  <div class=" form-row"><div class="col-md-3"></div><div class="col-md-9" id="training_table"></div></div>
                  </div>
              <div class="form-group">
        <div class="form-row">
          <label class="col-md-3" >Mobile</label>
          <div class="col-md-9 form-label-group">

              <?php echo form_input(array('name'=>'mobile','id'=>'mobile','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('mobile')));?>
              <?php echo form_label('Enter Mobile Number', 'mobile'); ?>
              <?php echo form_error('mobile',"<div style='color:red'>","</div>");?>
              </div>
              </div>
            </div> 
            <div class="form-group">
        <div class="form-row">
          <label class="col-md-3" >Password</label>
          <div class="col-md-9 form-label-group">
              <?php echo form_password(array('name'=>'password','id'=>'password','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('password')));?>
              <?php echo form_label('Password', 'password'); ?>
              <?php echo form_error('password',"<div style='color:red'>","</div>");?>
              </div>
                  </div>
                </div>
                <div class="form-group">
        <div class="form-row">
          <label class="col-md-3" >Confirm Password</label>
          <div class="col-md-9 form-label-group">
                  <?php echo form_password(array('name'=>'confirmpassword','id'=>'confirmpassword','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('confirmpassword')));?>
                  <?php echo form_label('Confirm Password', 'confirmpassword'); ?>
                  <?php echo form_error('confirmpassword',"<div style='color:red'>","</div>");?>
                  </div>
                </div>
              </div>
 <?php echo form_submit(array('name'=>'Register','value'=>'Register','class'=>'btn btn-primary btn-block')); ?>
</div>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo site_url('user/Login'); ?>">Login Page</a>
          
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assests/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script type="text/javascript">
        $('#division').change(function(e) { 
          e.preventDefault();
          console.log(this.value);
          var district_url = '<?php echo site_url('Home/getDistrictList'); ?>'+'?division='+this.value;
            $.ajax({
            type: "GET",
            url: district_url, // target element(s) to be updated with server response 
            dataType:'json',
            success : function(response){ 
               // console.log(response); 
                var options = response;
                $('#district').empty();
                $('#district').append('<option value="">Select District</option>');
                $.each(options,function(i, item) {
                  $('#district').append('<option value="' + item.id + '">' + item.name + '</option>');
                });                                               
                }
            });
        }); 

        $('#district').change(function(e) { 
          e.preventDefault();
          console.log(this.value);
          var upazila_url = '<?php echo site_url('Home/getUpazilaList'); ?>'+'?district='+this.value;
            $.ajax({
            type: "GET",
            url: upazila_url, // target element(s) to be updated with server response 
            dataType:'json',
            success : function(response){ 
               // console.log(response); 
                var options = response;
                $('#upazila').empty();
                $('#upazila').append('<option value="">Select Upazila</option>');
                $.each(options,function(i, item) {
                  $('#upazila').append('<option value="' + item.id + '">' + item.name + '</option>');
                });                                               
                }
            });
        }); 

/*$('#registration-form').submit(function(e){
  e.preventDefault();
  var data = new FormData( document.getElementById('registration-form'));
  var registration_url = '<?php echo site_url('user/signup/ajax_submit'); ?>';

   $.ajax({
      type: "POST",
      url: registration_url, // target element(s) to be updated with server response 
      data: data,
      dataType: "json",
      contentType:false,
      processData:false,

      success : function(response){
        console.log(response);
        var json = $.parseJSON(response);
        if(json.Message!='OK')
              {
                alert(json.Message);
                return false
              }else{

             // var row = {};
             alert('Successfully Saved')
          //  window.parent.location.reload(true);
              } 
    

      }
     });
});*/
    </script>
  </body>
</html>