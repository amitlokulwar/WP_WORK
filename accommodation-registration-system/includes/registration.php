   <?php ob_start();
   
   
   if(isset($_REQUEST['action']))
    {
       
        global $wpdb,$user_id,$wp_roles;
        if($_REQUEST['action']=='submitform')
        {
             
        $id=  base64_decode($_REQUEST['id']);
        
        echo "<hr/>";
         $tableName = $wpdb->prefix . 'registration'; 
//        $tableName='registration';
         $sql = "SELECT priceForPlan,membership,first_name2,username,first_name,
             last_name,gender,BirthMonth,BirthDay,BirthYear,country,state,city,mobile,
             phone,email,password,altmail,question1,a1,question2,a2  FROM ".$tableName." WHERE id='".$id."' ";
        
          $allTerms = $wpdb->get_results($sql); 
         
//          print_r($allTerms);
          
          
           $user_data = array(
                    'ID' => '',
                    'user_pass' => $allTerms[0]->password,
                    'user_login' => $allTerms[0]->username,
                    'user_nicename' => $allTerms[0]->username,
                   'user_email' => $allTerms[0]->email,
                  'display_name' => $allTerms[0]->username,
                  'nickname' => $allTerms[0]->username
                  );
                   $email = $user_data['user_email'];
                  $username = $user_data['user_login'];
                 $password = $user_data['user_pass'];
                 
                
           
                     $uid = wp_create_user($username,$password,$email);


                     
                    if( $allTerms[0]->membership=='1')
                     {
                        
                       add_role('cheerleader', 'Cheerleader', array('read'  => true) );
                       $user_id_role = new WP_User($uid);
                       $user_id_role->set_role('cheerleader'); 
                      
                     }
                    elseif( $allTerms[0]->membership=='2')
                    {
                        
                        add_role( 'coach', 'Coach', array('read'  => true) );
                        $user_id_role = new WP_User($uid);
                       $user_id_role->set_role('coach'); 
                      
                    }                    
                    elseif( $allTerms[0]->membership=='3')
                    {
                        
                        add_role( 'clubmember', 'Club Member', array('read'  => true) );
                        $user_id_role = new WP_User($uid);
                       $user_id_role->set_role('clubmember'); 
                      
                    }
//                    elseif( $allTerms[0]->membership=='4')
//                    {
//                        
//                        add_role( 'host', 'Host', array('read'  => true) );
//                        $user_id_role = new WP_User($uid);
//                       $user_id_role->set_role('host'); 
//                      
//                    }
                     
                     $birthdate=implode('/' ,array($allTerms[0]->BirthDay,$allTerms[0]->BirthMonth,$allTerms[0]->BirthYear));

                    update_user_meta($uid,'membrole', $allTerms[0]->membership);
                    update_user_meta($uid,'membprice', $allTerms[0]->priceForPlan);
                    update_user_meta($uid,'first_name', $allTerms[0]->first_name);
                    update_user_meta($uid,'last_name', $allTerms[0]->last_name);
                    update_user_meta($uid,'business_name',$allTerms[0]->first_name2);
                    update_user_meta($uid,'gender', $allTerms[0]->gender);
                    update_user_meta($uid,'birthdate',$birthdate);
                    update_user_meta($uid,'country',$allTerms[0]->country);
                    update_user_meta($uid,'state',$allTerms[0]->state);
                    update_user_meta($uid,'city',$allTerms[0]->city);
                    update_user_meta($uid,'mobile',$allTerms[0]->mobile);
                    update_user_meta($uid,'phone',$allTerms[0]->phone);
                    update_user_meta($uid,'altemail',$allTerms[0]->altmail);
                    update_user_meta($uid,'questionone',$allTerms[0]->question1);
                    update_user_meta($uid,'ansone',$allTerms[0]->a1);
                    update_user_meta($uid,'questiontwo',$allTerms[0]->question2);
                    update_user_meta($uid,'anstwo',$allTerms[0]->a2);
                  
           
 
                    
                    
                    $to = $email;
                     $from = get_option('Email Set');
                     $subject = "Your login information";
                     $message = "Thank you for registration on Your Cheer World";
                     $headers = "From: Admin <amit@moderni.in>\r\n" . "Email address: $email\r\n " . "Username: $username\r\n" ."Password: $password\r\n";
//                     echo $email.$subject.$message.$headers;
// 
//                 die();
                     add_filter('wp_mail_content_type',create_function('', 'return "text/plain";'));

                     wp_mail( $to, $subject, $message, $headers);
                     
          
                    
                    
                   $credentials['user_login'] = $username;
                   $credentials['user_password'] = $password;
                   $credentials['remember'] = TRUE;
                   $user = wp_signon( $credentials, false );
                    
                    if ( is_wp_error( $user ) ) {

                        $error = $user->get_error_message();
                      } 
                      else {
                          
                            wp_set_current_user( $uid, $username );
                            do_action('set_current_user');


                            mysql_query("DELETE FROM $tableName WHERE id='$id'");
                            wp_safe_redirect( home_url().'/profile',301);
                           }
        }
        
    }








