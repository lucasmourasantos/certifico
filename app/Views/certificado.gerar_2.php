<div class="container">

    <div class="py-1">
        <img class="d-block mx-auto mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Gere seu certificado online</h2>
    </div>
    <br>
    <div class="row">
            <div class="col-md-12 mb-3">
                    <div class="resultadoForm">
                        <input type="hidden" name="participante_id" id="txtstart"/>

                            <table class="table">

                            <thead>
                                <tr>
                                    <td>EVENTO</td>
                                    <td>CURSO</td>
                                    <td>LOCAL</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <?php if (count($users) > 0): ?>
                                <?php foreach ($users as $user): ?>
                                  <tbody>
                                      <tr>
                                          <td><?php echo $user['evento']; ?></td>
                                          <td><?php echo $user['curso']; ?></td>
                                          <td><?php echo $user['local']; ?></td>

                                          <td>
                                            <form class="" action="/emitir" method="post">
                                              <input type="hidden" name="cpf" value="<?php echo $user['cpf']; ?>">
                                              <input type="hidden" name="curso" value="<?php echo $user['curso']; ?>">
                                              <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                              <input type="hidden" name="id_curso" value="<?php echo $user['id_curso']; ?>">
                                              <input type="submit" name="emitir" value="Emitir" class="btn btn-info">
                                            </form>
                                          </td>
                                      <?php endforeach; ?>
                                  </tr>
                              </tbody>
                            <?php else: ?>
                                <span>Nenhum participante selecionado</span>
                            <?php endif; ?>
                          </table>

                    </div>
            </div>
    </div>
</div>

<!-- ****** Simples função de colocar mascara em javascript ****** -->
<script>  function formatar(mascara, documento){
    var i = documento.value.length;
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(i);
    if (texto.substring(0,1) != saida){documento.value += texto.substring(0,1);}
}
</script>

<!-- ****** Validando o formulário (inclusive o CPF) ****** -->
<script>
$(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nome: {
                validators: {
                    stringLength: {
                        min: 2
                    },
                    notEmpty: {
                        message: 'Insira o seu nome'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Insira o seu e-mail'
                    },
                    emailAddress: {
                        message: 'E-mail incorreto'
                    }
                }
            },
            cpf: {
                validators: {
                    callback: {
                        message: 'CPF Invalido',
                        callback: function(value) {
                            //retira mascara e nao numeros
                            cpf = value.replace(/[^\d]+/g, '');
                            if (cpf == '') return false;

                            if (cpf.length != 11) return false;

                            // testa se os 11 digitos são iguais, que não pode.
                            var valido = 0;
                            for (i = 1; i < 11; i++) {
                                if (cpf.charAt(0) != cpf.charAt(i)) valido = 1;
                            }
                            if (valido == 0) return false;

                            //  calculo primeira parte
                            aux = 0;
                            for (i = 0; i < 9; i++)
                                aux += parseInt(cpf.charAt(i)) * (10 - i);
                            check = 11 - (aux % 11);
                            if (check == 10 || check == 11)
                                check = 0;
                            if (check != parseInt(cpf.charAt(9)))
                                return false;

                            //calculo segunda parte
                            aux = 0;
                            for (i = 0; i < 10; i++)
                                aux += parseInt(cpf.charAt(i)) * (11 - i);
                            check = 11 - (aux % 11);
                            if (check == 10 || check == 11)
                                check = 0;
                            if (check != parseInt(cpf.charAt(10)))
                                return false;
                            return true;


                        }
                    }
                }
            }
        }
    })

});
</script>
