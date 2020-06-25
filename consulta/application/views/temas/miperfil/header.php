 
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?=assetgeneral()?>/img/yeschefico.png" type="image/x-icon">
    <title>Yes chef | <?=$header['titulo']?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> 
    <link rel="stylesheet" href="<?=assetmiperfil()?>/css/bootstrap.css"> 
    <link rel="stylesheet" href="<?=assetmiperfil()?>/css/font-awesome.css"> 
    <link rel="stylesheet" href="<?=assetmiperfil()?>/css/AdminLTE.css"> 
    <link rel="stylesheet" href="<?=assetmiperfil()?>/css/skin-black-light.css"> 
    <link rel="stylesheet" href="<?=assetmiperfil()?>/css/styles.css">
    <link rel="stylesheet" href="<?=assetmiperfil()?>/css/styles2.css">
    <link rel="stylesheet" href="<?=assetmiperfil()?>/css/estiloform.css"> 
    <?=$header['css']?>
 
    <script src="<?=assetmiperfil()?>/js/jquery.js"></script> 


    <script src="<?=assetmiperfil()?>/js/bootstrap.js"></script> 
   
    <!-- AdminLTE App -->
    <script src="<?=assetmiperfil()?>/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?=assetmiperfil()?>/js/pdf.js"></script>
    <script src="<?=assetmiperfil()?>/js/pdf.worker.js"></script>
   
 
 <?=$header['js']?>
        <script type="text/javascript">
   
            $(document).on("click","#dashboard",function() { 
                
 location.href = "<?=base_url('/dashboard')?>";

          });
  </script>
    
</head>
 <body class="  skin-black-light sidebar-mini">
     <div class=" ">
