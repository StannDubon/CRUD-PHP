$(document).ready(function() {
    $('.btn-editar').click(function() {
        var id = $(this).data('id');
        var nombre = $('td[data-nombre="' + id + '"]').text().trim();
        var precio = $('td[data-precio="' + id + '"]').text().trim().replace('$', '');
        var marca = $('td[data-marca="' + id + '"]').text().trim();

        // Actualizar los valores de los campos del formulario
        $('#form_editar_producto').attr('action', 'producto_editar.php?id=' + id);
        $('input[name="producto_update"]').val(nombre);
        $('input[name="precio_update"]').val(precio);
        $('input[name="marca_update"]').val(marca);
    });
});