 
</div>
</div>
<!-- ./wrapper -->
<footer class=" futerrojo">&copy;YES - CHEF 2019. All rights reserved. </footer>    

<div class="modal fade" id="checasesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"   aria-hidden="true"  >
	<div class="modal-dialog modal-sm " role="document">
		<div class="modal-content"> 
			<div class="modal-header">
				<h5 class="modal-title" id="titulando" style="margin-top: 0px; margin: auto;">Mensaje del sistema</h5> 
			</div>
			<div class="modal-body" id="">
				<div class="container" style="text-align: center;">
					<h5 style="margin-top: 0px;"> ¿Desea Seguir Conectado?</h5>
				</div>
			</div>
			<div class="modal-footer">
				<div class="row">
					<div class="col-3">
						<button type="button" class="btn  " data-dismiss="" style="color: white; background-color: red" onclick="salir()">Salir</button>
					</div>
					<div class="col">
						<button type="button" class="btn  " id="seguir" data-dismiss="modal" style="color: white; background-color: #239dff" onclick="continuar()" >Seguir conectado</button> 
					</div>
				</div> 
				
			</div>
		</div>
	</div>
</div> 


</body>
<script type="text/javascript">
	checarsesion()

	function checarsesion() {
		setTimeout(function(){
			$.ajax({ 
				type: 'ajax',
				method: 'post',
				url: '<?=base_url('consultas/checasesion')?>',
				async: true, 
				dataType: 'text'})
			.done(function(response){ 
				if (response != 2) {  
					$("#seguir").attr("onclick", "continuar("+response+")");
					checarsesion()
				}
				if(response == 2){
					$('#checasesion').modal('show');   
					$("#titulando").html("La sesion ha caducado");
				} 
			});
		},(240*1000)) ;
	} 
	function salir(){
		location.href = "<?=base_url('/')?>"; 
	}
	function continuar(id){
		$.ajax({ 
				type: 'ajax',
				method: 'post',
				url: '<?=base_url('consultas/seguirconectado')?>/'+id,
				async: true, 
				dataType: 'text'}) ;
		checarsesion();
	}
</script> 
</html>