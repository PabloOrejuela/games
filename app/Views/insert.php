<!-- CONTENT -->
<section>
    <h1>Insertar nuevo juego en proceso</h1>
    <form method="post" action="insert-new-game" name="insert-new-game" >  
        <div class="col-md-6" >
            <div class="form-group mb-3">
                <label class="form-group-text" for="juego">Juego:</label>
                <input  class="form-control" placeholder="Juego" type="text" name="juego" id="juego">
            </dib>
        </div>
        <div class="col-md-6" >
            <div class="form-group mb-3">
                <label class="form-group-text" for="idsistemas">Género:</label>
                <select class="form-select" id="inputGroupSelect01" name="genero">
                    <option value="0" selected>-- Seleccionar --</option>
                    <?php
                        foreach ($generos as $key => $genero) {
                            echo ' <option value="'.$genero->id.'">'.$genero->genero.'</option> ';
                        } 
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-6" >
            <div class="form-group mb-3">
                <label class="form-group-text" for="idsistemas">Sistema:</label>
                <select class="form-select" id="inputGroupSelect01" name="idsistemas">
                    <option value="0" selected>Elija un sistema...</option>
                    <?php
                        foreach ($sistemas as $key => $value) {
                            echo ' <option value="'.$value->idsistemas.'">'.$value->sistema.'</option> ';
                        } 
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-6" >
            <input class="btn btn-primary" type="submit" name="btnInsertar" value="Insertar">
        </div>
    </form>
</section>