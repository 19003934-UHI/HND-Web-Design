// Get the modal
var modalLogin = document.getElementById('login');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalLogin) {
        modal.style.display = "none";
    }
}

var modalRegister = document.getElementById('register');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalRegister) {
        modal.style.display = "none";
    }
}

// Redirects an admin to the current user list
var buttonRedirect = document.getElementById('current-users');

buttonRedirect.addEventListener('click', function() {
    document.location.href = 'userlist.php';
})

// Set, Retrieve and Delete Cookies

var usercookie;

function showCookie() {
    if(usercookie.length != 0)
    {
        alert("Your cookie details are: " + usercookie);
    } else {
        alert("No cookie has been set");
    }
}

function deleteCookie() {
    document.cookie = usercookie + "; max-age = 0";
    usercookie = document.cookie;
    alert("Your cookie details have been deleted");
}
