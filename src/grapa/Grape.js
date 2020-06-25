import React from 'react'; 

import grapesjs from 'grapesjs'
import 'grapesjs-blocks-basic'
import 'grapesjs/dist/css/grapes.min.css'
import './grapa.scss'

let editor
class App extends React.Component { 
  cargoEditor(){
    editor = grapesjs.init({
      container: '#gjs', 
      height: '100%',
      width: '100%', 
      panels: { defaults: [] 
      },
      storageManager: {             // Prefix identifier that will be used inside storing and loading
        type: 'local',          // Type of the storage
        autosave: true,         // Store data automatically
        autoload: false,         // Autoload stored data on init
        stepsBeforeSave: 5,     // If autosave enabled, indicates how many changes are necessary before store method is triggered
        storeComponents: true,  // Enable/Disable storing of components in JSON format
        storeStyles: false,      // Enable/Disable storing of rules in JSON format
        storeHtml: false,        // Enable/Disable storing of components as HTML string
        storeCss: true,         // Enable/Disable storing of rules as CSS string
      },
      blockManager: {
        appendTo: '#blocks', 

      },  
      plugins: ['gjs-blocks-basic'],
      pluginsOpts: {
        "gjs-blocks-basic": {
          category:"Bloques",
          blocks:['column1', 'column2', 'column3', 'text',  'link'  , 'video' ] , 
          flexGrid:true
        }
      },
      styleManager: {
        appendTo: '.styles-container',
        sectors: [
          {
            name: 'General',
            open: false,
            buildProps: [  'display', 'position', 'top', 'right', 'left', 'bottom']
          },
          {
            name: 'Dimensiones',
            open: false,
            buildProps: ['width', 'height','padding','margin' ],
            properties: [
            {
              type: 'integer',// Type of the input, options: integer | radio | select | color | slider | file | composite | stack
              name: 'Ancho', // Label for the property
              property: 'width', // CSS property (if buildProps contains it will be extended)
              units: ['px', '%','vw'], // Units, available only for 'integer' types
              defaults: 'auto', // Default value
              min: 0, // Min value, available only for 'integer' types
            },
            {
              type: 'integer',
              name: 'Alto',
              property: 'height',
              units: ['px', '%','vh'],
              defaults: 'auto',
              min: 0,
            }
            ]
          },
          {
            name: 'Typography',
            open: false,
            buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-align', 'text-shadow']
          },
          {
            name: 'Decorations',
            open: false,
            buildProps: ['background-color','border-radius-c', 'border-radius', 'border', 'box-shadow'],
          },
        ]
      },
      traitManager: {
        appendTo: '.traits-container',
      },
    });

    editor.runCommand('sw-visibility');

    editor.Panels.addPanel({
      id: 'panel-top',
      el: '.panel__top',
    });

    editor.Panels.addPanel({
      id: 'basic-actions',
      el: '.panel__basic-actions',
      buttons: [
        {
          id: 'visibility',
          active: true, // active by default
          className: 'btn-toggle-borders',
          label: '<u title="Ver guías" >Guías</u>',
          command: 'sw-visibility', // Built-in command
        }/*, {
          id: 'export',
          className: 'btn-open-export',
          label: 'Exp',
          context: 'export-template', 
          command: 'export-template',// For grouping context of buttons from the same panel
        },  */
      ],
    });
    editor.Panels.addPanel({
      id: 'undoredo',
      el: '.panel__undoredo',
      buttons: [
        {
            id: 'show-undo',
            className: 'btn-show-undo',
            label: 'Deshacer',
            context: 'show-undo',

            command(editor) {
                const um = editor.UndoManager;
                um.undo();
            },
        },
        {
            id: 'show-redo',
            className: 'btn-show-redo',
            label: 'Rehacer',
            context: 'show-redo',

            command(editor) {
                const um = editor.UndoManager;
                um.redo();
            },
        }, 
      ],
    });
    editor.Panels.addPanel({
      id: 'full',
      el: '.panel__Full',
      buttons: [
        {
            id: 'Fulloscreen',
            className: 'btn-show-undo',
            label: 'Fullscreen',
            context: 'fullscreen',
            command: 'show-full'
        }, 
      ],
    });
    editor.Panels.addPanel({
      id: 'panel-switcher',
      el: '.panel__switcher',
      buttons: [  
      {
        id: 'show-style',
        active: false,
        label: 'Estilos',
        command: 'show-styles',
        togglable: false,
      },
      {
        id: 'show-traits',
        active: false,
        label: 'Configuraciones',
        command: 'show-traits',
        togglable: false,
      } ,
      {
        id: 'show-blockes',
        active: true,
        label: 'Bloques',
        command: 'show-blockes',
        togglable: false,
      } 
      ],
    });

    editor.Commands.add('show-styles', {
      getRowEl(editor) { return editor.getContainer().closest('.ContenidoGrapa'); },
      getStyleEl(row) { return row.querySelector('.styles-container') },

      run(editor, sender) {
        const smEl = this.getStyleEl(this.getRowEl(editor));
        smEl.style.display = '';
      },
      stop(editor, sender) {
        const smEl = this.getStyleEl(this.getRowEl(editor));
        smEl.style.display = 'none';
      },
    });
    editor.Commands.add('show-blockes', {
      getRowEl(editor) { return editor.getContainer().closest('.ContenidoGrapa'); },
      getStyleEl(row) { return row.querySelector('#blocks') },

      run(editor, sender) {
        const smEl = this.getStyleEl(this.getRowEl(editor));
        smEl.style.display = '';
      },
      stop(editor, sender) {
        const smEl = this.getStyleEl(this.getRowEl(editor));
        smEl.style.display = 'none';
      },
    });
    editor.Commands.add('show-traits', {
      getTraitsEl(editor) {
        const row = editor.getContainer().closest('.ContenidoGrapa');
        return row.querySelector('.traits-container');
      },
      run(editor, sender) {
        this.getTraitsEl(editor).style.display = '';
      },
      stop(editor, sender) {
        this.getTraitsEl(editor).style.display = 'none';
      },
    });
 
    editor.Commands.add('show-full', { 
      run(editor, sender) {
        editor.runCommand('fullscreen', {  target: '.HtmlPreview' });
      },
      stop(editor, sender) {
        editor.stopCommand('fullscreen'); 
      },
    }); 

    
  }
    render() {
      return (
          <div className="HtmlPreview" > 
            <div className="panel__top">
              <div className="panel__basic-actions"></div>
              <div className="panel__undoredo"></div>
              <div className="panel__Full"></div>
              <div className="panel__switcher"></div>
            </div>
            <div className="TopGrapa"> 
            </div>
            <div className="ContenidoGrapa" >
              <div className="IzquierdaGrapa" >
                <div id="gjs">
                </div>
              </div>
              <div className="DerechaGrapa" > 
                <div className="styles-container" style={{display:"none"}} > </div>
                <div className="traits-container" style={{display:"none"}} ></div>
                <div id="blocks"></div>
              </div>
            </div>
          </div>
      );
    }
}


export default App;
