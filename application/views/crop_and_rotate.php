<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>

  <title> Crop and Rotate Image</title>

    <!-- Custom styles for this template-->
    
    <link href="<?php echo base_url()?>assets/css/sb-admin.css" rel="stylesheet">
    
    
    <script src="<?php echo base_url()?>assets/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    
    
    <link href="<?php echo base_url()?>assets/css/cropper.css" rel="stylesheet">
    
</head>



<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Generate QR-Code</div>
      <div class="card-body">
        	
			<?php if($this->session->flashdata('error')!=''){?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $this->session->flashdata('error')?>
            </div>
            <?php }?>
            
            <div id="crop-avatar">
                <div class="modal " id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1" style="display:block">
                <div class="modal-dialog">
                    <div class="modal-content panel-primary">
                        <form class="avatar-form" action="<?php print base_url(); ?>welcome/upload/" enctype="multipart/form-data" method="post">
                            <div class="modal-header panel-heading">
                                <h4 class="modal-title">Crop & Rotate Image</h4>
                            </div>
                            <div class="modal-body">
                                <!-- Upload image and data -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" class="filestyle avatar-input" id="avatarInput" name="avatar_file">
                                        </div>
                                    </div>
                                    <!-- Crop and preview -->                                
                                    <div class="col-md-12 preview">
                                        <div class="avatar-wrapper"></div>
                                    </div> 
                                    <div class="avatar-upload">
                                        <input type="hidden" class="avatar-data" name="avatar_data">
                                        <input type="hidden" class="avatar-src" name="avatar_src">
                                    </div>                                                 
                                </div>
                
                            </div>
                            <div class="modal-footer panel-footer">
                                <button type="button" class="avatar-btns btn btn-primary" data-method="rotate" data-option="-90" title="Rotate the image 9 degree to the left">Rotate Left</button>
                
                
                                <button type="button" class="avatar-btns btn btn-primary" data-method="rotate" data-option="+90" title="Rotate the image 9 degree to the right">Rotate Right </button>
                                <button type="submit" class="btn btn-primary avatar-save">Crop</button>
                                <button type="button" class="btn btn-primary refresh" >Cancel</button>
                            </div> 
                        </form>
                    </div>
                </div>
                </div><!-- /.modal -->
                </div>
        
      </div>
      
     
      
    </div>
    
    
  </div>
  
  
  
</body>

</html>

  


<script src="<?php echo base_url()?>assets/js/bootstrap-filestyle.js"></script>

<script>var baseurl="<?php echo base_url()?>";</script>
<script src="<?php echo base_url()?>assets/js/cropper.js"></script>
<script src="<?php echo base_url()?>assets/js/main.js"></script>


