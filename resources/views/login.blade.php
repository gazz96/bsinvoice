<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="NXT D'MOBS">
    <meta name="author" content="Bagas Topati">

    <title>Sign In</title>

    <link rel="canonical" href="https://appstack.bootlab.io/pages-sign-in.html" />
    <link rel="shortcut icon" href="img/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    

    <!-- Choose your prefered color scheme -->
    <!-- <link href="css/light.css" rel="stylesheet"> -->
    <!-- <link href="css/dark.css" rel="stylesheet"> -->

    <!-- BEGIN SETTINGS -->
    <!-- Remove this after purchasing -->
    <link class="js-stylesheet" href="{{ url('appstack/css/light.css') }}" rel="stylesheet">
    <!-- END SETTINGS -->
    <style>
        body {
            background: #f6f6f6 !important;
            color: #1F1F1F !important;
        }
        
        .btn-primary {
            background: #ED1B2E !important;
            border-color: #ED1B2E !important;
        }
        
        .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
            color: #1F1F1F;
        }
    </style>
</head>
<!--
  HOW TO USE:
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="main d-flex justify-content-center w-100">
        <main class="content d-flex p-0">
            <div class="container d-flex flex-column">
                <div class="row h-100">
                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                        <div class="d-table-cell align-middle">

                            <div class="text-center mt-4">
                                <h1 class="h2">{{ $setting->getByKey('name') ??  "NXT D'MOBS" }}</h1>
                                <p class="lead">
                                    Sign in to your account to continue
                                </p>
                            </div>

                            <div class="card rounded-5">
                                <div class="card-body">
                                    <div class="m-sm-3">
                                        <form method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">User ID</label>
                                                <input class="form-control form-control-lg rounded-pill" name="name"
                                                    type="text" name="name" placeholder="Enter your user ID"
                                                    value="{{ old('name') }}" />
                                                @error('name')
                                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input class="form-control form-control-lg rounded-pill" name="password"
                                                    type="password" name="password" placeholder="Enter your password" />
                                                @error('password')
                                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div>
                                                <div class="form-check align-items-center">
                                                    <input id="customControlInline" type="checkbox"
                                                        class="form-check-input" value="1" name="remember"
                                                        checked>
                                                    <label class="form-check-label text-small"
                                                        for="customControlInline">Remember me</label>
                                                </div>
                                                {{-- <a href="{{url('check-status')}}"><span>Check your order status here</span></a> --}}
                                            </div>
                                            <div class="d-grid gap-2 mt-3">
                                                <button type="submit" class="btn btn-lg btn-primary rounded-pill">Sign in</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

{{-- <script>
    function getData()
    {
        fetch('{{route('purchase.getData')}}', { method: 'GET' })
        .then(response => response.json())
        .then(data => console.log(data.message))
        .catch(error => console.error('Error:', error));
    }
</script> --}}

</html>