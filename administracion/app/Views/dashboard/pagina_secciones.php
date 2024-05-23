<div class="container mt-3">
    <h1>Secciones</h1>
    <p>Edita, y administra las secciones de tu página.</p>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel"> 
                <div class="x_title">
                    <h2>
                        <i class="fas fa-bars"></i>
                        Secciones
                        <small> de la página 
                            <?php
                                if(isset($pagina))
                                {
                                    echo $pagina['nombre'];
                                }
                            ?></small>
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    <div class="col-xs-3">
                        <div class="nav nav-tabs flex-column  bar_tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <?php 
                                $contador = 0;
                                foreach($paginaSecciones as $seccion){ 
                                    if($contador == 0){
                                        echo '<a class="nav-link active" id="v-pills-'.$seccion['id_seccion'].'-tab" data-toggle="pill" href="#v-pills-'.$seccion['id_seccion'].'" role="tab" aria-controls="v-pills-'.$seccion['id_seccion'].'" aria-selected="true">'.$seccion['nombre'].'</a>';
                                    } else{
                                        echo '<a class="nav-link" id="v-pills-'.$seccion['id_seccion'].'-tab" data-toggle="pill" href="#v-pills-'.$seccion['id_seccion'].'" role="tab" aria-controls="v-pills-'.$seccion['id_seccion'].'" aria-selected="true">'.$seccion['nombre'].'</a>';
                                    }
                                    $contador++;
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <?php 
                                $contador = 0;
                                foreach($paginaSecciones as $seccion){ 
                                    if($contador == 0){
                                        echo '<div class="tab-pane fade active show" id="v-pills-'.$seccion['id_seccion'].'" role="tabpanel" aria-labelledby="v-pills-'.$seccion['id_seccion'].'-tab">';
                                    } else{
                                        echo '<div class="tab-pane fade" id="v-pills-'.$seccion['id_seccion'].'" role="tabpanel" aria-labelledby="v-pills-'.$seccion['id_seccion'].'-tab">'; 
                                    }

                                    echo 
                                        '<form class="form-vertical form-label-left">
                                            <div class="form-group row">
                                                <label>Email address</label>
                                                <input type="email" class="form-control" placeholder="Enter email">
                                                <label>
                                                    <input type="checkbox" value=""> Activo
                                                </label>
                                            </div>
                                        </form>';

                                    echo '</div>';
                                    
                                    $contador++;
                                }
                            ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>