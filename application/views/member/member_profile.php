<html>
     <?php
    //require './head.php';
    $this->load->view('member/mhead');
    ?>

    <body>

        <div id="layout-wrapper">
            <?php
            //require './header.php';
            $this->load->view('member/mheader');
            ?>


            <?php
            //require_once './menu.php';
            $this->load->view('member/menu');
            ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-8 card   ms-lg-auto">
                                <div class="mt-4 mt-lg-0">
                                    <div class=" card-header row">
                                        <h5 class="col-12" align="center" style=""> <b>User Profile</b></h5>
                                    </div>
                                    <form method="post" action="" name="profile" id="" novalidate="" enctype="multipart/form-data" accept-charset="UTF-8" class="customer-form myform">
                                        <div class="card-body row">
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" class="form-control"  pattern="^[a-zA-z ]+$" required=""  placeholder="Enter your Name" id="input-firstname"value="<?php
                                                    if (!isset($success) && set_value('name')) {
                                                        echo set_value('name');
                                                    } else {
                                                        echo $detail->name;
                                                    }
                                                    ?>"  >
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('name');
                                                        ?>
                                                    </p>
                                                </div>
                                             </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="email" class="form-control"  required="" placeholder="Enter your Email" id="input-email" value="<?php
                                                    if (!isset($success) && set_value('email')) {
                                                        echo set_value('email');
                                                    } else {
                                                        echo $detail->email;
                                                    }
                                                    ?>"  > 
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('email');
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-text-input" class="col-sm-3 col-form-label">Mobile No</label>
                                                <div class="col-sm-9">
                                                    <input type="tel" name="mobile" class="form-control" required="" pattern="^[0-9]{10}" id="input-telephone"  placeholder="Enter your Mobile No"  value="<?php
                                                    if (!isset($success) && set_value('mobile')) {
                                                        echo set_value('mobile');
                                                    } else {
                                                        echo $detail->mobile;
                                                    }
                                                    ?>">
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('mobile');
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-text-input" class="col-sm-3 col-form-label">Gender</label>
                                                <div class="col-sm-6" style="padding-top: 10px;">
                                                    <div class="col-sm-9">
                                                        <input name="gender"  id="mr" value="Male" <?php
                                                        if (!isset($success) && set_radio('gender', 'Male')) {
                                                            echo set_radio('gender', 'Male');
                                                        } else {
                                                            if ($detail->gender == 'Male') {
                                                                echo "checked";
                                                            }
                                                        }
                                                        ?>  type="radio" class="padding-10px-right" >
                                                        <label for="mr" class="mb-0">Male</label>
                                                        <input name="gender" id="mrs" value="Female" <?php
                                                        if (!isset($success) && set_radio('gender', 'Female')) {
                                                            echo set_radio('gender', 'Female');
                                                        } else {
                                                            if ($detail->gender == 'Female') {
                                                                echo "checked";
                                                            }
                                                        }
                                                        ?> type="radio" class="padding-10px-right">
                                                        <label for="mrs" class="mb-0">Female</label>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('gender');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Date of Birth</label>
                                                <div class="col-sm-9">
                                                    <input name="dob" max="3000-01-01" required="" min="1000-01-01" class="form-control" type="date"value="<?php
                                                    if (set_value('dob')) {
                                                        echo set_value('dob');
                                                    } else {
                                                        echo $detail->birth_date;
                                                    }
                                                    ?>">
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('dob');
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="custom-file"  >
                                                    <label  for="horizontal-firstname-input" class="col-sm-3 col-form-label">Choose Profile</label>
                                                    <input accept="image/*" type="file" onchange="loadFile(event)" name="memberphoto" class="custom-file-input">
                                                </div>
                                            </div>
                                            <button type="submit" name="change" value="yes" class="btn margin-15px-top btn-primary">Save Changes</button>
                                         </div>
                                         <?php
                                            if (isset($success)) {
                                                ?>
                                                <div class="alert alert-success alert-dismissible d-flex align-items-center mb-0" role="alert">
                                                    <i class="ti ti-checks alert-icon me-2"></i>
                                                    <div>
                                                        <strong>Ok!</strong><?php echo $success; ?>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>

                                                <?php
                                            }
                                            if (isset($err)) {
                                                ?>
                                                <div class="alert alert-danger alert-dismissible d-flex align-items-center mb-0" role="alert">
                                                    <i class="ti ti-checks alert-icon me-2"></i>
                                                    <div>
                                                        <strong>Oops!</strong><?php echo $err; ?>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
        <?php
         $this->load->view('member/mfooter');
        ?>
        <!-- JAVASCRIPT -->
        <div class="custom-file" style="padding: 50px;" ></div>
        <?php
        $this->load->view('member/mfooterscript');
        ?>
        <script>
                var loadFile = function(event) {
               var output = document.getElementById('output');
               output.src = URL.createObjectURL(event.target.files[0]);
               output.onload = function() {
                 URL.revokeObjectURL(output.src) // free memory
               }
             };
         </script>
      </body>
</html>