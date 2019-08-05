$.ajax({
	url: 'http://tokkobroker.com/api/v1/property/?lang=es_ar&format=json&limit=200&key=844a9eff6e063ad738fea8c0777dafd812ce7e10',
	success: (data) => {
		const properties = data.objects;
		properties.map((property) => {
			$('#properties_select').append($('<option>', {
				value: property.id,
				text: property.address + ' - ' + property.publication_title
			}));
		});
		$('.select2').select2();
		$('.select2').on('select2:select', function (e) {
			var data = e.params.data.text;
			$('#propTitle').val(data);
		});
	},
	error: (error) => {
        console.log("No se ha podido obtener la información");
    }
});


