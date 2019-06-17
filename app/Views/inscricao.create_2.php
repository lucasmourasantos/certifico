<?php include("head.php"); ?>
<div class="container">
    <div class="py-1">
        <img class="d-block mx-auto mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Inscrições Online</h2>
    </div>

    <br>
    <br>

    <div class="row">
        <div class="col-md-6 order-md-1">
            <form class="needs-validation" action="/save_inscricao" method="POST" novalidate>

                <?php if (count($valores) > 0): ?>

                    <input type="hidden" name="participante_id" id="participante_id" value="<?php echo $valores[0]; ?>"/>
                    <input type="hidden" name="evento_id" id="evento_id" value="<?php echo $valores[2]; ?>"/>

                    <span>Participante: </span>
                    <span><?php echo $valores[1]; ?></span>

                    <?php else: ?>
                      <span>Nenhum participante selecionado</span>
                    <?php endif; ?>

                    <br>
                    <br>

                    <label for="layout">Cursos</label>
                    <select class="custom-select d-block w-100" name="id_curso" id="id_curso">
                        <option value="">Escolha...</option>

                        <?php if (count($cursos) > 0): ?>
                            <?php foreach ($cursos as $curso): ?>

                                <option value="<?php echo $curso['id']; ?>"><?php echo Utf8_encode($curso['nome']); ?> - <?php echo Utf8_encode($curso['turno']); ?></option>

                            <?php endforeach; ?>

                        <?php else: ?>
                            Nenhum usuário cadastrado
                        <?php endif; ?>
                    </select>
                    <div class="invalid-feedback">
                        Please provide a valid state.
                    </div>
        <br>
        <button class="btn btn-primary btn-lg" type="submit" name="inscricao">Confirmar</button>
        </form>
    </div>
</div>

<script src="app\Views\js\zepto.min.js"></script>
<script type="text/javascript" src="app\Views\js\jsapi.js"></script>
<script src="app\Views\js\jquery.min.js"></script>


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
<?php include("footer.php"); ?>
