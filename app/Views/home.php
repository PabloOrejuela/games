<!-- CONTENT -->
<section>
    <div class="row">
        <div class="container mt-3 col-md-12 mb-5" id="result-jugando">
            <h3>Juegos Terminados</h3>
            <table class="table table-bordered table-striped table-hover table-sm" id="datatablesSimple"> 
                <thead>
                    <th>Juego</th>
                    <th>Año</th>
                    <th>Sistema</th>
                    <th>Fecha</th>
                </thead>
                <tbody>
                    <?php 
                        foreach ($juegos as $key => $juego) {
                            echo '<tr>';
                            echo '<td>'.$juego->juego.'</td>';
                            echo '<td>'.$juego->anio.'</td>';
                            echo '<td>'.$juego->sistema.'</td>';
                            echo '<td>'.date("Y-m-d || H:i", strtotime($juego->created_at)).'</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>



