<meta name="csrf-token" content="{{ csrf_token() }}" />
@include('element.head')

@section('mytitle', 'Page Title')

<link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

<body data-sidebar="dark">

    <div id="layout-wrapper">
        @include('element.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mx-auto">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <table id="listlead" class="table  table-border-black table-hover mb-0">

                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Notes</th>
                                        <th>Reset password</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr data-id="{{ $user->id }}">

                                            <td data-field="name">{{ $user->name }}</td>
                                            <td data-field="email">{{ $user->email }}</td>
                                            <td data-field="notes" class="notes">{{ $user->notes }}</td>



                                            <td>

                                                <a href="javascript:void(0);"
                                                    class="btn btn-outline-secondary btn-sm  text-warning"
                                                    {{-- onclick="updatedata({{$admin ->id}})" --}} onclick="updatepass({{ $user->id }})"
                                                    data-bs-toggle="tooltip" data-placement="top" title=""
                                                    data-bs-original-title="Delete" aria-label="Delete">
                                                    <i class="mdi mdi-key font-size-18"></i>
                                                </a>
                                            </td>
                                            <td class="">
                                                <a href="{{ route('admin.getupdatelead', $user->id) }}"
                                                    class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include('element.footer')
            </div>
        </div>
    </div>
    </div>
    <div class="rightbar-overlay"></div>
    @include('element.script')
    <script src="{{ URL::asset('assets/libs/table-edits/build/table-edits.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#listlead').DataTable();
        });
    </script>

    {{-- <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var pickers = {};

            $('table tr').editable({
                dropdowns: {

                },
                edit: function(values) {
                    $(".edit i", this)
                        .removeClass('mdi-pencil')
                        .addClass('mdi-content-save-all')
                        .attr('title', 'Save');
                },

                save: function(values) {
                    var id = $(this).data('id');
                    values.id = id;

                    $.ajax({

                        type: 'POST',
                        dataType: 'json',
                        url: "{{ route('admin.updateleads') }}",

                        data: {
                            values: values
                        },

                        success: function(data) {

                            console.log(data.success);

                        }

                    });

                    $(".edit i", this)
                        .removeClass('mdi-content-save-all')
                        .addClass('mdi-pencil')
                        .attr('title', 'Edit');

                    if (this in pickers) {
                        pickers[this].destroy();
                        delete pickers[this];
                    }




                },
                cancel: function(values) {
                    $(".edit i", this)
                        .removeClass('mdi-content-save-all')
                        .addClass('mdi-pencil')
                        .attr('title', 'Edit');

                    if (this in pickers) {
                        pickers[this].destroy();
                        delete pickers[this];
                    }
                }
            });
        });










        function deletedata(id) {

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#1cbb8c",
                cancelButtonColor: "#ff3d60",
                confirmButtonText: "Yes, delete it!"
            }).then(function(t) {

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: "{{ route('admin.failedLead') }}",

                    data: {
                        id: id
                    },

                    success: function(data) {
                        if (data.success) {
                            location.reload();

                        }




                    }

                });
                t.value && Swal.fire("Deleted!", "Your file has been deleted.", "success")
            })
        }


        function updatepass(id) {

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#1cbb8c",
                cancelButtonColor: "#ff3d60",
                inputPlaceholder: "Enter New Password",
                confirmButtonText: "Yes, set new password!",
                input: 'password'
            }).then(function(t) {

                var password = document.querySelector('.swal2-content input').value;

                if (password === null) return false;

                if (password === "") {
                    return swal.fire("Please enter password!");
                }
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: "{{ route('admin.updateLeadPassword') }}",

                    data: {
                        id: id,
                        password: password
                    },

                    success: function(data) {

                        console.log(data.success);

                    }

                });
                t.value && Swal.fire("Deleted!", "Your file has been deleted.", "success")
            })
        }
    </script> --}}
</body>

</html>
