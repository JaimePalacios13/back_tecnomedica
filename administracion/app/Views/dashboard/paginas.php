<div class="container mt-3">
    <h1>Páginas</h1>
    <p>Edita, y administra las páginas de tu sitio.</p>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel"> 
                <div class="x_title">
                    <h2>Páginas</h2>
                    <div class="clearfix"></div>
                    <div class="row mt-4">
                        <div class="col-sm">
                            <table id="tbl_user" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>#Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(isset($paginas))
                                    {
                                        $counter = 1;
                                        foreach ($paginas as $value) {
                                            echo '
                                                <tr>
                                                    <td>'.$counter.'</td>
                                                    <td>'.$value['nombre'].'</td>
                                                    <td> 
                                                        <a class="btn btn-primary" href="'.$value['url'].'" target=”_blank”>
                                                            <i class="fas fa-folder"></i>
                                                            View
                                                         </a>
                                                    </td>
                                                </tr>
                                            ';
                                            $counter++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>