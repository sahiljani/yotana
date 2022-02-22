<meta name="csrf-token" content="{{ csrf_token() }}" />
@include('element.head')

@section('mytitle', 'Page Title')

<link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/assets/libs/twitter-bootstrap-wizard/prettify.css') }}" rel="stylesheet">
<style>
    input[type="radio"] {
        margin-right: 8px;
    }

    label.form-label {
        display: block;
    }

</style>

<body data-sidebar="dark">

    <div id="layout-wrapper">
        @include('element.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.addfilter') }}">
                                @csrf
                                <label>Title</label>
                                <input class="form-control mb-3" type="text" name="name">
                                <label>Image</label>
                                <input class="form-control mb-3" type="file" name="img" accept="image/*">
                                <label>Product</label>
                                <select name="type" class="form-control mb-3">
                                    <option value="1"> Filter Presses</option>
                                    <option value="2"> Filter Plates</option>
                                </select>
                                <input type="submit" class="btn btn-success">
                            </form>
                        </div>

                    </div>
                    <div class="row">
                        <div class="">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($filters as $filter)
                                        <tr>
                                            <td>{{ $filter->name }}</td>
                                            <td> <img src="{{ URL::asset('/assets/images/' . $filter->img) }}"
                                                    alt="{{ $filter->name }}" height="200" width="200"></td>
                                            <td>{{ $filter->type == 1 ? ' Filter Presses' : ' Filter Plates' }}</td>
                                            <td>edit</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @include('element.footer')
                    </div>
                </div>
            </div>
        </div>
        <div class="rightbar-overlay"></div>
        @include('element.script')
        <script src="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>




</body>

</html>
