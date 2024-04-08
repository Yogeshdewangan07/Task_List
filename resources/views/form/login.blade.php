<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .alert i{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4.col-md-offset-4 mt-3">
                <h4>Login</h4>
                <form action="{{ route('login.user') }}" method="POST">
                    @if (Session::has('success'))
                        <div class="alert alert-success d-flex align-items-center justify-content-between">
                            {{Session::get('success')}}
                            <i class="fa-solid fa-xmark fw-bold"></i>
                        </div>
                    @elseif (Session::has('fail'))
                        <div class="alert alert-danger d-flex align-items-center justify-content-between fw-bold">
                            {{Session::get('fail')}}
                            <i class="fa-solid fa-xmark fa-xl"></i>
                        </div>
                    @endif
                    @csrf
                    @method('post')
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                        <span class="text-danger">@error('email')
                            {{$message}}
                        @enderror</span>
                      </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
                        <span class="text-danger">@error('password')
                            {{$message}}
                        @enderror</span>
                      </div>
                      <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Login</button>
                      </div>
                      <div class="mb-3"><a href="{{ route('form.registration') }}">New user! Register Here</a></div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const crossDiv = document.querySelector('.alert'),
        crossBtn = document.querySelector('.alert i');
        console.log(crossDiv);
        console.log(crossBtn);
        crossBtn.addEventListener('click', function (){
            crossDiv.remove();
        });

        setTimeout(() => {
            crossDiv.remove();
        }, 10000);
        
    </script>
</body>
</html>