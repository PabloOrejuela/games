<!-- CONTENT -->
<section>

    <h1>Juegos Terminados por año</h1>
    <table class="table table-bordered table-striped table-hover" id="datatablesSimple"> 
        <thead>
            <th>ID</th>
            <th>Juego</th>
            <th>Año</th>
            <th>Sistema</th>
            <th>Fecha</th>
        </thead>
        <tbody>
            <?php 
                foreach ($juegos as $key => $juego) {
                    echo '<tr>';
                    echo '<td>'.$juego->idjuegos.'</td>';
                    echo '<td>'.$juego->juego.'</td>';
                    echo '<td>'.$juego->anio.'</td>';
                    echo '<td>'.$juego->sistema.'</td>';
                    echo '<td>'.$juego->created_at.'</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</section>



