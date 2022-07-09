<?php ob_start();
add_shortcode('guestDetails', 'guestDetails');
function guestDetails()
{
    global $wpdb;
    $id=  base64_decode($_REQUEST['id']);
    $path=wp_upload_dir();
    
     global $wpdb,$user_ID;
     $table_guest=$wpdb->prefix. 'guestreg';
    $query="SELECT * from ".$table_guest." where guestid=".$id;
    $guestInfo=$wpdb->get_results($query);
    echo '<div class="hostDetails">';
    echo '<div class="pic"><img height="150" width="150" src="'.$path['baseurl'].'/photo/'.get_user_meta($id,'media',TRUE).'"/></div>';
    echo '<div class="otherDetails">';
    echo '<span class="hostN"><h3>Host Name : '.get_user_meta($id,'first_name',TRUE).' '.get_user_meta($id,'last_name',TRUE).'</h3></span>';    
   
      $sql= "SELECT `name` from `city` where id=".$guestInfo[0]->city;
      $cityarr=$wpdb->get_results($sql);
      
      $sqlstate= "SELECT `name` from `state` where id=".$guestInfo[0]->state;
      $statearr=$wpdb->get_results($sqlstate);
      
      $sqlcountry= "SELECT `name` from `country` where id=".$guestInfo[0]->country;
      $countryarr=$wpdb->get_results($sqlcountry);
    echo '<span class="hostN"><h3>Location of accommodation wanted: '.$cityarr[0]->name.','.$statearr[0]->name.','.$countryarr[0]->name.'</h3></span>';    
    
    echo '</div>';
    

    echo '<div class="priceShort">';
    echo '<ul>';
    echo '<li>';
    echo '<span>Time Frame</span>........... '.$guestInfo[0]->arrival." to ".$guestInfo[0]->departure;
//    $start =  date_create($guestInfo[0]->arrival);
//    $end =  date_create($guestInfo[0]->departure);
//    echo '<span>No. of nights </span>........... '.date_diff($start,$end);
    echo '</li>';
    echo '<li>';
    echo '<span>Budget for accommodation</span>....................... '.$guestInfo[0]->price.' USD';
    echo '</li>';
    
    echo '<li>';
    echo '<span>People</span>....................... '.$guestInfo[0]->ppl;
    echo '</li>';

    echo '</ul>';
    echo '</div>';
    echo '</div>';
    
    echo '<div class="hr"></div>';
    

?>
<script>
jQuery(function() {
   jQuery("#guest").tabs();
});
</script>
        <div id="guest">
<ul>
<li><a href="#start">Start</a></li>
<!--<li><a href="#photos">Photos</a></li>-->
<!--<li><a href="#review">Reviews</a></li>-->
<li><a href="#messages">Messages</a></li>
<!--<li><a href="#rating">Rating</a></li>-->

</ul>
            
            <div id="start">
            <?php echo '<div class="start_details">';
                   echo '<div class="hostFamily">';
                    echo '<h3>Descriptin of Guest</h3>';

                    echo '<div class="subDetail">';
                    echo '<label>Short Description :</label>';
                    echo ' <span>'.$guestInfo[0]->shortDes.'</span>';
                    echo '</div>'; 
                    echo '</div>'; 
                //    echo '</div>';
                    
                    echo '<div class="acmodatnHome">';
                    echo '<h3>Accommodation Type</h3>';
    
                    echo '<div class="subDetail">';
                    echo '<label>City Wanted :</label>';
                    echo ' <span>'.$cityarr[0]->name.','.$statearr[0]->name.','.$countryarr[0]->name.'</span>';
                    echo '</div>';
                    
                    echo '<div class="subDetail">';
                    echo '<label>Time Frame :</label>';
                    echo ' <span>'.$guestInfo[0]->arrival." to ".$guestInfo[0]->departure.'</span>';
                    echo '</div>';
                    
                    echo '<div class="subDetail">';
                    echo '<label>Number of guests :</label>';
                    echo ' <span>'.$guestInfo[0]->ppl.'</span>';
                    echo '</div>';
                    
                    echo '<div class="subDetail">';
                    echo '<label>Max price per night and per person :</label>';
                    echo ' <span>'.$guestInfo[0]->price.' USD</span>';
                    echo '</div>';
                    
                    echo '</div>'; 
                    echo '<div class="booking_section">';
                    echo '<div class="subDetail">';
                    
                    echo '</div>';
                    echo '</div>'; 
                    echo '</div>'; 
                    
            ?>
            </div>
            <div id="messages">
                <?php  do_shortcode('[cartpauj-pm]');?>
            </div>
            
</div>
 <?php } ?>

            