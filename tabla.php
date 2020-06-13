
<?php 
$conexion=mysqli_connect('localhost','root','','codigoBarra');
$sql="SELECT * FROM t_productos";
$result=mysqli_query($conexion,$sql);

		//declaramos arreglo para guardar codigos
$arrayCodigos=array();
?>

<div class="row">
	<div class="col-sm-12">
		<table class="table" align="conter">
			<tr>
				<td>Nombre</td>
				<td>Codigo barras</td>
			</tr>
			<?php 
			while($ver=mysqli_fetch_row($result)):
				$arrayCodigos[]=(string)$ver[2]; 
				?>
				<tr>
					<td><?php echo $ver[1] ?></td>
					<td>
						<svg id='<?php echo "barcode".$ver[2]; ?>'>
						</td>
					</tr>
				<?php endwhile; ?>
			</table>
		</div>
	</div>



	<script type="text/javascript">

		function arrayjsonbarcode(j){
			json=JSON.parse(j);
			arr=[];
			for (var x in json) {
				arr.push(json[x]);
			}
			return arr;
		}

		jsonvalor='<?php echo json_encode($arrayCodigos) ?>';
		valores=arrayjsonbarcode(jsonvalor);

		for (var i = 0; i < valores.length; i++) {

			JsBarcode("#barcode" + valores[i], valores[i].toString(), {
				format: "codabar",
				lineColor: "#000",
				width: 2,
				height: 30,
				displayValue: true
			});
		}
		
	</script>