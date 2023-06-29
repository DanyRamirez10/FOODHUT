<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';
   // $hoy = date('Y-m-d');
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    if($action == 'ajax'){
        // Hallar el stock disponible
        $sql ="SELECT *FROM usuario";
        $consulta = $conector->query($sql);
        $ver = $consulta->num_rows;
        if($ver<1){
            $error[]="No se registran <strong>usuarios en el Sistema</strong>";
        }else{
        ?>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered table-hover dt-responsive" style="width: 100%;">
                <thead>
                    <tr class="odd">
                        <th class="all text-center">Nro.</th>
                        <th class="text-center">Codigo</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Paterno</th>
                        <th class="text-center">Materno</th>
                        <th class="text-center">TipoDocu</th>
                        <th class="all text-center">N° Docu</th>
                        <th class="none text-center">Correo</th>
                        <th class="none text-center">Celular</th>
                        <th class="text-center">Sexo</th>
                        <th class="text-center">Direccion</th>
                        <th class="none text-center">fecha nacimineto</th>
                        <th class="none text-center">Estado</th>
                        <th class="none text-center">Registrado</th>
                        <th class="all text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while ($fila = $consulta->fetch_array()){
                    if($fila['$tdoUsu'==1]){
                        $tdoc='<label class="label label-info">DNI</label>';
                    }elseif($fila['tdoUsu'==2]){
                        $tdoc='<label class="label label-info">PASAPORTE</label>';
                    }else{
                        $tdoc="CARNET EXTRA.";
                    }
                    echo '
                        <tr>
                            <td class="text-center">'.$i.'</td>
                            <td class="text-center">'.$fila['codUsu'].'</td>
                            <td class="text-center">'.$fila['nomUsu'].'</td>
                            <td class="text-center">'.$fila['appUsu'].'</td>
                            <td class="text-center">'.$fila['apmUsu'].'</td>
                            <td class="dtr-hidden">'.$tdoc.'</td>
                            <td class="dtr-hidden">'.$fila['docUsu'].'</td>
                            <td class="dtr-hidden">'.$fila['emaUsu'].'</td>
                            <td class="dtr-hidden">'.$fila['celUsu'].'</td>
                            <td class="dtr-hidden">'.$fila['sexUsu'].'</td>
                            <td class="dtr-hidden">'.$fila['dirUsu'].'</td>
                            <td class="dtr-hidden">'.$fila['fnaUsu'].'</td>
                            <td class="dtr-hidden">'.$fila['priUsu'].'</td>
                            <td class="dtr-hidden">'.$fila['estUsu'].'</td>
                        </tr>';
                    $i++;
                }
                ?>
                </tbody>
            </table>
            </div>
        <?php
        }
    }
if(isset($error)){
    echo'<div class="alert alert-warning alert-dismissible text-center">
    <h5><i class="icon fas fa-exclamation-triangle"></i> Comunicado!</h5>';
        foreach($error as $err){
        echo $err;
    }
    echo'</div>';
}
if(isset($message)){
    echo'<div class="alert alert-success" role="alert">';
    echo '<b>Bien!</b> ';
    foreach($message as $sms){
        echo $sms;
    }
    echo '</div>';
}
?>
<link href="../assets/template/datatables/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/template/datatables/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="../assets/template/datatables/datatable.js" type="text/javascript"></script>
<script src="../assets/template/datatables/datatables/datatables.min.js" type="text/javascript"></script>
<script src="../assets/template/datatables/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="../assets/template/datatables/table-datatables-responsive.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        //nombre del id del table
        $('#example').DataTable( {
           responsive: true
        } );
    } );
</script>