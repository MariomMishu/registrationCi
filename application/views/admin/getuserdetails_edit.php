<!DOCTYPE html>
<html lang="en">

<head>
<title>User Profile</title>
<!-- Bootstrap core CSS-->
<?php echo link_tag('assests/vendor/bootstrap/css/bootstrap.min.css'); ?>
<!-- Custom fonts for this template-->
<?php echo link_tag('assests/vendor/fontawesome-free/css/all.min.css'); ?>
<!-- Page level plugin CSS-->
<?php echo link_tag('assests/vendor/datatables/dataTables.bootstrap4.css'); ?>
<!-- Custom styles for this template-->
<?php echo link_tag('assests/css/sb-admin.css'); ?>
<script>
</script>
  </head>

  <body id="page-top">

   <?php include APPPATH.'views/admin/includes/header.php';?>

    <div id="wrapper">

      <!-- Sidebar -->
  <?php include APPPATH.'views/admin/includes/sidebar.php';?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/Dashboard'); ?>">User</a>
            </li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>

          <!-- Page Content -->
          <h3>User Edit</h3>
          <hr>
<!---- Success Message ---->

 <form action="<?php echo site_url('admin/Manage_Users/updateUser'); ?>" method="POST" id="edit_form">
     <div class="form-group">     
            <div class="form-row">
                <label class="col-md-2" for="">Name</label>
                    <div class="col-md-7  form-label-group">
                      <input type="text" class="form-control" name="name" value="<?php echo $ud->name; ?>" id="name">
                      <input type="hidden" class="form-control" name="id" value="<?php echo $ud->id; ?>">
                    </div>
                    <div class="col-md-3"></div>
              </div>
      </div>

       <div class="form-group">     
            <div class="form-row">
                <label class="col-md-2" for="">Email</label>
                    <div class="col-md-7  form-label-group">
                      <input type="text" class="form-control" name="email" value="<?php echo $ud->email; ?>">
                    </div>
                    <div class="col-md-3"></div>
              </div>
      </div> 
      <div class="form-group">
          <div class="form-row">
                    <div class="col-md-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Division</label>
                        <select class="form-control" name="division" id="division" >
                          <option value="0">Select</option>
                         <?php 
                        foreach ($division as $row){
                          if($ud->division == $row->id){
                            $selected='selected="selected"';
                          }else{
                           $selected=''; 
                          }
                        ?>
                          <option value="<?php echo $row->id?>" <?=$selected;?>><?php echo $row->name?></option>
                         <?php 
                         }
                          ?>  
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>District</label>
                       <select class="form-control" name="district" id="district">
                         <?php 
                        foreach ($district as $row){
                          if($ud->district == $row->id){
                            $selected='selected="selected"';
                          }else{
                           $selected=''; 
                          }
                        ?>
                          <option value="<?php echo $row->id?>" <?=$selected;?>><?php echo $row->name?></option>
                         <?php 
                         }
                          ?>  
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Upazila</label>
                         <select class="form-control" name="upazila" id="upazila">
                           <?php 
                        foreach ($upazila as $row){
                          if($ud->upazila == $row->id){
                            $selected='selected="selected"';
                          }else{
                           $selected=''; 
                          }
                        ?>
                          <option value="<?php echo $row->id?>" <?=$selected;?>><?php echo $row->name?></option>
                         <?php 
                         }
                          ?>  
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3"></div>
                  </div>
                </div>
            <div class="form-group">     
            <div class="form-row">
                <label class="col-md-2" for="">Address</label>
                    <div class="col-md-7  form-label-group">
                      <input type="text" class="form-control" name="address" value="<?php echo $ud->address; ?>">
                    </div>
                    <div class="col-md-3"></div>
              </div>
          </div>
          <div class="form-group">
                  <div class="form-row">
                      <label class="col-md-4" >Language</label>
                    <div class="col-md-8 row">
                      
                      <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" id="language_bangla" name="language_bangla" <?php if($ud->language_bangla !=''){echo "checked='checked'";}?> value="Bangla" type="checkbox">
                          <label class="custom-control-label" for="language_bangla">Bangla</label>
                      </div>
                    <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" id="language_english" <?php if($ud->language_english !=''){ echo "checked='checked'";}?> name="language_english" value="English" type="checkbox">
                          <label class="custom-control-label" for="language_english">English</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" id="language_french" <?php if($ud->language_french !=''){ echo "checked='checked'";}?> name="language_french" value="French" type="checkbox">
                          <label class="custom-control-label" for="language_french">French</label>
                      </div>
                   </div>
                  </div>
                  <div class="form-group">
                    <label>Education Qualification</label>
                    <div class="col-md-9 table-responsive">
                  <table class="table table-bordered">
                      <tr>
                          <td>Exam</td>
                          <td>University</td>
                          <td>Board</td>
                          <td>Result</td>
                      </tr>
                        <? foreach ($edu_detail as $row) {  ?>
                      <tr>                      
                       <td>
                      <?php echo $row->exam_name;?>
                      </td>
                               
                        <td>
                        <?php echo $row->uni_name;?>
                       </td>
                         <td>
                        <?php echo $row->board_name;?>
                       </td>
                        <td>
                         <?php echo $row->result;?>
                        </td>                      
                      </tr>
                      <?}?>
                      
                  </table>
                      </div><div class="col-md-3"></div>
                  </div>
                <div class="form-group">
                  <div class="form-row">
                      <label class="col-md-2" >Photo</label>
                      <div class="col-md-7"><? if($ud->photo_actual!=''){?><a href="<?=base_url()?>uploads/photo/<?=$ud->photo ?>" target="_blank"> <img style="margin-top:1%;" src="<?=base_url()?>images/upload.png" ></a><?} else {?><?}?></div>
                   </div>
                  </div>
                  <div class="form-group">
                  <div class=" form-row">
                    <label class="col-md-2" for="cv_attach">CV Attachment</label>
                    <div class="col-md-7"><? if($ud->cv_actual!=''){?><a href="<?=base_url()?>uploads/cv/<?=$ud->cv_attach ?>" target="_blank"> <img style="margin-top:1%;" src="<?=base_url()?>images/file.png" > </a><?} else {?><?}?></div>
                  </div>
                  </div>
                  <div class="form-group">
                    <div class=" form-row">
                      <label class="col-md-2">Training</label>
                    <div class="col-md-7">
                       <?php if($ud->training ==1){ echo "Yes";}else{ echo "No";}?>  
                    </div>
                  </div><?php if($ud->training ==1){?>
                 <div class=" form-row">
                      <label class="col-md-2"></label>
                    <div class="col-md-7">
                        <table class="table table-bordered">
                      <tr>
                          <td>Training Name</td>
                          <td>Training Details</td>
                         
                      </tr>
                        <? foreach ($training_detail as $tr_row) {  ?>
                      <tr>                      
                       <td>
                      <?php echo $tr_row->training_name;?>
                      </td>
                               
                        <td>
                        <?php echo $tr_row->training_details;?>
                       </td>
                                              
                      </tr>
                      <?}?>
                      
                  </table>
                    </div>
                  </div>

                    <?}else{ echo ''?>

                 <?}?>
                  </div>
                  <input name="update" class="btn btn-primary btn-block"  value="Update" type="submit">
        </form>

  

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
     <?php include APPPATH.'views/admin/includes/footer.php';?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

   
 
  <script src="<?php echo base_url('assests/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assests/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('assests/vendor/chart.js/Chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assests/js/sb-admin.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/js/demo/datatables-demo.js'); ?>"></script>
    <script src="<?php echo base_url('assests/js/demo/chart-area-demo.js'); ?>"></script>
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
