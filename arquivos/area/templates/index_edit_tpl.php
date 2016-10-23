<html>
	<body>
		<h1>
		Altere os dados da &aacute;rea
		</h1>	
		<div>
			<form method="post">
				<input 	type="hidden"
						name="cod_area"
						value="<?php echo $cod_area; ?>">
				<p>
					&Aacute;rea: <input type="text"
										name="area"
										value="<?php echo $area; ?>">
				</p>
				<p>
					<input 	type="submit" 
							name="editado"
							value="Gravar">
				</p>
			</form>
		</div>
	</body>
</html>