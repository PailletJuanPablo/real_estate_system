let searchedText = '';
$('#clients').select2({
    allowClear: true,
    placeholder: 'Escribir número',
    language: {
        noResults: function() {
          return '<button class="btn btn-primary" onclick="addNewClient()">Añadir nuevo cliente</a>';
        },
      },
      escapeMarkup: function(markup) {
        return markup;
      },
});

$('#clients').on('select2:select', function (e) {
    const selectedClient = clients[e.params.data.id];
    if(selectedClient) {
        $('#first_name').val(selectedClient.first_name);
        $('#last_name').val(selectedClient.last_name);
        $('#phone').val(selectedClient.phone);
    }
});


$(document).on('keyup', '.select2-search__field',  (e) => {    
    console.log(e.target.value);
    searchedText = e.target.value;
})

const addNewClient = () => {
    const phoneNewValue = $('#clients').val();
    console.log(phoneNewValue)
    $('#clients').select2('destroy');
    $('#clientPhoneSelector').remove();
    $('#phone').show();
    $('#phone').val(searchedText);
    $('#first_name').prop("disabled", false);
    $('#last_name').prop("disabled", false);
    $('#phone').prop("disabled", false);

}


$('.status_selector').click(function(e) {
    console.log(e);
    $('#status_id').val($(this)[0].id);
    console.log($(this)[0].id);
    $('.status_selector').removeClass('status_selector_selected');
    $(this).addClass('status_selector_selected');

})