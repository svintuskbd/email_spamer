<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'Core/SendMail.php';
// require_once 'Classes/PHPExcel/IOFactory.php';

$sendMail = new SendMail;

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web-Holder mail send</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>
    <script src="http://cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Web-Holder mail send</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Web-Holder mail send</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!-- <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul> -->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-6 text-center">
            	<?php
            		// $objPHPExcel = PHPExcel_IOFactory::load("Belgium.xls");

            		
					 
				  	$xlsData = $sendMail->getXLS('Belgium.xls'); //извлеаем данные из XLS
					
					$resultArr = [];
					foreach ($xlsData as $key => $value) {
						foreach ($value as $key => $val) {
							$resultArr[] = $val;
						}
					}

            		if ($_POST) {
						$title1 = $_POST['mail']['title1'];
						$title2 = $_POST['mail']['title2'];
						$topText = $_POST['mail']['topText'];
						$bottomText = $_POST['mail']['list'];
						$from = $_POST['mail']['from'];
						$subject = $_POST['mail']['subject'];

						$result = $sendMail->timeOut($resultArr, 1, $from, $subject, $title1, $title2, $topText, $bottomText);
						if ($result) {
							echo 'Отправлено '.$result;
						}
					}					
					
            	?>
           		<form id="formSend" method="POST" action="">
           			<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">От кого слать*: </span>
						<input form="formSend" name="mail[from]" type="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1" required>
					</div>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Тема письма*: </span>
						<input form="formSend" name="mail[subject]" type="text" class="form-control" placeholder="Test Subject" aria-describedby="basic-addon2" required>
					</div>
					<div class="input-group" style="margin: 10px 0px;">
						<button class="btn btn-success">Success</button>
					</div>
           		</form>
            </div>
            <div class="col-lg-6 text-center">
           		<table border="0" cellpadding="0" border-spacing="0" cellspacing="0" width="800px" height="1080px" style="border-spacing:0; margin: 0 auto; background-color: #161616; color: #fff">
		            <tbody>
		                <tr height="251px" width="100%" style="background-image: url(https://gallery.mailchimp.com/a07a1c5a03ea6c2d738ec5edd/images/8faf92f2-2ad8-4a89-880d-5d48bfbf2b40.png); background-repeat: no-repeat;">
		                    <td height="251px" valign="center" align="center"><a href="index.html"><img src="https://gallery.mailchimp.com/a07a1c5a03ea6c2d738ec5edd/images/110c05c1-85ca-4305-b943-51cf4b64c0ca.png" alt="logo"></a></td>
		                </tr>
		                <tr height="71px">
		                	<td align="center">
		                		<h1 style="margin: 0; padding-top: 55px; color: #fff; font-size: 24px; font-family:'Raleway';font-weight: 500;text-transform: uppercase;">
		                			<input form="formSend" name="mail[title1]" value="We strive to create lasting impressions" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1"> 
	                			</h1>
	                		</td>
                		</tr>
		                <tr height="25px">
		                	<td align="center">
		                		<h2 style="margin: 0; padding: 0px; color: #fcff23; font-size: 24px; font-family:'Raleway';font-weight: 500;text-transform: uppercase;">
		                			<input form="formSend" name="mail[title2]" value=" by establishing a genuine relationship ." type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
	                			</h2>
	                		</td>
                		</tr>
		                <tr>
		                
		                    <td height="110px">
		                    	<textarea form="formSend" id="editor1" name="mail[topText]">
		                    		We work directly with you, providing personalized, unique solutions that cater to your area of business. We are committed to expanding our clients business capabilities while becoming a trusted partner for their future growth.We work directly with you, providing personalized, unique solutions that cater to your area of business. 
		                    	</textarea>
		                        <script>
					                CKEDITOR.replace( 'editor1' );
					            </script>
		                    </td>
		                    
		                </tr>
		                <tr>
		                    <td height="258px">
		                    	<textarea form="formSend" id="editor2" name="mail[list]">
			                        <ul>
			                            <li style="padding-left: 12px; margin-bottom: 30px">We work directly with you, providing personalized, unique solutions that cater to your area of business. </li>
			                            <li style="padding-left: 12px; margin-bottom: 30px">We work directly with you, providing personalized, unique solutions that cater to your area of business. </li>
			                            <li style="padding-left: 12px; margin-bottom: 30px">We work directly with you, providing personalized, unique solutions that cater to your area of business. </li>
			                            <li style="padding-left: 12px; margin-bottom: 30px">We work directly with you, providing personalized, unique solutions that cater to your area of business. </li>
			                        </ul>
		                        </textarea>
		                        <script>
					                CKEDITOR.replace( 'editor2' );
					            </script>
		                    </td>
		                </tr>
		                <tr> 
		                    <td>
		                        <table border="0" cellpadding="0" border-spacing="0" cellspacing="0" width="100%" height="255px" style="border-spacing:0;">
		                            <tbody>
		                                <tr bgcolor="#ffffff" height="130px" width="100%" style="padding: 0 42px">
		                                  <td width="42px"></td>  
		                                  <td style="padding-left: 42px; width: 172px; background-color: #fcff23; color:#000;">
		                                    <h3 style="font-size: 21px; font-weight: 700; font-family:'Raleway'; color: #020202">Take a stand,<br>
		                                    Think different.</h3>
		                                    </td>
		                                    <td></td>
		                                    <td align="right" style="padding-right: 40px;">
		                                        <h4 style="font-size: 21px; font-weight: 700; margin-bottom: 0; font-family:'Raleway'; color: #020202">Contacts</h4>
		                                        <p style="color:#000;">Località Pasina 46 <br>
		                                            38066 Riva del Garda (TN) <br>
		                                            IT01764100226</p>
		                                        </td> 
		                                    <td></td>     
		                                </tr>
		                                <tr bgcolor="#ffffff" height="85px" width="100%">
		                                    <td style="border-top:3px solid #020202;"></td>
		                                    
		                                    <td style="border-top:3px solid #020202; color: #000;">
		                                        <table>
		                                            <tbody>
		                                              <tr style="list-style: none;">
		                                                <td style="padding-left: 42px;" width="74px">Follow us:</td>    
		                                                <td><a href="https://www.linkedin.com/company/web-holder?trk=mini-profile"><img width="32" src="https://gallery.mailchimp.com/a07a1c5a03ea6c2d738ec5edd/images/57b1a846-65f8-4966-b6df-b59835c09c0c.png" alt="facebook"></a></td>
		                                                <td></td>
		                                                <td></td>
		                                                <td></td>
		                                                <td></td>
		                                            </tr>  
		                                        </tbody>
		                                        </table>
		                                        
		                                    </td>
		                                    <td></td>
		                                    <td align="right" style="color:#000; border-top:3px solid #020202; padding-right: 42px">
		                                        All rights reserved
		                                    </td>
		                                    <td></td>
		                                </tr> 
		                                
		                            </tbody>
		                        </table>
		                    </td>
		                    
		                </tr>

		            </tbody>

		        </table>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
