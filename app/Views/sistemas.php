<!-- CONTENT -->
<section>
    <div class="row">
        <div class="container mt-3 col-md-10 mb-5" id="result">
            <h3>Mis sistemas</h3>
            <table class="table table-bordered table-striped table-hover" id="datatablesSimple"> 
                <thead>
                    <th>ID</th>
                    <th>Sistema</th>
                    <th>Empresa</th>
                    <th>Año</th>
                </thead>
                <tbody>
                    <?php 
                        foreach ($sistemas as $key => $sistema) {
                            echo '<tr>';
                            echo '<td>'.$sistema->idsistemas.'</td>';
                            echo '<td>'.$sistema->sistema.'</td>';
                            echo '<td>'.$sistema->empresa.'</td>';
                            echo '<td>'.$sistema->anio.'</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>        
</section>



