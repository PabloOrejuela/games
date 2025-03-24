<!-- CONTENT -->
<section>
<div class="row">
    <div class="container mt-3 col-md-8 mb-5" id="result">
        <h3>Sistemas mas usados</h3>
        <table class="table table-bordered table-striped table-hover table-md" id="datatablesSimpleRankingSystemas"> 
            <thead>
                <th>Sistema</th>
                <th>Total juegos</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($total_juegos_sistemas as $key => $value) {
                        echo '<tr>';
                        echo '<td>
                            <a type="button" id="btn-editar" href="'.site_url().'lista-juegos-sistema/'.$value->id.'" class="link">'.$value->sistema.'</a>
                        </td>';
                        echo '<td>'.$value->total.'</td>';
                        echo '</tr>';
                    }
                    
                ?>
            </tbody>
        </table>
            
    </div>
</div>
</section>




