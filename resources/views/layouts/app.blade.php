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

    <link class="js-stylesheet" href="{{ url('appstack/css/light.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{url('appstack/plugins/select2/select2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="{{ url('appstack/summernote/summernote-bs4.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" type="text/css" href="{{url('appstack/plugins/tempus-dominus/tempus-dominus.min.css')}}" />

    {{-- <script src="js/settings.js"></script> --}}

    <!-- END SETTINGS -->

    
    <style>

        body {
            font-family: "Montserrat", sans-serif;
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

        <nav id="sidebar" class="sidebar">

            <div class="sidebar-content js-simplebar">

                <a class="sidebar-brand" href="{{ url('dashboard') }}">

                    @if($logo = $setting->getByKey('photo'))

                    <img src="{{ asset($setting->getByKey('photo')) }}" alt="Logo" class="img-fluid" style="    background: #fff; padding: 10px; border-radius: 15px;">

                    @else 

                    <span class="align-middle me-3 text-white">{{$setting->getByKey('name') ?? 'Dashboard'}}</span>

                    @endif

                </a>



                <ul class="sidebar-nav">

                
                    <li class="sidebar-item">

                        <a class="sidebar-link" href="{{ url('dashboard') }}">

                            <i class="align-middle" data-lucide="home"></i> <span class="align-middle">Dashboard</span>

                        </a>

                    </li>



                    @foreach (\App\Models\Menu::where('menu_parent', null)->orderBy('position', 'ASC')->get() as $menu)

                        

                            @php

                            $sub_menus = \App\Models\Menu::where('menu_parent', $menu->id)->get();

                            @endphp 

                            

                        <li class="sidebar-item">

                            @if(count($sub_menus) > 0)

                            <a class="sidebar-link" data-bs-target="#ui-{{$menu->id}}" data-bs-toggle="collapse" class="sidebar-link collapsed">

                                @if($menu->icon)

                                 <i class="align-middle" data-lucide="{{$menu->icon}}"></i>

                                @endif

                                <span class="align-middle">{{ ucfirst(($menu->name)) }}</span>

                            </a>

                            @else

                            <a class="sidebar-link" href="{!! url($menu->link) !!}">

                                @if($menu->icon)

                                <i class="align-middle" data-lucide="{{$menu->icon}}"></i> 

                                @endif

                                <span class="align-middle">{{ ucfirst(($menu->name)) }}</span>

                            </a>

                            @endif

                            

                            @if(count($sub_menus) > 0)

                                <ul id="ui-{{$menu->id}}" class="sidebar-dropdown list-unstyled collapse">

                                @foreach ($sub_menus as $sub_menu)

                                    @php

                                        $sub_sub_menus = \App\Models\Menu::where('menu_parent', $sub_menu->id)->get();

                                    @endphp 

                                    

                                    @if(count($sub_sub_menus) > 0)

                                        <li class="sidebar-item">

                                            <a data-bs-target="#multi-{{$sub_menu->id}}" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">

                                                {{ ucfirst($sub_menu->name) }}

                                            </a>

                                            

                                            <ul id="multi-{{$sub_menu->id}}" class="sidebar-dropdown list-unstyled collapse" style="">

            									<li class="sidebar-item">

            									    @foreach($sub_sub_menus as $sub_sub_menu)

            										<a class="sidebar-link" href="{{url($sub_sub_menu->link)}}">{{$sub_sub_menu->name}}</a>

            										@endforeach

            									</li>

            								</ul>

                                        </li>

                                    @else

                                        <li class="sidebar-item"><a class="sidebar-link" href="{!! url($sub_menu->link) !!}">{{ ucfirst(($sub_menu->name)) }}</a></li>

                                    @endif

                                    

                                @endforeach

                                </ul>

                            @else 

                                <ul id="ui-{{$menu->name}}" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">

                                

                                    <li class="sidebar-item"><a class="sidebar-link" href="{!! url($menu->link) !!}">Lihat {{ ucfirst(($menu->name)) }}</a></li>

                                </ul>

                            @endif

                        </li>

                       

                    @endforeach



                 





        



                 



                 

                </ul>



            </div>

        </nav>

        <div class="main">

            <nav class="navbar navbar-expand navbar-light navbar-bg">

                <a class="sidebar-toggle">

                    <i class="hamburger align-self-center"></i>

                </a>

                

                <h3 class="fw-bold text-dark mb-0">{{ $setting->getByKey('name') }}</h3>

                <div class="navbar-collapse collapse">

                    <ul class="navbar-nav navbar-align">



                        <li class="nav-item dropdown">

                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"

                                data-bs-toggle="dropdown">

                                <i class="align-middle" data-feather="settings"></i>

                            </a>



                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"

                                data-bs-toggle="dropdown">

                                @if ($photo = auth()->user()->photo)

                                    <img src="{{ asset( 'storage/' . $photo) }}" class="avatar img-fluid rounded-circle me-1"

                                        alt="{{ auth()->user()->name }}" />

                                @endif

                                <span class="text-dark">{{ auth()->user()->name }}</span>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end">

                                <a class="dropdown-item" href="{{ route('employee.edit', auth()->id()) }}"><i

                                        class="align-middle me-1" data-feather="user"></i> Profile</a>

                                <div class="dropdown-divider"></div>

                                {{-- <a class="dropdown-item" href="{{url('user.edit', auth()->id())}}">Help</a> --}}

                                <a class="dropdown-item" href="{{ route('logout') }}">Sign out</a>

                            </div>

                        </li>

                    </ul>

                </div>

            </nav>



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

                                &copy; {{ date('Y') }} - <a href="#" class="text-muted">NXT SOFTWARE</a>

                            </p>

                        </div>

                    </div>

                </div>

            </footer>

        </div>

    </div>



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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>



    <script>

        window.BASE_URL = "{{url('/')}}";

        window.API_URL = BASE_URL + '/api';

        toastr.options.timeOut  = 15;

        toastr.options.closeDuration = 150;

        window.App = {

            Helpers: {

                handleValidationErrors: (errors) => {

                    // Clear any existing Toastr notifications

                    toastr.clear();



                    // Check if the errors object is not empty

                    if (Object.keys(errors).length > 0) {

                        // Iterate through each field with an error

                        $.each(errors, function (field, messages) {

                            // Display a Toastr notification for each error

                            $.each(messages, function(index, message) {

                                toastr.error(message, field);

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



        $(document).ready(function() {

            // $('#service_note').summernote({

            //     height: 200,

            //     toolbar: [

            //         ['style', ['bold', 'italic', 'underline', 'clear']],

            //         ['font', ['strikethrough', 'superscript', 'subscript']],

            //         ['fontsize', ['fontsize']],

            //         ['color', ['color']],

            //         ['para', ['ul', 'ol', 'paragraph']],

            //         ['height', ['height']],

            //         ['table', ['table']],

            //     ],

            //     fontNames: ['Arial', 'Times New Roman', 'Verdana'],

            //     fontNamesIgnoreCheck: ['Arial', 'Times New Roman', 'Verdana'],

            //     fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36'],

            //     callbacks: {

            //         onInit: function() {

            //             var note = this;

            //             $('.note-fontsize').on('change', function(event) {

            //                 var fontSize = $(this).val();

            //                 note.editor.formatPara.fontSize(fontSize);

            //             });



            //             $('.note-color').on('click', function() {

            //                 var color = $(this).data('value');

            //                 note.editor.formatPara.foreColor(color);

            //             });

            //         },

            //         onDropdownShown: function(event) {

            //             if (event.target.className == 'dropdown-fontsize') {

            //                 $('.dropdown-color').hide();

            //             } else if (event.target.className == 'dropdown-color') {

            //                 $('.dropdown-fontsize').hide();

            //             }

            //         }

            //     }

            // });

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





            // $('input[name="date"]').daterangepicker({

            //     autoUpdateInput: false,

            //     locale: {

            //         cancelLabel: 'Clear'

            //     }

            // });



            // $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {

            //     var currentValue = $(this).val();



            //     if (currentValue === '') {

            //         $(this).val(picker.startDate.format('DD/MM/YYYY') + ' to ' + picker.endDate.format(

            //             'DD/MM/YYYY'));

            //     } else {

            //         $(this).val(picker.startDate.format('DD/MM/YYYY') + ' to ' + picker.endDate.format(

            //             'DD/MM/YYYY'));

            //     }



            //     document.getElementById('form-cari').submit();

            // });



            // $('input[name="date"]').on('cancel.daterangepicker', function(ev, picker) {

            //     $(this).val('');

            //     document.getElementById('form-cari').submit()

            // });



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


    </script>


    @yield('footer')



</body>



</html>
