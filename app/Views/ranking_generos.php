<!-- CONTENT -->
<section>
<div class="row">
    <div class="container mt-3 col-md-10 mb-5" id="result">
        <h3>Géneros mas Jugados</h3>
        <table class="table table-bordered table-striped table-hover table-md" id="datatablesSimpleRankingSystemas"> 
            <thead>
                <th>Genero</th>
                <th>Total juegos</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($total_juegos_generos as $key => $value) {
                        echo '<tr>';
                        echo '<td>'.$value->genero.'</td>';
                        echo '<td>'.$value->total.'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
            
    </div>
</div>
</section>
<script>
    // $('#datatablesSimple').dataTable( {
    //     "ordering": false
    // });
</script>




