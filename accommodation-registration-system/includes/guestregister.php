<?php ob_start();
add_shortcode('guestregister','guestRegister');

function guestRegister()
{
    global $user_ID,$wpdb;
      $guesttable= $wpdb->prefix . 'guestreg';
    
    if(isset($_REQUEST['guestReg']))
        {
                 $Insertdata = array(
                     'id'=>'',
                     'guestid'=>$user_ID,
                     'country'=>$_POST['country'],
                     'state'=>$_POST['state'],
                     'city'=>$_POST['city'],
                     'arrival'=>$_POST['arrivalDate'],
                     'departure'=>$_POST['departureDate'],
                     'ppl'=>$_POST['pplCount'],
                     'price'=>$_POST['priceNt'],
                );
            $wpdb->insert( $guesttable, $Insertdata);
            wp_redirect(home_url('/homestay-accommodation'),301);
        
        }
    

    if(is_user_logged_in()){
//form-----    
        if(get_user_meta($user_ID,'membrole',TRUE)=='1' || get_user_meta($user_ID,'membrole',TRUE)=='2' || get_user_meta($user_ID,'membrole',TRUE)=='3' )
        {
    ?>
    
<div id="guestReg">
     <input type="hidden" value="<?php echo site_url()?>" class="site">
    <form id="guestRegForm" method="post">
       
        <div class="formItem">
                    <div class="fieldLabel">
                        <label >Destination<span>*</span></label>
                    </div>
               <div class="field">
                         <select name="country" id="country" style="width: 214px">
                        <option value="" selected="selected">----Select Country----</option>
                        <?php global $wpdb; $myrows = $wpdb->get_results( "SELECT * FROM country");?>
                        <?php foreach( $myrows as $row ):?>
                        <option value="<?php echo $row->id ?>"><?php echo $row->name?></option>
                        <?php endforeach;?>
                </select><br />
                <select name="state" id="state" style="width: 214px">
                        <option value="" selected="selected">-----Select State------</option>
                        <?php global $wpdb; $myrows = $wpdb->get_results( "SELECT * FROM state");
                       
                        ?>
                        <?php foreach( $myrows as $row ):?>
                        <option value="<?php echo $row->id ?>"><?php echo $row->name?></option>
                        <?php endforeach;?>
                </select><br />
                <select name="city" id="city" style="width: 214px">
                        <option value="" selected="selected">----Select Suburb----</option>
                </select>
                </div>
            </div>
        <div class="formItem">
                    <div class="fieldLabel">
                        <label >Dates(Arrival)<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="arrivalDate" class="arrivalDate" />
                    </div>
                </div>
        <div class="formItem">
                    <div class="fieldLabel">
                        <label >Dates(Departure)<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="departureDate" class="departureDate" />
                    </div>
                </div>
        
        <div class="formItem">
                    <div class="fieldLabel">
                        <label >People<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="pplCount" class="pplCount" />(Only Numbers)
                    </div>
                </div>
        <div class="formItem">
                    <div class="fieldLabel">
                        <label >Price per Night per Person(In $)<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="priceNt" class="priceNt" />(Only Numbers)
                    </div>
                </div>
        <div class="formItem">
                    <div class="fieldLabel">
                        <label >Short Description about you<span>*</span></label>
                    </div>
                    <div class="field">
                        <textarea name="shortDes" class="shortDes"></textarea>
                    </div>
                </div>
        <input type="submit" name="guestReg" class="guestReg" value="Register"/>
    </form>
</div>    
    
    
    
<?php
    }}
}
?>