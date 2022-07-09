<?php ob_start();

add_shortcode('searchListinghost','searchListinghost');
add_shortcode('searchListingGuest','searchListingGuest');

function searchListinghost()
{
    $id=$_REQUEST['id'];
    print_r($id);
    echo $id;
    die();
    if($id==0)
    {
        echo '<h3>No host available for this location.</h3>';
        echo '<a href="'.home_url().'/homestay-accomodation">BACK</a> ';
        
    }
    else
    {
        
        echo '<a href="'.home_url().'/homestay-accomodation">BACK</a> ';
    }
    
}
function searchListingGuest()
{
    $id=$_REQUEST['id'];
    if($id==0)
    {
        echo '<h3>No guest available for this location.</h3>';
        echo '<a href="'.home_url().'/homestay-accomodation">BACK</a> ';
    }
    else
    {
        
        echo '<a href="'.home_url().'/homestay-accomodation">BACK</a> ';
    }
    
}





?>
