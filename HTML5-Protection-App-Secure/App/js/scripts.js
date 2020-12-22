const usernameRegex = /^[a-zA-Z0-9]+$/;
const passwordRegex = /(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{3,32}/;
let notABot = 0;

let randomNonce = function (length) {
    let text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for (let i = 0; i < length; i++) {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }
    return text;
}

function encryptString(stringToEncrypt) {
    let hashString = "z8ECURAvh79pl0GSj9Y";
    let encrypted = CryptoJS.AES.encrypt(stringToEncrypt, hashString);
    //console.log("Encrypted: " + encrypted);
    return "" + encrypted;
}

function decryptString(stringToDecrypt) {
    let hashString = "z8ECURAvh79pl0GSj9Y";
    let decrypted = CryptoJS.AES.decrypt(stringToDecrypt, hashString);
    let decryptedPretty = decrypted.toString(CryptoJS.enc.Utf8);
    //console.log("Decrypted: " + decrypted);
    //console.log("Original string after decryption: " + decryptedPretty);
    return "" + decryptedPretty;
}

function bruteForceProtect() {
    if (typeof (Storage) !== "undefined") {
        // Check if session storage is supported in browser
        if (sessionStorage.bfpCounter) {
            // If bfpCounter has been set then add 1 to it
            sessionStorage.bfpCounter = Number(sessionStorage.bfpCounter) + 1;
        } else {
            // Else set bfpCounter to 1
            sessionStorage.bfpCounter = 1;
        }
    }
    // Ban user if they access 100 pages times in one session
    if (sessionStorage.bfpCounter > 20) {
        alert("Too many attempts to log in or register");
        sessionStorage.bfpCounter = 17;
        window.location.replace("https://google.com");
    }
}

var fileNameFromUrl = window.location.pathname;
if (fileNameFromUrl == "/" || fileNameFromUrl == "/register-user"){
    bruteForceProtect();
}


$('document').ready(function () {

    $("#login").click(function (event) {
        if (notABot != 1) {
            window.location.replace("./index.php");
        }
    });

    $("#register").click(function (event) {
        if (notABot != 1) {
            window.location.replace("./register-user.php");
        }
        let username = $("#username").val();
        let password = $("#password").val();

        if (username == "" || password == "") {
            $("#message").text("Please complete the required fields");
        } else if (usernameRegex.test(username) == 0) {
            event.preventDefault();
            $("#message").text("Username should only have regular characters or numbers");
            return 0;
        } else if (passwordRegex.test(password) == 0) {
            event.preventDefault();
            $("#message").text("Password should have an upper, lower, number and special character and be length 13-32");
            return 0;
        }
    });

    //Nonce
    $("#randomNonce").val(randomNonce(12));

    setTimeout(function () {
        notABot = 1;
    }, 1500);
});


//spa

$('document').ready(function () {

    $('.nav-link').on('click', function (e) {
        e.preventDefault();
        var href = $(this).attr('href');

        // Getting Content
        getContent(href, true);

        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    });

    $('#back').on('click', function (e) {
        window.history.back();
    });

    $('#forward').on('click', function (e) {
        window.history.forward();
    });

});

function getContent(url, addEntry) {
    $.get(url)
        .done(function (data) {

            // Updating Content on Page
            $('#content').html(data);

            if (addEntry == true) {
                // Add History Entry using pushState
                history.pushState(null, null, url);
            }

        });
}

// Adding popstate event listener to handle browser back button  
window.addEventListener("popstate", function (e) {

    // Get State value using e.state
    if (window.location.pathname != "/home.php") {
        getContent(location.pathname, false);
    } else alert("You are at the beginning");
    console.log("Popstate has been fired");
    console.log("history changed to: " + document.location.href);
});