?>
<?php 
add_shortcode('ExpRegister','expCustomer_Registration');

function expCustomer_Registration()
{ 
    
   

     if (!is_user_logged_in() )

    {

    ?>
<div id="container">
    <div id="paypalForm">
        
    </div>
<div id="content" class="register_form">
    <input type="hidden" value="<?php echo site_url()?>" class="site">
<?php if(get_option('users_can_register')) { 
//Check whether user registration is enabled by the administrator ?>

<h1><?php the_title(); ?></h1>
<h2>Account Information</h2>

<div class="hr"></div>
<div id="result"></div> <!-- To hold validation results -->
<form class="registerForm1" action="" method="post">
  <div class="marginT15">
I am registering for<span>*</span>
       
            <select class="membership selectOpt" name="membership">
                <option name="cheerleader" value="0" >----Select----</option>
                <option name="cheerleader" value="1">Gold</option>
                <option name="coach" value="2">Silver</option>
                <option name="club" value="3">Free</option>
<!--                <option name="acomprovider" value="4">Become a Host Family?</option>-->
            </select>
       
        <?php ?>
        
            <input type="text" class="priceForPlan" name="priceForPlan"  value="" readonly="readonly"/>
        <
        <?php ?>
  </div>
 
    <div class="marginT15">
<label>
        <div align="left">Enter your Email<span>*</span> </div>
      </label>
      <input name="email" type="text" class="text email emailInput" value="" size="30" /> 
          <!--<input name="checkID" type="button" id="check" value="Check" onclick="return checkid()"/> </td>-->
          <div class="clear"></div>
   <label>
      <div align="left">Confirm your Email<span>*</span> </div>
      </label>
   <input name="email2" type="text" class="text emailInput" id="email2" value="" size="30" /><span class="err1"></span>
    </div>
   
<div class="marginT15">
<label>
        <div align="left">Enter your Password<span>*</span></div>
        </label>
      <input name="password" type="password" class="text txtName" id="password" value="" size="30" />
</div>
<div class="marginT15">
 <label>
      <div align="left">Confirm your Password<span>*</span> </div>
      </label>
      <input name="password2" type="password" class="text txtName" id="password2" value="" size="30" /><span class="err2"></span>
</div>


         <h3>Personal Informaion</h3>
   
  <div class="marginT15"> <label>
        <div align="left">Name</div>
      </label>
      <input name="first_name" type="text" class="text txtName" id="first_name" value="" size="30" placeholder="First Name" /> 
          <input name="last_name" type="text" class="text txtName" id="last_name" value="" size="30" placeholder="Last Name" />
        </div>
   
    
    <!-- Business Name<span>*</span> </td>
      <td ><input name="first_name2" type="text" class="text" id="first_name2" value="" size="30" placeholder="Business Name" /></td>
    </tr> 
    <tr>
      <td height="30">User Name<span>*</span> </td>
      <td ><input name="username" type="text" class="text" id="username" value="" size="30" placeholder="User Name" /></td>
    </tr>-->
    <div class="marginT15">
Gender
        <input class="gender" name="gender" type="radio" value="Male" id="checkbox" />Male<input class="gender" id="checkbox"  name="gender" type="radio" value="Female" />Female</td>
 
    </div>
       <div class="marginT15">
    Birthday
        <!--<td><input name="birthdate" type="text" id="birthdate" placeholder="Birthdate" /></td>-->
        
        
      
            <select name="BirthMonth" id="BirthMonth" class="selectOpt">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <select name="BirthDay" id="BirthDay">
            <?php
                for ($i=1; $i<=31; $i++)
                {
                    echo "<option value='$i'>$i</option>";
                }
            ?>
            </select>
            <select name="BirthYear" id="BirthYear">
            <?php
                for ($i=2011; $i>=1900; $i=$i-1)
                {
                    echo "<option value='$i'>$i</option>";
                }
            ?>
            </select>
       </div>
       <div class="marginT15">
Country<span>*</span>
       
            <select name="country" id="country" style="width: 214px" class="selectOpt">
                        <option value="" selected="selected">----Select Country----</option>
                        <?php global $wpdb; $myrows = $wpdb->get_results( "SELECT * FROM country");?>
                        <?php foreach( $myrows as $row ):?>
                        <option value="<?php echo $row->id ?>"><?php echo $row->name?></option>
                        <?php endforeach;?>
                </select><br />
                </div> 
                 <div class="marginT15">
                                 <select name="state" id="state" style="width: 214px" class="selectOpt">
                        <option value="" selected="selected">-----Select State------</option>
                        <?php global $wpdb; $myrows = $wpdb->get_results( "SELECT * FROM state");
                       
                        ?>
                        <?php foreach( $myrows as $row ):?>
                        <option value="<?php echo $row->id ?>"><?php echo $row->name?></option>
                        <?php endforeach;?>
                </select><br />
                </div>

                 <div class="marginT15">
                <select name="city" id="city" style="width: 214px" class="selectOpt">
                        <option value="" selected="selected">----Select Suburb----</option>
                </select>
                </div>
                
      <div class="marginT15">
      Mobile<input name="mobile" type="text" class="text txtName" id="mobile" value="" size="30"  />
      Phone<input name="phone" type="text" class="text txtName" id="phone" value="" size="30" />
     </div>
      <div class="hr"></div>
   <!--  <h6>In case you forgot your ID or Password</h6>
   <div class="hr"></div>-->
   <!-- </td>
    </tr>
    <tr>
      <td>Alternate Email</td>
      <td><input name="altmail" type="text" id="altmail" size="53" /></td>
    </tr>
    <tr>
      <td>Secret Question 1 </td>
      <td><select name="question1" class="none" id="question1">
              <option value="" selected="selected">- Select One -</option>
              <option value="What town was your father born in?" >What town was your father born in?</option>
              <option value="What is the last name of your closest childhood friend?" >What is the last name of your closest childhood friend?</option>
              <option value="What was the name of your primary school?" >What was the name of your primary school?</option>
              <option value="What is the name of the street on which you grew up?" >What is the name of the street on which you grew up?</option>
              <option value="What was the name of your first pet?" >What was the name of your first pet?</option>
              <option value="What town was your mother born in?" >What town was your mother born in?</option>
            </select></td>
    </tr>
    <tr>
      <td>Your Answer</td>
      <td><input name="a1" type="text" id="a1" size="53" /></td>
    </tr>
    <tr>
      <td>Secret Question 2 </td>
      <td><select name="question2" class="none" id="question2">
              <option value="" selected="selected" >- Select One -</option>
              <option value="What was your favourite childhood cartoon?" >What was your favourite childhood cartoon?</option>
              <option value="What was your favourite food as a child?" >What was your favourite food as a child?</option>
              <option value="Who is your favourite author?" >Who is your favourite author?</option>
              <option value="What is the name of your all-time favorite sports team?" >What is the name of your all-time favorite sports team?</option>
              <option value="What is the title of your favorite book?" >What is the title of your favorite book?</option>
            </select></td>
    </tr>
    <tr>
      <td>Your Answer </td>
      <td><input name="a2" type="text" id="a2" size="53" /></td>
    </tr>

    <tr>
      <td> -->
         <div class="marginT15">
        <b class="toc" style="text-trasform:uppercase">Terms of use and privacy policy</b><span>*</span> 
        <label>
              <input type="checkbox" name="tnc" value="1" id="tnc"/>
      I agree to the terms  and conditions of this site</label><span class="war"></span>
      
</div>
       <div class="marginT15">
        <label>
              <input type="checkbox" name="tnc" value="1" id="tnc"/>
      By clicking "Register" button we consider that we have read and agree to privacy policy and Terms Of Condition</label><span class="war"></span>
    </div><div align="left"></div>
     <div class="marginT15">
          <input type="submit" id="submitbtn" name="submit" value="Create an Account"/>
          <!--<input type="hidden" name="task" value="register" />-->
     </div>
</form>


<?php } else echo "Registration is currently disabled. Please try again later."; ?>
</div>
</div>
<?php }else {wp_redirect( home_url(), 301 ); exit;
}
}