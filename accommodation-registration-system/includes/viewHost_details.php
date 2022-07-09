<?php ob_start();
add_shortcode('hostDetails', 'hostDetails');
//booking section                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
function hostDetails()
{
    $id=  base64_decode($_REQUEST['id']);
    $path=wp_upload_dir();
    
     global $wpdb,$user_ID;
    echo '<div class="hostDetails">';
    echo '<div class="pic"><img height="150" width="150" src="'.$path['baseurl'].'/photo/'.get_user_meta($id,'profile',TRUE).'"/></div>';
    echo '<div class="otherDetails">';
    echo '<span class="hostN"><h3>Host Name : '.get_user_meta($id,'first_name',TRUE).' '.get_user_meta($id,'last_name',TRUE).'</h3></span>';    
   
      $sql= "SELECT `name` from `city` where id=".get_user_meta($id,'city',TRUE);
      $cityarr=$wpdb->get_results($sql);
      
      $sqlstate= "SELECT `name` from `state` where id=".get_user_meta($id,'state',TRUE);
      $statearr=$wpdb->get_results($sqlstate);
      
      $sqlcountry= "SELECT `name` from `country` where id=".get_user_meta($id,'country',TRUE);
      $countryarr=$wpdb->get_results($sqlcountry);
    echo '<span class="hostN"><h3>Location : '.$cityarr[0]->name.','.$statearr[0]->name.','.$countryarr[0]->name.'</h3></span>';    
    
    echo '</div>';
    echo '<div class="priceShort">';
    echo '<ul>';
    echo '<li>';
    echo '<span>Price per night</span>....................... '.get_user_meta($id,'room_price',TRUE).' USD';
    echo '</li>';
    echo '<li>';
    echo '<span>Weekly Offer</span>.......................... '.(7*get_user_meta($id,'room_price',TRUE)).' USD';
    echo '</li>';
    echo '<li>';
    echo '<span>Max people</span>............................ '.get_user_meta($id,'maxpeople',TRUE);
    echo '</li>';
    echo '<li>';
    echo '<span>Minimum Stay</span>......................... '.get_user_meta($id,'min_stay',TRUE);
    echo '</li>';
    echo '<li>';
    echo '<span>Maximum Stay</span>......................... '.get_user_meta($id,'max_stay',TRUE);
    echo '</li>';
    echo '<li>';
    echo '<span>Guest Rating</span>.......................... '.do_shortcode('[rating]');
    echo '</li>';
    echo '</ul>';
    echo '</div>';
    echo '</div>';
    
    echo '<div class="hr"></div>';
    $loggeduser = $user_ID;
     $tableName = $wpdb->prefix .'booking';
    $sqlquery="SELECT DISTINCT(buserid) from ". $tableName." where hostid=".$id." AND buserid=".$loggeduser;
    
    $ans=$wpdb->get_results($sqlquery);
    
    if($ans)
        {
        
            $obj = new BookFunction;
            $getCustRating = $obj->getRating($loggeduser,$id);
            
            echo "<input type='hidden' name='CustRatingTo' class='CustRatingTo' data-id='".$id."'/>";
            //echo "<input type='hidden' name='Custrolename' class='Custrolename' data-id='".$role."'/>";
            echo "<input type='hidden' name='CustRatingFrom' class='CustRatingFrom' data-id='".$loggeduser."'/>";
            echo "<input type='hidden' name='ratecustsite' class='ratecustsite' data-site='".site_url()."'/>";
            echo "<input type='hidden' name='Crating' class='Crating' data-site='".$getCustRating[0]->rating."'/>";
            echo "<div id='ratecustomer-$id' class='rating'>
            <div class='star on'>
            <a href='#5' title='Give it 1/5'>5</a>
            </div> </div>";

      }
      ?>
<script>
jQuery(function() {
   jQuery("#host").tabs();
});
</script>
        <div id="host">
<ul>
<li><a href="#start">Start</a></li>
<li><a href="#photos">Photos</a></li>
<li><a href="#review">Reviews</a></li>
<li><a href="#messages">Messages</a></li>


</ul>
<div id="start">
<?php echo '<div class="start_details">';
    
    echo '<div class="hostFamily">';
    echo '<h3>Host Family Details</h3>';
    
    echo '<div class="subDetail">';
    echo '<label>No. of family Members :</label>';
    echo ' <span>'.get_user_meta($id,'people',TRUE).'</span>';
    echo '</div>';
    
    echo '<div class="subDetail">';
    echo '<label>Children :</label>';
    if(get_user_meta($id,'children',TRUE)==0)
    echo ' <span>none</span>';
    echo ' <span>'.get_user_meta($id,'children',TRUE).'</span>';
    echo '</div>';
    
    echo '<div class="subDetail">';
    echo '<label>Non-smoking Household:</label>';
    if(get_user_meta($id,'smoke_at_house',TRUE)==0)
    echo ' <span>No</span>';
    if(get_user_meta($id,'smoke_at_house',TRUE)==1)
    echo ' <span>Yes</span>';
    echo '</div>';
    
    echo '<div class="subDetail">';
    echo '<label>Pets :</label>';
    if(get_user_meta($id,'pets',TRUE)==0)
    echo ' <span>None</span>';
    if(get_user_meta($id,'pets',TRUE)!=0)
    {echo ' <span>Yes</span></br>';
    $var= get_user_meta($id,'pets',TRUE);
    $petarr=explode(',', $var);
    if(in_array(1, $petarr))
    echo ' <span>Bird</span>';
    if(in_array(2, $petarr))
    echo ' <span>Cat</span>';
    if(in_array(3, $petarr))
    echo ' <span>Cavy</span>';
    if(in_array(4, $petarr))
    echo ' <span>Dog</span>';
    if(in_array(5, $petarr))
    echo ' <span>Hamster</span>';
    if(in_array(6, $petarr))
    echo ' <span>Other</span>';
    
    }
    echo '</div>';
    
    echo '</div>';
    
    echo '<div class="acmodatnHome">';
    echo '<h3>Accommodation Type</h3>';
    
    echo '<div class="subDetail">';
    echo '<label>Distance from City:</label>';
    echo ' <span>'.get_user_meta($id,'city_distance',TRUE).' Km</span>';
    echo '</div>';
    
    echo '<div class="subDetail">';
    echo '<label>Walking Distance to public Transportation :</label>';
    echo ' <span>'.get_user_meta($id,'walking_distance',TRUE).'m</span>';
    echo '</div>';
    
    
    echo '<div class="subDetail">';
    echo '<label>Accommodation Type :</label>';
    $accommo=explode(',',get_user_meta($id,'accommodation_type',TRUE));
    echo '<ul>';
    if(in_array(1,$accommo))
    {
        echo '<li>';
        echo ' <span class="accommo">Own bedroom in Family Home</span>';
        echo '</li>';
    }
    
    if(in_array(2,$accommo))
    {        echo '<li>';     
        echo ' <span class="accommo">Shared room in Family Home</span>';
        echo '</li>';
    }
    if(in_array(3,$accommo))
    {   
        echo '<li>';
        echo ' <span class="accommo">Shared House</span>';
        echo '</li>';
    }
    if(in_array(4,$accommo))
    {
        echo '<li>';
        echo ' <span class="accommo">Own bedroom in Apartment or Flat</span>';
        echo '</li>';
    }
    if(in_array(5,$accommo))
    {   echo '<li>';     
        echo ' <span class="accommo">Shared room in Apartment or Flat</span>';
        echo '</li>';
    }
    if(in_array(6,$accommo))
    {   
        echo '<li>';
        echo ' <span class="accommo">Bungalow Private</span>';
        echo '</li>';
    }
    
    if(in_array(7,$accommo))
    {
        echo '<li>';
        echo ' <span class="accommo">Bungalow Shared</span>';
        echo '</li>';
    }
    echo '</ul>';
    echo '</div>';
    
    echo '<div class="subDetail">';
    echo '<label>Internet Access :</label>';
    if(get_user_meta($id,'internet',TRUE)==1)
    echo ' <span>not available</span>';
    
    if(get_user_meta($id,'internet',TRUE)==2)
    echo ' <span>included in the accommodation price</span>';
    
    if(get_user_meta($id,'internet',TRUE)==3)
    echo ' <span>additional charge</span>';
    echo '</div>';
    
    echo '<div class="subDetail">';
    echo '<label>Smoking Policy :</label>';
    if(get_user_meta($id,'smoking_policy',TRUE)==1)
    echo ' <span>Allowed in accommodation</span>';
    
    if(get_user_meta($id,'smoking_policy',TRUE)==2)
    echo ' <span>Not Allowed in accommodation</span>';
    
    if(get_user_meta($id,'smoking_policy',TRUE)==3)
    echo ' <span>Smoking allowed outside only</span>';
    echo '</div>';
    
    echo '<div class="subDetail">';
    echo '<label>Transfer Service :</label>';
    if(get_user_meta($id,'transfer',TRUE)==1)
    echo ' <span>not available</span>';
    
    if(get_user_meta($id,'transfer',TRUE)==2)
    echo ' <span>included in the accommodation price</span>';
    
    if(get_user_meta($id,'transfer',TRUE)==3)
    echo ' <span>additional charge</span>';
    echo '</div>';
    
    echo '<div class="subDetail">';
    echo '<label>Meal Provision :</label>';
    if(get_user_meta($id,'meal_type',TRUE)==1)
    echo ' <span>Prepared meals</span>';
    
    if(get_user_meta($id,'meal_type',TRUE)==2)
    echo ' <span>Food will be supplied for self-service</span>';
    
    if(get_user_meta($id,'meal_type',TRUE)==3)
    echo ' <span>Usage of kitchen only</span>';
    
    if(get_user_meta($id,'meal_type',TRUE)==4)
    echo ' <span>Usage of kitchen not possible</span>';
    
    if(get_user_meta($id,'meal_type',TRUE)==5)
    echo ' <span>Separate kitchen for guests</span>';
    echo '</div>';
    
    echo '</div>';
    
    echo '<div class="booking_section">';
    
    echo '<h3>Booking Section</h3>';
    
    echo do_shortcode('[book]');

    echo '</div>';
    echo '<div class="calndrAvl">';
    echo '<div class="dateP"></div>';
    echo do_shortcode('[calender]');
    echo '</div>';
    echo '</div>';
?>
    </div>
            <div id="photos">
                <div class="family photoH">
                    <h5>Host / Family photo </h5>
                    <img height="150" width="150" src="<?php echo $path['baseurl'].'/photo/'.get_user_meta($id,'profile',TRUE);?>" >
                </div>
                <div class="ext_room photoH">
                    <h5>Exterior of Room </h5>
                    <img height="150" width="150" src="<?php echo $path['baseurl'].'/photo/'.get_user_meta($id,'ext_room',TRUE);?>" >
                </div>
                <div class="int_room photoH">
                    <h5>Interior of Room </h5>
                    <img height="150" width="150" src="<?php echo $path['baseurl'].'/photo/'.get_user_meta($id,'int_room',TRUE);?>" >
                </div>
            </div>
            <div id="review">
                <?php
//                if(is_user_logged_in()) {do_shortcode('[bookreview]');} 
//                else {
                    echo do_shortcode('[review]');
                    
//                    }
                    ?>
            </div>
            
            <div id="messages">
                <?php  echo do_shortcode('[cartpauj-pm]');?>
            </div>

</div>
 <?php } ?>

