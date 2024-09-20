<!-- CONTENT -->
<section>
<div class="row">
    <div class="container mt-3 col-md-10 mb-5" id="result">
        <h3>Sistemas mas usados</h3>
        <table class="table table-bordered table-striped table-hover table-md" id="datatablesSimpleRankingSystemas"> 
            <thead>
                <th>No.</th>
                <th>Sistema</th>
                <th>Total juegos</th>
            </thead>
            <tbody>
                <?php 
                    $num = 1;
                    foreach ($total_juegos_sistemas as $key => $value) {
                        echo '<tr>';
                        echo '<td>'.$num.'</td>';
                        echo '<td>'.$value->sistema.'</td>';
                        echo '<td>'.$value->total.'</td>';
                        echo '</tr>';
                        $num += 1;
                    }
                    
                ?>
            </tbody>
        </table>
            
    </div>
</div>
</section>




