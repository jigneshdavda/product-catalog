<?php
/**
 * Created by PhpStorm.
 * User: fireion
 * Date: 11/6/18
 * Time: 10:57 PM
 */

require_once("../../../classes/DBConnect.php");
require_once("../../../classes/Constants.php");
require_once("../../../classes/PrintJson.php");
require_once("../classes/ProductBoxType.php");
require_once("../classes/ProductBrand.php");
require_once("../classes/ProductBrandWarranty.php");
require_once("../classes/ProductCategory.php");
require_once("../classes/ProductCondition.php");
require_once("../classes/ProductsDetails.php");
include("../../sessions/session.php");

$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

$i = 1;

$boxType = new ProductBoxType($dbConnect->getInstance());
$getBoxType = $boxType->getProductBoxType($_SESSION['companyId']);
//$getBoxType = $boxType->getProductBoxType(1);

//$brand = new ProductBrand($dbConnect->getInstance());
//$getBrand = $brand->getProductBrand();

$brandWarranty = new ProductBrandWarranty($dbConnect->getInstance());
$getBrandWarranty = $brandWarranty->getProductBrandWarranty($_SESSION['companyId']);
//$getBrandWarranty = $brandWarranty->getProductBrandWarranty(1);

$category = new ProductCategory($dbConnect->getInstance());
$getCategory = $category->getProductCategory($_SESSION['companyId']);
//$getCategory = $category->getProductCategory(1);

$condition = new ProductCondition($dbConnect->getInstance());
$getCondition = $condition->getProductCondition($_SESSION['companyId']);
//$getCondition = $condition->getProductCondition(1);

$details = new ProductsDetails($dbConnect->getInstance());
$getProductDetails = $details->getProductDetails(0, 0, 0, $_SESSION['companyId']);
//$getProductDetails = $details->getProductDetails(0, 0, 0, 1);
?>


