<?php 
add_shortcode('myProfile','expcustomer_profile');

function expcustomer_profile(){
global $wpdb,$user_ID;
if(is_user_logged_in() ) {
  
$path=wp_upload_dir();


    global $current_user;
    get_currentuserinfo();
    $cid = $current_user->ID;
    
if(isset($_POST['Update']))
{
    $uid=$user_ID;

    $user_data = array(
                    'ID' => $uid,
//                    'user_pass' => $allTerms[0]->password,
//                    'user_login' => $allTerms[0]->username,
//                    'user_nicename' => $allTerms[0]->username,
                   'user_email' => $_REQUEST['email'],
//                  'display_name' => $allTerms[0]->username,
//                  'nickname' => $allTerms[0]->username
                  );
//                   $email = $user_data['user_email'];
//                  $username = $user_data['user_login'];
//                 $password = $user_data['user_pass'];
                 
                
           
                     wp_update_user($user_data);

    
    $allowedExts = array("gif", "jpeg", "jpg", "png","mp4","mkv","avi","mpeg","3gp", "mpg","MPEG1","wmv");
    
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] == "video/mp4")
|| ($_FILES["file"]["type"] == "video/mkv")
|| ($_FILES["file"]["type"] == "video/avi")
|| ($_FILES["file"]["type"] == "video/mpeg")
|| ($_FILES["file"]["type"] == "video/3gp")
|| ($_FILES["file"]["type"] == "video/mpg")
|| ($_FILES["file"]["type"] == "video/wmv")
|| ($_FILES["file"]["type"] == "video/MPEG1"))
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {

      move_uploaded_file($_FILES["file"]["tmp_name"],
     $path['basedir'].'/photo/' . $_FILES["file"]["name"]);

    }
         update_user_meta($uid,'media',$_FILES["file"]["name"]);
  }

                     update_user_meta($uid,'first_name', $_POST['first_name']);
                     update_user_meta($uid,'last_name', $_POST['last_name']);
                     update_user_meta($uid,'business_name', $_POST['first_name2']);
                     update_user_meta($uid,'gender', $_POST['gender']);
                     update_user_meta($uid,'birthdate',$_POST['birthdate']);
                     update_user_meta($uid,'country',$_POST['country']);
                     update_user_meta($uid,'state',$_POST['state']);
                     update_user_meta($uid,'city',$_POST['city']);
                     update_user_meta($uid,'mobile',$_POST['mobile']);
                     update_user_meta($uid,'phone',$_POST['phone']);
                     update_user_meta($uid,'altemail',$_POST['altmail']);
                     update_user_meta($uid,'questionone',$_POST['question1']);
                     update_user_meta($uid,'ansone',$_POST['a1']);
                     update_user_meta($uid,'questiontwo',$_POST['question2']);
                     update_user_meta($uid,'anstwo',$_POST['a2']);
                
                     
                     
                   
}
    

?>
    
    
<div id="container">
<div id="content">
<input type="hidden" value="<?php echo site_url()?>" class="site"> 
<!--<div id="myElem" ><h2>Thank you For registering on Yourcheerworld!!</h2></div>-->

