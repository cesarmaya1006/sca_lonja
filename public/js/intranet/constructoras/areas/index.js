$(document).ready(function () {
    //--------------------------------------------------------------------------
    $("#regional_id").on("change", function () {
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
                var respuesta_html = "";
                if (respuesta.empresas.length > 0) {
                    respuesta_html += '<option value="">Elija Empresa</option>';
                    $.each(respuesta.empresas, function (index, item) {
                        respuesta_html += '<option value="' + item.id + '">' + item.constructora + "</option>";
                    });
                }else{
                    respuesta_html += '<option value="">Elija primero Regional</option>';
                }
                $("#constructora_id").html(respuesta_html);
            },
            error: function () {},
        });
    });
    //--------------------------------------------------------------------------
    //--------------------------------------------------------------------------
    $("#constructora_id").on("change", function () {
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
                llenarTablaEmpresasAreas(respuesta.areasPadre);
            },
            error: function () {},
        });
    });
    //--------------------------------------------------------------------------
});
function llenarTablaEmpresasAreas(areas) {

    var respuesta_tabla_html = "";
    const permiso_empresas_areas_edit = $("#permiso_empresas_areas_edit").val();
    const permiso_empresas_areas_destroy = $("#permiso_empresas_areas_destroy").val();
    // -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*-
    var cargos_edit_ini = $("#permiso_empresas_areas_edit").attr("data_url");
    cargos_edit_ini = cargos_edit_ini.substring(0,cargos_edit_ini.length - 1);
    const cargos_edit_fin = cargos_edit_ini;
    // -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*-
    var cargos_destroy_ini = $("#permiso_empresas_areas_destroy").attr("data_url");
    cargos_destroy_ini = cargos_destroy_ini.substring(0,cargos_destroy_ini.length - 1);
    const cargos_destroy_fin = cargos_destroy_ini;
    // -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*-
    // -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*-
    vaciarTabla("#tablaCargos","#tbody_cargos");
    // -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*- -*-
    $.each(areas, function (index, area) {
        respuesta_tabla_html += "<tr>";
        respuesta_tabla_html += '<td class="text-center">' + area.id + "</td>";
        respuesta_tabla_html += "<td>" + area.area + "</td>";
        if (area.area_id!=null) {
            respuesta_tabla_html += '<td class="text-center">' + area.area_sup.area + '</td>';
        } else {
            respuesta_tabla_html += '<td class="text-center text-danger">---</td>';
        }

        if (area.areas.length > 0) {
            var data_content="";
            $.each(area.area, function (index, sub_area) {
                data_content+='<p>'+sub_area.area+'</p>';
            });
            respuesta_tabla_html += '<td class="text-center">';
            respuesta_tabla_html += '<span data-content="'+data_content+'" rel="popover" data-placement="span" data-trigger="hover">'+area.area.length+'</span>';
            respuesta_tabla_html += '</td>';
        } else {
            respuesta_tabla_html += '<td class="text-center"><h6 class="text-danger">---</h6></td>';
        }

        respuesta_tabla_html += '<td class="d-flex justify-content-evenly align-cargos-center">';
        if (permiso_empresas_areas_edit == 1) {
            respuesta_tabla_html += '<a href="' + cargos_edit_fin + area.id + '" class="btn-accion-tabla tooltipsC"';
            respuesta_tabla_html += 'title="Editar este registro">';
            respuesta_tabla_html += '<i class="fas fa-pen-square"></i>';
            respuesta_tabla_html += "</a>";
        } else {
            respuesta_tabla_html += '<span class="text-danger">---</span>';
        }
        if (permiso_empresas_areas_destroy == 1) {
            respuesta_tabla_html += '<span id="spanBorrar'+area.id+'" class="btn-accion-tabla eliminar tooltipsC" style="cursor: pointer;" onclick="borraPorAjax('+ area.id +')"';
            respuesta_tabla_html += '        title="Eliminar este registro">';
            respuesta_tabla_html += '            <i class="fa fa-fw fa-trash text-danger"></i>';
            respuesta_tabla_html += '</span>';
        } else {
            respuesta_tabla_html += '<span class="text-danger">---</span>';
        }
        respuesta_tabla_html += "</td>";
        respuesta_tabla_html += "</tr>";
    });
    $('#tbody_empresas_areas').html(respuesta_tabla_html);
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
