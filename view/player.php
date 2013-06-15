<?php


/**
* This is the captcha implementatin 
*
* This is to to prevent bot to register
*
* LICENSE: Some license information
*
* @category   Zend
* @package    Zend_Magic
* @subpackage Wand
* @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
* @license    http://framework.zend.com/license   BSD License
* @version    $Id:$
* @link       http://framework.zend.com/package/PackageName
* @since      File available since Release 1.5.0
*/





?>

<html>
		<head>
				
				<script type="text/javascript" src="<?php echo SITE_PATH;?>js/jquery.js"></script>
                <link href="<?php echo SITE_PATH;?>css/style_element.css" rel="stylesheet" type="text/css" />
                               
		</head>
		<body id="captcha_body" >
				
				
				
				<div class="background">
				<div class="transbox">
						<form name='f1'>  
						<p><center>
							<table><tr><th><h1><?php echo WELCOME;?></h1></th></tr>
							       <tr><td></td></tr>
							       <tr><td><?php echo ENTER_NAME;?></td>
							           <td ><input  size="20" id ="name" type="text" name="name"/></td>
							       </tr>
							        <tr><td><?php echo ENTER_EMAIL;?></td>
							           <td ><input  size="20" id ="email" type="text" name="email"/></td>
							       </tr>
							       <tr><td><input type="button" id ="sub" name="sub" value="submit"/><input type="reset" value="reset"/></td></tr>
								
							</table>
						   </center>
						   
						   <center>
						       <span id='spanClickToPlay'><h2> <a href="index.php?controller=loginController&function=playGameRule"> <?php echo CLICK_BELOW;?></a></h2></span>
						   </center>
										
						</p>
						</form>
				</div>
				</div>
		</body>
		
	<script>
		$(document).ready(function() {
			$("#spanClickToPlay").hide();
		    $("#sub").click(function() {
				name= $("#name").val();
				email= $("#email").val();
				alert(name);
				alert(email);
				
				
			$.ajax({
			          type: "POST",
			          url: 'index.php?controller=loginController&function=saveUser',
					  data: "name="+name+"&email="+email,
			          success: function(result) {
						  $("#spanClickToPlay").show('slow');
						  $("#span_back").hide();
						  alert(result);
						  }
				
			
			
		    });
		});
		});
	</script>
	<center><span id='span_back'><h2><a href="index.php?controller=indexMainPageController" ><?php echo SIGNUP_BACK;?></a></h2></span></center>
		
</html>


