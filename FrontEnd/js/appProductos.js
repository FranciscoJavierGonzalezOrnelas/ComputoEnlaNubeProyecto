$(document).ready(function() {

    let editar = false;
    $('#form-productos').trigger('reset');
    mostrarProductos();


    $("#form-productos").on("submit", function(e) {
        e.preventDefault();
        let uri = editar === false ? '../../BackEnd/Productos/agregarProducto.php' : '../../BackEnd/Productos/editarProducto.php';
        console.log(uri);
        var frmData = new FormData($('#form-productos')[0]);
        $.ajax({
            data: frmData,
            url: uri,
            type: "POST",
            contentType: false,
            processData: false,
            beforesend: function() {},
            success: function(response) {
                $('#form-productos').trigger('reset');
                mostrarProductos();
                alert(response);
                console.log(response);
            },
        });
        var x;
        x = document.getElementById("imagen");
        x.setAttribute('required', '');
        editar = false;
    });


    function mostrarProductos() {
        $.ajax({
            url: '../../BackEnd/Productos/visualizarProductos.php',
            type: 'GET',
            success: function(response) {
                const productos = JSON.parse(response);
                let plantilla = '';
                productos.forEach(producto => {
                    plantilla += `
                            <tr productId="${producto.Id}">
                                <td class="row"># ${producto.Id}</td>
                                <td class="row">${producto.tipo}</td>
                                <td class="row">${producto.nombre}</td>
                                <td class="row">${producto.precio} MXN</td>
                                <td class="row">${producto.stock} Pza(s)</td>
                                <td class="row">${producto.descripcion}</td>
                                <td class="row row-imagen"><img class="imagen" src="${producto.imagen}"></td>
                                <td class="cont-btn cont-btn-edit">
                                    <button class="btn-edit">
                                        <i class="far fa-edit"></i> Editar
                                    </button>
                                </td>
                                <td class="cont-btn-delete">
                                    <button class="btn-delete">
                                        <i class="far fa-trash-alt"></i> Eliminar
                                    </button>
                                </td>
                            </tr>
                            `
                });
                $('#productos').html(plantilla);
            }
        });
    }

    $(document).on('click', '.btn-delete', function() {
        if (confirm('¿Esta Seguro que desea eliminar este producto?')) {
            let elemento = $(this)[0].parentElement.parentElement;
            let id = $(elemento).attr('productId');
            $.post('../../BackEnd/Productos/eliminarProducto.php', { id }, function(response) {
                //console.log(response);
                $('#form-productos').trigger('reset');
                mostrarProductos();
                alert(response);
            });
        }
        editar = false;
    });

    $(document).on('click', '.btn-edit', function(e) {
        $(window).scrollTop(0);
        var x;
        x = document.getElementById("imagen");
        x.removeAttribute('required');
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr('productId');
        $.post('../../BackEnd/Productos/obtenerProducto.php', { id }, function(response) {
            const producto = JSON.parse(response);
            $('#Id').val(producto.id);
            $('#tipo').val(producto.tipo);
            $('#nombre').val(producto.nombre);
            $('#precio').val(producto.precio);
            $('#stock').val(producto.stock);
            $('#descripcion').val(producto.descripcion);
            //$('#imagen').val(producto.imagen);
            editar = true;
             console.log(editar);
        });

        e.preventDefault();
    });

    $(document).on('click', '.btn-cancelar', function() {
        var x;
        x = document.getElementById("imagen");
        x.setAttribute('required', '');
        $('#form-productos').trigger('reset');
        editar = false;
    });

});
