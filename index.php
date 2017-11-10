<?php 
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'aoramaterial');
$result = mysqli_query($conn, "select * from currency");
$currencys = array();
while ($row = mysqli_fetch_array($result)) {
    $currencys[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Aora Material</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/jquery-ui-1.10.3/themes/smoothness/jquery-ui.css" type="text/css"/>
        <link rel="stylesheet" href="public/css/styles.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="loading" id="loading">Loading&#8230;</div>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">Aora Material</a>
                    </div>
                    <div class="navbar-header" style="float: right;">
                        <a class="navbar-brand" href="export_csv.php">Export CSV</a>
                    </div>
                </div>
                
            </nav>
        </div>

        <div class="container">
            <form method="POST" action="save.php" id="setting_form" style="margin-bottom: 30px">
                <div class="row">
                    <div class="col-lg-6 col-md-6">					
                        <div class='row'>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="title">Title: </label>
                                    <input type="text" class="form-control" id='title' name="title" value="">
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="url">Url: </label>
                                    <input type="text" class="form-control" id='url' name="url" value="">
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="price">Price: </label>
                                    <input type="text" class="form-control" name="price" id='price'>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="price_retail">Retail price: </label>
                                    <input type="text" class="form-control" name="price_retail" id='price_retail' value="">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="currency">Currency: </label>
                                    <select class="form-control" name="currency" id='currency'>
                                        <?php 
                                        foreach ($currencys as $currency) {
                                            if($currency['value']=='USD'){
                                                $selected=' selected="selected"';
                                            }
                                            else{
                                                $selected='';
                                            }
                                        ?>
                                        <option<?php echo $selected;?> value='<?php echo $currency['value'];?>'><?php echo $currency['name'];?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="main_image">Main image (url): </label>
                                    <input type="text" id='main_image' class="form-control" name="main_image" value="">
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="other_image">Other image (url): </label>
                                    <input type="text" class="form-control" name="other_image" id='other_image' value="">
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="main_category">Main category: </label>
                                    <input type="text" class="form-control" name="main_category" id='main_category' value="">
                                </div>
                            </div>
                        </div>

                        <div class='row'>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="sub_category">Sub category: </label>
                                    <input type="text" class="form-control" name="sub_category" id='sub_category' value="">
                                </div>	
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">

                        <div class='row'>
                                                        
                            <div class="col-lg-12 col-md-12">						
                                <div class="form-group">
                                    <label style="cursor: default;">Variant specifics url change: </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="variant_specifics_url_change" checked="checked" value="1">
                                        Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="variant_specifics_url_change" value="0">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>								
                        <div class='row'>
                            <div class="col-lg-12 col-md-12">								
                                <div class="form-group">
                                    <label for="variant_specifics_url">Variant specifics url: </label>
                                    <input type="text" class="form-control variant_specifics_url_change yes" name="variant_specifics_url" id='variant_specifics_url' value="">
                                </div>
                            </div>
                        </div>									
                        <div class='row'>
                            <div class="col-lg-9 col-md-9">
                                <div class="form-group">
                                    <label for="shipping_weight">Shipping weight: </label>
                                    <input readonly="readonly" type="text" class="form-control variant_specifics_url_change readonly no" name="shipping_weight" id='shipping_weight' value="">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="weight_type">Formula</label>
                                    <select disabled="disabled" class="form-control variant_specifics_url_change readonly no" name="weight_type" id='weight_type'>
                                        <option value='kg' selected="selected">KG</option>
                                        <option value='lbs' >LBS</option>
                                    </select>
                                </div>
                            </div>
                        </div>									
                        <div class='row'>
                            <div class="col-lg-12 col-md-12" style="margin: 0 auto;text-align: center;padding-bottom: 30px;">								
                                <label style="font-size: 20px;cursor: default;">Shipping dimension: </label>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="shipping_length">Length: </label>
                                    <input readonly="readonly" type="text" class="form-control variant_specifics_url_change readonly no" name="shipping_length" id='shipping_length'>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="shipping_width">Width: </label>
                                    <input readonly="readonly" type="text" class="form-control variant_specifics_url_change readonly no" name="shipping_width" id='shipping_width' value="">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="shipping_height">Height: </label>
                                    <input readonly="readonly" type="text" class="form-control variant_specifics_url_change readonly no" name="shipping_height" id='shipping_height' value="">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="length_type">Formula</label>
                                    <select disabled="disabled" class="form-control variant_specifics_url_change readonly no" name="length_type" id='length_type'>
                                        <option value='cm' selected="selected">cm</option>
                                        <option value='inch'>inch</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-lg-12 col-md-12">								
                                <div class="form-group">
                                    <label for="product_details">Product details: </label>
                                    <textarea readonly="readonly" type="text" class="form-control variant_specifics_url_change readonly no" name="product_details" id='product_details' value=""> </textarea>
                                </div>
                            </div>
                        </div>	
                        <div class='row'>
                            <div class="col-lg-6 col-md-6">								
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" style="width: 200px;">Save</button>	
                                </div>
                            </div>
                        </div>	

                    </div>
                </div>
                <div class='row'>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">				
                            <p class="alert alert-success"> </p>
                        </div>
                    </div>
                </div>
            </form> 
        </div>

        
        <footer class="m-t">
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <p>Copyright &copy; <a href="https://24x7studios.com" target="_blank">24x7studios.com</a> 2017</p>
                    </div>
                </div>
        </footer>
        
        <div id="dialog-form-login" title="Login" style="display: none;">
            <form id="loginForm">
                <div id="thongBaologin" style="padding-left: 100px;color: red;">  
                </div>
                <div style="float: left;text-align: right;width: 30%;">email:</div>
                <div style="float: left;"><input id="email" type="text" name="email"/></div>
                <div style="clear: both;"></div>
                <div style="float: left;text-align: right;margin-top: 10px;width: 30%;">password:</div>
                <div style="float: left;margin-top: 10px;"><input type="password" name="password" id="password"/></div>
                <div style="clear: both;"></div>                
            </form>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="public/js/jquery-2.0.3.js"></script>
        <script type="text/javascript" src="public/jquery-ui-1.10.3/ui/jquery-ui.js"></script> 
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="public/js/bootstrap.min.js"></script>
        <script src="public/js/jquery.number.js"></script>
        <script>
            
            jQuery(function ($){
        
                $('#shipping_length').number( true, 2 );
                $('#shipping_width').number( true, 2 );
                $('#shipping_height').number( true, 2 );
                $('#shipping_weight').number( true, 2 );
                $('#price').number( true, 0 );
                $('#price_retail').number( true, 0 );
                
                height=$("#title").parent().parent().parent().height();
                $("input[name='variant_specifics_url_change']").parent().parent().parent().parent().height(height);
                
                $(".alert-success").hide();
                
                $('input[type="radio"]').change(function() {
                    if ($(this).val()=='1') {
                        $("input.yes,textarea.yes").removeAttr('readonly');
                        $("input.no,textarea.no").attr('readonly','readonly');
                        
                        $("select.yes").removeAttr('disabled');
                        $("select.no").attr('disabled','disabled');
                    }
                    else{
                        $("input.no,textarea.no").removeAttr('readonly');
                        $("input.yes,textarea.yes").attr('readonly','readonly');
                        
                        $("select.no").removeAttr('disabled');
                        $("select.yes").attr('disabled','disabled');
                    }
                    $(".variant_specifics_url_change").toggleClass('readonly');
                });
                
                $('#dialog-form-login').keypress(function(e) {
                    if (e.keyCode == $.ui.keyCode.ENTER) {
                      subLogin();
                    }
                });
                
                $('form#setting_form').on('submit', function (e) {
                    $(".alert-success").removeClass('error').hide();
                    $("#title").removeClass('error');
                    $("#url").removeClass('error');
                    e.preventDefault();
                    <?php 
                    if(!isset($_SESSION['user_id'])){?>
                        showLoginForm();
                        return;
                    <?php 
                    }
                    ?>
                    $.ajax({
                        type: 'post',
                        url: 'save.php',
                        data: $('form#setting_form').serialize(),
                        beforeSend: function () {
                            $('#loading').show();
                        },
                        complete: function () {
                            $('#loading').hide();
                        },
                        success: function (data) {
                            $('#loading').hide();
                            
                            if(typeof data === 'string'&&$.trim(data)=='success'){
                                $(".alert-success").html('You saved successfully');
                            }
                            else{
                                data=$.parseJSON(data);
                                for(key in data){
                                    if(key=='title'){
                                        $("#title").addClass('error');
                                    }
                                    if(key=='url'){
                                        $("#url").addClass('error');
                                    }
                                }
                                $(".alert-success").html('Please input full information.').addClass('error');
                                
                            }
                            $(".alert-success").show();
                            
                            if(typeof data === 'string'&&$.trim(data)=='success'){
                                $("form#setting_form").trigger("reset");
                                $("input.yes,textarea.yes").removeAttr('readonly');
                                $("input.no,textarea.no").attr('readonly','readonly');

                                $("select.yes").removeAttr('disabled');
                                $("select.no").attr('disabled','disabled');
                                
                                setTimeout(function () {
                                    $(".alert-success").hide();
                                }, 3000);
                                
                            }
                            
                        }
                    });

                });
                
                dialogLogin = $("#dialog-form-login").dialog({
                    autoOpen: false,
                    show: {
                        effect: "blind",
                        duration: 1000
                    },
                    hide: {
                        effect: "explode",
                        duration: 1000
                    },
                    height: 400,
                    width: 350,
                    modal: true,
                    buttons: {
                        "Login": subLogin,
                        "Close": function () {
                            dialogLogin.dialog("close");
                        }
                    },
                    close: function () {
                        formLogin[ 0 ].reset();
                    }
                });

                formLogin = dialogLogin.find("form#loginForm").on("submit", function (event) {
                    event.preventDefault();
                    subLogin();
                });
                
                
                function subLogin() {
                    if (!validateLogin())
                        return;
                    jQuery.post('login.php', {'email': jQuery('input#email').val(), 'password': jQuery('input#password').val()}, function (resp) {
                        if (resp == 'success') {
                            window.location.reload();
                        } else {
                            jQuery('div#thongBaologin').html('wrong password or email');
                        }
                    });
                }
                function validateLogin() {

                    if ($.trim($("#email").val()) == '') {
                        $("#email").attr('style', "border-color: red;");
                        $("#email").focus();
                        return false;
                    }
                    if ($.trim($("#email").val()).indexOf(" ", 0) != -1) {
                        $("#email").attr('style', "border-color: red;");
                        $("#email").focus();
                        return false;
                    }
                    if ($.trim($("#password").val()) == '') {
                        $("#password").attr('style', "border-color: red;");
                        $("#password").focus();
                        return false;
                    }

                    return true;
                }
                function showLoginForm(){
                    dialogLogin.dialog("open");
                }

            });

        </script>

        

    </body>
</html>