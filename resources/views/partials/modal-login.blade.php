<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Efetuar login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="cadastro-tab" data-toggle="tab" href="#cadastro" role="tab" aria-controls="cadastro" aria-selected="false">Cadastre-se</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab" style="padding-top: 10px">
                            {{ Form::open(['route' => 'efetuar.login']) }}
                                <div class="form-group">
                                    {{ Form::label("email", "Email", ['class' => 'form-label-sm', 'style' => 'color:#212529']) }}
                                    {{ Form::email("email", null, ['class' => 'form-control form-control-sm ', 'placeholder' => "Email"]) }}
                                    <small class="form-text text-muted">Exemplo: fulano@dominio.com.br</small>
                                </div>
                                <div class="form-group">
                                    {{ Form::label("senha", "Senha", ['class' => 'form-label-sm', 'style' => 'color:#212529']) }}
                                    {{ Form::password("senha", ['class' => 'form-control form-control-sm ', 'placeholder' => "Senha"]) }}
                                </div>

                                {{Form::submit("Entrar", [ 'class' => 'btn btn-info' ])}}
                            {{ Form::close() }}
                        </div>
                        <div class="tab-pane fade" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab" style="padding-top: 10px">
                            {{ Form::open(['route' => 'cadastrar.login']) }}
                                <div class="form-group">
                                    {{ Form::label("nome", "Nome", ['class' => 'form-label-sm', 'style' => 'color:#212529']) }}
                                    {{ Form::text("nome", null, ['class' => 'form-control form-control-sm ', 'placeholder' => "Nome"]) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label("email", "Email", ['class' => 'form-label-sm', 'style' => 'color:#212529']) }}
                                    {{ Form::email("email", null, ['class' => 'form-control form-control-sm ', 'placeholder' => "Email"]) }}
                                    <small class="form-text text-muted">Exemplo: fulano@dominio.com.br</small>
                                </div>
                                <div class="form-group">
                                    {{ Form::label("senha", "Senha", ['class' => 'form-label-sm', 'style' => 'color:#212529']) }}
                                    {{ Form::password("senha", ['class' => 'form-control form-control-sm ', 'placeholder' => "Senha"]) }}
                                </div>

                                {{Form::submit("Cadastrar", [ 'class' => 'btn btn-info' ])}}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{Form::button("Fechar", [ 'class' => 'btn btn-secondary', 'data-dismiss' => 'modal' ])}}
                </div>
        </div>
    </div>
</div>