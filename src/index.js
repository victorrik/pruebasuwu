import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter , Switch, Route  } from "react-router-dom";
import Ckeditor from './ck/Ckeditor';  
import Grape from './grapa/Grape';
import Three from './three/three';  
import Fuego from './firebase/firebase';  

ReactDOM.render( 
    <BrowserRouter >
      <Switch> 
        <Route exact path="/ck" component={Ckeditor} />  
        <Route exact path="/grapa" component={Grape} />  
        <Route exact path="/tresde" component={Three} />  
        <Route exact path="/fuego" component={Fuego} />      
      </Switch>
    </BrowserRouter> ,
  document.getElementById('root')
); 