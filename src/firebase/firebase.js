import React,{useState,useEffect} from 'react';
import ModeloAuth from './modelos/modeloauth'

function Indicie() {
  const [datos,setDatos]= useState({correo:'',
                                    contra:''})
  useEffect(()=>{
    actual()
  },[])
  const handleChange=(evt)=>{
    setDatos({...datos,[evt.target.name]:evt.target.value})
  }
  const creoCuenta =()=>{
    ModeloAuth.creoCuenta(datos,(rt)=>{
      console.log(rt)
    })
  }
  const actual =()=>{
    setInterval(()=>{
       ModeloAuth.checousuarioActual()
    },2500)
  }
  const meLogeo =()=>{
    ModeloAuth.inicioSesion(datos,(rt)=>{ 
    })
  } 
  const logout =()=>{

    ModeloAuth.cierreSesion(datos,(rt)=>{ 
    })
  }
  const atualizoPerfil =()=>{

    ModeloAuth.actualizoPerfil( (rt)=>{ 
    })
  }
  return(
    <React.Fragment>
      <fieldset>
        <legend>Creacion</legend>
        <input name="correo" onChange={handleChange} value={datos.correo}  />
        <input name="contra" onChange={handleChange} value={datos.contra}  />
        <button onClick={creoCuenta} >Creo cuenta</button>
      </fieldset>
      <fieldset style={{margin:"20px 0px 0px 0px "}} >
        <legend>Login</legend>
        <input name="correo" onChange={handleChange} value={datos.correo}  />
        <input name="contra" onChange={handleChange} value={datos.contra}  />
        <button onClick={meLogeo} >Logeo</button>
      </fieldset>
      <div style={{display:"flex"}} > 
        <fieldset style={{margin:"20px 10px 0px 0px "}} >
          <legend>Logout</legend> 
          <button onClick={logout} >DesLogeo</button>
        </fieldset>
        <fieldset style={{margin:"20px 0px 0px 0px "}} >
          <legend>Actualizo</legend> 
          <button onClick={atualizoPerfil} >Actualizo</button>
        </fieldset>
      </div>
    </React.Fragment> 
  )
}


export default Indicie