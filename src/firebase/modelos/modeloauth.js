import firebase from '../credenciales';

//const dbFireStore = firebase.firestore();
const autenticacion  = firebase.auth(); 

class ModeloAuth{ 
  creoCuenta=(datos,callback)=>{  
      // deben ir abuebo dos parametros
      autenticacion.createUserWithEmailAndPassword(datos.correo,datos.contra)
    .then((data) => {   
            autenticacion.currentUser.sendEmailVerification().then(function() {
        // Email sent.
        console.log("se envio email")
      }).catch(function(error) {
        // An error happened.
        console.log(error)
      });
    })
    .catch( (error) =>{ 
      console.log( error.message)
      if (error.message === 'The email address is badly formatted.') { 
        //formato de correo no valido
      }
      if (error.message === 'The password must be 6 characters long or more.') { 
        //la contraseña debe tener 6 caractares o mas
      }
      if (error.message === 'Password should be at least 6 characters') { 
        //la contraseña debe almenos 6 caracteres
      }
      if (error.message === 'The email address is already in use by another account.') { 
        //El correo ya esta siendo ocupado
      }

      // ...
    });


  }
  inicioSesion =(datos,callback)=>{
    autenticacion.signInWithEmailAndPassword(datos.correo,datos.contra).then((datos)=>{
      console.log(datos)
    }) .catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      if (error.code === "auth/user-not-found") {
        // usuario no encontrado
      }
      if (error.code === "auth/wrong-password") {
        // contraseña incorrecta
      }
      console.log(errorCode,errorMessage)
    });
  }
  checousuarioActual=()=>{
      autenticacion.onAuthStateChanged(function(user) {
        console.log(user)
        if (user) {
          // User is signed in.
          var displayName = user.displayName;
          var email = user.email;
          var emailVerified = user.emailVerified;
          var photoURL = user.photoURL;
          var isAnonymous = user.isAnonymous;
          var uid = user.uid;
          var providerData = user.providerData; 
          console.log( email ,emailVerified  ,uid  )
          // ...
        } else {
          // User is signed out.
          // ...
          console.log("session cerrada")
        }
      });
 
  }
  cierreSesion=()=>{
    autenticacion.signOut().then(function(datos) {
      console.log(datos)
    }).catch(function(error) {
      console.log(error)
    });
  }

  actualizoPerfil=()=>{ 

      autenticacion.currentUser.updateProfile({
        displayName: "Vickarius",
        photoURL: null, 
      }).then(function() {
        // Update successful.
      }).catch(function(error) {
        // An error happened.
      });
  }

}
ModeloAuth  = new ModeloAuth();
export default ModeloAuth;
 