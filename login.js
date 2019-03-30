// Hide registration form on page load
document.getElementById('registrationForm').style.display = "none";

// Hide the messages if there is no query param
if(document.getElementById('messages') && !window.location.search) {
    document.getElementById('messages').style.display = "none";
}

// This function toggles the class on the buttons to give faux toggle capability
function toggleClass(mode) {
    // Get a hold of the toggle buttons
    var login = document.getElementById("loginButton");
    var register = document.getElementById("registerButton");

    if(mode === 'login' || mode === 'user') {
        // If login button was clicked and it is inactive make it active and show the login form
        if(login.classList.contains('btn-secondary')) {

            // Hides any messages if switching between login or register
            if(document.getElementById('messages')) {
                document.getElementById('messages').style.display = "none";
            }

            login.classList.remove('btn-secondary');
            login.classList.add('btn-primary');
            register.classList.remove('btn-primary');
            register.classList.add('btn-secondary');
            document.getElementById('registrationForm').style.display = "none";
            document.getElementById('loginForm').style.display = "block";
        }
    } else {
        // If register button was clicked and it is inactive make it active and show the registration form
        if(register.classList.contains('btn-secondary')) {

            // Hides any messages if switching between login or register
            if(document.getElementById('messages')) {
                document.getElementById('messages').style.display = "none";
            }

            register.classList.remove('btn-secondary');
            register.classList.add('btn-primary');
            login.classList.remove('btn-primary');
            login.classList.add('btn-secondary');
            document.getElementById('registrationForm').style.display = "block";
            document.getElementById('loginForm').style.display = "none";
        }
    }
}