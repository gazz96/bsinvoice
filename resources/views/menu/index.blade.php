@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">

        <div class="row align-items-center mb-3">
            <div class="col-md-6">
                <h1 class="h3 mb-0">MENU</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a href="{{route('menu.create')}}" class="btn btn-lg btn-primary rounded-pill">CREATE</a>
            </div>
        </div>
        

        <div class="row">
            <div class="col-12">

                @if (session('status'))
                    <div class="alert alert-{{ session('status') }} alert-dismissible" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <div class="alert-message">
                            {{ session('message') }}
                        </div>
                    </div>
                @endif

            </div>
            
            
            <div class="col-md-12">
                
                <div id="menu-wrapper">
                    @forelse($menus as $menu)
                    
                        <div class="card border mb-1" style="max-width: 400px;"  data-bs-toggle="collapse" data-bs-target="#menu-{{ $menu->id }}">
                            <div class="card-header border-bottom">
                                <div class="card-title mb-0">
                                    @if($menu->icon)
                                    <span data-feather="{{$menu->icon}}"></span>
                                    @endif 
                                    {{$menu->name}}
                                </div>
                            </div>
                            <div class="card-body collapse" id="menu-{{ $menu->id }}">
                                
                                <div class="mb-3">
                                    <label>URL</label>
                                    <input class="form-control" value="{{url($menu->link)}}" disabled/>
                                </div>
                                <a href="{{route('menu.edit', $menu)}}" class="btn btn-warning">
                                    <span class="fas fa-pencil"></span>
                                </a>
                                <form action="{{route('menu.destroy', $menu)}}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('HAPUS???')">
                                    <span class="fas fa-trash"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                            @foreach($menu->items ?? [] as $item)
                            
                            <div class="card border mb-1" style="max-width: 400px; margin-left: 3rem"  data-bs-toggle="collapse" data-bs-target="#menu-{{ $item->id }}">
                                <div class="card-header border-bottom">
                                    <div class="card-title mb-0">@if($menu->icon)
                                    <span data-feather="{{$menu->icon}}"></span>
                                    @endif  {{$item->name}}</div>
                                </div>
                                <div class="card-body collapse" id="menu-{{ $item->id }}">
                                    
                                    <div class="mb-3">
                                        <label>URL</label>
                                        <input class="form-control" value="{{url($item->link)}}" disabled/>
                                    </div>
                                    <a href="{{route('menu.edit', $item)}}" class="btn btn-warning">
                                        <span class="fas fa-pencil"></span>
                                    </a>
                                    <form action="{{route('menu.destroy', $item)}}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('HAPUS???')">
                                        <span class="fas fa-trash"></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                                @foreach($item->items as $sub_item)
                                 
                                <div class="card border mb-1" style="max-width: 400px; margin-left: 6rem;"  data-bs-toggle="collapse" data-bs-target="#menu-{{ $sub_item->id }}">
                                    <div class="card-header border-bottom">
                                        <div class="card-title mb-0">@if($menu->icon)
                                    <span data-feather="{{$menu->icon}}"></span>
                                    @endif {{$sub_item->name}}</div>
                                    </div>
                                    <div class="card-body collapse" id="menu-{{ $sub_item->id }}">
                                        
                                        <div class="mb-3">
                                            <label>URL</label>
                                            <input class="form-control" value="{{url($sub_item->link)}}" disabled/>
                                        </div>
                                        <a href="{{route('menu.edit', $sub_item)}}" class="btn btn-warning">
                                            <span class="fas fa-pencil"></span>
                                        </a>
                                        <form action="{{route('menu.destroy', $sub_item)}}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('HAPUS???')">
                                            <span class="fas fa-trash"></span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                 
                                @endforeach
                            
                            @endforeach
                    @endforeach
                </div>
                 
                 
            </div>
        </div>

    </div>

@endsection


@section('header')

<link rel="stylesheet" href="{{url('plugins/jquery-ui/jquery-ui.min.css')}}">

@endsection

@section('footer')
<script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
    $(function(){

        let menuWrapperElement = $('#menu-wrapper');
        menuWrapperElement.sortable({
            helper: 'clone',
            cancel: ''
        });

        $(document).on('change', '.main-menu', function(e){
            e.preventDefault();
            let parentName = $(this).data('parent');
            $('.parent-menu-' + parentName).prop('checked', false);
            $('.parent-menu-' + parentName).attr('checked', false);

            if($(this).is(':checked'))
            {
                $('.parent-menu-' + parentName).prop('checked', true);
            $('.parent-menu-' + parentName).attr('checked', true);
            }
            else 
            {
                $('.parent-menu-' + parentName).prop('checked', false);
            $('.parent-menu-' + parentName).attr('checked', false);
            }
        })

        $(document).on('change', '.sub-menu', function(e){
            e.preventDefault();
            let target = $(this).data('target');
            if($(this).is(':checked'))
            {
                $('.main-menu[data-parent='+target+']').prop('checked', true);
                $('.main-menu[data-parent='+target+']').attr('checked', true);
            }
            else 
            {
                $('.main-menu[data-parent='+target+']').prop('checked', false);
                $('.main-menu[data-parent='+target+']').attr('checked', false);
            }
        })
    })
</script>
@endsection