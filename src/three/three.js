import React, { Component } from 'react';
import * as THREE from 'three';
class ThreeScene extends Component{
  componentDidMount(){
  	//jalamos datos de donde vamos hacer el render
    const width = this.mount.clientWidth
    const height = this.mount.clientHeight 

    //Aquí creamos nuestro WebGLRenderer
    //se declara para 
    this.renderer = new THREE.WebGLRenderer({ antialias: true })
    //damos tamaño
    this.renderer.setSize(width, height)
    //montamos el webrenderer
    this.mount.appendChild(this.renderer.domElement)


    //Creamos una escena vacía, es donde agregaremos nuestros objetos:
    this.scene = new THREE.Scene()

    //Y por último creamos una cámara, pasando como parámetros el 
    //FOV, el aspect ratio, el near plane y el far plane:
    this.camera = new THREE.PerspectiveCamera(
      75,
      width / height,
      0.1,
      1000
    )
    this.camera.position.z = 4

    // Creamos el Geometry, pasando el tamaño
		const geometry = new THREE.BoxGeometry( 1, 1, 1 );
		// Creamos el Material, pasando el color
		const material = new THREE.MeshBasicMaterial( { color: "#433F81" } );
		// Creamos el Mesh
		this.cubo = new THREE.Mesh( geometry, material );
		// Agregamos el Mesh a la escena
		this.scene.add( this.cubo );

    /*
    this.renderer.setClearColor('#000000')
    */
    //iniciamos el todo
    this.start()
  }
componentWillUnmount(){
    this.stop()
    this.mount.removeChild(this.renderer.domElement)
  }

start = () => {
	//checamos si existe
    if (!this.frameId) {
      this.frameId = requestAnimationFrame(this.animate)
    }
  }
stop = () => {
    cancelAnimationFrame(this.frameId)
  }
animate = () => {
	
   this.renderScene()
   this.frameId = window.requestAnimationFrame(this.animate)
 }
renderScene = () => {
  this.renderer.render(this.scene, this.camera)
}
render(){
    return(
      <div
        style={{ width: '400px', height: '400px',margin:"auto" }}
        ref={(mount) => { this.mount = mount }}
      />
    )
  }
}
export default ThreeScene