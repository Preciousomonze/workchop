<?php session_start();
require "_parts/_functions.php";

require "vendor/autoload.php";
 $session = new Session();
 if($session->check_session_basically($_SESSION["user"]) == false){
	 //header("location:index.html");
 }
 ?>
<!DOCTYPE html>
	<html>
		<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
	
	<?php //STYLE SHEETS ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">
	<title>Workchop - Home</title>

            <script type="text/javascript" src="<?php base_url("assets/js/jquery.js"); ?>"></script>

            <script type="text/javascript">
                <?php ////LET'S DO THE JS STUFF HERE ?>
                <?php /*
                var _basic_part= $(".basic-show");
                var _advanced_part= $(".advanced-show");
                var _basic_click = $("a[href='#basic']");
                var _advanced_click = $("a[href='#advanced']");
                    */?>
                function showBasic(){
                    $(".advanced-show").hide('slow');
                    $(".basic-show").show('slow');

                    $("a[href='#advanced']").removeClass("active");
                    $("a[href='#basic']").addClass("active");

                }

                function showAdvanced(){
                    $(".basic-show").hide('slow');
                    $(".advanced-show").show('slow');

                    $("a[href='#basic']").removeClass("active");
                    $("a[href='#advanced']").addClass("active");

                }

                <?php

                        //profile edit part
                        //when the edit profile is clicked

                ?>
                 var profile_edit_status = 0;

                    $("#profile-edit").click(function(){

                        //if(profile_edit_status == 0){
                        $(".whole-body").hide();
                        //}

                        //else{
                        $("#profile input").removeAttr("readonly");
                        //}

                    });




            </script>
		</head>
		<body>
		<div class="container whole-body">
		
		<?php require base_path("_parts/_menu.php"); ?>
			
		 <div class="row">	
			<div class="body_container">
				
			<?php //left part ?>
			<div class="col-md-3 profile-sidebar scroll scrollspy">
				<ul class="">
					<li class="active">
						<a href="#profile" class="scroll"><i class="icon fa-user"></i> Personal Info</a>
					</li>
					<li>
						<a href="#medical-info" class="scroll"><i class="icon fa-info"></i> Medical Info</a>
					</li>
					<li>
						<a href="#doctors" class="scroll"><i class="icon fa-user-md"></i> My Doctors</a>
					</li>
					<li>
						<a href="#hospitals"><i class="icon fa-hospital-o"></i> My Hospitals</a>
					</li>
					<li>
						<a href="#security"><i class="icon fa-lock"></i> Security Level</a>
					</li>
				</ul>
			
			</div>
				
			<div class="col-md-7 center-body">

                <div id="profile" style="padding:1px 1px 5px 10px;" class="personal-info profile-info box ">
                    <div class="inside">
                        <div class="header">
                            <h3><i class="icon fa-user"></i> Profile</h3>
                        </div>
                        <div class="body">

                            <div class="row">
                                <div class="col-sm-3">
                                    <?php $p = mt_rand(0,3); ?>
                                    <img class="img-frame" src = "<?php base_url(USER_AREA."p".$p.".jpg"); ?>">

                                </div>
                                <div class="col-sm-8">
                                    <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="First Name" title="Your firstname" name="fname">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="Surname" title="Your surname" name="fullname">

                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="E-mail Address" name="fullname">

                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="Phone number (e.g)+2348076543445" title="your phone number" name="fullname">

                                        </div>

                                    </form>
                                </div>
                            </div>
                            <?php //next of kin
                            ?>
                            <div class="n-o-k row">
                                <p class="little-head-title">Next of kin  <span class="title-breadcrumb">details</span></p>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" placeholder="Full name" title="next of kin's full name" readonly name="fullname">
                                </div>

                                <div class="col-md-5">
                                    <input type="text" class="form-control" placeholder="Phone number" title="the next of kin's phone number" readonly name="fullname">

                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" placeholder="Address" title="the next of kin's address" readonly name="fullname">

                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" readonly="true" placeholder="Relationship" title="The relationship you have with your kin" roadonly name="fullname">

                                </div>


                            </div>

                        </div>

                        <div class="foot clearfix">
                            <a class="btn go-right classic-btn" id="profile-edit"><i class="icon fa-pencil-square-o"></i> <span>Edit</span></a>
                        </div>

                    </div>
                </div>
                <?php //end of profile ?>


                <div id="medical-info" class="medical-info profile-info box space-inner">
                    <div class="inside">
                        <div class="header">
                            <h3><i class="icon fa-file-text-o"></i> Medical info</h3>
                        </div>
                        <div class="sub-header">
                            <div class="row">
                                <div class="col-xs-6 col">
                                      <a class="active" href="#basic" onclick = showBasic()>Basic</a>

                                </div><?php ////col ?>

                                <div class="col-xs-6 col">
                                    <a href="#advanced"onclick = showAdvanced()>Advanced</a>
                                </div><?php ////col ?>
                            </div><?php ////row ?>
                        </div>
                        <div class="body">

                            <div class="row">

                                <div class="col-sm-12 basic-show">
                                    <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly placeholder="Blood group" title="Your firstname" name="fname">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" readonly placeholder="Genotype" title="Your surname" name="fullname">

                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-xs-7">
                                                    <input type="text" class="form-control" readonly placeholder="Weight" name="fullname">
                                                </div>
                                                <div class="col-xs-5">
                                                    <select class="form-control" readonly="true">
                                                        <option value="" selected>Kg</option>
                                                        <option value="" selected>Pounds</option>
                                                    </select>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-xs-7">
                                                    <input type="text" class="form-control" readonly placeholder="Height" name="fullname">
                                                </div>
                                                <div class="col-xs-5">
                                                    <select class="form-control" readonly>
                                                        <option value="" selected title="centimetres">CM</option>
                                                        <option value="" selected title="metres">M</option>
                                                        <option value="" selected title="feet">FT</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <?php // advanced part ?>

                                <div class="col-sm-12 advanced-show">
                                        <div class="information allergies">
                                            <div class="header">
                                                <p class="little-head-title">Allergies
                                                    <a class="btn classic-btn"><i class="icon fa-plus"></i><span>Add</span>
                                                    </a>

                                                </p>
                                            </div>
                                            <div class="body">
                                                <ul>
                                                    <li>
                                                        <p>We are poised to becoming an Internet based brand that the ecommerce industries global giants will
                                                            <span class="actions">
                                                                    <a class="#"><i class="icon fa-pencil-square-o"></i></a><a class="#"><i class="icon fa-trash-o"></i></a>

                                                            </span>
                                                        </p>
                                                    </li>
                                                    <li>
                                                         <p>   recognise us as a leader in the promotion, marketing and sales of products and services.
                                                             <span class="actions">
                                                                    <a class="#"><i class="icon fa-pencil-square-o"></i></a><a class="#"><i class="icon fa-trash-o"></i></a>

                                                            </span>
                                                         </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php ////ALLERGIES ?>

                                    <div class="information medical-condition">
                                        <div class="header">
                                            <p class="little-head-title">Medical condition
                                                <a class="btn classic-btn"><i class="icon fa-plus"></i><span>Add</span>
                                                </a>

                                            </p>
                                        </div>
                                        <div class="body">
                                            <ul>
                                                <li>
                                                    <p>We are poised to becoming an Internet based brand that the ecommerce industries global giants will
                                                        <span class="actions">
                                                                    <a class="#"><i class="icon fa-pencil-square-o"></i></a><a class="#"><i class="icon fa-trash-o"></i></a>

                                                            </span>
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>   recognise us as a leader in the promotion, marketing and sales of products and services.
                                                        <span class="actions">
                                                                    <a class="#"><i class="icon fa-pencil-square-o"></i></a><a class="#"><i class="icon fa-trash-o"></i></a>

                                                            </span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php ////MEDICAL CONDITION ?>

                                    <div class="information childhood">
                                        <div class="header">
                                            <p class="little-head-title">Childhood diseases
                                                <a class="btn classic-btn"><i class="icon fa-plus"></i><span>Add</span>
                                                </a>

                                            </p>
                                        </div>
                                        <div class="body">
                                            <ul>
                                                <li>
                                                    <p>We are poised to becoming an Internet based brand that the ecommerce industries global giants will
                                                        <span class="actions">
                                                                    <a class="#"><i class="icon fa-pencil-square-o"></i></a><a class="#"><i class="icon fa-trash-o"></i></a>

                                                            </span>
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>   recognise us as a leader in the promotion, marketing and sales of products and services.
                                                        <span class="actions">
                                                                    <a class="#"><i class="icon fa-pencil-square-o"></i></a><a class="#"><i class="icon fa-trash-o"></i></a>

                                                            </span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php ////CHILDHOOD DISEASE ?>
                                    <div class="information family-history">
                                        <div class="header">
                                            <p class="little-head-title">Family history
                                                <a class="btn classic-btn"><i class="icon fa-plus"></i><span>Add</span>
                                                </a>

                                            </p>
                                        </div>
                                        <div class="body">
                                            <ul>
                                                <li>
                                                    <p>We are poised to becoming an Internet based brand that the ecommerce industries global giants will
                                                        <span class="actions">
                                                                    <a class="#"><i class="icon fa-pencil-square-o"></i></a><a class="#"><i class="icon fa-trash-o"></i></a>

                                                            </span>
                                                    </p>
                                                </li>
                                                <li>
                                                    <p>   recognise us as a leader in the promotion, marketing and sales of products and services.
                                                        <span class="actions">
                                                                    <a class="#"><i class="icon fa-pencil-square-o"></i></a><a class="#"><i class="icon fa-trash-o"></i></a>

                                                            </span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php ////FAMILY HISTORY ?>


                                </div>

                                <?php //end of advanced ?>


                            </div>


                        </div>

                        <div class="foot clearfix">
                            <a class="btn go-right classic-btn"><i class="icon fa-pencil-square-o"></i> <span>Edit</span></a>
                        </div>

                    </div>
                </div>
                <?php //end of medical info ?>


                <div id="doctors" class="medical-info profile-info box space-inner">
                    <div class="inside">
                        <div class="header">
                            <h3><i class="icon fa-user-md"></i> My Doctors
                                <a class="btn classic-btn"><i class="icon fa-plus"></i><span>Add</span>
                                </a>
                            </h3>

                        </div>

                        <div class="body">

                            <div class="row h-display">
                                <div class="inside col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?php base_url(USER_AREA."/2.jpg"); ?>">
                                        </div>
                                        <div class="col-sm-8 col-xs-10 details">
                                            <section class="the-name"><p>Dr. Rotimi Oluseyi</p></section>
                                            <section class="the-address"><p><i class="icon fa-hospital-o"></i>
                                                    ABC medical care.
                                                </p>
                                            </section>

                                            <section class="the-phone"><p><i class="icon fa-phone"></i>
                                                    +23481821113456
                                                </p>
                                            </section>
                                        </div>

                                        <div class="col-sm-1 col-xs-2 more">
                                            <a href="#"><i class="icon fa-circle"></i>
                                                <i class="icon fa-circle"></i>
                                                <i class="icon fa-circle"></i></a>

                                            <div class="short-menu">
                                                <ul>
                                                    <li>
                                                        <a href="#a" title="message dr name"><i class="icon fa-comment-o"></i> Message</a>
                                                    </li>
                                                    <li>
                                                        <a href="#remove" title="remove dr name"><i class="icon fa-trash-o"></i> Remove</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="row h-display">
                                <div class="inside col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?php base_url(USER_AREA."/4.jpg"); ?>">
                                        </div>
                                        <div class="col-sm-8 col-xs-10 details">
                                            <section class="the-name"><p>Dr. Rotimi Oluseyi</p></section>
                                            <section class="the-address"><p><i class="icon fa-hospital-o"></i>
                                                    ABC medical care.
                                                </p>
                                            </section>

                                            <section class="the-phone"><p><i class="icon fa-phone"></i>
                                                    +23481821113456
                                                </p>
                                            </section>
                                        </div>

                                        <div class="col-sm-1 col-xs-2 more">
                                            <a href="#"><i class="icon fa-circle"></i>
                                                <i class="icon fa-circle"></i>
                                                <i class="icon fa-circle"></i></a>

                                            <div class="short-menu">
                                                <ul>
                                                    <li>
                                                        <a href="#a" title="message dr name"><i class="icon fa-comment-o"></i> Message</a>
                                                    </li>
                                                    <li>
                                                        <a href="#remove" title="remove dr name"><i class="icon fa-trash-o"></i> Remove</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <div class="row h-display">
                                <div class="inside col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?php base_url(USER_AREA."/1.jpg"); ?>">
                                        </div>
                                        <div class="col-sm-8 col-xs-10 details">
                                            <section class="the-name"><p>Dr. Rotimi Oluseyi</p></section>
                                            <section class="the-address"><p><i class="icon fa-hospital-o"></i>
                                                    ABC medical care.
                                                </p>
                                            </section>

                                            <section class="the-phone"><p><i class="icon fa-phone"></i>
                                                    +23481821113456
                                                </p>
                                            </section>
                                        </div>

                                        <div class="col-sm-1 col-xs-2 more">
                                            <a href="#"><i class="icon fa-circle"></i>
                                                <i class="icon fa-circle"></i>
                                                <i class="icon fa-circle"></i></a>

                                            <div class="short-menu">
                                                <ul>
                                                    <li>
                                                        <a href="#a" title="message dr name"><i class="icon fa-comment-o"></i> Message</a>
                                                    </li>
                                                    <li>
                                                        <a href="#remove" title="remove dr name"><i class="icon fa-trash-o"></i> Remove</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>


                        <div class="foot clearfix">
                            <a class="btn go-right classic-btn"><i class=""></i><span>view more</span></a>
                        </div>

                    </div>
                </div>
                <?php //end of doctor info ?>


                <div id="hospitals" class="profile-info box space-inner">
                    <div class="inside">
                        <div class="header">
                            <h3><i class="icon fa-hospital-o"></i>My hospitals
                                <a class="btn classic-btn"><i class="icon fa-plus"></i><span>Add</span>
                                </a>
                            </h3>
                        </div>
                        <div class="body">

                            <div class="row h-display">
                                <div class="inside col-sm-12">
                                    <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?php base_url(USER_AREA."/h1.jpg"); ?>">
                                    </div>
                                    <div class="col-sm-8 col-xs-10 details">
                                        <section class="the-name"><p>Hospital Name</p></section>
                                        <section class="the-address"><p><i class="icon fa-map-marker"></i> 23, Unilag
                                                Road, Lagos, Ikeja.
                                            </p>
                                         </section>

                                        <section class="the-email">
                                            <p><a href="mailto:me@gmail.com" title="send "></a><i class="icon fa-envelope-o"></i>
                                                hemail@email.com
                                            </p>
                                        </section>
                                            <section class="the-phone"><p><i class="icon fa-phone"></i>
                                                    +23481821113456
                                                </p>
                                            </section>

                                                <section class="the-web"><p><i class="icon fa-globe"></i>
                                                        thehart.com
                                                    </p>
                                          </section>
                                    </div>

                                    <div class="col-sm-1 col-xs-2 more">
                                        <a href="#"><i class="icon fa-circle"></i>
                                                        <i class="icon fa-circle"></i>
                                                        <i class="icon fa-circle"></i></a>

                                        <div class="short-menu">
                                            <ul>
                                                <li>
                                                    <a href="#a" title="message dr name"><i class="icon fa-comment-o"></i> Message</a>
                                                </li>
                                                <li>
                                                    <a href="#remove" title="remove dr name"><i class="icon fa-trash-o"></i> Remove</a>
                                                </li>
                                            </ul>
                                        </div>


                                    </div>
                                </div>
                             </div>


                        </div>
                        </div>
                        <div class="foot clearfix">
                            <a class="btn go-right classic-btn"><i class="icon fa-eye"></i> <span>view more</span></a>
                        </div>

                    </div>
                </div>
                <?php //end of hospitals ?>


                <div id="security" class="security-info profile-info box space-inner">
                    <div class="inside">
                        <div class="header">
                            <h3><i class="icon fa-lock"></i> Security Level
                               </a>
                            </h3>
                        </div>
                        <div class="body">
                            <p>
                                We are poised to becoming an Internet based brand that the ecommerce industries global
                                giants will recognise us as a leader in the promotion, marketing and sales of products and services.
                            </p>

                            <div class="information">
                                <div class="body">
                                    <div class="row levels level-1">
                                        <div class="col-xs-1 icon-area">
                                            <i class="icon fa-check"></i>

                                        </div>
                                        <div class="col-xs-9">
                                            <p class="little-head-title">Level 1 -   <span class="title-breadcrumb">Full access</span></p>
                                            <p>We are poised to becoming an Internet based brand that the ecommerce industries global giants will recognise us as a leader in the promotion, marketing and sales of products and services.
                                            </p>
                                        </div>
                                        <div class="col-xs-2 check-area">
                                            <input type="checkbox" class="form-control">
                                        </div>
                                    </div><?php//// level-1 ?>

                                    <div class="row levels level-2">
                                        <div class="col-xs-1 icon-area">
                                            <i class="icon fa-unlock-alt"></i>

                                        </div>
                                        <div class="col-xs-9">
                                            <p class="little-head-title">Level 2 -   <span class="title-breadcrumb">Partial-access</span></p>
                                            <p>We are poised to becoming an Internet based brand that the ecommerce industries global giants will recognise us as a leader in the promotion, marketing and sales of products and services.
                                            </p>
                                        </div>
                                        <div class="col-xs-2 check-area">
                                            <input type="checkbox" class="form-control">
                                        </div>
                                    </div><?php//// level-2 ?>

                                    <div class="row levels level-3">
                                        <div class="col-xs-1 icon-area">
                                            <i class="icon fa-lock"></i>

                                        </div>
                                        <div class="col-xs-9">
                                            <p class="little-head-title">Level 3  <span class="title-breadcrumb">Permitted azzess</span></p>
                                            <p>We are poised to becoming an Internet based brand that the ecommerce industries global giants will recognise us as a leader in the promotion, marketing and sales of products and services.
                                            </p>
                                        </div>
                                        <div class="col-xs-2 check-area">
                                            <input type="checkbox" class="form-control">
                                        </div>
                                    </div><?php//// level-3 ?>


                                    <div class="row levels level-4">
                                        <div class="col-xs-1 icon-area">
                                            <i class="icon fa-shield"></i>

                                        </div>
                                        <div class="col-xs-9">
                                            <p class="little-head-title">Level 4  <span class="title-breadcrumb">No azzess(Oyo lo wa)</span></p>
                                            <p>Only your doctors
                                            </p>
                                        </div>
                                        <div class="col-xs-2 check-area">
                                            <input type="checkbox" class="form-control">
                                        </div>
                                    </div><?php//// level-4 ?>


                                </div>
                            </div><?php////information ?>

                        </div>
                        <div class="foot clearfix">
                        </div>

                    </div>
                </div>
                <?php //end of security level ?>


            </div>
				
			</div><?php ////body_container ?>
			
		  </div><?php ////row ?>
			</div>

<script type="text/javascript">
    $("#profile-page").addClass("active");

</script>
        <?php //footer
        require base_path("_parts/_footer.php");
        ?>
