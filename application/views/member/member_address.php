<html lang="en">
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
                    <div class="row col-12">
                        <div class="card">
                            <div class="card-header row">
                                <div class="col-12">
                                    <h4 class="card-title" style="padding-top: 10px">User Address</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="" name="address" id="" novalidate="" enctype="multipart/form-data" accept-charset="UTF-8" class="customer-form myform">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <br/>
                                            <label>Name</label>
                                            <div class="mb-4 form-floating">
                                                <input type="text" required="" pattern="^[a-zA-Z ]+$" name="name" class="form-control <?php
                                                if (form_error('city')) {
                                                    echo "error-border";
                                                }
                                                ?>" id="floatingInput" placeholder="name@example.com">
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('name');
                                                    ?>
                                                </p>
                                                <label for="floatingInput">Enter Name</label>
                                            </div>
                                            <div class="row">
                                                <label>Country
                                                    <select class="form-control <?php
                                                    if (form_error('country')) {
                                                        echo "error-border";
                                                    }
                                                    ?>" onchange="set_combo('state', this.value);" name="country">
                                                        <option value="">Select Country</option>  
                                                        <?php
                                                        foreach ($country as $data) {
                                                            ?>
                                                            <option value="<?php echo $data->location_id; ?>"><?php echo $data->name; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </label>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('country');
                                                    ?>
                                                </p>
                                            </div>
                                            <li class="row">
                                                <label>State
                                                    <select class="form-control <?php
                                                    if (form_error('state')) {
                                                        echo "error-border";
                                                    }
                                                    ?>" name="state" onchange="set_combo('city', this.value);" id="state">
                                                        <option value="">Select State</option>
                                                        <?php
                                                        foreach ($record as $data) {
                                                            ?>
                                                            <option value="<?php echo $data->location_id; ?>"><?php echo $data->name; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </label>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('state');
                                                    ?>
                                                </p>
                                            </li>
                                            <li class="row">
                                                <label>City
                                                    <select class="form-control <?php
                                                    if (form_error('city')) {
                                                        echo "error-border";
                                                    }
                                                    ?>" name="city" id="city">
                                                        <option value="">Select City</option>
                                                        <?php
                                                        foreach ($record as $data) {
                                                            ?>
                                                            <option value="<?php echo $data->location_id; ?>"><?php echo $data->name; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('city');
                                                        ?>
                                                    </p>
                                                </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row mb-4">
                                                <label for="horizontal-text-input" class="col-sm-3 col-form-label">Address Type</label>
                                                <div class="row">
                                                    <div class="col-sm-9">
                                                        <input name="address_type" id="mr" value="office" type="radio" class="padding-10px-right" >
                                                        <label for="mr" class="mb-0">Office</label>
                                                        <input name="address_type" id="mrs" value="Home" type="radio" class="padding-10px-right">
                                                        <label for="mrs" class="mb-0">Home</label>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('address_type');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label>Address</label>
                                                <div class="row">
                                                    <textarea class="<?php
                                                    if (form_error('address')) {
                                                        echo "error-border";
                                                    }
                                                    ?>" rows="4" cols="67" name="address" style="resize: none"></textarea>
                                                </div>
                                                <p class="err-msg">
                                                    <?php
                                                    echo form_error('city');
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <br/><br/>
                                        <div class="row">
                                            <div class="">
                                                <button type="submit"  name="add" value="yes" class="btn btn-round btn-primary">Add</button>

                                                <button type="reset"  name="add" value="yes" class="btn btn-round btn-danger">clear</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($success)) {
                                        ?>
                                        <br/><br/>
                                        <div class="alert alert-success alert-dismissible d-flex align-items-center mb-0" role="alert">
                                            <i class="ti ti-checks alert-icon me-2"></i>
                                            <div>
                                                <strong>Ok!</strong><?php echo $success; ?>
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
                    <div class="row col-12">
                        <div class="card">
                            <div class="card-header row col-12">
                                <div class="col-6">
                                    <h4 class="card-title" style="padding-top: 10px" >View All Address</h4>
                                </div>
                                <div class="col-6">
                                    <p class="card-title-desc" align="right" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
                                        <a onclick="delete_link('address/<?php echo base64_encode(base64_encode(0)); ?>')"  class="btn btn-danger w-md">Delete All Records</a>
                                    </p>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                    <thead align="center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Name</th>
                                            <th>Address Type</th>
                                            <th>Address</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $c = 0;
                                    foreach ($address as $data) {

                                        $location = $this->md->my_query("SELECT c.name as country, s.name as state , ct.name as city FROM `tbl_location` as c , `tbl_location` as s , `tbl_location` as ct WHERE c.`location_id` = s.`parent_id` and s.`location_id` = ct.`parent_id` and ct.`location_id` =" . $data->location_id . ";")[0];

                                        $c++;
                                        ?>
                                            <tr align="center" valign="">
                                                <td><?php echo $c; ?></td>
                                                <td><?php echo $location->country; ?></td>
                                                <td><?php echo $location->state; ?></td>
                                                <td><?php echo $location->city; ?></td>
                                                <td><?php echo $data->name; ?></td>
                                                <td><?php echo $data->address_type; ?></td>
                                                <td><?php echo $data->address; ?></td>
                                                <td>
                                                    <a onclick="delete_link('address/<?php echo base64_encode(base64_encode($data->shipment_id)); ?>');"data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
                                                        <i class="far fa-trash-alt text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Remove"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
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

    </body>
</html> 