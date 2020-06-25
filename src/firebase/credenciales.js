import firebase from 'firebase/app';
import 'firebase/firestore';
import 'firebase/storage';
import 'firebase/auth';
const firebaseConfig = {
  apiKey: "AIzaSyBkpxdk2mk1nsu1XHCSzAR9BvIjRFQ48vM",
  authDomain: "cloudtest-707ad.firebaseapp.com",
  databaseURL: "https://cloudtest-707ad.firebaseio.com",
  projectId: "cloudtest-707ad",
  storageBucket: "cloudtest-707ad.appspot.com",
  messagingSenderId: "1036466555288",
  appId: "1:1036466555288:web:2219c0f0e273bf42fc03ed",
  measurementId: "G-HRS9PGFGL9"
};
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  
  export default firebase;