// Initialize Firebase
const config = {
    apiKey: "AIzaSyCjKRCR3LNpWrPNEQWspJaVAX1O4jUCDtA",
    authDomain: "greeceftw-9932d.firebaseapp.com",
    databaseURL: "https://greeceftw-9932d.firebaseio.com",
    projectId: "greeceftw-9932d",
    storageBucket: "greeceftw-9932d.appspot.com",
    messagingSenderId: "921955677059"
};
firebase.initializeApp(config);
console.log("Firebase initilised");

function CollectData() {
    var email = $("#inputEmail");
    var password = $("#inputPassword");

    validation(email, password);
}

function LogIn() {
    var email = $("#inputEmail").val();
    var password = $("#inputPassword").val();
    alert("Given email: " + email + "\nGiven password: " + password);

    validation(email, password);

    firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        alert("Could NOT log you in due to: " + errorCode + "\nWith message: " + errorMessage);

    });

    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            // User is signed in.
            var displayName = user.displayName;
            var email = user.email;
            var emailVerified = user.emailVerified;
            var photoURL = user.photoURL;
            var isAnonymous = user.isAnonymous;
            var uid = user.uid;
            var providerData = user.providerData;

            alert(displayName + email + emailVerified + photoURL + isAnonymous + uid + providerData);
            window.location.href = "/user-admin.html";
            console.log("log in")
        } else {
            // User is signed out.
            console.log("log out")
        }
    });
}

function Create() {

    var email = $("#inputEmail").val();
    var password = $("#inputPassword").val();

    alert("Given email: " + email + "\nGiven password: " + password);

    if(validation(email, password)){
        firebase.auth().createUserWithEmailAndPassword(email, password).catch(function (error) {
            // Handle Errors here.
            // var errorCode = error.code;
            // var errorMessage = error.message;
            // alert("Create: User not created. Code: " + errorCode + "\nError Message: " + errorMessage);
            alert("User Created");
        });

        firebase.auth().signInWithEmailAndPassword(email, password).catch(function (error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            alert("sign in error");
            jQuery.ajax({
                type: "POST",
                url: 'registration_email.php',
                dataType: 'json',
                data: {functionname: 'send', arguments: [1,2]},

                success: function (obj, textstatus) {
                    if( !('error' in obj) ) {
                        yourVariable = obj.result;
                    }
                    else {
                        console.log(obj.error);
                    }
                }
            });
            window.location.replace("user-admin.html");
        });

        // firebase.auth().onAuthStateChanged(function(user) {
        //     alert("AUTH State changed on: " + user.email);
        //     if (user) {
        //         // User is signed in.
        //         const displayName = user.displayName;
        //         const email = user.email;
        //         const emailVerified = user.emailVerified;
        //         const photoURL = user.photoURL;
        //         const isAnonymous = user.isAnonymous;
        //         const uid = user.uid;
        //         const providerData = user.providerData;
        //
        //         alert("Register and signed In. Data Collected:\n" + displayName + "\n"+email + "\n"+emailVerified + "\n"+photoURL + "\n"+isAnonymous + "\n"+uid + "\n"+providerData);
        //         window.location.href = "/user-admin.html";
        //         console.log("log in")
        //     } else {
        //         // User is signed out.
        //
        //         alert("Signed OUT. Data Collected:\n" + displayName + "\n"+email + "\n"+emailVerified
        //             + "\n"+photoURL + "\n"+isAnonymous + "\n"+uid + "\n"+providerData);
        // log.console("fail");
        //     }
        // });
    }
}

function validation(email, password) {
    function validatePassword(password)
    {
        var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
        return re.test(password);
    }
    function validateEmail(elementValue){
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return emailPattern.test(elementValue);
    }
    if(!validateEmail(email)){
        alert(email+"E-mail address provided is not correct!");
        return;
    }

    if(!validatePassword(password)){
        alert(password+"Password format is not correct! \nUse one at least one number, one lowercase, one uppercase letter and at least six characters");
        return;
    }
}

