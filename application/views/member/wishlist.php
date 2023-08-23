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
                    <div class="row col-12">
                        <div class="card">
                            <div class="card-header row col-12">
                                <div class="col-6">
                                    <h4 class="card-title" style="padding-top: 10px" >View All Wish List</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive w-100" style=" vertical-align: middle">
                                    <thead align="center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Images</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>View More</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $c = 0;
                                        foreach ($wishlist as $data) {
                                            $c++;

                                            $name = $this->md->my_select('tbl_product', '*', array('product_id' => $data->product_id))[0];
                                            
                                            $comission = $this->md->my_select('tbl_commssion', '*')[0]->rate;
                                            $price = $name->price;

                                            $mainprice = $price + (($price * $comission) / 100);

                                            
                                            //image details
                                            $image_detail = $this->md->my_select('tbl_product_image', '*', array('product_id' => $data->product_id))[0];
                                            $paths = explode(",", $image_detail->path);
                                            $single_path = $paths[0];
                                            ?>
                                            <tr align="center" valign="">
                                                <td><?php echo $c; ?></td>
                                                <td>
                                                    <img class="img-responsive" style="height:150px;object-fit: scale-down;" src="<?php echo base_url() . $single_path; ?>"> 
                                                </td>
                                                <td><?php echo $name->name; ?></td>
                                                <td><?php echo $mainprice; ?></td>
                                                <td> 
                                                    <a href="<?php echo base_url(); ?>view-products/<?php echo base64_encode(base64_encode($data->product_id)); ?>" target="_new" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Click to follow more detail" style="cursor: pointer" >
                                                        View Detail
                                                    </a>
                                                </td>
                                                <td>
                                                    <a onclick="delete_link('wishlist/<?php echo base64_encode(base64_encode($data->wish_id)); ?>');" data-bs-toggle="modal" data-bs-target="#myModal" style="cursor: pointer" >
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