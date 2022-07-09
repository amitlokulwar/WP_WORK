
jQuery(document).ready(function(){
    
    jQuery(".arrivalDate").datepicker({minDate:0});
    jQuery(".departureDate").datepicker({minDate:0});
    
    jQuery(".arrivalD").datepicker({minDate:0, dateFormat: 'mm/dd/yy' });
    jQuery(".departureD").datepicker({minDate:0,dateFormat: 'mm/dd/yy'});
    
    jQuery(".fieldconditionY").hide();
    jQuery(".fieldconditionN").hide();
     var site = jQuery('.site').val();  
//    $.noConflict();
    var flag= 1;
    var error= 1;
    var pasvar= 1;
   
   jQuery('#country').change(function()
   {var cat = jQuery("#country").val(); 
    var site = jQuery('.site').val();   
    
    jQuery.ajax({
		url: site+"/wp-admin/admin-ajax.php",
		type: 'POST',
		data:{
                country : cat,
                action:'getstate'
                },
		success: function(msg) {
                 jQuery('#state').html(msg);
		}
	});
});
jQuery('#state').change(function(){
    var cat = jQuery("#state").val(); 
    var site = jQuery('.site').val();    
    jQuery.ajax({
		url: site+"/wp-admin/admin-ajax.php",
		type: 'POST',
		data:{
                state : cat,
                action:'getcity'
                },
		success: function(msg) {
                 jQuery('#city').html(msg);
		}
	});
});

jQuery('#username').blur(function()
   {
        var site = jQuery('.site').val();   
       jQuery('span.err').hide();
       var name = jQuery(this).val(); 
    jQuery.ajax({
		url: site+"/wp-admin/admin-ajax.php",
		type: 'POST',
		data:{
                username : name,
                action:'checkUsername'
                },
		success: function(msg) {
                    if(msg==0){
                        jQuery('#username').after('<span class=err uexist>Username already used!</span>');
                        flag=0;
                        
                    }
                    else
                    {
                        flag=1;
                    }
                 
		}
	});
});
jQuery('.email').blur(function()
   {
        var site = jQuery('.site').val();   
       jQuery('span.err').hide();
       var email = jQuery(this).val(); 
       
    
    if(jQuery('.email').val() ){
    jQuery.ajax({
		url: site+"/wp-admin/admin-ajax.php",
		type: 'POST',
		data:{
                useremail : email,
                action:'checkEmailid'
                },
		success: function(msgemail) {
                  
                    if(msgemail==0){
                        
                        jQuery('.email').after('<span class=err eexist>Email already used!</span>');
                         error=0;
                       
                    }
                    else
                    {
                         jQuery('.email').after('<span class=err eexist>Your Email Id is Valid.</span>');
                        error=1;
                    }
                 
		}
	});}
});


  
  
        jQuery("#submitbtn").click(function(){
       
            
            
         var busName= jQuery("#first_name2").val();
         var membership= jQuery(".membership").val();
      
         var username= jQuery("#username").val();
         var birthmonth= jQuery("#BirthMonth").val();
         var birthday= jQuery("#BirthDay").val();
         var birthyear= jQuery("#BirthYear").val();

         var country= jQuery("#country").val();
         var email= jQuery(".email").val();
         var cEmail= jQuery("#email2").val();
         var state= jQuery("#state").val();
         var city= jQuery("#city").val();
         var pass= jQuery("#password").val();
         var cPass= jQuery("#password2").val();
         var secu1= jQuery("#question1").val();
         var secu2= jQuery("#question2").val();
         var ans1= jQuery("#a1").val();
         var ans2= jQuery("#a2").val();
        
        if(membership==0)
             {
                 
                 jQuery(".membership").css('border','1px solid red');
                 return false;
             }
         if(!busName)
             {
                 jQuery("#first_name2").css('border','1px solid red');
                 return false;
             }
         if(!username)
             {
                 jQuery("#username").css('border','1px solid red');
                 return false;
             }
         if(!birthmonth)
             {
                 jQuery("#BirthMonth").css('border','1px solid red');
                 return false;
             }
         if(!birthday)
             {
                 jQuery("#BirthDay").css('border','1px solid red');
                 return false;
             }
         if(!birthyear)
             {
                 jQuery("#BirthYear").css('border','1px solid red');
                 return false;
             }

         if(!country)
             {
                 jQuery("#country").css('border','1px solid red');
                 return false;
             }
         
         if(!email)
             {
                 jQuery(".email").css('border','1px solid red');
                 return false;
             }
         if(!cEmail)
             {
                 jQuery("#email2").css('border','1px solid red');
                 return false;
             }
         if(!pass)
             {
                 jQuery("#password").css('border','1px solid red');
                 return false;
             }
         if(!cPass)
             {
                 jQuery("#password2").css('border','1px solid red');
                 return false;
             }
             
        if(secu1)
        {
           if(!ans1)
               {
                   jQuery("#a1").css('border','1px solid red');
                 return false;
               }
        }
        if(secu2)
        {
            if(!ans2)
               {
                   jQuery("#a2").css('border','1px solid red');
                 return false;
               }
        }
             
    
             if (!jQuery('#tnc').is(":checked") )
             {
                 jQuery('.war').html('You must accept the t & c to prodeed');
                 return false;
             }
             
           
         if(flag==0 || error==0 || pasvar==0)
      {
          return false;
      }
             
             
             
             var fields = jQuery(".registerForm1").serializeArray();

             jQuery.ajax({
		url: site+"/wp-admin/admin-ajax.php",
		type: 'POST',
		data:{
                formfields:fields,
                
                action:'paypalForm'
                },
		success: function(data) {
                   
                  //  jQuery("#paypalForm").html(data);
                  //  jQuery("#submitinfo").submit();
                     
                }
	});
        return false;
        
        
             
         });
              
//              if(jQuery("#question1").val()=='')
//             {
//                 jQuery("#a1").keypress(function(){
//
//                     jQuery("#question1").css('border','1px solid red');
//                    // return false;
//             });
//            }
//        jQuery("#question1").change(function(){
//
//                     jQuery("#question1").css('border','none');
//                     return true;
//             });
//        
//             
//             if(jQuery("#question2").val()=='')
//             {
//                 jQuery("#a2").keypress(function(){
//
//                     jQuery("#question2").css('border','1px solid red');
//                    // return false;
//             });
//            }
//            jQuery("#question2").change(function(){
//
//                     jQuery("#question2").css('border','none');
//                     return true;
//             });
        
        
        jQuery("#first_name2").keypress(function(){
            jQuery("#first_name2").css('border','none');
            return true;
        });
       
       jQuery("#username").keypress(function()
       {
             jQuery("#username").css('border','none');
            return true;
       });
  
      
//       jQuery("#birthdate").keypress(function()
//        {
//             jQuery("#birthdate").css('border','none');
//            return true;
//        });
       
        jQuery("#country").change(function()
        {
             jQuery("#country").css('border','none');
            return true;
        });
        jQuery(".membership").change(function()
        {
             jQuery(".membership").css('border','none');
            return true;
        });
       
        jQuery(".email").keypress(function()
        {
            jQuery(".email").css('border','none');
            return true;
        });
      
        jQuery("#email2").keypress(function()
        {
            jQuery("#email2").css('border','none');
            return true;
        });
       
        jQuery("#password").keypress(function()
        {
            jQuery("#password").css('border','none');
            return true;
        });
        
        jQuery("#password2").keypress(function()
        {
            jQuery("#password2").css('border','none');
            return true;
        });
        
           jQuery('.email').live('keyup', function (){
            
            var email =   jQuery('.email').val();
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if(!emailReg.test(email))
            {
                  jQuery(this).css("border","1px solid #ff0000");
                return false;
            }
            else
                {
                    jQuery(this).css("border","none");  
                }
        });     
           jQuery('#email2').live('keyup', function (){
            
            var email =   jQuery('#email2').val();
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if(!emailReg.test(email))
            {
                  jQuery(this).css("border","1px solid #ff0000");
                return false;
            }
            else
                {
                    jQuery(this).css("border","none");  
                }
        });     
  
        jQuery('#email2').blur(function()
        {
            var email=   jQuery('.email').val();
            var email2=   jQuery('#email2').val();
           
            if(email2){
            if(email !=email2)
                {
                    jQuery('.err1').html('Email Id not Matching');
                     flag=0;
                   
                }
            else
                {
                    jQuery('.err1').html('Email Id matched.');
                    flag=1;
                   
                }
            }
        });
        jQuery('#password2').blur(function()
        {
            var email=   jQuery('#password').val();
            var email2=   jQuery('#password2').val();
         
            if(email2){
            if(email !=email2)
                {
                    jQuery('.err2').html('Password not Matching');
                     pasvar=0;
                   
                }
            else
                {
                    jQuery('.err2').html('Password matched.');
                    pasvar=1;
                   
                }
            }
            else
                {
                    jQuery('.err2').html('Please retype your password');
                    pasvar=0;
                   
                }
        });
        
         jQuery('#mobile').live('keypress', function (e)
        { 
            if( e.which!=8 && e.which!=0 && e.which!=43 && (e.which<45 || e.which>57) && e.which!=47)
            {
                jQuery(this).css("border","1px solid #ff0000");
                return false;
            }
            else
             {
                 jQuery(this).css("border","1px solid #ccc");
             }   
        }); 
         jQuery('#phone').live('keypress', function (e)
        {
            if( e.which!=8 && e.which!=0 && e.which!=43 && (e.which<45 || e.which>57) && e.which!=47)
            {
                jQuery(this).css("border","1px solid #ff0000");
                return false;
            }
            else
             {
                 jQuery(this).css("border","1px solid #ccc");
             }   
        });
            
         jQuery("#a2").keypress(function()
        {
            jQuery("#a2").css('border','none');
            return true;
        });
         jQuery("#a1").keypress(function()
        {
            jQuery("#a1").css('border','none');
            return true;
        });
        
        
        
  
        jQuery(".membership").change(function()
        {
            var membership = jQuery(".membership").val();
           if(membership==1)
               {
                   jQuery(".priceForPlan").val('$'+25+' for 2 Years');
               }
           if(membership==2)
               {
                   jQuery(".priceForPlan").val('$'+100+' for a Year');
               }
           if(membership==3)
               {
                   jQuery(".priceForPlan").val('$'+200+' for a Year');
               }
           if(membership==4)
               {
                   jQuery(".priceForPlan").val('Nill');
               }
        });
  
 
   jQuery(".privroom").click(function(){
       
       alert(jQuery(".privroom").val());
       if( jQuery(".privroom").val()=='1')
       {
           
           jQuery(".fieldconditionY").show();
       }
       if( jQuery(".privroom").val()=='0')
       {
           
           jQuery(".fieldconditionN").show();
       }
       
       
   });
  
  /*------------------------------------Host form validation-----------------------------------------*/
  
  
  jQuery('.emailId').blur(function()
   {
        var site = jQuery('.site').val();   
       jQuery('span.err').hide();
       var email = jQuery(this).val(); 
       
    
    if(jQuery('.emailId').val() ){
    jQuery.ajax({
		url: site+"/wp-admin/admin-ajax.php",
		type: 'POST',
		data:{
                useremail : email,
                action:'checkEmailid'
                },
		success: function(msgemail) {
                  
                    if(msgemail==0){
                        
                        jQuery('.emailId').after('<span class=err eexist>Email already used!</span>');
//                         error=0;
                       
                    }
                    else
                    {
                         jQuery('.emailId').after('<span class=err eexist>Your Email Id is Valid.</span>');
//                        error=1;
                    }
                 
		}
	});}
});
  
  jQuery(".hostsubmit").click(function(){
      
         var username= jQuery(".hostUsername").val();
         var firstName=jQuery(".firstName").val();
         var lastName=jQuery(".lastName").val();
         var email= jQuery(".emailId").val();
         var country= jQuery("#country").val();
         var state= jQuery("#state").val();
         var city= jQuery("#city").val();
         var pass= jQuery(".hostpassword").val();
         var distance=jQuery(".distance").val()
         var walkingDis=jQuery(".walkingDis").val()
         var policy=jQuery(".policy").val()
         var roomprice=jQuery(".roomprice").val()
         var mealtype=jQuery(".mealtype").val()
         var children=jQuery(".children").val()
         var peoplecount=jQuery(".peoplecount").val()
         var smoke_at_home=jQuery(".smoke_at_house_rdo").val()
         var maxpeople=jQuery(".maxpeople").val()
         
         
         if(!country)
         {
                 jQuery("#country").css('border','1px solid red');
                 return false;
         }
         if(!state)
         {
                 jQuery("#state").css('border','1px solid red');
                 return false;
         }
         if(!city)
         {
                 jQuery("#city").css('border','1px solid red');
                return false;
       }
         if(!distance)
         {
                 jQuery(".distance").css('border','1px solid red');
                return false;
         }
         if(!walkingDis)
         {
                 jQuery(".walkingDis").css('border','1px solid red');
                return false;
         }
         
         if(!maxpeople)
         {
                 jQuery(".maxpeople").css('border','1px solid red');
                return false;
         }
         if(policy=='0')
         {
                 jQuery(".policy").css('border','1px solid red');
                return false;
         }
         if(!roomprice)
         {
                 jQuery(".roomprice").css('border','1px solid red');
                return false;
         }
         if(mealtype=='select')
         {
                 jQuery(".mealtype").css('border','1px solid red');
                return false;
         }
         if(!children)
         {
                 jQuery(".children").css('border','1px solid red');
                return false;
         }
         if(!peoplecount)
         {
                 jQuery(".peoplecount").css('border','1px solid red');
                return false;
         }
         
         if(! jQuery(".smoke_at_house_rdo").is(":checked"))
         {
                 jQuery(".warsmoke").html('Select Either one');
                return false;
         }
         
//         var checked_num = jQuery('input[name="family_pets[]"]:checked').length;
//        if (!checked_num) {
//            jQuery(".peterror").html('Check atleast one of the select box');
//        }
         
         if(!username)
        {
                 jQuery(".hostUsername").css('border','1px solid red');
                 return false;
        }
         if(!firstName)
        {
                 jQuery(".firstName").css('border','1px solid red');
                 return false;
        }
         if(!lastName)
        {
                 jQuery(".lastName").css('border','1px solid red');
                 return false;
        }
        
         if(!email)
         {
                 jQuery(".emailId").css('border','1px solid red');
                 return false;
         }
      
         if(!pass)
         {
                 jQuery(".hostpassword").css('border','1px solid red');
                 return false;
         }
         
         
         if (!jQuery('.tnc').is(":checked") )
             {
                 jQuery('.warning').html('You must accept the t & c to prodeed');
                 return false;
             }
         
        
       
         
         
  });
  

         jQuery("#country").change(function()
         {
            jQuery("#country").css('border','1px solid #2f2f2f');
            return true;
            
         });
         jQuery("#state").change(function()
         {
            jQuery("#state").css('border','1px solid #2f2f2f');
            return true;
            
         });
         jQuery("#city").change(function()
         {
            jQuery("#city").css('border','1px solid #2f2f2f');
            return true;
            
         });
        
         jQuery('.distance').live('keypress', function (e)
        { 
            if( e.which!=8 && e.which!=0 && e.which!=43 && (e.which<45 || e.which>57) && e.which!=47)
            {
                jQuery(this).css("border","1px solid #ff0000");
                return false;
            }
            else
             {
                 jQuery(this).css("border","1px solid #ccc");
             }   
        }); 
         jQuery('.walkingDis').live('keypress', function (e)
        { 
            if( e.which!=8 && e.which!=0 && e.which!=43 && (e.which<45 || e.which>57) && e.which!=47)
            {
                jQuery(this).css("border","1px solid #ff0000");
                return false;
            }
            else
             {
                 jQuery(this).css("border","1px solid #ccc");
             }   
        }); 
         jQuery('.maxpeople').live('keypress', function (e)
        { 
            if( e.which!=8 && e.which!=0 && e.which!=43 && (e.which<45 || e.which>57) && e.which!=47)
            {
                jQuery(this).css("border","1px solid #ff0000");
                return false;
            }
            else
             {
                 jQuery(this).css("border","1px solid #ccc");
             }   
        }); 
         jQuery(".policy").change(function()
         {
            jQuery(".policy").css('border','1px solid #2f2f2f');
            return true;
            
         });
          jQuery('.roomprice').live('keypress', function (e)
        { 
            if( e.which!=8 && e.which!=0 && e.which!=43 && (e.which<45 || e.which>57) && e.which!=47)
            {
                jQuery(this).css("border","1px solid #ff0000");
                return false;
            }
            else
             {
                 jQuery(this).css("border","1px solid #ccc");
             }   
        }); 
      
         jQuery(".mealtype").change(function()
         {
            jQuery(".mealtype").css('border','1px solid #2f2f2f');
            return true;
            
         });
         jQuery(".children").keypress(function()
         {
            jQuery(".children").css('border','1px solid #2f2f2f');
            return true;
            
         });
         jQuery(".peoplecount").keypress(function()
         {
            jQuery(".peoplecount").css('border','1px solid #2f2f2f');
            return true;
            
         });
         jQuery(".smoke_at_house_rdo").click(function()
         { 
              jQuery(".warsmoke").html('');
            return true;
            
         });
         jQuery(".hostUsername").keypress(function()
         {
            jQuery(".hostUsername").css('border','1px solid #2f2f2f');
            return true;
            
         });
         
         jQuery(".firstName").keypress(function()
         {
            jQuery(".firstName").css('border','1px solid #2f2f2f');
            return true;
            
         });
         
         jQuery(".lastName").keypress(function()
         {
            jQuery(".lastName").css('border','1px solid #2f2f2f');
            return true;
            
         });
         
         jQuery(".emailId").keypress(function()
         {
            jQuery(".emailId").css('border','1px solid #2f2f2f');
            return true;
            
         });
         jQuery(".hostpassword").keypress(function()
         {
            jQuery(".hostpassword").css('border','1px solid #2f2f2f');
            return true;
            
         });
         
         
         jQuery('.emailId').live('keyup', function (){
            
            var email =   jQuery('.emailId').val();
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if(!emailReg.test(email))
            {
                  jQuery(this).css("border","1px solid #ff0000");
                return false;
            }
            else
                {
                    jQuery(this).css("border","none");  
                }
        });     
         
  
//        jQuery("#myElem").show().delay(10000).queue(function(n) {
//       
//        jQuery(this).hide(); n();
//        });
  
//                    jQuery('.errPrj').html("You Dont have sufficent Balance.");
//                    jQuery('.PrjD-').find('.redirectLoad').show();
//                    setTimeout(function() { window.location = URL;},2000);
                                            //return true;
 



jQuery(".guestReg").click(function(){
   var country= jQuery("#country").val();
         var state= jQuery("#state").val();
         var arrivalDate=jQuery(".arrivalDate").val();
         var departureDate=jQuery(".departureDate").val();
         var pplCount=jQuery(".pplCount").val();
         var priceNt=jQuery(".priceNt").val();
         var shortDes=jQuery(".shortDes").val();
         
         if(!country)
             {
                 jQuery("#country").css('border','1px solid red');
                 return false;
             }
         if(!state)
             {
                 jQuery("#state").css('border','1px solid red');
                 return false;
             }
         if(!arrivalDate)
             {
                 jQuery(".arrivalDate").css('border','1px solid red');
                 return false;
             }
         if(!departureDate)
             {
                 jQuery(".departureDate").css('border','1px solid red');
                 return false;
             }
         if(!pplCount)
             {
                 jQuery(".pplCount").css('border','1px solid red');
                 return false;
             }
         if(!priceNt)
             {
                 jQuery(".priceNt").css('border','1px solid red');
                 return false;
             }
         if(!shortDes)
             {
                 jQuery(".shortDes").css('border','1px solid red');
                 return false;
             }
         
    
    
    
});

jQuery(".arrivalDate").click(function(){
     jQuery(".arrivalDate").css('border','none');
})
jQuery(".departureDate").click(function(){
     jQuery(".departureDate").css('border','none');
})
jQuery(".pplCount").live('keypress', function (e)
        { 
            if( e.which!=8 && e.which!=0 && e.which!=43 && (e.which<45 || e.which>57) && e.which!=47)
            {
                jQuery(this).css("border","1px solid #ff0000");
                return false;
            }
            else
             {
                 jQuery(this).css("border","1px solid #ccc");
             }   
        }); 
jQuery(".priceNt").live('keypress', function (e)
        { 
            if( e.which!=8 && e.which!=0 && e.which!=43 && (e.which<45 || e.which>57) && e.which!=47)
            {
                jQuery(this).css("border","1px solid #ff0000");
                return false;
            }
            else
             {
                 jQuery(this).css("border","1px solid #ccc");
             }   
        }); 
        
jQuery(".shortDes").keypress(function(){
     jQuery(".shortDes").css('border','none');
});



});
                                            