<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <title>Registro</title>
</head>
<body>
<div class="container pt-3 mb-3">
        <h2 class="text-center">Cadastrar-se</h2>
              
        <div class="container">
    <div class="contact__wrapper shadow-lg mt-n9">
        <div class="row no-gutters">                
            <div class="col-lg-7=5 contact-form__wrapper p-5 order-lg-1">
                <p>Atenção os campos que estiverem com (*) são obrigatórios</p>

                @if(session('erros'))
                    <div class="alert alert-danger" id="tempo">
                        {{session('erros')}}
                    </div>
                @endif

                @if(session('succeso'))
                    <div class="alert alert-success" id="tempo">
                        {{session('succeso')}}
                    </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger" id="tempo">
                    <ul>
                        @foreach ($errors->all() as $erro)
                          <li>{{$erro}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{route('valida.registro')}}" class="contact-form form-validate" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Nome <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="titulo_materia"  value="{{ old('nome') }}" name="nome" placeholder="">
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Sobrenome<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="titulo_materia"  value="" name="sobrenome" placeholder="">
                            </div>
                        </div>
    
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Senha <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="titulo_materia"  value="{{ old('senha') }}" name="senha" placeholder="">
                            </div>
                        </div>

                        
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="titulo_materia"  value="{{ old('email') }}" name="email" placeholder="">
                            </div>
                        </div>

                        
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Confirme email digitado <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="titulo_materia"  value="" name="email_confirma" placeholder="">
                            </div>
                        </div>

            
                        <div class="col-sm-12 mb-3">
                            <button type="submit" name="Cadastrar" class="btn btn-primary">Enviar</button>
                        </div>

                        </form>
                    </div>

                </form>
            </div>
            <!-- End Contact Form Wrapper -->
    
        </div>
    </div>
</div>

<script>

</script>

<script>
setTimeout(function(){
  $("#tempo").fadeOut("fast");
}, 3000);
</script>

</body>
</html>