<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="../../../Resources/jquery-3.2.1.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Product Details | Product Catalog</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet"
          href="../../../Resources/AdminLTE-2.4.2/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="../../../Resources/AdminLTE-2.4.2/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../../Resources/AdminLTE-2.4.2/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../Resources/AdminLTE-2.4.2/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../Resources/AdminLTE-2.4.2/dist/css/skins/_all-skins.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
          href="../../../Resources/AdminLTE-2.4.2/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>P</b>C</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Product </b>CATALOG</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../../../Resources/AdminLTE-2.4.2/dist/img/user2-160x160.jpg"
                                 class="user-image"
                                 alt="User Image">
                            <span class="hidden-xs">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../../../Resources/AdminLTE-2.4.2/dist/img/user2-160x160.jpg"
                                     class="img-circle" alt="User Image">

                                <p>
                                    Product Ca
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="../../login/functions/logout.php" type="button" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../../../Resources/AdminLTE-2.4.2/dist/img/user2-160x160.jpg" class="img-circle"
                         alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="../../login/functions/dashboard.php">
                        <i class="fa fa-home"></i> <span>Home</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li>
                    <a href="deleteProductDetails.php">
                        <i class="fa fa-trash"></i> <span>Delete Product Details</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li>
                    <a href="updateProductDetails.php">
                        <i class="fa fa-pencil"></i> <span>Update Product Details</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-gears"></i> <span>Settings</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Add Product Details</h1>
            <ol class="breadcrumb">
                <li><a href="../../login/functions/dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                <li class="active"><i class="fa fa-plus"></i> Add Product Details</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Enter Product Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">


                            <form>
                                <form>
                                    <div class="table-container1">
                                        <table id="mainTable" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Category</th>
                                                <th>Brand</th>
                                                <th>Model and Storage</th>
                                                <th>Model Color</th>
                                                <th>Condition</th>
                                                <th>Box</th>
                                                <th>Brand Warranty</th>
                                                <th>Warranty Expiry</th>
                                                <th>Comments/Additional Details</th>
                                                <th>Quantity</th>
                                                <th>MFG. Price</th>
                                                <th>Company Price</th>
                                            </tr>
                                            </thead>
                                            <?php
                                            echo "<tr id='" . $i . "'>";
                                            echo "<td>" . $i . "</td>";

                                            echo "<td>
                <select class='productCategory form-control select2' style='width:auto' id='productCategory" . $i . "' name='productCategory" . $i . "'>
                    <option value='-1' selected='selected'>Select Category</option>";
                                            if ($getCategory == true) {
                                                while ($row = $getCategory->fetch_assoc()) {
                                                    echo "<option value = '" . $row['product_category_id'] . "'>" . $row['product_category_name'] . "</option>";
                                                }
                                            } else {
                                                echo Constants::STATUS_FAILED . " to fetch category";
                                            }
                                            echo "</select></td>";

                                            echo "<td><select class='productBrand form-control select2" . $i . "' style='width:auto' id='productBrand" . $i . "' name='productBrand" . $i . "'>
                                <option value='-1' selected disabled>Select Brand</option>";
                                            //            if ($getBrand == true) {
                                            //                while ($row = $getBrand->fetch_assoc()) {
                                            //                    echo "<option value = '" . $row['product_brand_id'] . "'>" . $row['product_brand_name'] . "</option>";
                                            //                }
                                            //            } else {
                                            //                echo Constants::STATUS_FAILED . " to fetch brand";
                                            //            }
                                            echo "</select></td>";

                                            echo "<td><input class='form-control' style='width: auto;' type='text' id='productModelName" . $i . "' name='productModelName" . $i . "' placeholder='Enter Model Name'></td>";
                                            echo "<td><input class='form-control' style='width: auto;' type='text' id='productModelColor" . $i . "' name='productModelColor" . $i . "' placeholder='Enter Model Color'></td>";

                                            echo "<td>
                <select class='productCondition form-control select2' style='width:auto' id='productCondition" . $i . "' name='productCondition" . $i . "'>
                    <option value='-2' selected disabled>Select Condition</option>";
                                            if ($getCondition == true) {
                                                while ($row = $getCondition->fetch_assoc()) {
                                                    echo "<option value = '" . $row['product_condition_id'] . "'>" . $row['product_condition_name'] . "</option>";
                                                }
                                            } else {
                                                echo Constants::STATUS_FAILED . " to fetch condition";
                                            }
                                            echo "</select></td>";

                                            echo "<td>
                <select class='productBoxType form-control select2' style='width:auto' id='productBoxType" . $i . "' name='productBoxType" . $i . "'>
                    <option value='-3' selected disabled>Select Box Type</option>";
                                            if ($getBoxType == true) {
                                                while ($row = $getBoxType->fetch_assoc()) {
                                                    echo "<option value = '" . $row['product_box_type_id'] . "'>" . $row['product_box_type_name'] . "</option>";
                                                }
                                            } else {
                                                echo Constants::STATUS_FAILED . " to fetch box type";
                                            }
                                            echo "</select></td>";

                                            echo "<td>
                <select class='productBrandWarranty form-control select2' style='width:auto' id='productBrandWarranty" . $i . "' name='productBrandWarranty" . $i . "'>
                    <option value='-4' selected disabled>Select Brand Warranty</option>";
                                            if ($getBrandWarranty == true) {
                                                while ($row = $getBrandWarranty->fetch_assoc()) {
                                                    echo "<option value = '" . $row['product_brand_warranty_id'] . "'>" . $row['product_brand_warranty_type'] . "</option>";
                                                }
                                            } else {
                                                echo Constants::STATUS_FAILED . " to fetch brand warranty";
                                            }
                                            echo "</select></td>";

                                            echo "<td><input class='form-control' style='width: auto;' type='text' id='productWarrantyExpiry" . $i . "' name='productWarrantyExpiry" . $i . "' placeholder='Enter Model Warranty Expiry'></td>";
                                            echo "<td><textarea class='form-control' style='width: auto;' name='productComment" . $i . "' id='productComment" . $i . "' placeholder='Enter Model Information'></textarea></td>";
                                            echo "<td><input class='form-control' style='width: auto;' type='number' id='productQuantity" . $i . "' name='productQuantity" . $i . "' placeholder='Enter Quantity'></td>";
                                            echo "<td><input class='form-control' style='width: auto;' type='number' id='productMFGPrice" . $i . "' name='productMFGPrice" . $i . "' placeholder='Enter MFG. Price'></td>";
                                            echo "<td><input class='form-control' style='width: auto;' type='number' id='productCompanyPrice" . $i . "' name='productCompanyPrice" . $i . "' placeholder='Enter Company Price'></td>";
                                            echo "<td><button class='btn btn-danger btn-flat' type='button' id='deleteRow' value='" . $i . "'><i class='glyphicon glyphicon-remove'></i> Remove</button></td>";
                                            echo "<input type='hidden' class='rowValue' id='" . $i . "' name='rowValue' value='" . $i . "'>";
                                            echo "</tr>";
                                            ?>
                                        </table>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-1">
                                            <button class="btn btn-primary btn-flat" type="reset" id="reset"><i
                                                        class="fa fa-undo"></i> Reset
                                            </button>
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-success btn-flat" type="submit" id="submit"><i
                                                        class="fa fa-save"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <br>
                                <div>
                                    <button class="btn btn-primary btn-flat" type="button" id="addNewRowButton"><i
                                                class="fa fa-plus"></i> Add New
                                    </button>
                                </div>

                            </form>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    var counter = 2;
                                    $("#addNewRowButton").bind("click", function (event) {
                                        event.preventDefault();

                                        $.ajax({
                                            type: "POST",
                                            url: "get_dynamic_drop_down_product_details.php",
                                            success: function (json) {
                                                if (json.status === "success") {
                                                    var newRow = '<tr custom = "' + counter + '" id="row' + counter + '"><td>' + counter + '</td>';

                                                    //Drop Down Product Category
                                                    newRow = newRow + '<td><select class="productCategory form-control select2' + counter + '" style="width:auto" id="productCategory' + counter + '" name="productCategory"' + counter + '>';
                                                    newRow = newRow + '<option value="-5" selected disabled>Select Category</option>';
                                                    for (var a = 0; a < json.message[0].product_category.length; a++) {
                                                        newRow = newRow + '<option value="' + json.message[0].product_category[a].id + '">' + json.message[0].product_category[a].name + '</option>';
                                                    }
                                                    newRow = newRow + '</select></td>';

                                                    //Drop Down Product Brand
                                                    newRow = newRow + '<td><select class="productBrand form-control select2' + counter + '"style="width: auto;" id="productBrand' + counter + '" name="productBrand"' + counter + '>';
                                                    newRow = newRow + '<option value="-5" selected disabled>Select Brand</option>';
//                        for (var i = 0; i < json.message[1].product_brand.length; i++) {
//                            newRow = newRow + '<option value="' + json.message[1].product_brand[i].id + '">' + json.message[1].product_brand[i].name + '</option>';
//                        }
                                                    newRow = newRow + '</select></td>';

                                                    //TextBox Model Name and Color
                                                    newRow = newRow + '<td><input class="form-control" type="text" id="productModelName' + counter + '" name="productModelName' + counter + '" placeholder="Enter Model Name"></td>' +
                                                        '<td><input class="form-control" type="text" id="productModelColor' + counter + '" name="productModelColor' + counter + '" placeholder="Enter Model Color">' +
                                                        '</td>';

                                                    //Drop down Product Condition
                                                    newRow = newRow + '<td><select class="productCondition  form-control select2" style="width: auto;" id="productCondition' + counter + '" name="productCondition"' + counter + '>';
                                                    newRow = newRow + '<option value="-6" selected disabled>Select Condition</option>';
                                                    for (var j = 0; j < json.message[1].product_condition.length; j++) {
                                                        newRow = newRow + '<option value="' + json.message[1].product_condition[j].id + '">' + json.message[1].product_condition[j].name + '</option>';
                                                    }
                                                    newRow = newRow + '</select></td>';

                                                    //Drop down Product Box Type
                                                    newRow = newRow + '<td><select class="productBoxType form-control select2" style="width: auto;" id="productBoxType' + counter + '" name="productBoxType"' + counter + '>';
                                                    newRow = newRow + '<option value="-7" selected disabled>Select Box Type</option>';
                                                    for (var k = 0; k < json.message[2].product_box_type.length; k++) {
                                                        newRow = newRow + '<option value="' + json.message[2].product_box_type[k].id + '">' + json.message[2].product_box_type[k].name + '</option>';
                                                    }
                                                    newRow = newRow + '</select></td>';

                                                    //Drop down Product Brand Warranty
                                                    newRow = newRow + '<td><select class="productBrandWarranty form-control select2" style="width: auto;" id="productBrandWarranty' + counter + '" name="productBrandWarranty"' + counter + '>';
                                                    newRow = newRow + '<option value="-8" selected disabled>Select Brand Warranty</option>';
                                                    for (var l = 0; l < json.message[3].product_brand_warranty.length; l++) {
                                                        newRow = newRow + '<option value="' + json.message[3].product_brand_warranty[l].id + '">' + json.message[3].product_brand_warranty[l].name + '</option>';
                                                    }
                                                    newRow = newRow + '</select></td>';

                                                    //Remaining TextBox
                                                    newRow = newRow + '<td><input class="form-control" type="text" id="productWarrantyExpiry' + counter + '" name="productWarrantyExpiry' + counter + '" placeholder="Enter Warranty Expiry"></td>' +
                                                        '<td><textarea class="form-control" id="productComment' + counter + '" name="productComment' + counter + '" placeholder="Enter Model Information"></textarea></td><td><input class="form-control" style="width:auto" type="number" id="productQuantity' + counter + '" name="productQuantity' + counter + '" placeholder="Enter Quantity"></td>' +
                                                        '<td><input class="form-control" type="number" id="productMFGPrice' + counter + '" name="productMFGPrice' + counter + '" placeholder="Enter MFG. Price">' +
                                                        '</td><td><input class="form-control" type="number" id="productCompanyPrice' + counter + '" name="productCompanyPrice' + counter + '" placeholder="Enter Company Price"></td>' +
                                                        '<td><button class=\'btn btn-danger btn-flat\' type="button" id="deleteRow" value="' + counter + '"><i class=\'glyphicon glyphicon-remove\'></i> Remove</button></td>' +
                                                        '<td><input class="form-control" type="hidden" class="rowValue" value="' + counter + '"></td></tr>';
                                                    $('#mainTable').append(newRow);

                                                    $('#mainTable').on("change", 'select.productCategory' + counter, function (e) {
                                                        var categoryId = $(this).find('option:selected').val();
                                                        var rowCount = $(this).parents("tr").attr('custom');

//                            console.log("Category id: " + categoryId);
//                            console.log("Row value: " + rowCount);

                                                        getDynamicProductCategory(categoryId, rowCount);
                                                    });

//                        $('select.productCategory' + counter).on("change", function (e) {
//                            e.preventDefault();
//                            var categoryId = $(this).find('option:selected').val();
//                            var rowCount = $(this).closest('td').find('.rowValue').val();
//
//                            console.log("Category id: " + categoryId);
//                            console.log("Row value: " + rowCount);
//                            //Over here counter value is jugaaded.
//                            getDynamicProductCategory(categoryId, rowCount);
//                        });

                                                    counter++;
                                                }
                                                else {
                                                    alert("Failed getting resource");
                                                }
                                            },
                                            error: function (jqXHR, textStatus, errorThrown) {
                                                alert(textStatus + ": Something went wrong " + errorThrown);
                                            }
                                        });
                                    });

                                    $('#mainTable').on("click", "#deleteRow", function (e) {
                                        e.preventDefault();
                                        $(this).parents("tr").remove();
                                    });


                                    $('select.productCategory').on("change", function (e) {
                                        e.preventDefault();
                                        var categoryId = $(".productCategory option:selected").val();
                                        var rowCountValue = $(".rowValue").val();
//            console.log("Category id: " + categoryId);
//            console.log("Row value: " + rowCountValue);

                                        getDynamicProductCategory(categoryId, rowCountValue);
                                    });

                                    function getDynamicProductCategory(categoryId, rowValue) {

                                        if (categoryId > 0 && rowValue > 0) {
                                            $.ajax({
                                                url: "get_brand_name_from_category_id.php",
                                                type: "POST",
                                                data: {
                                                    categoryId: categoryId
                                                },
                                                dataType: "json",
                                                success: function (json) {
                                                    if (json.status === "success") {
                                                        $(".productBrand" + rowValue).html("");
                                                        //Drop Down Product Brand
                                                        for (var z = 0; z < json.message.product_brand.length; z++) {
                                                            var dynamicProductBrand = '<option value = "' + json.message.product_brand[z].id + '" > ' + json.message.product_brand[z].name + ' </option>';
                                                            $(".productBrand" + rowValue).append(dynamicProductBrand);
                                                        }
                                                    }
                                                    else {
                                                        $(".productBrand" + rowValue).html("");
                                                        var failedMessage = '<option> ' + json.message + ' </option>';
                                                        $(".productBrand" + rowValue).append(failedMessage);
                                                    }
                                                }
                                            });
                                        } else {
                                            alert("Select Proper Category");
                                        }
                                    }

                                    $("#submit").on("click", function (e) {
                                        e.preventDefault();
                                        addToDatabase();
                                    });


                                    var arrayAddToDB = [];
                                    var productCategory, productBrand, productModelName, productModelColor,
                                        productCondition, productBoxType,
                                        productBrandWarranty, productWarrantyExpiry, productComment, productQuantity,
                                        productMFGPrice,
                                        productCompanyPrice;

                                    function addToDatabase() {
                                        $(".rowValue").each(function () {
                                            var rowId = $(this).val();

                                            productCategory = $("#productCategory" + rowId).find("option:selected").val();
                                            productBrand = $("#productBrand" + rowId).find("option:selected").val();
                                            productModelName = $("#productModelName" + rowId).val();
                                            productModelColor = $("#productModelColor" + rowId).val();
                                            productCondition = $("#productCondition" + rowId).find("option:selected").val();
                                            productBoxType = $("#productBoxType" + rowId).find("option:selected").val();
                                            productBrandWarranty = $("#productBrandWarranty" + rowId).find("option:selected").val();
                                            productWarrantyExpiry = $("#productWarrantyExpiry" + rowId).val();
                                            productComment = $("#productComment" + rowId).val();
                                            productQuantity = $("#productQuantity" + rowId).val();
                                            productMFGPrice = $("#productMFGPrice" + rowId).val();
                                            productCompanyPrice = $("#productCompanyPrice" + rowId).val();

                                            arrayAddToDB.push([productCategory, productBrand, productModelName, productModelColor,
                                                productCondition, productBoxType, productBrandWarranty, productWarrantyExpiry,
                                                productComment, productQuantity, productMFGPrice, productCompanyPrice]);
                                        });

//            console.log(arrayAddToDB);

                                        if (productCategory === "" || productBrand === "" || productModelName === "" || productModelColor === "" ||
                                            productCondition === "" || productBoxType === "" || productBrandWarranty === "" || productWarrantyExpiry === "" ||
                                            productComment === "" || productQuantity === "" || productMFGPrice === "" || productCompanyPrice === "") {
                                            alert("Enter all values");
                                            arrayAddToDB = [];
                                        } else {
                                            $.ajax({
                                                url: "insert_product_details.php",
                                                type: "POST",
                                                data: {
                                                    productDetailsArray: arrayAddToDB
                                                },
                                                dataType: "json",
                                                success:
                                                    function (json) {
                                                        if (json.status === "success") {
                                                            alert(json.message);
                                                            window.location.reload(true);
                                                        } else if (json.status === "already_exists") {
                                                            alert(json.message);
                                                            arrayAddToDB = [];

//                                    console.log(arrayAddToDB);
                                                        } else if (json.status === "failed") {
                                                            alert(json.message);
                                                            arrayAddToDB = [];

//                                    console.log(arrayAddToDB);
                                                        } else {
                                                            alert("Undefined error. Please contact developer");
                                                        }
                                                    }
                                            });
                                        }
                                    }
                                })
                                ;
                            </script>

                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../../Resources/AdminLTE-2.4.2/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../Resources/AdminLTE-2.4.2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../../Resources/AdminLTE-2.4.2/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../Resources/AdminLTE-2.4.2/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../Resources/AdminLTE-2.4.2/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../Resources/AdminLTE-2.4.2/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../../../Resources/AdminLTE-2.4.2/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../../Resources/AdminLTE-2.4.2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

</body>
</html>
