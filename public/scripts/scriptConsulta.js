function eliminar_favorites(precio,nomProduct,linkImagen,linkCompra, token, ruta) {
	
	$.ajax({
		url: ruta,
		type: "POST",
		data: {
			precio: precio,//
			nomProduct: nomProduct,//
			linkImagen: linkImagen,
			linkCompra: linkCompra,
			_token: token,
		},
		success: function(data) {
			if (data.success) {
				console.log("Se agrego a favoritos");
				console.log(data.json);
			}else{
				console.log("No se agrego a favoritos");
				console.log(data.json);
			}
		}

	});
}