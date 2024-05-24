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
                    <div class="row">
                        <div class="col-md-2">
                            <div class="nav nav-tabs flex-column  bar_tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <?php 
                                    $contador = 0;
                                    foreach($secciones as $seccion){ 
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
                        <div class="col">
                            <div class="tab-content" id="v-pills-tabContent">
                                <?php 
                                    $contador = 0;
                                    foreach($secciones as $seccion){ 
                                        if($contador == 0){
                                            echo '<div class="tab-pane fade active show" id="v-pills-'.$seccion['id_seccion'].'" role="tabpanel" aria-labelledby="v-pills-'.$seccion['id_seccion'].'-tab">';
                                        } else{
                                            echo '<div class="tab-pane fade" id="v-pills-'.$seccion['id_seccion'].'" role="tabpanel" aria-labelledby="v-pills-'.$seccion['id_seccion'].'-tab">'; 
                                        }

                                        foreach($elementos as $elemento){ 
                                            if($elemento['id_seccion'] == $seccion['id_seccion'])
                                            {
                                                    helper('form');
                                                    $attributes = ['class' => 'form-vertical', 'class' => 'form-label-left','id' => 'myform'];
                                                    echo form_open('email/send', $attributes); 
                                ?>
                                                    <div class="form-group row">
                                                        <?php 
                                                            echo form_label($elemento['nombre']);

                                                            $data = [
                                                                'name'          => 'ta-'.$elemento['nombre'],
                                                                'id'            => 'text-area-'.$elemento['id_detalle'],
                                                                'value'         => $elemento['valor'],
                                                                'maxlength'     => '350',
                                                                'rows'          => "3",
                                                                'required'      => true,
                                                                'class'         => 'form-control',
                                                                'placeholder'   =>$elemento['nombre'].'...',
                                                            ];
                                                            echo form_textarea($data);

                                                            $data = [
                                                                'name'    => 'cb-'.$elemento['nombre'],
                                                                'id'      => 'checkbox-'.$elemento['id_detalle'],
                                                                'value'   => 'accept',
                                                                'checked' => $elemento['estado'] ? true : false,
                                                            ];
                                                            echo form_checkbox($data).' Activo';
                                                        ?>
                                                    </div>
                                                </form>
                                <?php
                                            }
                                        }
                                        echo '</div>';
                                        
                                        $contador++;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>