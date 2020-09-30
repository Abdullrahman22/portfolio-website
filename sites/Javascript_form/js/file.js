//Validate Functions
 function validateEmail(em) {
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return expr.test(em);
};
function validateName(n) {
    var nr = /.[a-zA-Z]+$/;
    return nr.test(n);
};

//Actions
$('#name').on("change blur" ,function() {
   var n = $('#name').val();
   if( !validateName(n) || n.length==0 ) {
      $('#name').css({
         "border" :"1px solid red"
      });
      $(".name-box p").fadeIn();
   }
   else {
      $('#name').css({
         "border" :"1px solid rgb(2, 245, 54)"
      });
      $(".name-box p").fadeOut();
   }
});

$('#email').on("change blur" ,function() {
   var em = $('#email').val();
   if( !validateEmail(em) || em.length == 0){
      $('#email').css({
         "border" :"1px solid red"
      });
      $(".email-box p").fadeIn();
   }
   else{
      $('#email').css({
         "border" :"1px solid rgb(2, 245, 54)"
      });
      $(".email-box p").fadeOut();

   }

});

$('#pass').keydown( function() {
   var pa = $('#pass').val();
   if( pa.length <= 6 || pa.length >= 12 ) {
      $('#pass').css({
         "border" :"1px solid red"
      });
      $(".password-box p").fadeIn();
   }
   else {
      $('#pass').css({
         "border" :"1px solid rgb(2, 245, 54)",
         "outline":"none"
      });
      $(".password-box p").fadeOut();
   }
});

$('#pass').blur( function(){
   if( $('#pass').val()==""){
      $('#pass').css({
         "border" :"1px solid red"
      });
   }
});

$("#re-password").on("change blur" ,function() {
   if($("#re-password").val() != $("#pass").val()  ){
      $('#re-password').css({
         "border" :"1px solid red"
      });
      $(".re-password-box p").fadeIn();
   }
   else if ($("#re-password").val() == $("#pass").val()  ) {
      $('#re-password').css({
         "border" :"1px solid rgb(2, 245, 54)",
         "outline":"none"
      });
      $(".re-password-box p").fadeOut();
   }
   
});


$('#sub').click(function(evt) {
  var n = $('#name').val();
  var em = $('#email').val();
  var pa = $('#pass').val();
  if(!validateName(n) || n.length==0 || !validateEmail(em) || em.length==0 || 
    pa.length<=6 || pa.length>=12) {
    alert("Error! Please check your details");
    evt.preventDefault();
  }
  else {
    alert("Form submitted successfully");
  }
});