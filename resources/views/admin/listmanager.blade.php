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
                            <table class="table  table-border-black table-hover mb-0">

                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Reset password</th>
                                        <th>Action</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $key => $admin)
                                        <tr data-id="{{ $admin->id }}">

                                            <td data-field="name">{{ $admin->name }}</td>
                                            <td data-field="email">{{ $admin->email }}</td>

                                            <td>

                                                <a href="javascript:void(0);"
                                                    class="btn btn-outline-secondary btn-sm  text-warning"
                                                    {{-- onclick="updatedata({{$admin ->id}})" --}} onclick="updatepass({{ $admin->id }})"
                                                    data-bs-toggle="tooltip" data-placement="top" title=""
                                                    data-bs-original-title="Delete" aria-label="Delete">
                                                    <i class="mdi mdi-key font-size-18"></i>
                                                </a>
                                            </td>
                                            <td class=""><a class="btn btn-outline-secondary btn-sm edit"
                                                    title="Edit">
                                                    <i class="mdi mdi-pencil font-size-18"></i>
                                                </a></td>
                                            <td class="">
                                                <a href="javascript:void(0);"
                                                    class="btn btn-outline-secondary btn-sm  text-danger"
                                                    onclick="deletedata({{ $admin->id }})" data-bs-toggle="tooltip"
                                                    data-placement="top" title="" data-bs-original-title="Delete"
                                                    aria-label="Delete">
                                                    <i class="mdi mdi-trash-can font-size-18"></i>
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

    <script>
        // $(function() {
        //     $.ajaxSetup({

        // headers: {

        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        // }

        // });

        //    var prevname = document.querySelector('[data-field="name"]').textContent;
        //    var prevemail = document.querySelector('[data-field="email"]').textContent;

        //       var pickers = {};

        //       $('table tr').editable({
        //         dropdowns: {
        //             // sex: ['Male', 'Female']
        //         },
        //         edit: function(values) {
        //           $(".edit i", this)
        //             .removeClass('mdi-pencil')
        //             .addClass('mdi-content-save-all')
        //             .attr('title', 'Save');

        //         //   pickers[this] = new Pikaday({
        //         //     field: $("td[data-field=birthday] input", this)[0],
        //         //     format: 'MMM D, YYYY'
        //         //   });
        //         },



        //         save: function(values) {
        //             var id = $(this).data('id');
        //             console.log( id, values);
        //           $(".edit i", this)
        //             .removeClass('mdi-content-save-all')
        //             .addClass('mdi-pencil')
        //             .attr('title', 'Edit');

        //           if (this in pickers) {
        //             pickers[this].destroy();
        //             delete pickers[this];
        //           }

        //    var currentname = document.querySelector('[data-field="name"]').textContent;
        //    var currentemail = document.querySelector('[data-field="email"]').textContent;
        //    if(currentname==""){
        //     document.querySelector('[data-field="name"]').textContent = prevname;
        //    }
        //    if(currentemail==""){
        //     document.querySelector('[data-field="email"]').textContent = prevemail;
        //    }
        //    var finalname = document.querySelector('[data-field="name"]').textContent;
        //    var finalemail = document.querySelector('[data-field="email"]').textContent;
        //    var finalid = document.querySelector('[data-field="id"]').textContent;



        //             $.ajax({

        //                 type:'POST',
        //                 dataType: 'json',
        //                 url:"{{ route('admin.updateManager') }}",

        //                 data:{name:finalname, email:finalemail},

        //                 success:function(data){

        //                 console.log(data.success);

        //             }

        //             });



        //         },
        //         cancel: function(values) {
        //           $(".edit i", this)
        //             .removeClass('mdi-content-save-all')
        //             .addClass('mdi-pencil')
        //             .attr('title', 'Edit');

        //           if (this in pickers) {
        //             pickers[this].destroy();
        //             delete pickers[this];
        //           }
        //         }
        //       });
        //     });


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
                        url: "{{ route('admin.updateManager') }}",

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
                    url: "{{ route('admin.deleteData') }}",

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
                    url: "{{ route('admin.updatePassword') }}",

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
    </script>
</body>

</html>
