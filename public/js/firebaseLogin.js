// Initialize Firebase
var firebaseConfig = {
    apiKey: "AIzaSyCoROKp7nbcXqPP0YtA4fO3sPiVYVyi9pI",
    authDomain: "laravel-auth-9a60c.firebaseapp.com",
    projectId: "laravel-auth-9a60c",
    storageBucket: "laravel-auth-9a60c.appspot.com",
    messagingSenderId: "969104073456",
    appId: "1:969104073456:web:5a843163dbf96cb9fd1835"
};
firebase.initializeApp(firebaseConfig);
var facebookProvider = new firebase.auth.FacebookAuthProvider();
var googleProvider = new firebase.auth.GoogleAuthProvider();
var facebookCallbackLink = '/login/facebook/callback';
var googleCallbackLink = '/login/google/callback';

async function socialSignin(provider) {
    var socialProvider = null;
    if (provider == "facebook") {
        socialProvider = facebookProvider;
        document.getElementById('social-login-form').action = facebookCallbackLink;
    } else if (provider == "google") {
        socialProvider = googleProvider;
        document.getElementById('social-login-form').action = googleCallbackLink;
    } else {
        return;
    }
    firebase.auth().signInWithPopup(socialProvider).then(function (result) {
        result.user.getIdToken().then(function (result) {
            document.getElementById('social-login-tokenId').value = result;
            document.getElementById('social-login-form').submit();
        });
    }).catch(function (error) {
        // do error handling
        console.log(error);
    });
}