$(document).ready(function() {

    let editar = false;
    $('#form-usuarios').trigger('reset');
    mostrarUsuarios();


    $("#form-usuarios").on("submit", function(e) {
        e.preventDefault();
        let uri = editar === false ? '../../BackEnd/Clientes/agregarUsuario.php' : '../../BackEnd/Clientes/editarUsuario.php';
        var frmData = new FormData($('#form-usuarios')[0]);
        $.ajax({
            data: frmData,
            url: uri,
            type: "POST",
            contentType: false,
            processData: false,
            beforesend: function() {},
            success: function(response) {
                $('#form-usuarios').trigger('reset');
                mostrarUsuarios();
                alert(response);
                console.log(response);
            },
        });
        var x;
        x = document.getElementById("contrasena");
        x.setAttribute('required', '');
        editar = false;

    });


    function mostrarUsuarios() {
        $.ajax({
            url: '../../BackEnd/Clientes/visualizarUsuarios.php',
            type: 'GET',
            success: function(response) {
                const usuarios = JSON.parse(response);
                let plantilla = '';
                usuarios.forEach(usuario => {
                    plantilla += `
                            <tr usuarioId="${usuario.Id}">
                                <td class="row"># ${usuario.Id}</td>
                                <td class="row">${usuario.nombre}</td>
                                <td class="row">${usuario.correo}</td>
                                <td class="row">${usuario.direccion}</td>
                                <td class="row">${usuario.telefono}</td>
                                <td class="cont-btn cont-btn-edit">
                                    <button class="btn-edit">
                                        <i class="fas fa-user-edit"></i> Editar
                                    </button>
                                </td>
                                <td class="cont-btn-delete">
                                    <button class="btn-delete">
                                         <i class="fas fa-user-times"></i> Eliminar
                                    </button>
                                </td>
                            </tr>
                            `
                });
                $('#usuarios').html(plantilla);
            }
        });
    }

    $(document).on('click', '.btn-delete', function() {
        if (confirm('¿Esta Seguro que desea eliminar este Usuario?')) {
            let elemento = $(this)[0].parentElement.parentElement;
            let id = $(elemento).attr('usuarioId');
            $.post('../../BackEnd/Clientes/eliminarUsuario.php', { id }, function(response) {
                //console.log(response);
                $('#form-usuarios').trigger('reset');
                mostrarUsuarios();
                alert(response);
            });
        }
        editar = false;
    });

    $(document).on('click', '.btn-edit', function(e) {
        $(window).scrollTop(0);
        $('#form-usuarios').trigger('reset');
        var x;
        x = document.getElementById("contrasena");
        x.removeAttribute('required');
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr('usuarioId');
        $.post('../../BackEnd/Clientes/obtenerUsuario.php', { id }, function(response) {
            const usuario = JSON.parse(response);
            $('#Id').val(usuario.id);
            $('#nombre').val(usuario.nombre);
            $('#correo').val(usuario.correo);
            $('#direccion').val(usuario.direccion);
            $('#telefono').val(usuario.telefono);
            editar = true;
        });
        e.preventDefault();
    });

    $(document).on('click', '.btn-cancelar', function() {
        $('#form-usuarios').trigger('reset');
        var x;
        x = document.getElementById("contrasena");
        x.setAttribute('required', '');
        editar = false;
    });


});