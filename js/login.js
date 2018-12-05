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
    const email = $("#inputEmail").val();
    const password = $("#inputPassword").val();

    if(!validateEmail(email)){
        alert("E-mail address provided is not correct!");
        return;
    }else{
        alert("Given email: " + email + "\nGiven password: " + password);
    }

    if(!validatePassword(password)){
        alert("Password format is not correct! \nUse one at least one number, one lowercase, one uppercase letter and at least six characters");
        return;
    }else{
        alert("Given email: " + email + "\nGiven password: " + password);
    }
}

function LogIn() {
    const email = $("#inputEmail").val();
    const password = $("#inputPassword").val();
    alert("Given email: " + email + "\nGiven password: " + password);

    if(!validateEmail(email)){
        alert("E-mail address provided is not correct!");
        return;
    }

    if(!validatePassword(password)){
        alert("Password format is not correct! \nUse one at least one number, one lowercase, one uppercase letter and at least six characters");
        return;
    }

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
            // ...
        } else {
            // User is signed out.
            // ...
        }
    });
}

// linkSignUp.addEventListener('click', e =>  {
//
//     // TODO: Validation
//
//     alert("Given email: " + email + "\nGiven password: " + password);
//
//     firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
//         // Handle Errors here.
//         var errorCode = error.code;
//         var errorMessage = error.message;
//         alert("Create: User not created. Code: " + errorCode + "\nError Message: " + errorMessage);
//     });
//
//     firebase.auth().onAuthStateChanged(function(user) {
//         alert("AUTH State changed on: " + user.email);
//         if (user) {
//             // User is signed in.
//             const displayName = user.displayName;
//             const email = user.email;
//             const emailVerified = user.emailVerified;
//             const photoURL = user.photoURL;
//             const isAnonymous = user.isAnonymous;
//             const uid = user.uid;
//             const providerData = user.providerData;
//
//             alert("Signed In. Data Collected:\n" + displayName + "\n"+email + "\n"+emailVerified + "\n"+photoURL + "\n"+isAnonymous + "\n"+uid + "\n"+providerData);
//             // ...
//         } else {
//             // User is signed out.
//             // ...
//             alert("Signed OUT. Data Collected:\n" + displayName + "\n"+email + "\n"+emailVerified + "\n"+photoURL + "\n"+isAnonymous + "\n"+uid + "\n"+providerData);
//         }
//     });
// });


function Create() {
    // TODO: Validation
    const email = $("#inputEmail").val();
    const password = $("#inputPassword").val();

    if(!validateEmail(email)){
        alert("E-mail address provided is not correct!");
        return;
    }
    if(!validatePassword(password)){
        alert("Password format is not correct! \nUse one at least one number, one lowercase, one uppercase letter and at least six characters");
        return;
    }

    alert("Given email: " + email + "\nGiven password: " + password);

    firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        alert("Create: User not created. Code: " + errorCode + "\nError Message: " + errorMessage);
    });

    firebase.auth().onAuthStateChanged(function(user) {
        alert("AUTH State changed on: " + user.email);
        if (user) {
            // User is signed in.
            const displayName = user.displayName;
            const email = user.email;
            const emailVerified = user.emailVerified;
            const photoURL = user.photoURL;
            const isAnonymous = user.isAnonymous;
            const uid = user.uid;
            const providerData = user.providerData;

            alert("Signed In. Data Collected:\n" + displayName + "\n"+email + "\n"+emailVerified + "\n"+photoURL + "\n"+isAnonymous + "\n"+uid + "\n"+providerData);
            // ...
        } else {
            // User is signed out.
            // ...
            alert("Signed OUT. Data Collected:\n" + displayName + "\n"+email + "\n"+emailVerified
                + "\n"+photoURL + "\n"+isAnonymous + "\n"+uid + "\n"+providerData);
        }
    });
}

function validateEmail(elementValue){
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(elementValue);
}

function validatePassword(password)
{
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    return re.test(password);
}