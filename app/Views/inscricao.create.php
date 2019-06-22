    <div class="py-1">
        <img class="d-block mx-auto mb-4" src="app\Views\img\icone_certifico_site.png" alt="" width="72" height="72">
        <h2>Inscrições Online</h2>
    </div>

    <br>
    <br>

    <div class="row">
        <div class="col-md-12 order-md-1">
            <form class="needs-validation" name="formEscola" id="formEscola" action="/participante_busca" method="POST">
                <div class="row">
                    <div class="input-group col-md-4 mb-3">
                        <input type="text" class="search-query form-control" id="cpf" name="cpf" placeholder="Buscar por CPF" maxlength="14" onkeypress="formatar('###.###.###-##', this);">
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-primary" name="emitir" value="Pesquisar">
                        </span>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                </div>
            </form>

            <form class="needs-validation" action="/finalizar_inscricao" method="POST" novalidate>
                <div class="row">
                    <div class="col-md-8 mb-3">

                        <div class="resultadoForm">


                            <?php if (!empty($cpf)): ?>
                                <?php foreach ($cpf as $userCPF): ?>
                                    <input type="hidden" name="participante_id" id="participante_id" value="<?php echo $userCPF['id']; ?>"/>
                                    <input type="hidden" name="participante_nome" id="participante_nome" value="<?php echo $userCPF['nome']; ?>"/>
                                    <table>
                                        <thead>
                                            <tr>
                                                <td>CPF</td>
                                                <td>NOME</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td><?php echo $userCPF['cpf']; ?></td>
                                                <td><?php echo $userCPF['nome']; ?></td>

                                            <?php endforeach; ?>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="layout">Evento</label>
                        <select class="custom-select d-block w-100" name="id_evento" id="id_evento">
                            <option value="">Escolha...</option>

                            <?php if (count($users) > 0): ?>
                                <?php foreach ($users as $user): ?>

                                    <option value="<?php echo $user['id']; ?>"><?php echo Utf8_encode($user['nome']); ?></option>

                                <?php endforeach; ?>

                            <?php else: ?>
                                Nenhum usuário cadastrado
                            <?php endif; ?>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                </div>
                <br>
                <button class="btn btn-primary btn-lg" type="submit" name="inscricao">Confirmar</button>
            </form>
        </div>
    </div>

<!--
<script src="app\Views\js\zepto.min.js"></script>
<script type="text/javascript" src="app\Views\js\jsapi.js"></script>
<script src="app\Views\js\jquery.min.js"></script>
-->
