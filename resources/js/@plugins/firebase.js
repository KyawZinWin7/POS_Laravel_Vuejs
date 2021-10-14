import firebase from 'firebase'

// firebase configuration
const firebaseConfig = {
  apiKey: 'AIzaSyB0OCdBQdL2sKpZ3KET0y5TMV3ht5aaxgs',
  authDomain: 'bilions-pos.firebaseapp.com',
  projectId: 'bilions-pos',
  storageBucket: 'bilions-pos.appspot.com',
  messagingSenderId: '571631180991',
  appId: '1:571631180991:web:b88d73f60e85d3e49d7a0a',
  measurementId: 'G-5GP5GL5XCB',
}
// Initialize Firebase
firebase.initializeApp(firebaseConfig)
firebase.analytics()
window.firebase = firebase
