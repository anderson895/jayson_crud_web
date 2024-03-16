$(document).ready(function() {
    // Event listener for the button click
    $('#btnSignin').click(function() {
        var txtEmail = $('#txtEmail').val();
        var txtPassword = $('#txtPassword').val();
    
        // Make POST request
        $.ajax({
            url: 'controller/endpoint.php', 
            type: 'POST',
            data: { 
                txtEmail: txtEmail,
                txtPassword: txtPassword,
                functionName: "LoginFunction",
            }, 
            beforeSend: function() {
                $("#loadingSpinner").html('<div class="spinner-border text-warning" role="status"><span class="sr-only"></span></div>').show();
            },
            success: function(response) {
                console.log(response);
            
                if (response.trim() === "Login successful") { // Trim the response to remove any extra whitespace
                    alertify.success(response);
            
                    // Add a delay of 2 seconds before redirecting
                    setTimeout(function() {
                        window.location.href = 'view/view.php';
                    }, 2000);
            
                } else {
                    alertify.error(response); // Display the actual response received
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log the error response
                alertify.error("An error occurred while processing your request."); // Display a generic error message
            },
            complete: function() {
                $("#loadingSpinner").hide();
            }
        });
    });
    


    $('#btnSignup').click(function() {
        var S_firstname = $('#S_firstname').val();
        var L_firstname = $('#L_firstname').val();
        var S_email = $('#S_email').val();
        var S_password = $('#S_password').val();
    
        
        // Make POST request

        if(S_firstname&&L_firstname&&S_email&&S_password){

            $("#btnSignup").css("display", "none");

            $.ajax({
                url: 'controller/endpoint.php',
                type: 'POST',
                data: {
                    S_firstname: S_firstname,
                    L_firstname: L_firstname,
                    S_email: S_email,
                    S_password: S_password,
                    functionName: "SignupFunction",
                },
                success: function(response) {
                    console.log(response);
                    alertify.success("Signup successful");
                },
                beforeSend: function() {
                    $("#loadingSpinner").html('<div class="spinner-border text-warning" role="status"><span class="sr-only"></span></div>').show();
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                },
                complete: function() {
                    $("#loadingSpinner").hide();
                    $("#btnSignup").css("display", "block");
                    // Clear input fields after successful signup
                    $('#S_firstname').val("");
                    $('#L_firstname').val("");
                    $('#S_email').val("");
                    $('#S_password').val("");
                }
            });

        }else{
            return;
        }
        
    });
    
});




function myMenuFunction() {
    var i = document.getElementById("navMenu");
    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
}


var a = document.getElementById("loginBtn");
var b = document.getElementById("registerBtn");
var x = document.getElementById("login");
var y = document.getElementById("register");
function login() {
    x.style.left = "4px";
    y.style.right = "-520px";
    a.className += " white-btn";
    b.className = "btn";
    x.style.opacity = 1;
    y.style.opacity = 0;
}
function register() {
    x.style.left = "-510px";
    y.style.right = "5px";
    a.className = "btn";
    b.className += " white-btn";
    x.style.opacity = 0;
    y.style.opacity = 1;
}

