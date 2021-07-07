$(document).ready(function() {
    $.get('api/user').done(function(e) {
        table(e)
    });
});

$("#btn-register").click(function () {
    $.post(`/api/user`, $("#form-edit").serialize()).done(function (e) {
        if (e.code == 200) {
            Swal.fire("¡Usuario guardado correctamente!", "", "success").then(
                function () {
                    window.location = "/listar";
                }
            );
        } else if (e.code == 406) {
            Swal.fire(e.msg, "", "warning");
        } else {
            swal.fire("Fallo en el sevidor!", "error", "error");
        }
    });
});

$("body").on("click", ".btn-edit-user", function () {
    var id = $(this).data("id");
    $.ajax({
        url: `/api/user/${id}`,
        type: "GET",
        success: function (r) {
            $(".input-id").val(r.id);
            $(".input-name").val(r.name);
            $(".input-lastname").val(r.lastname);
            $(".input-dni").val(r.dni);
            $(".input-address").val(r.address);
            $(".input-phone").val(r.phone);
            $("#user-modal").modal("show");
        },
    });
});

$("body").on("click", ".btn-delete-user", function () {
    var id = $(this).data("id");
    Swal.fire({
        title: "¿Eliminar registro?",
        text: "Esta acción no se puede revertir",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: `/api/user/${id}`,
                type: "DELETE",
                success: function (r) {
                    Swal.fire('Registro eliminado correctamente','','success')
                    table(r);
                },
            });
        }
    });
});

$("#btn-filter").click(function () {
    $.post("/filter", $("#form-filter").serialize()).done(function (e) {
        table(e);
    });
});

$("body").on("click", "#btn-edit", function () {
    var id = $(".input-id").val();
    $.ajax({
        url: `/api/user/${id}`,
        type: "PUT",
        data: $("#form-edit").serialize(),
        success: function (r) {
            if (r.code == 200) {
                Swal.fire("¡Datos modificados correctamente!", "", "success");
                table(r);
                $("#user-modal").modal("hide");
            } else if (r.code == 406) {
                Swal.fire(r.msg, "", "warning");
            } else {
                swal.fire("Fallo en el sevidor!", "error", "error");
            }
        },
    });
});

function table(e) {
    $("#table").html("");
    $.each(e.data, function (key, val) {
        $("#table").append(
            `<tr style="line-height: 50px">
                <th>${val.id}</th>
                <td>${val.name}</td>
                <td>${val.lastname}</td>
                <td>${val.dni}</td>
                <td>${val.address}</td>
                <td>${val.phone}</td>
                <td>
                    <button class="btn btn-danger btn-delete-user" data-id="${val.id}"  type="button">
                        <i style="font-size: 25px; " class="icon-trash-2"></i>
                    </button>
                    <button class="btn btn-warning btn-edit-user" data-id="${val.id}" type="button">
                        <i style="font-size: 25px;"  class="icon-edit "></i>
                    </button>
                </td>
            </tr>`
        );
    });
}
