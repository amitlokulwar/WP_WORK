<?php 
add_action('wp_ajax_nopriv_getstate', 'getStates');
add_action('wp_ajax_getstate', 'getStates');
add_action('wp_ajax_nopriv_getcity', 'getCity');
add_action('wp_ajax_getcity', 'getCity');
add_action('wp_ajax_nopriv_checkUsername', 'checkUsername');
add_action('wp_ajax_checkUsername','checkUsername');
add_action('wp_ajax_nopriv_checkEmailid', 'checkEmailid');
add_action('wp_ajax_checkEmailid','checkEmailid');
add_action('wp_ajax_nopriv_paypalForm', 'paypalForm');
add_action('wp_ajax_paypalForm','paypalForm');


function paypalForm()
{
    
         $username = $_POST['user'];
         
         $chkemail = $_POST['email'];
          global $wpdb;
    
    
        if (!is_user_logged_in() )
        {
             if ( username_exists( $username )){
             echo "<div class='errshow'><h6 class='errmsg'>Username Already Exist !!!</h6></div>";
             
         }
          else{

             if(!empty($_POST['user']) || !email_exists($chkemail))
             {   $temp=array();
                 //print_r($_POST['formfields']);
               
                 foreach ($_POST['formfields'] as $value) {
                     
                     
                     $temp [ $value['name'] ] = $value['value'];
                     if($value['name']=='membership' )
                     {
                         $member=$value['value'];
                     }
                     if($value['name']=='first_name' )
                     {
                         $fname=$value['value'];
                     }
                     if($value['name']=='last_name' )
                     {
                         $lname=$value['value'];
                     }
                     if($value['name']=='phone' )
                     {
                         $phone=$value['value'];
                     }
                     if($value['name']=='email' )
                     {
                         $email=$value['value'];
                     }
                     if($value['name']=='mobile' )
                     {
                         $mobile=$value['value'];
                     }
                     if($value['name']=='priceForPlan' )
                     {
                            if($value['value'] !='Nill')
                            {
                                $pricestring=$value['value'];
                                $price= explode(' ', $pricestring);
                                $amt=  explode('$', $price[0]);
                            }
                         
                     }
                    
                     
                 }
 
                     
                 
        $tableName = $wpdb->prefix . 'registration';    
                 $wpdb->insert($tableName,$temp); 
                 $dataID = mysql_insert_id();
                 echo $dataID;
                 
           
              
       /*    $output .= '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="frmpaypal" class="paypal" id="submitinfo">';
           $output .= "<input type='hidden' name='return' value=".site_url()."/profile?action=submitform&id=".base64_encode($dataID).">";
           $output .= '<input type="hidden" name="cancel_return" value='.site_url().'/get-register>';
           $output .= '<input type="hidden" name="cmd" value=_xclick>';
           $output .= '<input type="hidden" name="business" value="amit_1343634077_biz@moderni.in"/>';
           if($member==1)
           $output .= '<input type="hidden" name="item_name" value="Cheerleader">';
           if($member==2)
           $output .= '<input type="hidden" name="item_name" value="Coach">';
           if($member==3)
           $output .= '<input type="hidden" name="item_name" value="Club Member">';
           $output .= '<input type="hidden" name="order_number" value="">';
           $output .= '<input type="hidden" name="item_number" value="'.$member.'">';
           $output .= '<input type="hidden" name="amount" class="amount" value="'.$amt[1].'">';
           $output .= '<input type="hidden" name="no_shipping" value="0">';
           $output .= '<input type="hidden" name="no_note" value="1">';
           $output .= '<input type="hidden" name="bn" value="PP-BuyNowBF"/>';
           $output .= '<input type="hidden" name="site" class="site" value=>';
           $output .= '<input type="hidden" name="site" id="item_no" value='.'>';
           $output .= '<input type="hidden" name="first_name" value="'.$fname.'">';
           $output .= '<input type="hidden" name="last_name" value="'.$lname.'">';  
           $output .= '<input type="hidden" name="H_PhoneNumber" value="'.$phone.'">';
           $output .= '<input type="hidden" name="email" class="email" value="'.$email.'">';
           $output .= '<input type="hidden" name="phn" class="phn" value="'.$mobile.'">';
           $output .= '</form>';
           echo $output;     */
          
           
           
                 
             }
             
             
          }
    
        }
        die();
}



function getStates(){
    global $wpdb;

echo '<option value="" selected="selected">-----Select State------</option>';
     $myrows = $wpdb->get_results( "SELECT * FROM state WHERE country_id = $_POST[country]");
     foreach( $myrows as $row ):
    echo '<option value="';
        echo $row->id.'">';
         echo $row->name.'</option>';
     endforeach;
    die();
}


function getCity(){
    global $wpdb;
    
    echo '<option value="" selected="selected">----Select Suburb----</option>';
     $myrows = $wpdb->get_results( "SELECT * FROM city WHERE state_id = $_POST[state]");
     foreach( $myrows as $row ):
    echo '<option value="';
     echo $row->id.'">';
     echo $row->name.'</option>';
     endforeach;
    die();
}
   



function checkUsername(){
    if(username_exists($_POST['username'])){
        echo '0';
    }else {echo '1';}
    die();
}

    


function checkEmailid(){
    
    if(email_exists($_POST['useremail'])){
        echo '0';
    }else {echo '1';}
    die();
    
}


?>