<!-- CONTENT -->
<section>
    <div class="row">
        <div class="container mt-3 col-md-12 mb-5" id="result-jugando">
            <h3>Juegos terminados del sistema: <?= $sistema->sistema; ?></h3>
            <table class="table table-bordered table-striped table-hover table-md" id="datatablesSimpleListaJuegos"> 
                <thead>
                    <th>No.</th>
                    <th>Juego</th>
                    <th>Género</th>
                    <th>Año</th>
                    <th>Fecha</th>
                </thead>
                <tbody>
                    <?php 
                        $num = 1;
                        foreach ($listaJuegos as $key => $juego) {
                            echo '<tr>';
                            echo '<td>'.$num.'</td>';
                            echo '<td>'.$juego->juego.'</td>';
                            echo '<td>'.$juego->genero.'</td>';
                            echo '<td>'.$juego->anio.'</td>';
                            echo '<td>'.date("Y-m-d || H:i", strtotime($juego->updated_at)).'</td>';
                            echo '</tr>';
                            $num++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script src="<?= site_url(); ?>public/js/lista-juegos-systema.js"></script>





