$(document).ready(function () {
    //--------------------------------------------------------------------------
    $("#clinica_id").on("change", function () {
        const data_url = $(this).attr("data_url");
        const id = $(this).val();
        var data = {
            id: id,
        };
        $.ajax({
            url: data_url,
            type: "GET",
            data: data,
            success: function (respuesta) {
                llenarTablaCargos(respuesta.areas);
            },
            error: function () {},
        });
    });
    //--------------------------------------------------------------------------
});

function llenarTablaCargos(areas) {

    var respuesta_tabla_html = "";
    const permiso_cargos_edit = $("#permiso_cargos_edit").val();
    const permiso_cargos_destroy = $("#permiso_cargos_destroy").val();
    // -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*-
    var cargos_edit_ini = $("#permiso_cargos_edit").attr("data_url");
    cargos_edit_ini = cargos_edit_ini.substring(0,cargos_edit_ini.length - 1);
    const cargos_edit_fin = cargos_edit_ini;
    // -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*-
    var cargos_destroy_ini = $("#permiso_cargos_destroy").attr("data_url");
    cargos_destroy_ini = cargos_destroy_ini.substring(0,cargos_destroy_ini.length - 1);
    const cargos_destroy_fin = cargos_destroy_ini;
    // -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*-
    // -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*-
    vaciarTabla("#tablaCargos","#tbody_cargos");
    // -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*-
    $.each(areas, function (index, area) {
        $.each(area.cargos, function (index, cargo) {
            respuesta_tabla_html += "<tr>";
            respuesta_tabla_html += '<td class="text-center">' + cargo.id + "</td>";
            respuesta_tabla_html += "<td>" + area.area + "</td>";
            respuesta_tabla_html += "<td>" + cargo.cargo + "</td>";
            respuesta_tabla_html += '<td class="d-flex justify-content-evenly align-cargos-center">';
            if (permiso_cargos_edit == 1) {
                respuesta_tabla_html += '<a href="' + cargos_edit_fin + cargo.id + '" class="btn-accion-tabla tooltipsC"';
                respuesta_tabla_html += 'title="Editar este registro">';
                respuesta_tabla_html += '<i class="fas fa-pen-square"></i>';
                respuesta_tabla_html += "</a>";
            } else {
                respuesta_tabla_html += '<span class="text-danger">---</span>';
            }
            if (permiso_cargos_destroy == 1) {
                respuesta_tabla_html += '<span id="spanBorrar'+cargo.id+'" class="btn-accion-tabla eliminar tooltipsC" style="cursor: pointer;" onclick="borraPorAjax('+ cargo.id +')"';
                respuesta_tabla_html += '        title="Eliminar este registro">';
                respuesta_tabla_html += '            <i class="fa fa-fw fa-trash text-danger"></i>';
                respuesta_tabla_html += '</span>';
            } else {
                respuesta_tabla_html += '<span class="text-danger">---</span>';
            }
            respuesta_tabla_html += "</td>";
            respuesta_tabla_html += "</tr>";
        });
    });
    $('#tbody_cargos').html(respuesta_tabla_html);
    asignarDataTableAjax('#tablaCargos','Tabla Cargos',5);
}

function borraPorAjax(cargo_id){
    Swal.fire({
        title: "¿Está seguro que desea eliminar el registro?",
        text: "Esta acción no se puede deshacer!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Borrar!",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            ajaxRequestLink(cargo_id);
        }
    });
}
function ajaxRequestLink(cargo_id) {
    // -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*-
    var cargos_destroy_ini = $("#permiso_cargos_destroy").attr("data_url");
    cargos_destroy_ini = cargos_destroy_ini.substring(0,cargos_destroy_ini.length - 1);
    const cargos_destroy_fin = cargos_destroy_ini+cargo_id;
    // -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*-
    var data = {
        id: cargo_id,
        _token: $('#token').val(),
    };
    $.ajax({
        url: cargos_destroy_fin,
        type: "DELETE",
        data: data,
        success: function (respuesta) {
            if (respuesta.mensaje == "ok") {
                $('#spanBorrar'+ cargo_id).parents("tr").remove();
                Sistema.notificaciones(
                    "El registro fue eliminado correctamente",
                    "Sistema",
                    "success"
                );
            } else {
                Sistema.notificaciones(
                    "El registro no pudo ser eliminado, hay recursos usandolo",
                    "Sistema",
                    "error"
                );
            }
        },
        error: function () {},
    });
}
