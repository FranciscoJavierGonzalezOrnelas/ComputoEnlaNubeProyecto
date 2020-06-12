$(document).ready(function() {

    mostrarPedidos();

    function mostrarPedidos() {
        $.ajax({
            url: '../../BackEnd/Pedidos/visualizarPedidos.php',
            type: 'GET',
            success: function(response) {
                const pedidos = JSON.parse(response);
                let plantilla = '';
                pedidos.forEach(pedido => {
                    plantilla += `
                            <tr pedidoId="${pedido.Id}">
                                <td class="row"># ${pedido.Id}</td>
                                <td class="row">${pedido.nombre}</td>
                                <td class="row">${pedido.correo}</td>
                                <td class="row">${pedido.direccion}</td>
                                <td class="row"># ${pedido.idproducto}</td>
                                <td class="row">${pedido.nombreproducto}</td>
                                <td class="row">${pedido.cantidad} pza(s)</td>
                                <td class="row">$ ${pedido.total} MXN</td>
                                <td class="row">${pedido.fecha}</td>
                            </tr>
                            `
                });
                $('#pedidos').html(plantilla);
            }
        });
    }


});