<div class="hr"></div>
<div id="result"></div>
<form class="registerForm" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $current_user->ID;?>" name="userid">
  <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php if(get_user_meta($cid,'media',true)) {?>
    <tr>
        
      <td>Image Preview</td>
      <td><img width="100" height="100" src="<?php echo site_url().'/wp-content/uploads/photo/'.get_user_meta($cid,'media',true); ?>" />
      <input type="file" name="file" />
      </td>
    </tr>
<?php } else {?>
    <tr>
        <td height="30">Upload Image</td>
        <td>
            <img  id="blah" src="#"width="100" height="100"  />
      <input type="file" name="file" onchange="readURL(this);"/>
            <!--<input type="file" name="file" class=""/>-->
        </td>
    </tr>
    <?php }?>
   <!--  <tr>
      <td height="30">Business Name </td>
      <td ><input name="first_name2" type="text" class="text" id="first_name2" size="30" value="<?php echo get_user_meta($cid,'business_name',true); ?>"/></td>
    </tr>
    <tr> -->
       <div class="marginT15">
      User Name 
      <input name="username" type="text" class="text" id="username" size="30" value="<?php echo $current_user->data->user_login ?>" readonly=""/><span>Username Can not be edited </span></td>
    <label></div>
       <div class="marginT15">
        <div align="left">Name</div>
      </label>
          <input name="first_name" type="text" class="text" id="first_name"  size="30" value="<?php echo get_user_meta($cid,'first_name',true)?>" /> 
          <input name="last_name" type="text" class="text" id="last_name" size="30" value="<?php echo get_user_meta($cid,'last_name',true)?>" /></td>
      <?php if(get_user_meta($cid,'last_name',true)=='Male'):?>   
          <label>
              <input name="gender" type="radio" value="Male"  checked=""/>Male 
          <input name="gender" type="radio" value="Female" />Female</label>
      <?php else:?>
           <label>
          <input name="gender" type="radio" value="Male" />Male 
          <input name="gender" type="radio" value="Female"  checked=""/>Female</label>
          
      <?php endif;?>
     </div><div class="marginT15">Gender
       <div class="marginT15"></div>Birthday
      <input name="birthdate" type="text" id="birthdate" value="<?php echo get_user_meta($cid,'birthdate',true)?>" /></td>
    
     </div><div class="marginT15">Country
          <input type="hidden" id="selstate" value="<?php echo get_user_meta($cid,'state',true)?>">
          <input type="hidden" id="selcity" value="<?php echo get_user_meta($cid,'city',true)?>">
            
          
                <select name="country" id="country" style="width: 214px">
                        <option value="" selected="selected">----Select Country----</option>
                        <?php global $wpdb; $myrows = $wpdb->get_results( "SELECT * FROM country");?>
                        <?php foreach( $myrows as $row ):?>
                        <?php if(get_user_meta($cid,'country',true)==$row->id):?>
                        <option value="<?php echo $row->id ?>" selected="selected"><?php echo $row->name?></option>
                        <?php else:?>
                        <option value="<?php echo $row->id ?>" ><?php echo $row->name?></option>
                        <?php endif;?>
                        <?php endforeach;?>
                </select><br />
                </div> <div class="marginT15">
                
                <select name="state" id="state" style="width: 214px">
                        <option value="" selected="selected">-----Select State------</option>
                        <?php global $wpdb; $myrows1 = $wpdb->get_results( "SELECT * FROM state where country_id=".get_user_meta($cid,'country',true));?>
                        <?php foreach( $myrows1 as $row ):?>
                        <?php if(get_user_meta($cid,'state',true)==$row->id):?>
                        <option value="<?php echo $row->id ?>" selected="selected"><?php echo $row->name?></option>
                        <?php else:?>
                        <option value="<?php echo $row->id ?>" ><?php echo $row->name?></option>
                        <?php endif;?>
                        <?php endforeach;?>
                        
                       
                        
                </select><br />
               </div> <div class="marginT15">
                <select name="city" id="city" style="width: 214px">
                        <option value="" selected="selected">----Select Suburb----</option>
                        <?php global $wpdb; $myrows1 = $wpdb->get_results( "SELECT * FROM city where state_id=".get_user_meta($cid,'state',true));?>
                        <?php foreach( $myrows1 as $row ):?>
                        <?php if(get_user_meta($cid,'city',true)==$row->id):?>
                        <option value="<?php echo $row->id ?>" selected="selected"><?php echo $row->name?></option>
                        <?php else:?>
                        <option value="<?php echo $row->id ?>" ><?php echo $row->name?></option>
                        <?php endif;?>
                        <?php endforeach;?>
                </select></div>
 <div class="marginT15"> Mobile
 <input name="mobile" type="text" class="text" id="mobile" value="<?php echo get_user_meta($cid,'mobile',true) ?>" size="30"  /></td>
    </div><div class="marginT15">Phone
   <input name="phone" type="text" class="text" id="phone" value="<?php echo get_user_meta($cid,'phone',true) ?>" size="30" /></td>
    </div><div class="marginT15"> Email
        <input name="email" type="text" id="email" size="53" value="<?php echo $current_user->data->user_email ?>" />
    <!-- Alternate Email</td>
      <td><input name="altmail" type="text" id="altmail" value="<?php echo get_user_meta($cid,'altemail',true) ?>" size="53" /></td>
    </tr>
    <tr>
      <td>Secret Question 1 </td>
      <td><select name="question1" class="none" id="question1">
              <option value="" selected="selected">- Select One -</option>
              
                  <?php if(get_user_meta($cid,'questionone',true)=='What town was your father born in?'):?>
              <option value="What town was your father born in?" selected="">What town was your father born in?</option>
              <?php else: ?>
              <option value="What town was your father born in?" >What town was your father born in?</option>
               <?php endif;?>
              
              
              <?php if(get_user_meta($cid,'questionone',true)=='What is the last name of your closest childhood friend?'):?>
              <option value="What is the last name of your closest childhood friend?" selected="">What is the last name of your closest childhood friend?</option>
              <?php else:?>
              <option value="What is the last name of your closest childhood friend?" >What is the last name of your closest childhood friend?</option>
              <?php endif;?>
              
              <?php if(get_user_meta($cid,'questionone',true)=='What was the name of your primary school?'):?>
              <option value="What was the name of your primary school?" selected="">What was the name of your primary school?</option>
              <?php else:?>
              <option value="What was the name of your primary school?">What was the name of your primary school?</option>
              <?php endif;?>
              <?php if(get_user_meta($cid,'questionone',true)=='What is the name of the street on which you grew up?'):?>
              <option value="What is the name of the street on which you grew up?" selected="" >What is the name of the street on which you grew up?</option>
              <?php else:?>
                            <option value="What is the name of the street on which you grew up?" >What is the name of the street on which you grew up?</option>
              <?php endif;?>
              <?php if(get_user_meta($cid,'questionone',true)=='What was the name of your first pet?'):?>
              <option value="What was the name of your first pet?" selected="">What was the name of your first pet?</option>
              <?php else:?>
                <option value="What was the name of your first pet?" >What was the name of your first pet?</option>
              <?php endif;?>
              <?php if(get_user_meta($cid,'questionone',true)=='What town was your mother born in?'):?>
              <option value="What town was your mother born in?" selected="">What town was your mother born in?</option>
              <?php else:?>
              <option value="What town was your mother born in?" >What town was your mother born in?</option>
              <?php endif;?>
            </select>
      </td>
    </tr>
    <tr>
      <td>Your Answer</td>
      <td><input name="a1" type="text" id="a1" size="53" value="<?php echo get_user_meta($cid,'ansone',true) ?>" /></td>
    </tr>
    <tr>
      <td>Secret Question 2 </td>
      <td><select name="question2" class="none" id="question2">
              <option value="" selected="selected" >- Select One -</option>
              
              <?php if(get_user_meta($cid,'questiontwo',true)=='What was your favourite childhood cartoon?'):?>
              <option value="What was your favourite childhood cartoon?" selected="">What was your favourite childhood cartoon?</option>
              <?php else:?>
              <option value="What was your favourite childhood cartoon?" >What was your favourite childhood cartoon?</option>
              <?php endif;?>
              <?php if(get_user_meta($cid,'questiontwo',true)=='What was your favourite food as a child?'):?>
              <option value="What was your favourite food as a child?" selected="">What was your favourite food as a child?</option>
              <?php else:?>
              <option value="What was your favourite food as a child?" >What was your favourite food as a child?</option>
              <?php endif;?>
              
              <?php if(get_user_meta($cid,'questiontwo',true)== 'Who is your favourite author?'):?>
              <option value="Who is your favourite author?" selected="">Who is your favourite author?</option>
              <?php else:?>
              <option value="Who is your favourite author?" >Who is your favourite author?</option>
              <?php endif;?>
              
              <?php if(get_user_meta($cid,'questiontwo',true)== 'What is the name of your all-time favorite sports team?'):?>
              <option value="What is the name of your all-time favorite sports team?" selected="">What is the name of your all-time favorite sports team?</option>
              <?php else:?>
              <option value="What is the name of your all-time favorite sports team?" >What is the name of your all-time favorite sports team?</option>
              <?php endif;?>
              
              <?php if(get_user_meta($cid,'questiontwo',true)== 'What is the title of your favorite book?'):?>
              <option value="What is the title of your favorite book?" selected="">What is the title of your favorite book?</option>
              <?php else:?>
              <option value="What is the title of your favorite book?" >What is the title of your favorite book?</option>
              <?php endif;?>
              
            </select></td>
    </tr>
    <tr>
      <td>Your Answer </td>
      <td><input name="a2" type="text" id="a2" size="53" value="<?php echo get_user_meta($cid,'anstwo',true) ?>"/></td>
    </tr>

    <tr> --></div>
      
        <div align="left"></div>
      
     
          <input type="submit" id="submitbtn123" name="Update" value="Update" />
          <!--<input type="hidden" name="taskUpdate" value="update" />-->
      
</form>
</div>
</div>
<?php }
    else{
        wp_redirect( home_url() , 301 ); exit;
        
    }
?>
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                jQuery('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(135);
            };

            reader.readAsDataURL(input.files[0]);
            
        }
    }
    </script>
<?php
}


