 <?php  echo "<pre>"; print_r($datos["docxcat"]); echo "</pre>";  ?> 
  <?php /*echo "<pre>"; print_r($datos["registro"]); echo "</pre>"; */
  
  ?> 

  <table style="border:  solid;">
    <?php foreach ($datos["docxcat"] as $key){ ?>
        <thead>
            <tr style="border: 2px solid;">
                <th style="border: 2px solid;"><?=$key["NOMBRE"]?></th>
            </tr>
        </thead>
        <tbody style="border: 2px solid;">
            <?php foreach ($key["DOCS"] as $subkey){ ?>
                <?php foreach ($datos["registro"] as $regis){ ?>
                    <tr style="border: 1px solid;"> 
                            <?php if ($regis["ID_DOCUMENTO"] == $subkey["ID"]){ ?> 
                                <td style="border: 1px solid;"><?=$subkey["NOMBRE"]." ID =".$subkey["ID"]."-".$regis["ID"]."- VIGENCIA ".$subkey["VIGENCIA"]?></td>
                            <?php } ?> 
                    <?php } ?>

                    <?php if ($subkey["NIVEL"] == 2){ ?>
                        <td style="border: 2px solid;"><?=$subkey["NOMBRE"]." ".$subkey["ID"]?></td>
                        <?php foreach ($subkey["SUBDOCS"] as $subsubkey){ ?> 
                            <?php foreach ($datos["registro"] as $regis){ ?>
                               <?php if ($regis["ID_DOCUMENTO"] == $subsubkey["ID"]){ ?>
                                <td style="border: 2px solid red;"><?=$subsubkey["NOMBRE"]." ID =".$subsubkey["ID"]."-".$subsubkey["ID_DOCUMENTO"]."-".$regis["ID"]."-".$subkey["ID_DOCUMENTO"]."- VIGENCIA ".$subsubkey["VIGENCIA"]?></td> 
                            <?php } ?>
                        <?php } ?> 
                    <?php } ?>

                <?php } ?>
                <?php if ($subkey["NIVEL"] == 3){ ?>
                        <td style="border: 2px solid;"><?=$subkey["NOMBRE"]." ".$subkey["ID"]?></td>
                        
                            <?php foreach ($datos["subniveltres"] as $regis){ ?>
                               <?php if ($regis["ID"] == $subkey["ID"]){ ?>
                                <td style="border: 2px solid red;"><?=$subkey["NOMBRE"]."-".$subkey["ID"]."-".$regis["IDEXTERNO"]?></td> 
                            <?php } ?> 
                    <?php } ?>

                <?php } ?>
            </tr>

        <?php } ?>
    </tbody>
<?php } ?>  
</table>  
<button type="button" onclick="eliminar()" >Aceptar</button>



<script type="text/javascript">
   function eliminar() {


       $.ajax({ 
        type: 'ajax',
        method: 'post',
        url: '<?=base_url('portafolio/vaciarportafolio')?>',
        async: true,   
        success: function(response){ 

        },
        error: function () {
           alert('Hubo un error, intente mas tarde');
           $("#imagenguardar").css("display", "block");
           $("#spiner").css("display", "none");
       }
   }) ;  

   }

</script>