var base_url = 'http://localhost/prj_store/';

function set_combo(action, id)
{
    var c = 0;
    $("#" + action).html("<option>Loading..</option>");
    var cc = setInterval(function () {

        c++;
        if (c == 1)
        {
            clearInterval(cc);
            $data = {id: id};
            var url = base_url + 'backend/' + action;

            $.post(url, $data, function (output) {
                $("#" + action).html(output);
            });
        }
    }, 1000);
}

function subscribe()
{
    $email = $("#email").val();

    // Blank Validation
    if ($email.length > 0)
    {
        //pattern Validation
        var ptn = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if ($email.match(ptn))
        {
            $data = {email: $email};

            $path = base_url + 'backend/subscribe';
            $.post($path, $data, function (output) {
                if (output == 1)
                {
                    $("#email").val("");
                    $("#msg").notify("Thank You For Subscribe With Us.", {position: "buttom center", className: 'superblue'});
                }
                if (output == 2)
                {
                    $("#email").val("");
                    $("#msg").notify("You Already Subscribe With Us.", {position: "buttom center", className: 'superblue'});
                }
            });
        } else {
            $("#msg").notify("Please Enter Valid Email.", {position: "buttom center", className: 'superblue'});
        }
    } else
    {
        $("#msg").notify("Please Enter Email.", {position: "buttom center", className: 'superblue', });
    }


}

function change_status(action, id)
{
    if ($("#status_" + id).hasClass("fa-toggle-on"))
    {
        $("#status_" + id).removeClass("fa-toggle-on").addClass("fa-toggle-off");
        $("#status_" + id).attr('data-bs-original-title', 'Deactive');
        $("#status_" + id).attr('aria-label', 'Deactive');
        $("#status_" + id).css('color', '#000');
    } else
    {
        $("#status_" + id).removeClass("fa-toggle-off").addClass("fa-toggle-on");
        $("#status_" + id).attr('data-bs-original-title', 'Active');
        $("#status_" + id).attr('aria-label', 'Active');
        $("#status_" + id).css('color', '#5156be');
    }

    $data = {action: action, id: id};
    $path = base_url + 'backend/change_status/';
    $.post($path, $data);

}


var loadFile = function (event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
    }
};

function delete_link(path)
{
    $url = base_url + 'delete/' + path;
    $("#delete_link").attr('href', $url);
}

function change_image(id)
{
    $data = {id: id};
    $path = base_url + 'backend/change_images/';
    $.post($path, $data, function (output) {
        $("#color_preview").fadeIn(500).html(output);
        setTimeout(function () {
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 90,
                itemMargin: 5,
                asNavFor: '#slider'
            });

            $('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel"
            });

        }, 500);
    });
}

function order_status(bill_id, status)
{
    if (confirm('Are You Sure Want To Perform This Action On Order ?'))
    {
        $data = {bill_id: bill_id, status: status};
        $path = base_url + 'backend/order_status/';
        $.post($path, $data, function (output) {
            //alert (output);
            $("#datatable-buttons").html(output);
        });
    }
}

function cart_btn(id)
{
    $data = {id: id};
    $path = base_url + 'backend/cart_btn/';
    $.post($path, $data, function (output) {
        //alert (output);
        $("#cart_btn_area").html(output);
        stock_status(id);
    });
}

function stock_status(id)
{
    $data = {id: id};
    $path = base_url + 'backend/stock_status/';
    $.post($path, $data, function (output) {
        //alert (output);
        $("#stock_status").html(output);
    });
}

function add_wish(pid)
{
    if ($("#wish_btn" + pid + " i").hasClass('fa-heart'))
    {
        $("#wish_btn" + pid + " i").removeClass('fa-heart').addClass('fa-heart-o');
        $("#wish_btn" + pid + " i").css('color', '#888888');
    } else
    {
        $("#wish_btn" + pid + " i").removeClass('fa-heart-o').addClass('fa-heart');
        $("#wish_btn" + pid + " i").css('color', '#0088cc');
    }

    $data = {pid: pid};
    $path = base_url + 'backend/wishlist/';
    $.post($path, $data);
}

function add_wishh(pid)
{
    if ($("#detail_wish i").hasClass('fa-heart'))
    {
        //$("#wish"+pid+" i").removeClass('fa-heart').addClass('fa-heart-o');
        $("#detail_wish").html('<i class="fa fa-heart-o margin-right-5"></i> Add in Wish List');
    } else
    {
        $("#detail_wish").html('<i class="fa fa-heart margin-right-5" style="color:#fff"></i> Added in Wish List');
    }

    $data = {pid: pid};
    $path = base_url + 'backend/wishlist/';
    $.post($path, $data);
}

function add_cart(pid)
{
    if ($("#cart_btn" + pid + " i").hasClass('icon-basket'))
    {
        $("#cart_btn" + pid + " i").removeClass('icon-basket').addClass('icon-basket-loaded');
        $("#cart_btn" + pid + " i").css('color', '#0088cc');
    }

    $data = {pid: pid};
    $path = base_url + 'backend/add_cart/';
    $.post($path, $data, function (output) {
        if (output == 1)
        {
            header_cart();
        }
    });
}

