<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">

    <meta name="author" content="Bagas Topati">



    <title>Dashbord | NXT D'MOBS</title>



    <link rel="canonical" href="https://www.instagram.com/bagas.topati/" />

    <link rel="shortcut icon" href="{{ url('appstack/img/favicon.ico') }}">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Preahvihear&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link class="js-stylesheet" href="{{ url('appstack/css/light.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{url('appstack/plugins/select2/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="{{ url('appstack/summernote/summernote-bs4.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" type="text/css" href="{{url('appstack/plugins/tempus-dominus/tempus-dominus.min.css')}}" />

    {{-- <script src="js/settings.js"></script> --}}

    <!-- END SETTINGS -->

    
    <style>

        
        body {
            font-family: "Montserrat", sans-serif;
        }

        .dropdown-toggle:after {
            display: none;
        }

        @media (max-width: 767px) {

            .table-responsive .dropdown-menu {

                position: static !important;

            }

        }

        

        @media (max-width: 500px) {

            .table-responsive .dropdown-menu {

                position: absolute !important;

            }

        }



        @media (min-width: 768px) {

            .table-responsive {

                /*overflow: visible;*/

            }

        }



        #loading {

            display: none;

            position: fixed;

            top: 0;

            left: 0;

            width: 100%;

            height: 100%;

            background: rgba(255, 255, 255, 0.8);

            text-align: center;

            padding-top: 20%;

            z-index: 9999;

        }



        #loading img {

            width: 50px;

        }

        

        body {

            background-color: #fff !important;

            color: #1F1F1F !important;

        }

        .sidebar {
            border-right: 1px solid #d1e4f5;
            background-color: #fff !important;
        }

        .sidebar-link svg {
            width: 16px;
            height: 16px;
        }

        .sidebar-link, a.sidebar-link {
            font-weight: 700;
            color: #222 !important;
        }
        
        /*my custom css*/
        :root {
            --bs-border-color:  rgb(216, 222, 228)
        }
        .btn {
            padding: calc(8px/1.6) calc(16px/1.2);
            font-size: .875rem;
        }
        
        .btn.btn-lg {
            padding: calc(8px/1.6) calc(24px/1.3);
            font-size: 1rem;
        }
        
        .dropdown-menu {
            box-shadow: 0 4px 12px rgba(12, 12, 12, 0.15), 0 0 0 1px rgba(0, 0, 0, 0.05);
            border-width: 0px;
            padding: 8px 0px;
        }
        
        .dropdown-menu .dropdown-item {
            padding-left: 8px;
            padding-right: 8px;
            line-height: 1.15;
            font-size: .875rem;
        }
        
        .form-control {
            padding: calc(8px - 1px) calc(8px * 1.6);
            border-color: rgb(188, 197, 204);
            
        }
        
        .form-control.form-control-lg {
             padding: calc(16px / 1.25) calc(8px * 1.6);
        }
        
        .table tr td{
            padding: calc(16px * .8) 8px;
        }
        
        .badge {
            padding-left: 8px;
            padding-right: 8px;
            border-radius: 99px;
            font-size: .75rem;
        }
        
        .badge.text-bg-secondary {
            background-color: rgb(241, 243, 245) !Important;
            color: rgb(85, 89, 93) !important;
            border: 1px solid rgb(215, 220, 224);
        }

    </style>

    

    <style>

        .select2-container .select2-selection--multiple .select2-selection__rendered {

            display: inline-block !important;

        }

    </style>

    

    @yield('header')

</head>

<!--

  HOW TO USE:

  data-theme: default (default), dark, light

  data-layout: fluid (default), boxed

  data-sidebar-position: left (default), right

  data-sidebar-behavior: sticky (default), fixed, compact

-->



<body data-theme="light" data-layout="fluid" data-sidebar-position="left"

    data-sidebar-behavior="fixed">

    <div class="wrapper">


        <div class="main">
            

            <main class="content">

                @yield('content')

            </main>



            <footer class="footer">

                <div class="container-fluid">

                    <div class="row text-muted">

                        <div class="col-6 text-start">

                            <ul class="list-inline">

                                <li class="list-inline-item">

                                    <a class="text-muted" href="#">Support</a>

                                </li>

                                <li class="list-inline-item">

                                    <a class="text-muted" href="#">Help Center</a>

                                </li>

                                <li class="list-inline-item">

                                    <a class="text-muted" href="#">Privacy</a>

                                </li>

                                <li class="list-inline-item">

                                    <a class="text-muted" href="#">Terms of Service</a>

                                </li>

                            </ul>

                        </div>

                        <div class="col-6 text-end">

                            <p class="mb-0">

                                &copy; {{ date('Y') }} - <a href="#" class="text-muted">BAGASTOPATI SOFTWARE</a>

                            </p>

                        </div>

                    </div>

                </div>

            </footer>

        </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>

    <script src="{{url('appstack/js/popper.js')}}"></script>

    <script src="{{url('appstack/plugins/tempus-dominus/tempus-dominus.min.js')}}"></script>



    <script src="{{ url('appstack/js/jquery.min.js') }}"></script>

    <script src="{{ url('appstack/js/underscore.js') }}"></script>

    <script src="{{ url('appstack/js/backbone.js') }}"></script>

    <script src="{{ url('appstack/js/app.js') }}"></script>



    <script src="{{ url('appstack/plugins/select2/select2.min.js') }}"></script>





    {{-- <script src="{{ url('appstack/summernote/summernote-bs4.js') }}"></script> --}}

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>



    <script>

        window.BASE_URL = "{{url('/')}}";

        window.API_URL = BASE_URL + '/api';

        //toastr.options.timeOut  = 15;

        //toastr.options.closeDuration = 150;

        window.App = {

            Helpers: {

                handleValidationErrors: (errors) => {

                    // Clear any existing Toast notifications


                    // Check if the errors object is not empty

                    if (Object.keys(errors).length > 0) {

                        // Iterate through each field with an error

                        $.each(errors, function (field, messages) {

                            // Display a Toastr notification for each error
                            
                            $.each(messages, function(index, message) {
                                Toastify({
                                    text: message,
                                    close: true,
                                    style: {
                                        background: "linear-gradient(#e8ae5d, #e8ae5d)"
                                    }
                                })
                                .showToast();

                            });

                        });

                    }

                }

            }

        }



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });





        $('input[name="payment_date"]').daterangepicker({

            singleDatePicker: true,

            locale: {

                format: 'YYYY-MM-DD'

            },

            setDate: moment().format('YYYY-MM-DD')

        });

    </script>



    <script>

        $(document).ready(function() {

            // Function to parse URL parameters

            function getParameterByName(name, url) {

                if (!url) url = window.location.href;

                name = name.replace(/[\[\]]/g, '\\$&');

                var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)');

                var results = regex.exec(url);

                if (!results) return null;

                if (!results[2]) return '';

                return decodeURIComponent(results[2].replace(/\+/g));

            }



            var created_atParam = getParameterByName('created_at');



            if (created_atParam) {

                var decodedValue = decodeURIComponent(created_atParam);

                $('input[name="created_at"]').val(decodedValue);

            }



            $('input[name="created_at"]').daterangepicker({

                autoUpdateInput: false,

                locale: {

                    cancelLabel: 'Clear'

                }

            });



            $('input[name="created_at"]').on('apply.daterangepicker', function(ev, picker) {

                var currentValue = $(this).val();



                if (currentValue === '') {

                    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' to ' + picker.endDate.format(

                        'DD/MM/YYYY'));

                } else {

                    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' to ' + picker.endDate.format(

                        'DD/MM/YYYY'));

                }

            });



            $('input[name="created_at"]').on('cancel.daterangepicker', function(ev, picker) {

                $(this).val('');

            });








            $('#form-cari-input').keypress(function(event) {

                if (event.which === 13) {

                    submitForm();

                }

            });



        });



        function submitForm() {

            document.getElementById('form-cari').submit();

        }

    </script>



    <script>

        $(document).ready(function() {

            var lastSelectedCheckbox = null;

            var selectedType = "{{ request('type') }}";



            if (selectedType) {

                $('.type-checkbox').each(function() {

                    if ($(this).val() === selectedType) {

                        $(this).prop('checked', true);

                        lastSelectedCheckbox = this;

                    }

                });

            }



            $('.type-checkbox').click(function() {

                var clickedCheckbox = this;



                if (clickedCheckbox !== lastSelectedCheckbox) {

                    $(lastSelectedCheckbox).prop('checked', false);

                    $('input[name="type"]').val($(clickedCheckbox).val());

                    lastSelectedCheckbox = clickedCheckbox;

                    $('form').submit();

                }

            });

        });



        // Set up the loading state

        var loading = $("#loading");

        $(document).ajaxStart(function() {

            loading.show();

        }).ajaxStop(function() {

            loading.hide();

        });


        function toastErrorValidations(errors) {
            
        }
    </script>


    @yield('footer')



</body>



</html>
