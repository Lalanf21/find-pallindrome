<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/plugins/notifications/css/lobibox.min.css') }}" />

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>Cek Palindrom</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Cek kata Palindrom</a>
    </nav>

    {{-- card --}}
    <div class="row p-3 d-flex justify-content-center">
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-footer bg-warning">
                    <h5 class="card-title text-center">
                        Silahkan input kata atau kalimat
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('send') }}" id="form">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                          <label for="wordText">Kata atau kalimat</label>
                          <input type="text" class="form-control" id="wordText" name="wordText">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Cek
                            </button>
                        </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
    
    {{-- /card --}}
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js') }}"></script>

    <script>
        function notifMessage(textMsg, typeMsg = 'info') {
            if (typeMsg === 'error') {
                iconMessage = 'fas fa-times-circle';
            }else if(typeMsg === 'success'){
                iconMessage = 'fas fa-check-circle';
            }else{
                iconMessage = 'fas fa-info-circle';
            }

            Lobibox.notify(typeMsg, {
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                size: 'mini',
                    rounded: true,
                icon: iconMessage,
                delay: 2500, 
                position: 'bottom right',
                msg: textMsg,
                sound: false,
            });
        }

        function read_error(xhr) {
            var textMsg = '<strong></strong>';
            var response = [];

            if (isJson(xhr.responseText)) {
                response = JSON.parse(xhr.responseText);
            }

            $.each(response, function (x, y) {
                textMsg += y + '<br>';
            });

            notifMessage(textMsg, 'error');
        }
    </script>
    <script>
        $('#form').submit(function(e){
        e.preventDefault(e);
        var wordText = $('#wordText').val();
        var accept = /^[a-zA-Z\s]+$/;
       
        if (wordText.length <= 0 ) {
            notifMessage('Silahkan input kata yang ingin di cari dahulu ! ', 'warning');
            $('#wordText').val('');
            return;
        }
        
        if (!wordText.match(accept)) {
            notifMessage('Input hanya boleh karakter a-z ! ', 'warning');
            $('#wordText').val('');
            return;
        }

        this.submit();
    });
    </script>
    <script>
        @if(Session::has('error_message'))
            notifMessage('{!! Session::get('error_message') !!}','error');
        @endif
    
        @if($errors->any())
            var div = '';
                @foreach ($errors->all() as $error)
                    div +='<div>{{ $error }}</div>';
                @endforeach
            notifMessage(div,'error');
        @endif
    </script>
  </body>
</html>