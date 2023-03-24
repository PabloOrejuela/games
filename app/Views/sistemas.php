<!-- CONTENT -->
<section>

    <h1>Mis sistemas</h1>
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
</section>



