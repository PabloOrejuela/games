<!-- CONTENT -->
<section>
<div class="row">
    <div class="container mt-3 col-md-6 mb-5" id="result">
        <h3>Resultados por año</h3>
        <table class="table table-bordered table-striped table-hover table-md" id="datatablesSimpleResulAnios"> 
            <thead>
                <th style="width:10px;">No.</th>
                <th>Año</th>
                <th>Total</th>
            </thead>
            <tbody>
                <?php 
                    $num = 1;
                    foreach ($total_anio as $key => $value) {
                        echo '<tr>';
                        echo '<td>'.$num.'</td>';
                        echo '<td>'.$value->anio.'</td>';
                        echo '<td>'.$value->total.'</td>';
                        echo '</tr>';
                        $num++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</section>




