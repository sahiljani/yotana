@include('element.head')
{{-- data-sidebar-size="small" --}}

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('element.sidebar')


        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Compact Sidebar</h4>
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

</body>

</html>
