<!-- CONTENT -->
<section>

    <h1>Juegos en proceso</h1>
    
    <div class="col-md-6">
        <label>Insertar nuevo juego en proceso</h6> 
        <a type="button" id="btn-editar" href="<?= site_url(); ?>insert-nuevo">
            <img src="<?= site_url();?>public/img/insert.png" >
        </a>
    </div>
        
    <table class="table table-bordered table-striped table-hover" id="datatablesSimple"> 
        <thead>
            <th>ID</th>
            <th>Juego</th>
            <th>Sistema</th>
            <th>Terminar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>
            <?php 
                foreach ($jugando as $key => $juego) {
                    echo '<tr>';
                    echo '<td>'.$juego->id.'</td>';
                    echo '<td>'.$juego->juego.'</td>';
                    echo '<td>'.$juego->sistema.'</td>';
                    echo '<td>
                            <a type="button" id="btn-editar" href="'.site_url().'terminar/'.$juego->id.'" class="edit">
                                <img src="'.site_url().'public/img/btndone.png" >
                            </a>
                        </td>';
                    echo '<td> 
                            <a type="button" id="btn-editar" href="'.site_url().'eliminar/'.$juego->id.'" class="edit">
                                <img src="'.site_url().'public/img/btncancel.png" >
                            </a>
                        </td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</section>



