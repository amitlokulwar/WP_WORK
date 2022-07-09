<?php ob_start();
//the form will be in 5 steps
//step 1: Room location
//step 2: Services provided
//step 3: Family profile
//step 4: Upload images
//step 5: Personal Info

add_shortcode('accommodation', 'accommRegister');

function accommRegister() {


    if (isset($_REQUEST['hostsubmit'])) {
        
        if ($_REQUEST['hostsubmit'] == 'Register') {
            $path=wp_upload_dir();


            $pets = $_REQUEST['family_pets'];

            $pet = implode(',', $pets);
            $accommo = $_REQUEST['accomType'];

            $accommodation = implode(',', $accommo);
            
            

            $user_data = array(
                'ID' => '',
                'user_pass' => $_REQUEST['hostpassword'],
                'user_login' => $_REQUEST['hostUsername'],
                'user_nicename' => $_REQUEST['hostUsername'],
                'user_email' => $_REQUEST['emailId'],
                'display_name' => $_REQUEST['hostUsername'],
                'nickname' => $_REQUEST['hostUsername']
            );

            $email = $user_data['user_email'];
            $username = $user_data['user_login'];
            $password = $user_data['user_pass'];

            $uid = wp_create_user($username, $password, $email);

            add_role('host', 'Host', array('read' => true));
            $user_id_role = new WP_User($uid);
            $user_id_role->set_role('host');
            update_user_meta($uid,'role','host');


//            $birthdate = $_REQUEST['BirthDay1'] . '/' . $_REQUEST['BirthMonth1'] . '/' . $_REQUEST['BirthYear1'];

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
                     update_user_meta($uid,'profile',$_FILES["file"]["name"]);
              }
            
              
              
              
              
              
              
              
              //-------------exterior---------
              $temp1 = explode(".", $_FILES["ext_room"]["name"]);
//              echo $temp1.'<br>'.$temp;
//              die();
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
                     update_user_meta($uid,'ext_room',$_FILES["ext_room"]["name"]);
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
                     update_user_meta($uid,'int_room',$_FILES["int_room"]["name"]);
              }


            update_user_meta($uid, 'country', $_REQUEST['country']);
            update_user_meta($uid, 'state', $_REQUEST['state']);
            update_user_meta($uid, 'city', $_REQUEST['city']);
            update_user_meta($uid, 'address', $_REQUEST['address']);
            update_user_meta($uid, 'accommodation_type', $accommodation);
            update_user_meta($uid, 'city_distance', $_REQUEST['distance']);
            update_user_meta($uid, 'walking_distance', $_REQUEST['walkingDis']);
            update_user_meta($uid, 'maxpeople', $_REQUEST['maxpeople']);
            update_user_meta($uid, 'smoking_policy', $_REQUEST['policy']);
            update_user_meta($uid, 'min_stay', $_REQUEST['minstay']);
            update_user_meta($uid, 'max_stay', $_REQUEST['maxstay']);
            update_user_meta($uid, 'room_price', $_REQUEST['roomprice']);

            update_user_meta($uid, 'meal_type', $_REQUEST['mealtype']);
            update_user_meta($uid, 'internet', $_REQUEST['internet_service']);
            update_user_meta($uid, 'transfer', $_REQUEST['transfer_service']);



            update_user_meta($uid, 'children', $_REQUEST['children']);
            update_user_meta($uid, 'people', $_REQUEST['peoplecount']);
            update_user_meta($uid, 'smoke_at_house', $_REQUEST['smoke_at_house_rdo']);
            update_user_meta($uid, 'pets', $pet);


            update_user_meta($uid, 'first_name', $_REQUEST['firstName']);
            update_user_meta($uid, 'last_name', $_REQUEST['lastName']);
            update_user_meta($uid, 'gender', $_REQUEST['gender']);
           // update_user_meta($uid, 'birthdate', $birthdate);
            update_user_meta($uid, 'contactNo', $_REQUEST['cntctNo']);


   
            $to = $email;
            $from = get_option('Email Set');
            $subject = "Your login information";
            $message = "Thank you for registration on Your Cheer World. You are successfully registered as a host for Homestay Accommodation";
            $headers = "From: Admin <amit@moderni.in>\r\n" . "Email address: $email\r\n " . "Username: $username\r\n" . "Password: $password\r\n";
            add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
            
            mail($to, $subject, $message, $headers);
//             echo '<div id="myElem">You have successfully registered on yourcheerworld. Kindly check your mail.</div>';
             
            
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
                            wp_safe_redirect( home_url().'/host-profile',301);
                           }
            
            
        }
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
    <?php global $wpdb;
    $myrows = $wpdb->get_results("SELECT * FROM country"); ?>
    <?php foreach ($myrows as $row): ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                            <?php endforeach; ?>
                        </select><br />
                        <select name="state" id="state" style="width: 214px">
                            <option value="" selected="selected">-----Select State------</option>
                            <?php global $wpdb;
                            $myrows = $wpdb->get_results("SELECT * FROM state");
                            ?>
                            <?php foreach ($myrows as $row): ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                            <?php endforeach; ?>
                        </select><br />
                        <select name="city" id="city" style="width: 214px">
                            <option value="" selected="selected">----Select Suburb----</option>
                        </select> 
                    </div>
                </div>
                
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Address</label>
                    </div>
                    <div class="field">
                        <textarea name="address" class="address"></textarea>
                    </div>
                </div>
                
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Accommodation Type<span>*</span></label>
                    </div>
                    
                    <div class="field"><input type="checkbox" name="accomType[]" value="1" /> Own bedroom in Family Home</div>
                    
                    <div class="field"><input type="checkbox" name="accomType[]" value="2" /> Shared room in Family Home</div>
                    
                    <div class="field"><input type="checkbox" name="accomType[]" value="3" /> Shared House</div>
                    
                    <div class="field"><input type="checkbox" name="accomType[]" value="4" /> Own bedroom in Apartment or Flat</div>
                    
                    <div class="field"><input type="checkbox" name="accomType[]" value="5" /> Shared room in Apartment or Flat</div>
                    
                    <div class="field"><input type="checkbox" name="accomType[]" value="6" /> Bungalow Private</div>
                    
                    <div class="field"><input type="checkbox" name="accomType[]" value="7" /> Bungalow Shared</div>
                </div>
                
                <div class="formItem">
                    <div class="fieldLabel">
                        <label for="distance">Distance to the city centre<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="distance" class="distance" />(in km and only numbers)
                    </div>
                </div>


                <div class="formItem">
                    <div class="fieldLabel">
                        <label for="walkingDis">Walking distance to the nearest stop of public transport?<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="walkingDis" class="walkingDis" />(in m and only numbers)
                    </div>
                </div>
                
                <div class="formItem">
                    <div class="fieldLabel">
                        <label for="maxpeople">Maximum No. of People allowed in accommodation<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="maxpeople" class="maxpeople" />(only number)
                    </div>
                </div>

                <div class="formItem">
                    <div class="fieldLabel">
                        <label for="policy">Smoking Policy<span>*</span></label>
                    </div>
                    <div class="field">
                        <select  name="policy" class="policy" >
                            <option value="0">Please Select</option>
                            <option value="1">Allowed in accommodation</option>
                            <option value="2">Not Allowed in accommodation</option>
                            <option value="3">Smoking allowed outside only</option>
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
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
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
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
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
                        <input type="text" name="roomprice" class="roomprice" />(in USD $ and only numbers)
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
                        <select  name="mealtype" class="mealtype" >
                            <option value="select">Please Select</option>
                            <option value="1">Prepared meals</option>
                            <option value="2">Food will be supplied for self-service</option>
                            <option value="3">Usage of kitchen only</option>
                            <option value="4">Usage of kitchen not possible</option>
                            <option value="5">Separate kitchen for guests</option>

                        </select>
                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Do you Provide Internet Access for the guest?</label>
                    </div>
                    <div class="field">
                        <select class="internet_service" name="internet_service" >
                            <option value="1">not available</option>
                            <option value="2">included in the accommodation price</option>
                            <option value="3">additional charge</option>

                        </select>
                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Do you offer a transfer from / to the (bus) station / airport on arrival / departure?</label>
                    </div>
                    <div class="field">
                        <select class="slc left register_service_slc" name="transfer_service" id="transfer">
                            <option value="1">not available</option>
                            <option value="2">included in the accommodation price</option>
                            <option value="3">additional charge</option>

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
                        <input type="text" name="children" class="children"/>
                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>How many people in your home?<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="peoplecount" class="peoplecount"/>
                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Do you or other members of your household smoke?<span>*</span></label>
                    </div>
                    <div class="field">

                        <input type="radio" name="smoke_at_house_rdo" value="1" class="radio smoke_at_house_rdo">yes
                        <input type="radio" name="smoke_at_house_rdo" value="0"  class="radio smoke_at_house_rdo">no
                        <span class="warsmoke"></span>

                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Which pets live in your household?</label>
                    </div>
                    <div class="field">
                        <div class="selectBox">
                            <label><input type="checkbox" name="family_pets[]" value="0">none</label><br>
                            <label><input type="checkbox" name="family_pets[]" value="1">bird</label><br>
                            <label><input type="checkbox" name="family_pets[]" value="2">cat</label><br>
                            <label><input type="checkbox" name="family_pets[]" value="3">cavy</label><br>
                            <label><input type="checkbox" name="family_pets[]" value="4">dog</label><br>
                            <label><input type="checkbox" name="family_pets[]" value="5">hamster</label><br>
                            <label><input type="checkbox" name="family_pets[]" value="6">other</label><br>
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
                        <div class="photoHome"><img id="blah" src="#" alt="your image" /></div>
                        <input type="file" name="file" onchange="readURL(this);"/>
                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Exterior Views of Home</label> 
                    </div>
                    <div class="field">
                        <div class="photoHome"><img id="blah1" src="#" alt="your image" /></div>
                        <!--<input type="file" name="room1"/>-->
                        <input type='file'  name="ext_room" onchange="readURL1(this);" />
                        
                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Interior Views of Room</label> 
                    </div>
                    <div class="field">
                        <div class="photoHome"><img id="blah2" src="#" alt="your image" /></div>
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
                        <input type="text" name="hostUsername" class="hostUsername"/>
                    </div>
                </div>
                <div class="formItem">

                    <div class="fieldLabel">
                        <label>Gender</label>
                    </div>
                    <div class="field">
                        <input class="gender" name="gender" type="radio" value="Male" />Male<input class="gender"  name="gender" type="radio" value="Female" />Female</div>
                </div>

                <div class="formItem">
                    <div class="fieldLabel">
                        <label>First Name<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="firstName" class="firstName"/>
                    </div>
                </div>
                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Last Name<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="lastName" class="lastName"/>
                    </div>
                </div>

                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Your Email ID<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" name="emailId" class="emailId"/>
                    </div>
                </div>

                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Enter password(This is for your registration purpose)<span>*</span></label>
                    </div>
                    <div class="field">
                        <input type="password" name="hostpassword" class="hostpassword"/>
                    </div>
                </div>

                <div class="formItem">
                    <div class="fieldLabel">
                        <label>Contact No.</label>
                    </div>
                    <div class="field">
                        <input type="text" name="cntctNo" class="cntctNo"/>
                    </div>
                </div>
                <div class="formItem">
                    <input type="checkbox" name="tnc" value="1" class="tnc"/>
                    <label>I agree that in the event of a successful booking yourcheerworld.com my offer I get charged 10% of the accumulated book value as a commission. This amount is deducted from the deposit paid by the guest.</label>
                    <span class="warning"></span>
                </div>         
            </div>

            <div class="formItem">
                <div class="fieldLabel"></div>
                <div class="field"><input type="submit" name="hostsubmit" class="hostsubmit"  value="Register"/></div>
            </div>
        </form>
    </div>
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
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader1 = new FileReader();

            reader1.onload = function (e1) {
                jQuery('#blah1')
                    .attr('src', e1.target.result)
                    .width(150)
                    .height(135);
            };

            reader1.readAsDataURL(input.files[0]);
        }
    }
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader2 = new FileReader();

            reader2.onload = function (e2) {
                jQuery('#blah2')
                    .attr('src', e2.target.result)
                    .width(150)
                    .height(135);
            };

            reader2.readAsDataURL(input.files[0]);
        }
    }
    
    
    
    
    
</script>
    <?php
}
?>