function add_cart_detail(pid)
{
    $data = {pid: pid};
    $path = base_url + 'backend/add_cart/';
    $.post($path, $data, function (output) {
        if (output == 1)
        {
            $("#cart_btn_area").html('<a class="btn-round" style="cursor:pointer;background: #000;"><i class="icon-basket-loaded margin-right-5"></i> Already Added Cart </a>');
            header_cart();
        }
    });
}

function header_cart()
{
    $path = base_url + 'backend/header_cart/';
    $.post($path, $data, function (output) {
        $("#headercart_data").html(output);
    });
}

function change_qty(cart_id, qty)
{
    $data = {cart_id: cart_id, qty: qty};
    $path = base_url + 'backend/change_qty/';
    $.post($path, $data, function (output) {
        if (output == 1)
        {
            cartdata();
        }
    });
}

function remove_cart(cart_id)
{
    if (confirm('Are You Sure Want To Remove This Item.'))
    {
        $data = {cart_id: cart_id};
        $path = base_url + 'backend/remove_cart/';
        $.post($path, $data, function (output) {
            if (output == 1)
            {
                cartdata();
                header_cart();
            }
        });
    }
}

function cartdata()
{
    $path = base_url + 'backend/cartdata/';
    $.post($path, $data, function (output) {
        $("#cartdata").html(output);
    });
}

function select_address(id)
{
    $data = {id: id};
    $path = base_url + 'backend/select_address/';
    $.post($path, $data, function (output) {
        //alert(output);
        $("#shipment_area").html(output);
    });
}

function apply_code()
{
    $code = $("#code").val();

    $data = {code: $code};
    $path = base_url + 'backend/apply_code/';
    $.post($path, $data, function (output) {
        //alert(output);
        if (output == 1)
        {
            $("#codemsg").html('<font class="text-success">' + $code + ' Applied Successfully.</font>');
            order_summary();
        } else
        {
            $("#codemsg").html('<font class="text-danger">Sorry, Invalid Promocode.</font>');
        }

        $("#code").val('');

    });
}

function order_summary()
{
    $path = base_url + 'backend/order_summary/';
    $.post($path, $data, function (output) {
        //alert(output);
        $("#order_summary").html(output);
    });
}

function add_review(pid)
{
    var rate = $("#rate-value").val();
    var msg = $("#review-msg").val();

    if (rate == "" || msg == "")
    {
        $("#msg").html('<span class="text-danger">Please Select Rating And Review Message.</span>');
    } else
    {
        $data = {rate: rate, msg: msg, pid: pid};
        $path = base_url + 'backend/add_review/';
        $.post($path, $data, function (output) {
            if (output == 1)
            {
                $("#msg").html('<span class="text-success">Thank you for giving review.</span>');
                $("#rate-value").val('');
                $("#review-msg").val('');
            }
        });
    }
}

function product_data(action, id, limit)
{
    var c = 0;
    
    $("#product-data").html("<div class='text-center'><br/><br/><br/><br/><br/><br/><br/><br/><h1 style='color:#ddd;'>Searching a Product...</h1></div>")
    var cc = setInterval ( function(){    
        c++;  
        if( c == 1)
        {
            clearInterval(cc);
                  
            $data = {action: action, id: id, limit: limit};
            $path = base_url + 'backend/product_data/';
            $.post($path, $data, function (output) {
                $("#product-data").html(output);
            });
        }
    },1000 );
}

$(document).ready(function () {
    $('#select-all').click(function () {
        var checked = this.checked;
        $('input[type="checkbox"]').each(function () {
            this.checked = checked;
        });
    })
});



$('#c-show').click(function () {
    if ($('#currentPass').attr('type') == 'text') {
        $('#currentPass').attr("type", "password");
        $('#c-show').removeClass('mdi-eye-off').addClass('mdi-eye-outline');
    } else {
        $('#currentPass').attr("type", "text");
        $('#c-show').removeClass('mdi-eye-outline').addClass('mdi-eye-off');
    }
});

$('#n-show').click(function () {
    if ($('#newPass').attr('type') == 'text') {
        $('#newPass').attr("type", "password");
        $('#n-show').removeClass('mdi-eye-off').addClass('mdi-eye-outline');
    } else {
        $('#newPass').attr("type", "text");
        $('#n-show').removeClass('mdi-eye-outline').addClass('mdi-eye-off');
    }
});

$('#con-show').click(function () {
    if ($('#confirmPass').attr('type') == 'text') {
        $('#confirmPass').attr("type", "password");
        $('#con-show').removeClass('mdi-eye-off').addClass('mdi-eye-outline');
    } else {
        $('#confirmPass').attr("type", "text");
        $('#con-show').removeClass('mdi-eye-outline').addClass('mdi-eye-off');
    }
});


// banner page - photo preview - js
document.getElementById('setPhoto').onchange = evt => {
    const [file] = document.getElementById('setPhoto').files;
    if (file) {
        $('#preview').show(500).attr('src', URL.createObjectURL(file));
    }
}
// change-profile -photo prevuew - js

document.getElementById('rounded-circle').onchange = evt => {
    const [file] = document.getElementById('rounded-circle').files;
    if (file) {
        $('#preview').show(500).attr('src', URL.createObjectURL(file));
    }

}

