<!-- CONTENT -->
<section>
    <div class="row">
        <div class="container mt-3 col-md-12 mb-5" id="result">
        <h3>Juegos en proceso</h3>
        
        <div class="col-md-6 mb-3">
            <label>Insertar nuevo juego en proceso</h6> 
            <a type="button" id="btn-editar" href="<?= site_url(); ?>insert-nuevo">
                <img src="<?= site_url();?>public/img/insert.png" width="20" >
            </a>
        </div>
            
        <table class="table table-bordered table-striped table-hover table-sm" id="datatablesSimpleJugando"> 
            <thead>
                <th>Juego</th>
                <th>Sistema</th>
                <th>Ultima partida</th>
                <th>Archivar</th>
                <th>Terminar</th>
                <th>Eliminar</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($jugando as $key => $juego) {
                        echo '<tr>';
                        echo '<td>'.$juego->juego.'</td>';
                        echo '<td>'.$juego->sistema.'</td>';
                        echo '<td>
                                <a type="button" id="btn-editar" href="'.site_url().'registra-partida/'.$juego->id.'" class="link">
                                    '.date("Y-m-d || H:i", strtotime($juego->updated_at)).'
                                </a>
                            </td>';
                        echo '<td>
                                <a type="button" id="btn-editar" href="'.site_url().'archivar/'.$juego->id.'" class="edit">
                                    <img src="'.site_url().'public/img/archivar.png" width="20" >
                                </a>
                            </td>';
                        echo '<td>
                                <a type="button" id="btn-editar" href="'.site_url().'terminar/'.$juego->id.'" class="edit">
                                    <img src="'.site_url().'public/img/btndone.png" width="20" >
                                </a>
                            </td>';
                        echo '<td> 
                                <a type="button" id="btn-editar" href="'.site_url().'eliminar/'.$juego->id.'" class="edit">
                                    <img src="'.site_url().'public/img/btncancel.png" width="20" >
                                </a>
                            </td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>
</section>


