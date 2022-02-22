<meta name="csrf-token" content="{{ csrf_token() }}" />
@include('element.head')

@section('mytitle', 'Page Title')
<style>
    #listlead td,
    #listlead th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #listlead tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #listlead tr:hover {
        background-color: transparent !important;
    }

    .table-hover>tbody>tr:hover {
        --bs-table-accent-bg: transparent !important;
    }

    #listlead td,
    #listlead th {

        border: 0px solid #ddd;
    }

    #listlead th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }

    .sorting:after {
        display: none !important;
    }

    .sorting:before {
        display: none !important;
    }

</style>
<link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">

<link href="{{ URL::asset('/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet">



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
                                        <th>Lead counter</th>
                                        <th> Contact</th>

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
                                                <div style="">
                                                    <div style="display: flex; justify-content: center;">
                                                        <p id="count{{ $user->id }}"
                                                            style="padding: 0.25rem 0.5rem; font-size: .7875rem; border-radius: 0.2rem; border: 2px solid">
                                                            {{ $user->counter }}</p>
                                                    </div>
                                                    <div class="connectBtns"
                                                        style="display: flex; justify-content: space-around;">
                                                        <div id="minusBtn{{ $user->id }}"
                                                            onclick="minus({{ $user->id }})">
                                                            <svg style="width: 20px;" xmlns="http://www.w3.org/2000/svg"
                                                                class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                        </div>
                                                        <div id="plusBtn{{ $user->id }}"
                                                            onclick="plus({{ $user->id }})">
                                                            <svg style="width: 20px;" xmlns="http://www.w3.org/2000/svg"
                                                                class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M12 4v16m8-8H4" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.moveleads', ['id' => $user->id]) }}">
                                                    <button class="btn btn-success"
                                                        style="display:flex;align-content: center; align-items: center;">
                                                        <svg style="margin-right:3px;width:15px;"
                                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                                        </svg>
                                                        Move</button>
                                                </a>
                                            </td>
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
    <script src="{{ URL::asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/toastr.init.js') }}"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>



    <script>
        $(document).ready(function() {
            $('#listlead').DataTable();
        });


        function plus(i) {

            let counter = document.getElementById('count' + i);
            let count = parseInt(document.getElementById('count' + i).innerText);
            count += 1;
            counter.innerHTML = count;
            counterInsert(i, count);
        }

        function minus(i) {

            let counter = document.getElementById('count' + i);
            let count = (document.getElementById('count' + i).innerText);
            count -= 1;
            if (count != 0) {
                counter.innerHTML = count;
                counterInsert(i, count);
            }

        }


        function counterInsert(id, counter) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                dataType: 'json',
                url: "{{ route('admin.addCounter') }}",

                data: {
                    id: id,
                    counter: counter,
                },

                success: function(data) {

                    Command: toastr["success"]("Counter Updated", "Lead List Updated")


                }

            });
        }
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 200,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

</body>

</html>
