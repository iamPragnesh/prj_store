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
                    <div class="container-fluid card">
                        <div class="card-header row">
                            <h5 class="col-md-10" style=""><b>Order Detail</b></h5>
                            <div class="col-md-2">
                                <button class="btn btn-primary" onclick="printDiv('printableArea');">Print Invoice</button>
                            </div>
                        </div>
                        <div class="card-header" style="border: 1px solid black;" id="printableArea">
                            <div class="row col-12">
                                <table width="100%" >
                                    <tr>
                                        <td width="100%">
                                            <div style="border-left: 15px solid #fff;text-align: center;font-size: 26px;font-weight: bold;letter-spacing: -1px;height: 73px;line-height: 75px;">Tax invoice</div></td>
                                        <td></td>
                                    </tr>
                                </table> 
                            </div>  
                            <br><br>
                            <h3>Sold By : PRJ Store Private Limited </h3>
                            <p><b>Ship-from Address:</b>C.B. Patel Computer College, City Light , Vesu , Surat.</p><br>

                            <p style="text-align:right;" ><b> Invoice Number:</b> <?php echo $bill_detail->bill_id; ?></p><br/>
                            
                            <table width="100%" style="border-top: 1px solid black ;">
                                <tr>
                                    <td width="30%" style="padding:20px;">
                                        <strong>Order Id :<?php echo $bill_detail->order_id; ?></strong> <br>
                                        <strong>Order Date :</strong> <?php echo date('d-m-Y', strtotime($bill_detail->bill_date)) ?><br>
                                        <strong>Invoice Date:</strong> <?php echo date('d-m-Y', strtotime($bill_detail->bill_date)) ?><br>
                                        <strong>PAN:</strong> AAKCS9251N<br>
                                        <strong>GST No:</strong> 22AAKCS9251N25<br>
                                        <?php
                                        if ($bill_detail->pay_type == "online") {
                                            ?>
                                            <strong>Payment Mode:</strong> Online Payment<br>
                                            <?php
                                        } else {
                                            ?>
                                            <strong>Payment Mode:</strong> Cash On Delivery<br>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td style="padding:20px;">
                                        <?php
                                        $user_info = $this->md->my_select('tbl_register', '*', array('register_id' => $bill_detail->register_id))[0];
                                        $ship_info = $this->md->my_select('tbl_shipment', '*', array('shipment_id' => $bill_detail->shipment_id))[0];
                                        ?>
                                        <strong>Bill To</strong>
                                        <br>
                                        <p><?php echo $user_info->name; ?></p>
                                        <p><?php echo $ship_info->address; ?></p><br>
                                        <strong>Phone : </strong> <?php echo $user_info->mobile; ?>
                                    </td>
                                    <td style="padding:20px;">
                                        <strong>Ship To </strong>
                                        <br>
                                        <p><?php echo $ship_info->name; ?></p>
                                        <p><?php echo $ship_info->address; ?></p><br>
                                        <strong>Phone : </strong> <?php echo $user_info->mobile; ?>
                                    </td>
                                </tr>
                            </table><br>

                            <table width="100%" >
                                <tr style="">
                                    <td width="10%" class="column-header"><strong>No</strong></td>
                                    <td width="10%" class="column-header"><strong>Product</strong></td>
                                    <td width="10%" class="column-header"><strong>Gross Amount</strong></td>
                                    <td width="10%" class="column-header"><strong>Discount</strong></td>
                                    <td width="10%" class="column-header"><strong>Net Price</strong></td>
                                    <td width="10%" class="column-header"><strong>Qty</strong></td>
                                    <td width="10%" class="column-header"><strong>Total</strong></td>
                                </tr>
                                <?php 
                                    $c=0;
                                    $w['bill_id'] = $bill_detail->bill_id;
                                    $trans_detail = $this->md->my_select('tbl_transaction','*',$w);
                                    foreach($trans_detail as $trans)
                                    {
                                        $c++;
                                        $name = $this->md->my_select('tbl_product','*',array('product_id'=>$trans->product_id))[0]->name;
                                ?>
                                <tr>
                                    <td style="padding:10px;"><?php echo $c; ?></td>
                                    <td style="padding:10px;">
                                        <p><?php echo $name; ?></p><br>
                                    </td>
                                    <td style="padding:20px;">
                                        <strong><?php echo $trans->gross_price; ?></strong>
                                    </td>
                                    <td style="padding:20px;">
                                        <strong><?php echo $trans->discount; ?></strong>
                                    </td>
                                    <td style="padding:10px;">
                                        <strong><?php echo $trans->net_price; ?></strong>
                                    </td>
                                    <td style="padding:10px;">
                                        <strong><?php echo $trans->qty; ?></strong>
                                    </td>
                                    <td style="padding:10px;">
                                        <strong><?php echo $trans->total_price; ?></strong>
                                    </td>
                                </tr><!-- comment -->
                                <?php
                                    
                                }
                                ?>
                                <tr class="column-header">
                                    <td style="padding-left:10px;">
                                        <strong></strong>
                                    </td>  
                                    <td style="padding-left:20px;">
                                        <h5>Total</h5>
                                    </td>
                                    <td style="padding:20px;">
                                        <h5></h5>
                                    </td>
                                    <td style="padding:20px;">
                                        <h5></h5>
                                    </td>
                                    <td style="padding:10px;">
                                        <h5></h5>
                                    </td>
                                    <td style="padding-right:10px;text-align: right;width: 15%;">
                                        <h5>Sub Total</h5>
                                        <h5>+ Shipping Charge</h5>
                                        <?php 
                                            if($bill_detail->promocode_id > 0)
                                            {
                                                $promocode =  $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$bill_detail->promocode_id))[0];
                                        
                                        ?>
                                        <h5>- Promocode( <?php echo $promocode->code; ?> )</h5>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td style="padding:10px;">
                                        <h5>Rs. <?php echo $bill_detail->amount; ?>/-</h5>
                                        <h5>Rs. 100/-</h5>
                                        <?php
                                        $amount = 0;
                                            if($bill_detail->promocode_id > 0)
                                            {
                                              $promocode =  $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$bill_detail->promocode_id))[0];
                                              $amount = $promocode->amount;
                                        ?>
                                        <h5>Rs. <?php echo $promocode->amount; ?>/-</h5>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>


                            </table><br>

                            <table width="100%" style="padding:20px;">
                                <tr>
                                    <td>
                                        <table width="300px" style="float:right">
                                            <tr>
                                                <td style="text-aling:right">
                                                    <h5>
                                                        <strong>Grand total:</strong>
                                                    </h5>
                                                </td>    
                                                <td style="text-align:right;padding-right: 55px;">
                                                    <?php 
                                                        $gtotal = ($bill_detail->amount + 100 - $amount);
                                                    ?>
                                                    <h5>Rs. <?php echo $gtotal; ?>/-</h5>
                                                </td>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                           
                            <div class="row">
                                <p style="float:right;margin-top: 20px; font-size: 15px"> PRJ store Private Limited</p><br/>
                                <p style="float:right; margin-top: 20px; font-size: 15px">Authorized Signatory</p>
                            </div>
                           
                            
                            <p style="padding-top: 50px;margin-top: 50px;"><b>Returns Policy:</b> At PRJ store we try to deliver perfectly each and every time. But in the off-chance that you need to return the item, please do so with the<b> original Brand box/price</b></p>
                            <p><b>tag, original packing and invoice</b> without which it will be really difficult for us to act on your request. Please help us in helping you. Terms and conditions apply.</p>
                            <p>The goods sold as are intended for end user consumption and not for re-sale.</p>
                            <p>Regd. office: Sports Lifestyle Private Limited , Sports Lifestyle Private Limited,RZG-509, Ground Floor, RAJ NAGAR-1, Palam Colony, New Delhi - 110045, SOUTH WEST, DELHI - 110045</p>
                            <h5>Contact PRJ store 1800 208 9898 || http://localhost/prj_store/helpcenter</h5>
                            <hr/>
                            <P style="text-align:right;"><strong>E & O.E.</strong>  PAGE 1 Of 1</P>
                        </div>                    
                    </div>
                </div>
            </div>

            <!-- container -->



