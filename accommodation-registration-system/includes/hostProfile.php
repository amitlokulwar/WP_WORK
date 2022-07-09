<?php 
add_shortcode('hostProfile','hostProfile');

function hostProfile(){
global $wpdb,$user_ID ;
    if(is_user_logged_in() ) { 
        global $current_user;
   get_currentuserinfo();
    $path=wp_upload_dir();
//    print_r($path);
//    echo $path['basedir'];
     $cid = $current_user->ID;
           
     
     if(isset($_REQUEST['hostupdate'])){
         $pets = $_REQUEST['family_pets'];

            $pet = implode(',', $pets);
            
            $accommo = $_REQUEST['accomType'];

            $accommodation = implode(',', $accommo);
            
            $user_data = array(
                    'ID' => $cid,
//                    'user_pass' => $allTerms[0]->password,
                    //'user_login' => $allTerms[0]->username,
                    //'user_nicename' => $allTerms[0]->username,
                   'user_email' => $_REQUEST['emailId'],
                  //'display_name' => $allTerms[0]->username,
                  //'nickname' => $allTerms[0]->username
                  );
//                   $email = $user_data['user_email'];
//                  $username = $user_data['user_login'];
//                 $password = $user_data['user_pass'];
                 
                
           
//                     $cid = wp_update_user($user_data);
                    wp_update_user($user_data);
            
            
          $allowedExts = array("gif", "jpeg", "jpg", "png");

            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/x-png")
            || ($_FILES["file"]["type"] == "image/png")
                    )
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
                     update_user_meta($cid,'profile',$_FILES["file"]["name"]);
              }
            
              
              
              
              
              
              
              
              //-------------exterior---------
              $temp1 = explode(".", $_FILES["ext_room"]["name"]);

            $extension1 = end($temp1);
            if ((($_FILES["ext_room"]["type"] == "image/gif")
            || ($_FILES["ext_room"]["type"] == "image/jpeg")
            || ($_FILES["ext_room"]["type"] == "image/jpg")
            || ($_FILES["ext_room"]["type"] == "image/pjpeg")
            || ($_FILES["ext_room"]["type"] == "image/x-png")
            || ($_FILES["ext_room"]["type"] == "image/png")
                    )
            && in_array($extension1, $allowedExts))
              {
              if ($_FILES["ext_room"]["error"] > 0)
                {
                echo "Return Code: " . $_FILES["ext_room"]["error"] . "<br>";
                }
              else
                {

                  move_uploaded_file($_FILES["ext_room"]["tmp_name"],
                 $path['basedir'].'/photo/' . $_FILES["ext_room"]["name"]);

                }
                     update_user_meta($cid,'ext_room',$_FILES["ext_room"]["name"]);
              }
            
              
              
              
              
              //------------interior----------------
              $temp2 = explode(".", $_FILES["int_room"]["name"]);
            $extension2 = end($temp2);
            if ((($_FILES["int_room"]["type"] == "image/gif")
            || ($_FILES["int_room"]["type"] == "image/jpeg")
            || ($_FILES["int_room"]["type"] == "image/jpg")
            || ($_FILES["int_room"]["type"] == "image/pjpeg")
            || ($_FILES["int_room"]["type"] == "image/x-png")
            || ($_FILES["int_room"]["type"] == "image/png")
                    )
            && in_array($extension2, $allowedExts))
              {
              if ($_FILES["int_room"]["error"] > 0)
                {
                echo "Return Code: " . $_FILES["int_room"]["error"] . "<br>";
                }
              else
                {

                  move_uploaded_file($_FILES["int_room"]["tmp_name"],
                 $path['basedir'].'/photo/' . $_FILES["int_room"]["name"]);

                }
                     update_user_meta($cid,'int_room',$_FILES["int_room"]["name"]);
              }


            update_user_meta($cid, 'country', $_REQUEST['country']);
            update_user_meta($cid, 'state', $_REQUEST['state']);
            update_user_meta($cid, 'city', $_REQUEST['city']);
            update_user_meta($cid, 'accommodation_type', $accommodation);
            update_user_meta($cid, 'city_distance', $_REQUEST['distance']);
            update_user_meta($cid, 'walking_distance', $_REQUEST['walkingDis']);
            update_user_meta($cid, 'maxpeople', $_REQUEST['maxpeople']);
            update_user_meta($cid, 'smoking_policy', $_REQUEST['policy']);
            update_user_meta($cid, 'min_stay', $_REQUEST['minstay']);
            update_user_meta($cid, 'max_stay', $_REQUEST['maxstay']);
            update_user_meta($cid, 'room_price', $_REQUEST['roomprice']);

            update_user_meta($cid, 'meal_type', $_REQUEST['mealtype']);
            update_user_meta($cid, 'internet', $_REQUEST['internet_service']);
            update_user_meta($cid, 'transfer', $_REQUEST['transfer_service']);



            update_user_meta($cid, 'children', $_REQUEST['children']);
            update_user_meta($cid, 'people', $_REQUEST['peoplecount']);
            update_user_meta($cid, 'smoke_at_house', $_REQUEST['smoke_at_house_rdo']);
            update_user_meta($cid, 'pets', $pet);


            update_user_meta($cid, 'first_name', $_REQUEST['firstName']);
            update_user_meta($cid, 'last_name', $_REQUEST['lastName']);
            update_user_meta($cid, 'gender', $_REQUEST['gender']);
           // update_user_meta($cid, 'birthdate', $birthdate);
            update_user_meta($cid, 'contactNo', $_REQUEST['cntctNo']);

            wp_redirect(home_url(),301);
     
     }
     
    
    
     ?>
        <div class="accommForm">

        <form method="post" action="" id="registerAcc" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo site_url() ?>" class="site">
            <h3>Rooms, location, Min/max stay, Prices</h3>
            <div class="hr"></div>
            <div class="formFields">
                <div class="formItem">
                    <div class="fieldLabel">
                        <label for="country">Select Your Location<span>*</span></label>
                    </div>
                    <div class="field">
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
                        </select> 
                    </div>
                </div>
                
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Accommodation Type<span>*</span></label>
                    </div>
                    <?php
                    $string=get_user_meta($cid,'accommodation_type',true); $acc=explode(',', $string);?>
                    <div class="field"><input type="checkbox" name="accomType[]" value="1" <?php if(in_array(1,$acc)){?> checked="checked" <?php }?> /> Own bedroom in Family Home</div>
                    
                    <div class="field"><input type="checkbox" name="accomType[]" value="2" <?php if(in_array(2,$acc)){?> checked="checked" <?php }?> /> Shared room in Family Home</div>
                    
                    <div class="field"><input type="checkbox" name="accomType[]" value="3" <?php if(in_array(3,$acc)){?> checked="checked" <?php }?> /> Shared House</div>
                    
                    <div class="field"><input type="checkbox" name="accomType[]" value="4" <?php if(in_array(4,$acc)){?> checked="checked" <?php }?> /> Own bedroom in Apartment or Flat</div>
                    
                    <div class="field"><input type="checkbox" name="accomType[]" value="5" <?php if(in_array(5,$acc)){?> checked="checked" <?php }?> /> Shared room in Apartment or Flat</div>
                    
                    <div class="field"><input type="checkbox" name="accomType[]" value="6" <?php if(in_array(6,$acc)){?> checked="checked" <?php }?> /> Bungalow Private</div>
                    
                    <div class="field"><input type="checkbox" name="accomType[]" value="7" <?php if(in_array(7,$acc)){?> checked="checked" <?php }?> /> Bungalow Shared</div>
                </div>
                
                <div class="formItem">
                    <div class="fieldLabel">
                        <label for="distance">Distance to the city centre<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="distance" class="distance" value="<?php echo get_user_meta($cid,'city_distance',true); ?> " />(in km)
                    </div>
                </div>


                <div class="formItem">
                    <div class="fieldLabel">
                        <label for="walkingDis">Walking distance to the nearest stop of public transport?<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="walkingDis" class="walkingDis" value="<?php echo get_user_meta($cid,'walking_distance',true); ?> " />(in m)
                    </div>
                </div>
                 <div class="formItem">
                    <div class="fieldLabel">
                        <label for="maxpeople">Maximum No. of People allowed in accommodation<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="maxpeople" class="maxpeople" value="<?php echo get_user_meta($cid,'maxpeople',true); ?> " />(only number)
                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label for="policy">Smoking Policy<span>*</span></label>
                    </div>
                    <div class="field">
                        <select  name="policy" class="policy" >
                            <option value="0">Please Select</option>
                            
                            <option value="1" <?php if(get_user_meta($cid,'smoking_policy',true)==1){?> selected="selected" <?php }?> >Allowed in accommodation</option>
                            <option value="2" <?php if(get_user_meta($cid,'smoking_policy',true)==2){?> selected="selected" <?php }?> >Not Allowed in accommodation</option>
                            <option value="3" <?php if(get_user_meta($cid,'smoking_policy',true)==3){?> selected="selected" <?php }?> >Smoking allowed outside only</option>
                        </select>
                    </div>
                </div>


                <div class="formItem">
                    <div class="fieldLabel">
                        <label for="minstay">Minimum stay (number of nights)</label>
                    </div>
                    <div class="field">
                        <select  name="minstay" class="minstay" >
                            <?php for ($i = 1; $i <= 365; $i++) { ?>
                            
                                <option value="<?php echo $i; ?>" <?php if(get_user_meta($cid,'min_stay',true)==$i){?> selected="selected" <?php }?> ><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="formItem">
                    <div class="fieldLabel">
                        <label for="maxstay">Maximum stay (number of nights)</label>
                    </div>
                    <div class="field">
                        <select  name="maxstay" class="maxstay" >
                             <?php for ($i = 1; $i <= 365; $i++) { ?>
                                <option value="<?php echo $i;  ?>" <?php if(get_user_meta($cid,'max_stay',true)==$i){?> selected="selected" <?php }?> ><?php echo $i; ?></option>
                             <?php } ?>
                        </select>
                    </div>
                </div>


                <!--        <div class="formItem">
                        <div class="fieldLabel">
                            <label for="privroom">Can you offer a private room to your guest?</label>
                        </div>
                        <div class="field">
                            <input class="privroom" name="privroom" type="radio" value="1" />Yes<input class="privroom"  name="privroom" type="radio" value="0" />No</div>
                        </div>
                        
                        <div class="fieldconditionY">      
                            <div class="formItem">
                                <div class="fieldLabel">
                                <label>Type</label>
                                </div>
                                <div class="field">
                                    <select  name="roomtype" class="roomtype" >
                                        <option value="0">Please Select</option>
                                        <option value="1">Single Room</option>
                                        <option value="2">Double Room</option>
                                        <option value="3">Twin Room(2 Separate Beds)</option>
                                        <option value="4">Triple Room</option>
                                    </select>
                                </div>
                            </div>
                
                            <div class="formItem">
                                <div class="fieldLabel">
                                    <label>Price/Night</label>
                                </div>
                                <div class="field">
                                    <input type="text" name="roomprice" class="roomprice" />(in USD $)
                                </div>
                            </div>
                        </div>
                        <div class="fieldconditionN">      
                            <div class="formItem">
                                <div class="fieldLabel">
                                <label>Type</label>
                                </div>
                                <div class="field">
                                    <select  name="roomtype" class="roomtype" >
                                        <option value="0">Please Select</option>
                                        <option value="1">Single Room</option>
                                        <option value="2">Double Room</option>
                                        <option value="3">Twin Room(2 Separate Beds)</option>
                                        <option value="4">Triple Room</option>
                                    </select>
                                </div>
                            </div>
                
                            <div class="formItem">
                                <div class="fieldLabel">
                                    <label>Price/Night</label>
                                </div>
                                <div class="field">
                                    <input type="text" name="roomprice" class="roomprice" />(in USD $)
                                </div>
                            </div>
                        </div>-->
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Price/Night<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="roomprice" class="roomprice" value="<?php echo get_user_meta($cid,'room_price',true)?>" />(in USD $)
                    </div>
                </div>

            </div>
            <h3>Services</h3>
            <div class="hr"></div>

            <div class="formFields">
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Which Meal options do you offer?<span>*</span></label>
                    </div>
                    <div class="field">
                        <select  name="mealtype" class="mealtype"  >
                            <option value="select">Please Select</option>
                            <option value="1" <?php if(get_user_meta($cid,'meal_type',true)==1){?> selected="selected" <?php }?>>Prepared meals</option>
                            <option value="2" <?php if(get_user_meta($cid,'meal_type',true)==2){?> selected="selected" <?php }?>>Food will be supplied for self-service</option>
                            <option value="3" <?php if(get_user_meta($cid,'meal_type',true)==3){?> selected="selected" <?php }?>>Usage of kitchen only</option>
                            <option value="4" <?php if(get_user_meta($cid,'meal_type',true)==4){?> selected="selected" <?php }?>>Usage of kitchen not possible</option>
                            <option value="5" <?php if(get_user_meta($cid,'meal_type',true)==5){?> selected="selected" <?php }?>>Separate kitchen for guests</option>

                        </select>
                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Do you Provide Internet Access for the guest?</label>
                    </div>
                    <div class="field">
                        <select class="internet_service" name="internet_service" >
                            <option value="1" <?php if(get_user_meta($cid,'internet',true)==1){?> selected="selected" <?php }?>>not available</option>
                            <option value="2" <?php if(get_user_meta($cid,'internet',true)==2){?> selected="selected" <?php }?>>included in the accommodation price</option>
                            <option value="3" <?php if(get_user_meta($cid,'internet',true)==3){?> selected="selected" <?php }?>>additional charge</option>

                        </select>
                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Do you offer a transfer from / to the (bus) station / airport on arrival / departure?</label>
                    </div>
                    <div class="field">
                        <select class="slc left register_service_slc" name="transfer_service" id="transfer">
                            <option value="1" <?php if(get_user_meta($cid,'transfer',true)==1){?> selected="selected" <?php }?>>not available</option>
                            <option value="2" <?php if(get_user_meta($cid,'transfer',true)==2){?> selected="selected" <?php }?>>included in the accommodation price</option>
                            <option value="3" <?php if(get_user_meta($cid,'transfer',true)==3){?> selected="selected" <?php }?>>additional charge</option>

                        </select>
                    </div>
                </div>
            </div>

            <h3>Host / Family Information</h3>
            <div class="hr"></div>

            <div class="formFields">
                <!--        <h4>Person 1(Yourself)</h4>
                        <div class="formItem">
                            
                            <div class="fieldLabel">
                                <label>Gender</label>
                            </div>
                            <div class="field">
                                <input class="gender" name="gender" type="radio" value="Male" />Male<input class="gender"  name="gender" type="radio" value="Female" />Female</div>
                        </div>
                        <div class="formItem">
                            
                        <div class="fieldLabel">
                        <label>First Name</label>
                        </div>
                        <div class="field">
                        <input type="text" name="fname" class="fname"/>
                        </div>
                        
                    </div>
                        <div class="formItem">
                            
                            <div class="fieldLabel">
                                <label>Birth Date</label>
                            </div>
                            <div class="field">
                                <select name="BirthMonth1" id="BirthMonth">
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
                            <select name="BirthDay1" id="BirthDay">
    <?php
    for ($i = 1; $i <= 31; $i++) {
        echo "<option value='$i'>$i</option>";
    }
    ?>
                            </select>
                            <select name="BirthYear1" id="BirthYear">
                <?php
                for ($i = 2011; $i >= 1900; $i = $i - 1) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
                            </select>
                        </div>
                        
                    </div>
                        
                        <div class="formItem">
                            <div class="fieldLabel">
                                <label>Time at home during daytime</label>
                            </div>
                            <div class="field">
                                <select class="stay_at " name="stay_at" >
                                <option value="select">Please Select</option>
                                <option value="1">at home everyday</option>
                                <option value="2">at home several days a week</option>
                                <option value="3">at home on the weekends</option>
                                <option value="4">away from home most of the time</option>
                
                                </select>
                            </div>
                         </div>-->

                <!--        <h4>Person 2</h4>
                        
                        
                        <div class="formItem">
                            
                            <div class="fieldLabel">
                                <label>Gender</label>
                            </div>
                            <div class="field">
                                <input class="gender" name="gender" type="radio" value="Male" />Male<input class="gender"  name="gender" type="radio" value="Female" />Female</div>
                        </div>
                        <div class="formItem">
                            
                            <div class="fieldLabel">
                                <label>First Name</label>
                            </div>
                            <div class="field">
                                <input type="text" name="fname" class="fname"/>
                        </div>
                        
                    </div>
                        <div class="formItem">
                            
                            <div class="fieldLabel">
                                <label>Birth Date</label>
                            </div>
                            <div class="field">
                                <select name="BirthMonth2" id="BirthMonth">
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
                            <select name="BirthDay2" id="BirthDay">
    <?php
//                for ($i=1; $i<=31; $i++)
//                {
//                    echo "<option value='$i'>$i</option>";
//                }
    ?>
                            </select>
                            <select name="BirthYear2" id="BirthYear">
                <?php
//                for ($i=2011; $i>=1900; $i=$i-1)
//                {
//                    echo "<option value='$i'>$i</option>";
//                }
                ?>
                            </select>
                        </div>
                        
                    </div>
                        
                        <div class="formItem">
                            <div class="fieldLabel">
                                <label>Time at home during daytime</label>
                            </div>
                            <div class="field">
                                <select class="stay_at " name="stay_at" >
                                <option value="select">Please Select</option>
                                <option value="1">at home everyday</option>
                                <option value="2">at home several days a week</option>
                                <option value="3">at home on the weekends</option>
                                <option value="4">away from home most of the time</option>
                
                                </select>
                            </div>
                         </div>-->
                <!--         <h4>Host / Family Information</h4>-->
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>How many children live in your household?<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="children" class="children" value="<?php echo get_user_meta($cid,'children',true)?>"/>
                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>How many people in your home?<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="peoplecount" class="peoplecount" value="<?php echo get_user_meta($cid,'people',true)?>"/>
                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Do you or other members of your household smoke?<span>*</span></label>
                    </div>
                    <div class="field">

                        <input type="radio" name="smoke_at_house_rdo" value="1" class="radio smoke_at_house_rdo"  <?php if(get_user_meta($cid,'smoke_at_house',true)==1){?> checked="checked" <?php }?>>yes
                        <input type="radio" name="smoke_at_house_rdo" value="0"  class="radio smoke_at_house_rdo" <?php if(get_user_meta($cid,'smoke_at_house',true)==0){?> checked="checked" <?php }?>>no
                        <span class="warsmoke"></span>

                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Which pets live in your household?</label>
                    </div>
                    <div class="field">
                        <div class="selectBox">
                            <?php $str=get_user_meta($cid,'pets',true);
                                 $arr=explode(',', $str);
                                 ?>
                            
                            <label><input type="checkbox" name="family_pets[]" value="0" <?php if(in_array(0,$arr)){?> checked="checked" <?php }?>>none</label><br>
                            <label><input type="checkbox" name="family_pets[]" value="1" <?php if(in_array(1,$arr)){?> checked="checked" <?php }?>>bird</label><br>
                            <label><input type="checkbox" name="family_pets[]" value="2" <?php if(in_array(2,$arr)){?> checked="checked" <?php }?>>cat</label><br>
                            <label><input type="checkbox" name="family_pets[]" value="3" <?php if(in_array(3,$arr)){?> checked="checked" <?php }?>>cavy</label><br>
                            <label><input type="checkbox" name="family_pets[]" value="4" <?php if(in_array(4,$arr)){?> checked="checked" <?php }?>>dog</label><br>
                            <label><input type="checkbox" name="family_pets[]" value="5" <?php if(in_array(5,$arr)){?> checked="checked" <?php }?>>hamster</label><br>
                            <label><input type="checkbox" name="family_pets[]" value="6" <?php if(in_array(6,$arr)){?> checked="checked" <?php }?>>other</label><br>
                        </div>
                        <span class="peterror"></span>

                    </div>
                </div>

            </div>
            
            <h3>Upload Pictures of your family or your Property</h3>
            <div class="hr"></div>
            <div class="formFields">
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Host or family Photo</label> 
                    </div>
                    <div class="field">
                        
                        <div class="photoHome"><img id="blah" src="<?php echo $path['baseurl'].'/photo/'.get_user_meta($cid,'profile',true);?>" width="150" height="135" alt="your image" /></div>
                        <input type="file" name="file" onchange="readURL(this);"/>
                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Exterior Views of Home</label> 
                    </div>
                    <div class="field">
                        <div class="photoHome"><img id="blah1" src="<?php echo $path['baseurl'].'/photo/'.get_user_meta($cid,'ext_room',true);?>" width="150" height="135" alt="your image" /></div>
                        <!--<input type="file" name="room1"/>-->
                        <input type='file'  name="ext_room" onchange="readURL1(this);" />
                        
                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Interior Views of Room</label> 
                    </div>
                    <div class="field">
                        <div class="photoHome"><img id="blah2" src="<?php echo $path['baseurl'].'/photo/'.get_user_meta($cid,'int_room',true);?>" width="150" height="135" alt="your image" /></div>
                        <!--<input type="file" name="room1"/>-->
                        <input type='file'  name="int_room" onchange="readURL2(this);" />
                        
                    </div>
                </div>
<!--                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Host or family Photo</label> 
                    </div>
                    <div class="field">
                        <div class="photoHome"></div>
                    </div>
                </div>-->
            </div>
            <h3>Personal Information</h3>
            <div class="hr"></div>
            <div class="formFields">
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Username(For registration on this site)<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="hostUsername" value="<?php echo $current_user->user_login; ?>" class="hostUsername"/>
                    </div>
                </div>
                <div class="formItem">

                    <div class="fieldLabel">
                        <label>Gender</label>
                    </div>
                    <div class="field">
                       <input class="gender" name="gender" type="radio" value="Male" <?php if(get_user_meta($cid,'gender',true)=='Male'){?> checked="checked" <?php }?>/>Male
                       <input class="gender"  name="gender" type="radio" value="Female" <?php if(get_user_meta($cid,'gender',true)=='Female'){?> checked="checked" <?php }?>/>Female</div>
                </div>

                <div class="formItem">
                    <div class="fieldLabel">
                        <label>First Name<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="firstName" class="firstName" value="<?php echo get_user_meta($cid,'first_name',true) ?>"/>
                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Last Name<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="lastName" class="lastName" value="<?php echo get_user_meta($cid,'last_name',true) ?>"/>
                    </div>
                </div>

                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Your Email ID<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="emailId" class="emailId" value="<?php echo $current_user->user_email; ?>"/>
                    </div>
                </div>

<!--                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Enter password(This is for your registration purpose)<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="password" name="hostpassword" class="hostpassword"/>
                    </div>
                </div>-->

                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Contact No.</label>
                    </div>
                    <div class="field">
                        <input type="text" name="cntctNo" class="cntctNo" value="<?php echo get_user_meta($cid,'contactNo',true); ?>"/>
                    </div>
                </div>

            </div>

            <div class="formItem">
                <div class="fieldLabel"></div>
                <div class="field"><input type="submit" name="hostupdate" class="hostupdate"  value="Update"/></div>
            </div>
        </form>
    </div>

    <?php
}
}
    
    
    
    
?>

