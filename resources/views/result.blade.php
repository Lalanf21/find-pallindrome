<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>Cek Palindrom</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Cek kata Palindrom</a>
    </nav>

    {{-- card --}}
    <div class="row p-3 d-flex justify-content-center" id="result">
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-footer bg-warning">
                    <h5 class="card-title text-center">
                       Result
                    </h5>
                </div>
                <div class="card-body">
                    @if ($data['is_palindrome'] == true)
                        <p>Kata "{{ $data['palindrome'] }}" merupakan <strong>Polindrome</strong></p>
                        @if ($data['banyak_kata']>1)
                        <p> Banyak kata palindrome adalah : <strong>{{ $data['banyak_kata'] }}</strong></p>
                        <p> Kata pertama adalah : <strong>{{ $data['kata_pertama'] }}</strong></p>
                        @endif
                    @else
                        <p>Kata "{{ $data['palindrome'] }}" <strong>Bukan Polindrome</strong></p>
                    @endif
                    <a href="{{ route('index') }}" class="card-link">
                        <button class="btn btn-success"> <i class="fas fa-arrow-left"></i> Kembali</button>
                    </a>
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

  </body>
</html>