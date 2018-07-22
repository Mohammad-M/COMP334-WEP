function validate()
{ 
   if( document.apply.textnames.value == "" )
   {
     alert( "Please enter student  name!" );
     document.apply.textnames.focus() ;
     return false;
   }
   if( document.apply.textgrade.value == "" )
   {
     alert( "Please enter student grade !" );
     document.apply.textgrade.focus() ;
     return false;
   }

    if( document.apply.textbr.value == "" )
   {
     alert( "Please enter student birthday !" );
     document.apply.textbr.focus() ;
     return false;
   }
   if ( ( apply.Gender[0].checked == false ) && ( apply.Gender[1].checked == false ) )
   {
   alert ( "Please choose your Gender: Male or Female" );
   return false;
   }  
   if( document.apply.parentname.value == "" )
   {
     alert( "Please enter parent name !" );
     document.apply.parentname.focus() ;
     return false;
   }

   if( document.apply.caddress.value == "" )
   {
     alert( "Please provide your Current Address!" );
     document.apply.caddress.focus() ;
     return false;
   }
   
    
   if( document.apply.City.value == "-1" )
   {
     alert( "Please enter your City!" );
     document.apply.City.focus() ;
     return false;
   }   

   if( document.apply.Student  interests.value == "-1" )
   {
     alert( "Please enter your Student  interests!" );
     document.apply.Student  interests.focus() ;
     return false;
   }  
     
  
 var email = document.apply.emailid.value;
  atpos = email.indexOf("@");
  dotpos = email.lastIndexOf(".");
 if (email == "" || atpos < 1 || ( dotpos - atpos < 2 )) 
 {
     alert("Please enter correct email ID")
     document.apply.emailid.focus() ;
     return false;
 }

  if( document.apply.mobileno.value == "" ||
           isNaN( document.apply.mobileno.value) ||
           document.apply.mobileno.value.length != 10 )
   {
     alert( "Please enter your mobile Number in the format 123." );
     document.apply.mobileno.focus() ;
     return false;
   }

   if( document.apply.payment details.value == "-1" )
   {
     alert( "Please enter your payment details!" );
     document.apply.payment details.focus() ;
     return false;
   }  
   return( true );

}