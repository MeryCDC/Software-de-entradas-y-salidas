<?php $id_prealerta = $_GET['id']; ?>
<?php require_once("app/detalles.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0088)http://controldecarga.ecusmart.net/sistema/paginas/print_label2.php?codguia=SLW402000251 -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<!-- <link rel="shortcut icon" href="http://controldecarga.ecusmart.net/sistema/imagenes/ico/favicon.png"> -->
 
<title>Etiqueta</title>
</head>

<body style="margin:0px; padding:0px; font-family:Verdana, Geneva, sans-serif;" onload="self.print();">
<div style="margin:3px; padding:3px; text-align:center; vertical-align:middle;">
    <!--<table border="1" width="377" height="577">-->
    <table border="0" width="377" height="500">
        <tbody><tr>
            <td>
                <table width="100%">
                    <tbody><tr>
                        <td align="left" style="padding-left: 15px;">
                            <span style="font-size: 11px;"><?php echo $nombre_completo ?><br></span>
                        </td>
                        <td style="text-align: right;">
                            <span style="font-size: 13px; font-weight: bold;">CDC<?php echo $row_cliente['id'] ?><br>CDC<br><?php echo $row_prealerta['peso'] ?></span>
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
        <tr>
            <td align="left" style="padding-left: 15px;">
                <table>
                    <tbody><tr>
                        <td style="vertical-align: top; font-size: 18px;"><b>PARA:</b></td>
                        <td style="padding-left: 10px;">
                            <span style="font-size: 14px; font-weight: bold; font-family: arial;">                                
                            <?php echo $nombre_completo ?><br>
                            <?php echo $row_cliente['calle'];?>, Numero <?php echo $row_cliente['numero_exterior']?>, Colonia <?php echo $row_cliente['colonia']; ?><br><?php echo $row_cliente['codigo_postal']; ?></span>
                        </td>
                    </tr>
                </tbody></table>                
            </td>

        </tr>
        <tr style="border-bottom: 1px solid red">
            <td>
            	<span style="font-size:28px; font-weight: bold;">
                CDC<?php echo $id_prealerta ?></span>
                <br>
                <?php  
                # Incluimos el autoload
                require_once "vendor/autoload.php";
                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                $codigo = "CDC" . $id_prealerta;
                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($id_prealerta, $generator::TYPE_CODE_128)) . '">';
                ?>
            </td>
        </tr>        
        <tr>
            <td>
                <table>
                    <tbody>
                        <tr>
<!--                         <td width="100">
                            <span style="font-weight: bold; font-size: 20px;">SLW402 21195</span>
                            <?php echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($codigo, $generator::TYPE_CODE_128)) . '">'; ?>
                        </td> -->
                        <td >
                            <span style="font-size: 14px;"><b>TRACKING#: <?php echo $row_recepcion['tracking'] ?> </b></span>
                            <?php 
                                $track =  $row_recepcion['tracking'] ;
                                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($track, $generator::TYPE_CODE_128)) . '">'; 
                            ?>
                        </td>
                    </tr>
                </tbody></table>
            </td>
        </tr>
        <tr>
        	<td align="center">         	
                <table border="1" cellspacing="0" cellpadding="0">
                    <tbody><tr>
                        <td align="center" style="padding: 2px;">
                            <span style="font-size: 14px; font-weight: bold;">NO SE PIERDA NUESTRAS PROMOCIONES</span><br>
                            <span style="font-size: 12px;">.</span><br>
                            <span style="font-size: 16px;">.</span>
                        </td>
                    </tr>                    
                </tbody></table>                
            </td>
        </tr>
        <tr>            
            <td>
                <table width="100%">
                    <tbody><tr>
                        <td width="30%" height="80"><!-- <img src="../imagenes/cdcfacebook.jpeg" height="80"> --></td>
                        <!-- <td style="text-align: center;"><img src="../../imagenes/engranaje.jpg" height="80"></td>
                        <td width="30%" style="text-align: right;"><img src="../imagenes/cdcweb.jpeg" height="80"></td> -->
                    </tr>
                </tbody></table>
            </td>
        </tr>
    </tbody></table>
</div>


</body></html>