<?php
$this->load->view('member/mfooter');
?>
            <!-- JAVASCRIPT -->
            <div class="custom-file" style="padding: 50px;" ></div>

            <style>
                body {
                    font-family: Helvetica, sans-serif;
                    font-size:13px;
                }
                .container{
                    max-width: 680px;
                    margin:0 auto;
                    border: 2px solid black;
                }
                .logotype{
                    background:#000;
                    color:#fff;
                    width:75px;
                    height:75px;
                    line-height: 75px;
                    text-align: center;
                    font-size:11px;

                }
                .column-title{
                    background:#eee;
                    text-transform:uppercase;
                    padding:15px 5px 15px 15px;
                    font-size:11px
                }
                .column-detail{
                    border-top:1px solid #eee;
                    border-bottom:1px solid #eee;
                }
                .column-header{
                    text-transform:uppercase;
                    padding:15px;
                    font-size:11px;
                    border-bottom: 1px solid black;
                    border-top: 1px solid black;
                }
                .row{
                    padding:7px 14px;
                    border-left:1px solid #eee;
                    border-right:1px solid #eee;
                    border-bottom:1px solid #eee;
                }
                .alert{
                    background: #ffd9e8;
                    padding:20px;
                    margin:20px 0;
                    line-height:22px;
                    color:#333
                }
                .socialmedia{
                    background:#eee;
                    padding:20px;
                    display:inline-block
                }
                hr{
                    border-bottom: 1px solid black;
                }
            </style> 

<?php
$this->load->view('member/mfooterscript');
?>
            <script>
                function printDiv(divName) {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;
                    
                    document.body.innerHTML = printContents;
                    
                    window.print();
                    
                    document.body.innerHTML = originalContents;
                }
            </script>

    </body>
</html>