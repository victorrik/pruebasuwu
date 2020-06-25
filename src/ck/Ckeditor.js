import React from 'react'; 
import CKEditor from '@ckeditor/ckeditor5-react';
/*import jsPDF from 'jspdf';
import html2canvas from 'html2canvas';*/
import DecoupledEditor from '@ckeditor/ckeditor5-build-decoupled-document';
import  '@ckeditor/ckeditor5-build-decoupled-document/build/translations/es';

import './ck.scss'
let datos = '<p style="text-align:center;">The Flavorful Tuscany Meetup</p><p style="text-align:center;">Welcome letter</p><p>Dear Guest,</p><p>We are delighted to welcome you to the annual <i>Flavorful Tuscany Meetup</i> and hope you will enjoy the programme as well as your stay at the <a href="http://ckeditor.com">Bilancino Hotel</a>.</p><p>Please find below the full schedule of the event.</p><figure class="table"><table><thead><tr><th colspan="2">Saturday, July 14</th></tr></thead><tbody><tr><td>9:30 AM - 11:30 AM</td><td><p><strong>Americano vs. Brewed</strong> - “know your coffee” with:&nbsp;</p><ul><li>Giulia Bianchi</li><li>Stefano Garau</li><li>Giuseppe Russo</li></ul></td></tr><tr><td>1:00 PM - 3:00 PM</td><td><p><strong>Pappardelle al pomodoro</strong> - live cooking</p><p>Incorporate the freshest ingredients&nbsp;<br>with Rita Fresco</p></td></tr><tr><td>5:00 PM - 8:00 PM</td><td><strong>Tuscan vineyards at a glance</strong> - wine-tasting&nbsp;<br>with Frederico Riscoli</td></tr></tbody></table></figure><blockquote><p>The annual Flavorful Tuscany meetups are always a culinary discovery. You get the best of Tuscan flavors during an intense one-day stay at one of the top hotels of the region. All the sessions are lead by top chefs passionate about their profession. I would certainly recommend to save the date in your calendar for this one!</p><p>Angelina Calvino, food journalist</p></blockquote><p>Please arrive at the <a href="http://ckeditor.com">Bilancino Hotel</a> reception desk <span style="background-color:hsl(60,75%,60%);">at least half an hour earlier</span> to make sure that the registration process goes as smoothly as possible.</p><p>We look forward to welcoming you to the event.</p><p><strong>Victoria Valc</strong></p><p><strong>Event Manager</strong></p><p><strong>Bilancino Hotel</strong></p>'

class App extends React.Component { 

  handleChange =(event,editor)=>{
    console.log( editor.getData())

  }

  pdf=()=>{ 
    
    
  } 
  genera=(obj)=>{
  
  }

 
  render() {
    return (
      <div className="CkYCC">
        <h2>Using CKEditor 5 build in React</h2>
        <button onClick={this.pdf} >pdf</button>
        <div className="document-editor">
          <CKEditor
            onInit={ editor => { 
                editor.ui.getEditableElement().parentElement.insertBefore(
                  editor.ui.view.toolbar.element,
                  editor.ui.getEditableElement()
                );
              }
            }
            onChange={ this.handleChange }
            editor={ DecoupledEditor }
            data={datos}
            config={
                {  
                  language: 'es',
                  toolbar: [ 
                    'exportPdf', '|',
                    'heading','|',
                    'undo','redo','|',
                    'bold','italic','fontColor','fontSize','fontFamily','|',
                    'alignment','bulletedList','numberedList','|',
                    'inserttable','|',
                    'underline','strikethrough','subscript','superscript','link','|',
                    'blockQuote','pageBreak','|',
                    'highlight','horizontalLine','|',
                    'fontBackgroundColor', 
                  ],
                  fontSize: {
                    options: [8,9,10,11,12,14,16,18,20,22,24,26,28,36,48,72 ]
                  },
                  heading: {
                    options: [
                      { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                      { model: 'heading1', view: {name:'h1',classes: 'TituloInsideBlog'}, title: 'Titulo ', class: 'ck-heading_heading1' },
                      { model: 'heading2', view: {name:'h2',classes: 'SubtituloInsideBlog'}, title: 'Subtitulo', class: 'ck-heading_heading2' },
                    ]
                  },
                  alignment: {
                    options: [ 'left', 'right','center','justify' ]
                  },
                  image: {
                    resizeUnit: 'px',
                    toolbar: [ 'imageTextAlternative', '|', 'imageStyle:alignLeft','imageStyle:full', 'imageStyle:alignRight' ],
                    styles: [
                      'full',
                      'alignLeft',
                      'alignRight'
                    ],
                  }, 
                  table: {
                      contentToolbar: [
                          'tableColumn', 'tableRow', 'mergeTableCells',
                          'tableProperties', 'tableCellProperties'
                      ], 
                  },
                  exportPdf: {
                      stylesheets: [
                          './ck.scss', 
                      ],
                      fileName: 'my-file.pdf',
                      converterOptions: {
                          format: 'Letter',
                          margin_top: '24.9mm',
                          margin_bottom: '24.9mm',
                          margin_right: '30mm',
                          margin_left: '30mm',
                          page_orientation: 'portrait'
                      }
                  }
                }
              }
          />
        </div>
        <div id="elementH" >
        </div>
      </div>
    );
  }
}


export default App;
