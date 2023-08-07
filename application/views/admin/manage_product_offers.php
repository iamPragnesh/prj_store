<!doctype html>
<html lang="en">


    <?php
    //require './head.php';
    $this->load->view('admin/head');
    ?>

    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php
            //require './header.php';
            $this->load->view('admin/header');
            ?>


            <!-- ========== Left Sidebar Start ========== -->
            <?php
            //require_once './menu.php';
            $this->load->view('admin/menu');
            ?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Add New Offer</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin-home">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Product</li>
                                            <li class="breadcrumb-item active">Product Offer</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row col-12">                                  
                            <div class="card">
                                <div class="card-header row col-12">
                                    <div class="col-12">
                                        <h4 class="card-title" style="padding-top: 10px">Add Offer</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" name="petacategory" novalidate="" class="myform">
                                        <div class="row">
                                            <div class="col-6">

                                                <label>Offer Name</label>
                                                <div class="mb-4 form-floating">
                                                    <input type="text" value="<?php
                                                    if (!isset($success) && set_value('name')) {
                                                        echo set_value('name');
                                                    }
                                                    ?>" required="" name="name" class="form-control <?php
                                                           if (form_error('name')) {
                                                               echo "error-border";
                                                           }
                                                           ?>" id="floatingInput" placeholder="name@example.com">
                                                    <label for="floatingInput">Enter Offer Name</label>
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('name');
                                                        ?>
                                                    </p>
                                                </div>

                                                <label>Offer Rate</label>
                                                <div class="mb-4 form-floating">
                                                    <input type="text" required="" value="<?php
                                                    if (!isset($success) && set_value('rate')) {
                                                        echo set_value('rate');
                                                    }
                                                    ?>" name="rate" pattern="^[0-9]+$" class="form-control  <?php
                                                           if (form_error('rate')) {
                                                               echo "error-border";
                                                           }
                                                           ?>" id="floatingInput" placeholder="name@example.com">
                                                    <label for="floatingInput">Enter Offer Rate</label>
                                                    <p class="err-msg">
                                                        <?php
                                                        echo form_error('rate');
                                                        ?>
                                                    </p>

                                                </div>

                                                <div class="row">                                                            
                                                    <div class="col-md-6">
                                                        <label>Min.Price</label>
                                                        <div class="mb-3 form-floating">
                                                            <input type="text" value="<?php
                                                            if (!isset($success) && set_value('min_price')) {
                                                                echo set_value('min_price');
                                                            }
                                                            ?>" required="" name="min_price" pattern="^[0-9]+$" class="form-control  <?php
                                                                   if (form_error('min_price')) {
                                                                       echo "error-border";
                                                                   }
                                                                   ?>" id="floatingInput" placeholder="name@example.com">
                                                            <label for="floatingInput">Enter Min.Price</label>
                                                            <p class="err-msg">
                                                                <?php
                                                                echo form_error('min_price');
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label>Max.Price</label>
                                                        <div class="mb-3 form-floating">
                                                            <input type="text" value="<?php
                                                            if (!isset($success) && set_value('max_price')) {
                                                                echo set_value('max_price');
                                                            }
                                                            ?>" pattern="^[0-9]+$" required="" name="max_price" class="form-control  <?php
                                                                   if (form_error('max_price')) {
                                                                       echo "error-border";
                                                                   }
                                                                   ?>" id="floatingInput" placeholder="name@example.com">
                                                            <label for="floatingInput">Enter Max.Price</label>
                                                            <p class="err-msg">
                                                                <?php
                                                                echo form_error('max_price');
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">                                                            
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="example-date-input" class="form-label">Start Date</label>
                                                            <input class="form-control <?php
                                                            if (form_error('start_date') || isset($start_date_err)) {
                                                                echo "error-border";
                                                            }
                                                            ?>" type="date" value="<?php
                                                                   if (!isset($success) && set_value('start_date')) {
                                                                       echo set_value('start_date');
                                                                   }
                                                                   ?>" required="" name="start_date" id="example-date-input">
                                                            <p class="err-msg">
                                                                <?php
                                                                if (form_error('start_date')) {
                                                                    echo form_error('start_date');
                                                                }
                                                                ?>
                                                            </p>
                                                            <p class="err-msg" style="color:red">
                                                                <?php
                                                                if (isset($start_date_err)) {
                                                                    echo $start_date_err;
                                                                }
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="example-date-input" class="form-label">End Date</label>
                                                            <input class="form-control  <?php
                                                            if (form_error('end_date') || isset($end_date_err)) {
                                                                echo "error-border";
                                                            }
                                                            ?>" type="date" required="" value="<?php
                                                                   if (!isset($success) && set_value('end_date')) {
                                                                       echo set_value('end_date');
                                                                   }
                                                                   ?>" name="end_date" id="example-date-input">
                                                            <p class="err-msg">
                                                                <?php
                                                                if (form_error('end_date')) {
                                                                    echo form_error('end_date');
                                                                }
                                                                ?>
                                                            </p>
                                                            <p class="err-msg" style="color:red">
                                                                <?php
                                                                if (isset($end_date_err)) {
                                                                    echo $end_date_err;
                                                                }
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" name="add" value="yes" class="btn btn-primary waves-effect waves-light">Add</button>
                                                &nbsp;
                                                <button type="reset" class="btn btn-danger waves-effect waves-light">Clear</button>
                                            </div>


                                            <div class="col-6">
                                                <div class="row mb-4">
                                                    <label>Main Category</label>
                                                    <select required=""   name="main" class="form-select <?php
                                                    if (form_error('maincategory')) {
                                                        echo "error-border";
                                                    }
                                                    ?>" onchange="set_combo('subcategory', this.value);">
                                                        <option value="">Select Main Category</option>
                                                        <?php
                                                        foreach ($maincategory as $data) {
                                                            ?>
                                                            <option value="<?php echo $data->category_id; ?>"><?php echo $data->name; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>

                                                </div><br>
                                                <div class="row mb-4">
                                                    <label>Sub Category</label>
                                                    <select requried="" name="sub"  class="form-select" onchange="set_combo('petacategory', this.value);" id="subcategory">
                                                        <option value="" >Enter Sub Category</option>
                                                        <option value="<?php echo $data->category_id; ?>"><?php echo $data->name; ?></option>
                                                    </select>
                                                </div><br>
                                                <div class="row mb-4">
                                                    <label>Peta Category</label>
                                                    <select requried="" name="peta"  class="form-select" id="petacategory">
                                                        <option value="" >Enter Sub Category</option>
                                                        <option value="<?php echo $data->category_id; ?>"><?php echo $data->name; ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <?php
                                        if (isset($success)) {
                                            ?>                              
                                            <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                <i class="mdi mdi-check-all label-icon"></i><strong>Ok</strong> <?php echo $success; ?>
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
                                        <h4 class="card-title">View All Product Offer   </h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                        <thead align="center">
                                            <tr>
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Rate</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Min Price</th>
                                                <th>Max Price</th>
                                                <th>Main Category</th>
                                                <th>Sub Category</th>
                                                <th>Peta Category</th>
                                                <th>Status</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $c = 0;
                                            foreach ($offer as $data) {
                                                $c++;
                                                ?>
                                                <tr align="center" valign="">
                                                    <td><?php echo $c; ?></td>
                                                    <td><?php echo $data->name; ?></td>
                                                    <td><?php echo $data->rate; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($data->start_date)); ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($data->end_date)); ?></td>
                                                    <td><?php echo $data->min_price ?></td>
                                                    <td><?php echo $data->max_price ?></td>
                                                    <?php
                                                    if ($data->label == 'all') {
                                                        ?>
                                                        <td>All</td>
                                                        <td>All</td>
                                                        <td>All</td>
                                                        <?php
                                                    } elseif ($data->label == 'main') {
                                                        $main = $this->md->my_select('tbl_category', '*', array('category_id' => $data->category_id))[0]->name;
                                                        ?>
                                                        <td><?php echo $main; ?></td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <?php
                                                    } elseif ($data->label == 'sub') {
                                                        $record = $this->md->my_query("SELECT m.name AS main, s.name AS sub FROM `tbl_category` AS s, `tbl_category` AS m WHERE m. `category_id` =s.`parent_id` AND s.`category_id`=" . $data->category_id . ";")[0]
                                                        ?>
                                                        <td><?php echo $record->main; ?></td>
                                                        <td><?php echo $record->sub; ?></td>
                                                        <td>-</td>
                                                        <?php
                                                    } elseif ($data->label == 'peta') {
                                                        $record = $this->md->my_query("SELECT m.name AS main, s.name AS sub , p.name AS peta FROM `tbl_category` AS m , `tbl_category` AS s , `tbl_category` AS p WHERE m. `category_id` = s.`parent_id` AND s.`category_id`= p.`parent_id` AND p.`category_id` = " . $data->category_id . ";")[0]
                                                        ?>
                                                        <td><?php echo $record->main; ?></td>
                                                        <td><?php echo $record->sub; ?></td>
                                                        <td><?php echo $record->peta; ?></td>
                                                        <?php
                                                    }
                                                    ?>
                                                    <td> 
                                                        <?php
                                                        if ($data->end_date < date('Y-m-d')) {
                                                            ?>
                                                            <span class="alert alert-danger alert-outline">Expire</span>
                                                            <?php
                                                        } else if ($data->status == 1) {
                                                            ?>
                                                            <span class="alert alert-success alert-outline">Running</span>
                                                            <?php
                                                        } else if ($data->start_date > date('Y-m-d')) {
                                                            ?>
                                                            <span class="alert alert-primary alert-outline">Upcoming</span>
                                                            <?php
                                                        }
                                                        ?>    
                                                    </td>
                                                    <td>
                                                        <a onclick="delete_link('offer/<?php echo base64_encode(base64_encode($data->offer_id)); ?>');" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
                                                            <i class="fas fa-trash-alt text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Remove"></i>
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
                <!-- end main content-->
                <?php
//require_once './footer.php';
                $this->load->view('admin/footer');
                ?>

            </div>
            <!-- END layout-wrapper -->

            <!-- JAVASCRIPT -->
            <?php
//require_once './footerscript.php';
            $this->load->view('admin/footerscript');
            ?>

            <!--ckeditor--> 
            <script href="<?php echo base_url(); ?>admin_assets"assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

            <!--init js--> 
            <script href="<?php echo base_url(); ?>admin_assets"assets/js/pages/form-editor.init.js"></script>

            <script href="<?php echo base_url(); ?>admin_assets"assets/js/app.js"></script>
    </body>



</html>