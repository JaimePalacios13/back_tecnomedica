<?php foreach ($errors as $error): ?>
    <li><?= esc($error) ?></li>
<?php endforeach ?>

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
                            <?php 
                                $contadorSecciones = 0;
                                $contadorElementos = 0;
                                
                                $attributes = ['class' => 'form-vertical', 'class' => 'form-label-left','id' => 'elementos_form'];
                                echo form_open_multipart('pagina/secciones/update', $attributes); 
                                    echo '<div class="tab-content" id="v-pills-tabContent">';
                                        foreach($secciones as $seccion){ 
                                            if($contadorSecciones == 0){
                                                echo '<div class="tab-pane fade active show" id="v-pills-'.$seccion['id_seccion'].'" role="tabpanel" aria-labelledby="v-pills-'.$seccion['id_seccion'].'-tab">';
                                            } else{
                                                echo '<div class="tab-pane fade" id="v-pills-'.$seccion['id_seccion'].'" role="tabpanel" aria-labelledby="v-pills-'.$seccion['id_seccion'].'-tab">'; 
                                            }
                                                        
                                                    foreach($elementos as $elemento){ 
                                                        if($elemento['id_seccion'] == $seccion['id_seccion'])
                                                        {
                                                            echo '<div class="form-group row">';

                                                                echo form_label($elemento['nombre'].' (350 chars max)');

                                                                $data = [
                                                                    'name'          => 'elemento['.$contadorElementos.'][valor_elemento]',
                                                                    'value'         => $elemento['valor'],
                                                                    'maxlength'     => '350',
                                                                    'rows'          => "3",
                                                                    'class'         => 'form-control',
                                                                    'placeholder'   =>$elemento['nombre'].'...',
                                                                ];
                                                                echo form_textarea($data);
                            
                                                                echo '<div class="form-check">';
                                                                    $data = [
                                                                        'name'    => 'elemento['.$contadorElementos.'][estado_elemento]',
                                                                        'value'   => 'accept',
                                                                        'checked' => $elemento['estado'] ? true : false,
                                                                    ];
                                                                    echo form_checkbox($data);
                                                                    echo '<label class="form-check-label">Activo</label>';
                                                                echo '</div>'; // Fin form-check
                                                                
                                                            echo '<input type="file" name="userfile">';
                                                            echo '</div>'; // Fin form-group

                                                            echo form_hidden('elemento['.$contadorElementos.'][id_elemento]', $elemento['id_detalle']);
                                                            echo '<div class="clearfix"></div>';
                                                            $contadorElementos++;
                                                        }
                                                    } // Fin foreach de elementos
                                                echo '</div>'; // Fin tab-pane
                                            $contadorSecciones++;
                                        } // Fin foreach de secciones
                                    echo '</div>'; // Fin tab-content
                                echo form_submit();
                                echo form_close();
                            ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>