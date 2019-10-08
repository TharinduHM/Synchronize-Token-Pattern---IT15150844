//Name - Malwenna T.H
//SID  - IT15150844


//Ajax Function to Get CSRF Token for Current Session
function tokenRequest(cookie){

  var c_data = cookie;

  $.ajax({
    type: "POST",
    url: 'Token_Issuer.php',
    data: {cookieValue: c_data},
    dataType: 'HTML',
    success: function (test){

      //set received CSRF token in hidden filed in Home.php page form
      document.getElementById("MyToken").setAttribute("value", test);
    },
    error: function(){
      alert("Invalid Token Request!!!");
    }
  });
}
