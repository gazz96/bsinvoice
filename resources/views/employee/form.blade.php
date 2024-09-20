@extends('layouts.dashboard')



@section('content')

    <div class="container-fluid p-0">



        <h1 class="h3 mb-3">FORM PEGAWAI</h1>



        <form action="{{ route('employee.update', $user->id) }}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')

            <div class="row">

                <div class="col-12 col-md-6">

                    <div class="card">

                        <div class="card-body">

                            <div class="mb-3">

                                <label for="i-name">NAMA LENGKAP</label>

                                <input type="text" name="full_name" id="i-full_name" class="form-control"

                                    value="{{ old('full_name', $user->full_name) }}">

                                @error('full_name')

                                    <span class="invalid-feedback d-block">{{ $message }}</span>

                                @enderror

                            </div>

                            <div class="mb-3">

                                <label for="i-name">USERNAME</label>

                                <input type="text" name="name" id="i-name" class="form-control"

                                    value="{{ old('name', $user->name) }}">

                                @error('name')

                                    <span class="invalid-feedback d-block">{{ $message }}</span>

                                @enderror

                            </div>



                            <div class="mb-3">

                                <label for="i-email">EMAIL</label>

                                <input type="email" name="email" id="i-email" class="form-control" value="{{ old('email', $user->email) }}">

                                @error('email')

                                    <span class="invalid-feedback d-block">{{ $message }}</span>

                                @enderror

                            </div>



                            <div class="mb-3">

                                <label for="i-password">PASSWORD</label>

                                <input type="password" name="password" id="i-password" class="form-control" value="">

                                @error('password')

                                    <span class="invalid-feedback d-block">{{ $message }}</span>

                                @enderror

                            </div>



                            <div class="mb-3">

                                <label for="i-role_id">HAK AKSES</label>

                                <select name="role_id" id="i-role_id" class="form-control">

                                    <option value="">Pilih hak akses</option>

                                    @foreach ($roles as $role)

                                        <option value="{{ $role->name }}" {{$user->roles->contains('name', $role->name) ? 'selected' : ''}}>{{ $role->name }}</option>

                                    @endforeach

                                </select>

                                @error('role_id')

                                    <span class="invalid-feedback d-block">{{ $message }}</span>

                                @enderror

                            </div>


                            <div class="mb-3">

                                <label for="i-photo">PHOTO</label>

                                <input type="file" name="photo" id="i-photo" class="form-control">



                                @if ($user->photo)

                                    <img src="{{ asset( 'storage/' . $user->photo) }}" class="img-fluid mt-3 rounded-3" />

                                @endif





                                @error('photo')

                                    <span class="invalid-feedback d-block">{{ $message }}</span>

                                @enderror

                            </div>



                            



                        </div>



                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{route('employee.index')}}" class="btn btn-lg btn-outline-secondary me-2 rounded-pill">KEMBALI</a>
                        <button class="btn btn-lg btn-dark rounded-pill">SIMPAN</button>
                    </div>

                </div>

            </div>



        </form>

    </div>

@endsection



@section('footer')

    <script>

        $('#i-warehouse_access_ids').select2({

            width: '100%',

            multiple: true

        })

    </script>

    {{-- <script>

        const addBank = async (data) => {

            return await $.ajax({

                method: 'POST',

                url: "{{ url('dashboard/supplier/' . $user->id . '/add-bank') }}",

                data: data

            })

        };



        const deleteBank = async (data) => {

            return await $.ajax({

                method: 'POST',

                url: "{{ url('dashboard/supplier/' . $user->id . '/delete-bank') }}",

                data: data

            })

        };



        const clearForm = () => {

            $('#i-payment_method_id').val('');

            $('#i-bank_name').val('')

            $('#i-bank_number').val('')

            $('#i-bank_owner').val('')

        };



        $('#btn-add-bank-details').click(async function(e) {

            e.preventDefault();

            try {

                let data = {

                    '_token': '{{ csrf_token() }}',

                    payment_method_id: $('#i-payment_method_id option:selected').val(),

                    bank_name: $('#i-bank_name').val(),

                    bank_number: $('#i-bank_number').val(),

                    bank_owner: $('#i-bank_owner').val()

                }

                let response = await addBank(data);

                $('#table-bank-details').find('tbody').html(response);

                clearForm();

            } catch (errors) {

                alert('Bank detail required');

            } finally {



            }



        });



        $(document).on('click', '.btn-delete-bank-detail', async function(e) {

            e.preventDefault();

            try {

                let data = {

                    '_token': '{{ csrf_token() }}',

                    id: $(this).data('id')

                }

                let response = await deleteBank(data);

                $(this).parent().parent().remove();

            } catch (errors) {

                alert('Something wrong');

            } finally {



            }

        })

    </script> --}}

@endsection
