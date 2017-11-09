<?php 
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
                                    <label for="main_image">Main image: </label>
                                    <input type="text" id='main_image' class="form-control" name="main_image" value="">
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="other_image">Other image: </label>
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
                                    <label class="radio">
                                        <input type="radio" name="variant_specifics_url_change" checked="checked" value="1">
                                        Yes
                                    </label>
                                    <label class="radio">
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
                                    <input type="text" class="form-control" name="variant_specifics_url" id='variant_specifics_url' value="">
                                </div>
                            </div>
                        </div>									
                        <div class='row'>
                            <div class="col-lg-9 col-md-9">
                                <div class="form-group">
                                    <label for="shipping_weight">Shipping weight: </label>
                                    <input type="text" class="form-control" name="shipping_weight" id='shipping_weight' value="">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="weight_type">Formula</label>
                                    <select class="form-control" name="weight_type" id='weight_type'>
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
                                    <input type="text" class="form-control" name="shipping_length" id='shipping_length'>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="shipping_width">Width: </label>
                                    <input type="text" class="form-control" name="shipping_width" id='shipping_width' value="">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="shipping_height">Height: </label>
                                    <input type="text" class="form-control" name="shipping_height" id='shipping_height' value="">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="length_type">Formula</label>
                                    <select class="form-control" name="length_type" id='length_type'>
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
                                    <textarea type="text" class="form-control" name="product_details" id='product_details' value=""> </textarea>
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
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="public/js/jquery-2.0.3.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="public/js/bootstrap.min.js"></script>
        <script src="public/js/jquery.number.js"></script>
        <script>
            $(function () {
                $('#shipping_length').number( true, 2 );
                $('#shipping_width').number( true, 2 );
                $('#shipping_height').number( true, 2 );
                $('#shipping_weight').number( true, 2 );
                $('#price').number( true, 0 );
                $('#price_retail').number( true, 0 );
                
                $(".alert-success").hide();
                $('form#setting_form').on('submit', function (e) {
                    $(".alert-success").removeClass('error').hide();
                    $("#title").removeClass('error');
                    $("#url").removeClass('error');
                    e.preventDefault();
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
                                setTimeout(function () {
                                    $(".alert-success").hide();
                                }, 3000);
                                
                            }
                            
                        }
                    });

                });

            });

        </script>

        <style type="text/css">
            label{
                cursor: pointer;
            }
            label.radio{
                width: 10%;
                margin-left: 30px;
            }
            .alert-success.error{
                color: red;
            }
            input.error{
                border: 1px red solid;
            }
            /* Absolute Center Spinner */
            .loading {
                position: fixed;
                z-index: 999;
                height: 2em;
                width: 2em;
                overflow: show;
                margin: auto;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                display: none;
            }

            /* Transparent Overlay */
            .loading:before {
                content: '';
                display: block;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0,0,0,0.3);
            }

            /* :not(:required) hides these rules from IE9 and below */
            .loading:not(:required) {
                /* hide "loading..." text */
                font: 0/0 a;
                color: transparent;
                text-shadow: none;
                background-color: transparent;
                border: 0;
            }

            .loading:not(:required):after {
                content: '';
                display: block;
                font-size: 10px;
                width: 1em;
                height: 1em;
                margin-top: -0.5em;
                -webkit-animation: spinner 1500ms infinite linear;
                -moz-animation: spinner 1500ms infinite linear;
                -ms-animation: spinner 1500ms infinite linear;
                -o-animation: spinner 1500ms infinite linear;
                animation: spinner 1500ms infinite linear;
                border-radius: 0.5em;
                -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
                box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
            }

            /* Animation */

            @-webkit-keyframes spinner {
                0% {
                    -webkit-transform: rotate(0deg);
                    -moz-transform: rotate(0deg);
                    -ms-transform: rotate(0deg);
                    -o-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(360deg);
                    -moz-transform: rotate(360deg);
                    -ms-transform: rotate(360deg);
                    -o-transform: rotate(360deg);
                    transform: rotate(360deg);
                }
            }
            @-moz-keyframes spinner {
                0% {
                    -webkit-transform: rotate(0deg);
                    -moz-transform: rotate(0deg);
                    -ms-transform: rotate(0deg);
                    -o-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(360deg);
                    -moz-transform: rotate(360deg);
                    -ms-transform: rotate(360deg);
                    -o-transform: rotate(360deg);
                    transform: rotate(360deg);
                }
            }
            @-o-keyframes spinner {
                0% {
                    -webkit-transform: rotate(0deg);
                    -moz-transform: rotate(0deg);
                    -ms-transform: rotate(0deg);
                    -o-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(360deg);
                    -moz-transform: rotate(360deg);
                    -ms-transform: rotate(360deg);
                    -o-transform: rotate(360deg);
                    transform: rotate(360deg);
                }
            }
            @keyframes spinner {
                0% {
                    -webkit-transform: rotate(0deg);
                    -moz-transform: rotate(0deg);
                    -ms-transform: rotate(0deg);
                    -o-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(360deg);
                    -moz-transform: rotate(360deg);
                    -ms-transform: rotate(360deg);
                    -o-transform: rotate(360deg);
                    transform: rotate(360deg);
                }
            }
        </style>

    </body>
</html>