<!doctype html>
<html lang="en">


    <?php
    //require './head.php';
    $this->load->view('seller/head');
    ?>

    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php
            //require './header.php';
            $this->load->view('seller/header');
            ?>


            <!-- ========== Left Sidebar Start ========== -->
            <?php
            //require_once './menu.php';
            $this->load->view('seller/menu');
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
                                    <h4 class="mb-sm-0 font-size-18">Add New Product</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>seller-home">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Product</li>
                                            <li class="breadcrumb-item active">Add New Product</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($this->session->userdata('product_form') == 1) {
                            ?>
                            <div class="row col-12">                                  
                                <div class="card">
                                    <div class="card-header row col-12">
                                        <div class="col-12">
                                            <h4 class="card-title" style="padding-top: 10px">Add Product Details</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" name="form1" novalidate="" class="myform">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row mb-4">
                                                        <label>Main Category</label>
                                                        <select required=""   name="main" class="form-select <?php
                                                        if (form_error('main')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" onchange="set_combo('subcategory', this.value);">
                                                            <option value="">Select Main Category</option>
                                                            <?php
                                                            foreach ($main as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->category_id; ?>" <?php
                                                                if (!isset($success) && set_select('main', $data->category_id)) {
                                                                    echo set_select('main', $data->category_id);
                                                                } else {
                                                                    if (isset($product_detail) && $product_detail->main_id == $data->category_id) {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> ><?php echo $data->name; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php
                                                            if (form_error('main')) {
                                                                echo form_error('main');
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label>Sub Category</label>
                                                        <select requried="" name="sub"  class="form-select <?php
                                                        if (form_error('sub')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" onchange="set_combo('petacategory', this.value);" id="subcategory">
                                                            <option value="" >Select Sub Category</option>
                                                            <?php
                                                            if ($this->input->post('main')) {
                                                                $wh['parent_id'] = $this->input->post('main');
                                                                $sub = $this->md->my_select('tbl_category', '*', $wh);

                                                                foreach ($sub as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->category_id; ?>" <?php
                                                                    if (!isset($success) && set_select('sub', $data->category_id)) {
                                                                        echo set_select('sub', $data->category_id);
                                                                    }
                                                                    ?> ><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                    } else if (isset($product_detail)) {
                                                                        $wh['parent_id'] = $product_detail->main_id;
                                                                        $sub = $this->md->my_select('tbl_category', '*', $wh);

                                                                        foreach ($sub as $data) {
                                                                            ?>
                                                                    <option value="<?php echo $data->category_id; ?>" <?php
                                                                    if (!isset($success) && set_select('sub', $data->category_id)) {
                                                                        echo set_select('sub', $data->category_id);
                                                                    } else {
                                                                        if ($product_detail->sub_id == $data->category_id) {
                                                                            echo "selected";
                                                                        }
                                                                    }
                                                                    ?> ><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php
                                                            if (form_error('sub')) {
                                                                echo form_error('sub');
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label>Peta Category</label>
                                                        <select requried="" name="peta"  class="form-select <?php
                                                        if (form_error('peta')) {
                                                            echo "error-border";
                                                        }
                                                        ?>" id="petacategory">
                                                            <option value="" >Select Peta Category</option><?php
                                                            if ($this->input->post('sub')) {
                                                                $wh['parent_id'] = $this->input->post('sub');
                                                                $sub = $this->md->my_select('tbl_category', '*', $wh);

                                                                foreach ($sub as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->category_id; ?>" <?php
                                                                    if (!isset($success) && set_select('peta', $data->category_id)) {
                                                                        echo set_select('peta', $data->category_id);
                                                                    }
                                                                    ?> ><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                    } else if (isset($product_detail)) {
                                                                        $wh['parent_id'] = $product_detail->sub_id;
                                                                        $sub = $this->md->my_select('tbl_category', '*', $wh);

                                                                        foreach ($sub as $data) {
                                                                            ?>
                                                                    <option value="<?php echo $data->category_id; ?>" <?php
                                                                    if (!isset($success) && set_select('peta', $data->category_id)) {
                                                                        echo set_select('peta', $data->category_id);
                                                                    } else {
                                                                        if ($product_detail->peta_id == $data->category_id) {
                                                                            echo "selected";
                                                                        }
                                                                    }
                                                                    ?> ><?php echo $data->name; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php
                                                            if (form_error('peta')) {
                                                                echo form_error('peta');
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>

                                                    <label>Product Name</label>
                                                    <div class="row mb-4 form-floating">
                                                        <input type="text" name="name" required="" value="<?php
                                                        if (!isset($success) && set_value('name')) {
                                                            echo set_value('name');
                                                        } else if (isset($product_detail)) {
                                                            echo $product_detail->name;
                                                        }
                                                        ?>" class="form-control <?php
                                                               if (form_error('name')) {
                                                                   echo "error-border";
                                                               }
                                                               ?>" id="floatingInput" placeholder="name@example.com">
                                                        <label for="floatingInput">Enter Product Name</label>
                                                        <p class="err-msg">
                                                            <?php
                                                            if (form_error('name')) {
                                                                echo form_error('name');
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>

                                                    <label>Product Code</label>
                                                    <div class="row mb-4 form-floating">
                                                        <input type="text" name="code" required=""  value="<?php
                                                        if (!isset($success) && set_value('code')) {
                                                            echo set_value('code');
                                                        } else if (isset($product_detail)) {
                                                            echo $product_detail->code;
                                                        }
                                                        ?>" class="form-control <?php
                                                               if (form_error('code')) {
                                                                   echo "error-border";
                                                               }
                                                               ?>" id="floatingInput" placeholder="name@example.com">
                                                        <label for="floatingInput">Enter Product Code</label>
                                                        <p class="err-msg">
                                                            <?php
                                                            if (form_error('code')) {
                                                                echo form_error('code');
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>

                                                    <label>Product Price</label>
                                                    <div class="row mb-4 form-floating">
                                                        <input type="text" name="price" pattern="^[0-9]+$" required=""  value="<?php
                                                        if (!isset($success) && set_value('price')) {
                                                            echo set_value('price');
                                                        } else if (isset($product_detail)) {
                                                            echo $product_detail->price;
                                                        }
                                                        ?>" class="form-control <?php
                                                               if (form_error('price')) {
                                                                   echo "error-border";
                                                               }
                                                               ?>" id="floatingInput" placeholder="name@example.com">
                                                        <label for="floatingInput">Enter Product Price</label>
                                                        <p class="err-msg">
                                                            <?php
                                                            if (form_error('price')) {
                                                                echo form_error('price');
                                                            }
                                                            ?>
                                                        </p>
                                                    </div><br><br><br>
                                                    <button type="submit" name="next" value="yes" class="btn btn-primary waves-effect waves-light">Next ></button>
                                                    &nbsp;
                                                    <button type="reset" class="btn btn-danger waves-effect waves-light">Clear</button>
                                                </div>


                                                <div class="col-6">
                                                    <label>Product Description</label>
                                                    <div id="ckeditor-classic">
                                                        <textarea id="editor1" class="" name="descripition"><?php
                                                            if (!isset($success) && set_value('descripition')) {
                                                                echo set_value('descripition');
                                                            } else if (isset($product_detail)) {
                                                                echo $product_detail->description;
                                                            }
                                                            ?></textarea>
                                                        <p class="err-msg">
                                                            <?php
                                                            if (form_error('descripition')) {
                                                                echo form_error('descripition');
                                                            }
                                                            ?>
                                                        </p>
                                                    </div><br><br>
                                                    <label>Product Specification</label>
                                                    <div id="ckeditor-classic">
                                                        <textarea id="editor2" name="specification"><?php
                                                            if (!isset($success) && set_value('specification')) {
                                                                echo set_value('specification');
                                                            } else if (isset($product_detail)) {
                                                                echo $product_detail->specification;
                                                            }
                                                            ?></textarea>
                                                        <p class="err-msg">
                                                            <?php
                                                            if (form_error('specification')) {
                                                                echo form_error('specification');
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } else if ($this->session->userdata('product_form') == 2) {
                            ?>
                            <div class="row col-12">                                  
                                <div class="card">
                                    <div class="card-header row col-12">
                                        <div class="col-12">
                                            <h4 class="card-title" style="padding-top: 10px">Product Image Details</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" name="form2" novalidate="" class="myform" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label>Product Name</label>
                                                    <div class="row mb-4 form-floating">
                                                        <input type="text" value="<?php echo $product_detail->name; ?>" disabled="" class="form-control" id="floatingInput" placeholder="name@example.com">
                                                        <label for="floatingInput">Enter Product Name</label>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label>Color</label>
                                                        <select name="color" class="form-select <?php
                                                            if (form_error('color')) {
                                                                echo "error-border";
                                                            }
                                                            ?>">
                                                            <option value="">Select Color</option>
                                                            <option <?php if( !isset($psuccess) && set_select('color','Red'))
                                                            {
                                                                echo set_select('color','Red');
                                                            }
                                                            ?> >Red</option>
                                                            <option <?php if (!isset($psuccess) && set_select('color','Pink'))
                                                            {
                                                                echo set_select('color','Pink');
                                                            }
                                                                ?>>Pink</option>
                                                            <option <?php if (!isset($psuccess) && set_select('color','Green'))
                                                            {
                                                                echo set_select('color','Green');
                                                            }
                                                                ?>>Green</option>
                                                            <option <?php if (!isset($psuccess) && set_select('color','Blue'))
                                                            {
                                                                echo set_select('color','Blue');
                                                            }
                                                                ?>>Blue</option>
                                                        </select>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('color');
                                                            ?>
                                                        </p>
                                                    </div>

                                                    <label>Product Qty</label>
                                                    <div class="row mb-4 form-floating">
                                                        <input type="text" name="qty" value="<?php if (!isset($psuccess) && set_value('qty'))
                                                            {
                                                                echo set_value('qty');
                                                            }
                                                                ?>" class="form-control <?php
                                                            if (form_error('qty')) {
                                                                echo "error-border";
                                                            }
                                                            ?>" id="floatingInput" placeholder="name@example.com">
                                                        <label for="floatingInput">Enter Product Qty</label>
                                                        <p class="err-msg">
                                                            <?php
                                                            echo form_error('qty');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <button type="submit" name="back" value="yes" class="btn btn-primary waves-effect waves-light">< Back</button>
                                                    &nbsp;
                                                    <button type="submit" name="add_image" value="yes" class="btn btn-primary waves-effect waves-light">Add</button>
                                                    &nbsp;
                                                    <button type="submit" name="finish" value="yes" class="btn btn-primary waves-effect waves-light">Finish</button>
                                                    &nbsp;
                                                    <button type="reset" class="btn btn-danger waves-effect waves-light">Clear</button>
                                                    &nbsp;
                                                    <button type="submit" name="cancel" value="yes" class="btn btn-danger waves-effect waves-light">Cancel Uploading</button>
                                                    <br/><br/>
                                                     <?php
                                                    if (isset($error)) 
                                                    {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                        <i class="mdi mdi-block-helper label-icon"></i><strong>Oops!</strong> <?php echo $error; ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                    }
                                                    if (isset($psuccess)) 
                                                    {
                                                    ?>
                                                    <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                        <i class="mdi mdi-block-helper label-icon"></i><strong>Ok!</strong> <?php echo $psuccess; ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                                
                                                <div class="col-md-6" >
                                                    <lable>Product Image</lable>
                                                    <input type="file" name="photo[]" id="gallery-photo-add" style="display: none;" multiple="" >

                                                    <label for="gallery-photo-add" style="width: 100%;cursor: pointer;">
                                                        <div class="dropzone">
                                                            <div  class="gallery dz-message needsclick">
                                                                <div class="mb-3">
                                                                    <i class="display-4 text-muted bx bx-cloud-upload"></i>
                                                                </div>
                                                                <h5>Drop files here or click to upload.</h5>
                                                            </div> 
                                                        </div>
                                                    </label>
                                                    <?php
                                                    if (isset($photo_error)) 
                                                    {
                                                        $c=0;
                                                    ?>
                                                    <div class="alert alert-info alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                        <i class="mdi mdi-block-helper label-icon"></i>
                                                        <?php 
                                                         foreach($photo_error as $single )
                                                         {
                                                             $c++;
                                                             echo "<br/>$c.$single";
                                                         }
                                                        ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>                                        
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- end main content-->
                <?php
//require_once './footer.php';
                $this->load->view('seller/footer');
                ?>

            </div>
            <!-- END layout-wrapper -->

            <!-- JAVASCRIPT -->
            <?php
//require_once './footerscript.php';
            $this->load->view('seller/footerscript');
            ?>

            <!--ckeditor--> 
            <script href="<?php echo base_url(); ?>seller_assets/assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

            <!--init js--> 
            <script href="<?php echo base_url(); ?>seller_assets/assets/js/pages/form-editor.init.js"></script>

            <script href="<?php echo base_url(); ?>seller_assets/assets/js/app.js"></script>
    </body>
    <script src="<?php echo base_url(); ?>seller_assets/ckeditor/ckeditor.js"></script>

    <script>
                                                            CKEDITOR.replace('editor1');
    </script>

     <script>
        CKEDITOR.replace('editor2');
    </script>


    <script>
        CKEDITOR.replace('editor3');
    </script>

    <script type="text/javascript">
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                $(".gallery").html("");
                
                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img width="150">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallery-photo-add').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });
    </script>

</html>