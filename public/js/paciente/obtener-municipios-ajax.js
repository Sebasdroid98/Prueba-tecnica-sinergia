/**
 * Función para obtener los municipios de un departamento por su id
 * @param {*} idDepto 
 */
function cargarMunicipios(idDepto) {
    const URL = urlBase + "/" + 'obtener-municipios-depto/' + idDepto;
    const ESPACIO = $('#municipios-disponibles');

    $.getJSON(URL ,function(datos){
        let opciones = $(datos.data).map(function(key, value) {
            let id = value.id;
            let nombre = value.nombre;
            
            return `<option value="${id}">${nombre}</option>`;
        }).get().join('');
        // console.log("opciones", opciones);

        ESPACIO.html(opciones);
    });

    colocarToast('success','Notificación','Se obtuvieron los municipios del departamento seleccionado.',true,3000);
}

$(function () {
    $("#departamento").on("change", function (event) {
        // console.log("event", event.target.value);
        cargarMunicipios(event.target.value)
    })
});