<!DOCTYPE html>
<html>
    <head>
        <title>Predictor PicoPlaca</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0, " />
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">        
        <link href="Recursos/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">        
        <link href="Recursos/css/estilos.css" rel="stylesheet" media="screen">
        <script type="text/javascript" src="Recursos/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="Recursos/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
        <script type="text/javascript" src="Recursos/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
        <script type="text/javascript" src="index.js" charset="UTF-8"></script>
    </head>
    <body onload="cargarControles()" >
        <header>
            <div class="container-fluid" >
                <div class="est_header">
                    <h5 class="etq_grisClara" ><marquee>Predictor de pico y placa</marquee></h5>
                </div>
                <div class="est_header2"></div>
            </div>
        </header>
        <div class="continer-fluid">            
            <br>
            <div class="row">                                        
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3" >                      
                    <div class="form-group">
                        <label for="txt_cedula">Placa:</label>
                        <input type="text" class="form-control" id="txt_placa" placeholder="Ej: ABC1234">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3" >                      
                    <div class="form-group">                        
                        <label for="txt_fecha" class="control-label">Fecha y hora</label>
                        <div class="input-group date form_datetime" data-date-format="yyyy-mm-dd hh:ii" data-link-field="txt_fecha">
                            <input class="form-control" size="16" type="text" value="" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" id="txt_fecha" value="" /><br/>
                    </div>                    
                </div>                
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3" >
                    <br>
                    <button type="button" class="btn btn-primary" onclick="revisar();">Enviar</button>                    
                </div>
            </div>
            <br>
        </div>

        <!-- Button trigger modal -->
        <a  data-toggle="modal" hidden="hidden" data-target="#myModal" id="a_modal" >ver</a>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detalles de la revisión...</h4>
                    </div>
                    <div class="modal-body">
                        <div id="div_msg"></div>
                    </div>                    
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $('.form_datetime').datetimepicker({
                //language:  'fr',
                weekStart: 1,
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1
            });
            $('.form_date').datetimepicker({
                language: 'fr',
                weekStart: 1,
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0
            });
            $('.form_time').datetimepicker({
                language: 'fr',
                weekStart: 1,
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 1,
                minView: 0,
                maxView: 1,
                forceParse: 0
            });
        </script>        
    </body>
</html>