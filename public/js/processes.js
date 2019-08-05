$("#newClient").change(function() {
    if(this.checked) {
       $('#newClientForm').show();
    }else {
        $('#newClientForm').hide();
    }
});
$('#newClientForm').hide();