<!-- CONTENT -->
<section>
<div class="row">
    <div class="container mt-3 col-md-10 mb-5" id="result">
        <h3>Resultados por año</h3>
        <table class="table table-bordered table-striped table-hover table-sm" id="datatablesSimple"> 
            <thead>
                <th>Año</th>
                <th>Total</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($total_anio as $key => $value) {
                        echo '<tr>';
                        echo '<td>'.$value->anio.'</td>';
                        echo '<td>'.$value->total.'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</section>



