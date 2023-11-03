<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
    <div class="environment">

        <p>Page rendered in {elapsed_time} seconds</p>

        <p>Environment: <?= ENVIRONMENT ?></p>

    </div>

    <div class="copyrights">

        <p>&copy; <?= date('Y') ?> appdvp.com</p>

    </div>

</footer>

<!-- SCRIPTS -->

<script type="text/javascript">
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
    
</script>

<script>
        // @ts-nocheck
        $('#datatablesSimple').DataTable( {
            paging: true ,
            "lengthMenu": [ 3 ],
            language: {
                processing:     "Procesamiento en curso...",
                search:         "Buscar:",
                lengthMenu:     "Listar _MENU_ filas",
                info:           "_START_ al _END_ de _TOTAL1_ registros",
                infoEmpty:      "0 a 0 de 0 registros",
                infoFiltered:   "",
                infoPostFix:    "",
                loadingRecords: "Cargando...",
                zeroRecords:    "No hay registros para mostrar",
                emptyTable:     "Mo hay registros que coicidan",
                paginate: {
                    first:      "Primero",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Último"
                },
                aria: {
                    sortAscending:  ": activar para ordenar la columna de manera ascendente",
                    sortDescending: ": activar para ordenar la columna de manera descendente"
                }
            }
        } );
    </script>

<!-- -->

</body>
</html>
