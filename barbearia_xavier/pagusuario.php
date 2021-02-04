<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='css/core/main.min.css' rel='stylesheet' />
<link href='css/daygrid/main.min.css' rel='stylesheet' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/calendar.css"/>
<script src='js/core/main.min.js'></script>
<script src='js/interaction/main.min.js'></script>
<script src='js/daygrid/main.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
<script src="js/calendar.js"></script>
</head>
<body>
  <h2> Agendamento </h2>
  <br/>
  <p> Obs: Agende somente se tiver certeza, se agendar e não comparecer no dia agendado, será acrescida uma taxa de 10% no valor.</p>
  <p> Obs: Os agendamentos estão sujeitos à 15 minutos de atraso. </p>
  <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
  ?>
  <div id='calendar'></div>

  <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes do Agendamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <dl class="row">

                <dt class="col-sm-3">Agendamento</dt>
                <dd class="col-sm-9" id="title"></dd>

                <dt class="col-sm-3">Horário do Agendamento</dt>
                <dd class="col-sm-9" id="start"></dd>
            </dl>
            </div>
        </div>
    </div>
  </div>

  <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar agendamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="msg-cad"></span>
                <form id="addevent" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Nome </label>
                        <div class="col-sm-10">
                            <input type="text" name="cliente" class="form-control" id="cliente" placeholder="Digite seu nome"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Serviço </label>
                        <div class="col-sm-10">
                            <select id="servico" name="servico" class="form-control">
                                <option value="Corte simples"> Corte simples - R$20,00 </option>
                                <option value="Corte com penteado"> Corte com penteado - R$25,00 </option>
                                <option value="Corte + barba"> Corte + barba - R$40,00 </option>
                                <option value="Barba"> Barba - R$15,00 </option>
                                <option value="Pintura"> Pintura - R$40,00 </option>
                                <option value="Progressiva"> Progressiva - R$60,00 </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Barbeiro </label>
                        <div class="col-sm-10">
                            <select id="barbeiro" name="barbeiro" class="form-control">
                                <option value="Kleber Xavier"> Kleber Xavier </option>
                                <option value="Dan"> Dan </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Data e hora do agendamento </label>
                        <div class="col-sm-10">
                            <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" name = "CadEvent" id="CadEvent" class="btn btn-success" value="CadEvent"> Cadastrar </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>

</body>
</html>
