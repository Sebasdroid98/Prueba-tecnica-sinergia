/**
 * Función para eliminar un paciente por su id
 * @param {*} id 
 */
function eliminarPaciente(id) {
    const URL = urlBase + '/paciente-delete/' + id;
    let token = $("[name=_token]").val();

    $.ajax({
        type: "DELETE",
        headers: {'X-CSRF-TOKEN': token},
        url: URL,
        data: {
            id:id,
        },
        success: function(rta){
            colocarToast('success', 'Notificación', 'Se eliminó al paciente.', true, 1500);
            setTimeout(function() {
                location.reload();
            }, 2000);
        },
        fail: function (rta) {
            console.log('Fallo');
        }
    });
}

$(function () {
    $(".btn-eliminar").on("click", function (event) {
        if (confirm('¿Desea eliminar al paciente?')) {
            console.log('si');
            eliminarPaciente(event.target.dataset.id);
        } else {
            console.log('no');
        }
        // cargarMunicipios(event.target.value)
    })
});