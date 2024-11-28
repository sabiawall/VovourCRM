@extends('backend.layouts.app')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Welcome!</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Welcome!</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-pink">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-group-2-line widget-icon"></i>
                        </div>
                        <h6 class="text-uppercase mt-0" title="Customers">Total Blogs</h6>
                        <h2 class="my-2">{{count($totalBlogs)}}</h2>
                        {{-- <p class="mb-0">
                            <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p> --}}
                    </div>
                </div>
            </div> <!-- end col-->

            <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-purple">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="ri-group-2-line widget-icon"></i>
                        </div>
                        {{-- <h6 class="text-uppercase mt-0" title="Customers">Total Categories</h6>
                        <h2 class="my-2">{{count($totalCategory)}}</h2> --}}
                        {{-- <p class="mb-0">
                            <span class="badge bg-white bg-opacity-10 me-1">18.25%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p> --}}
                    </div>
                </div>
            </div> <!-- end col-->
        </div>

        <div class="row">

            <div class="col-xl-12">
                <!-- Todo-->
                <div class="card">
                    <div class="card-body p-0">
                        <div class="p-3">
                            <div class="card-widgets">
                                <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button"
                                    aria-expanded="false" aria-controls="yearly-sales-collapse"><i
                                        class="ri-subtract-line"></i></a>
                                <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                            </div>
                            <h5 class="header-title mb-0">Latest Blogs</h5>
                        </div>

                        <div id="yearly-sales-collapse" class="collapse show">

                            <div class="table-responsive">
                                <table class="table table-nowrap table-hover mb-0">
                                    <thead class="border-top border-bottom bg-light-subtle border-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Source</th>
                                            <th>Image</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td class="">{{ $blog->id }}</td>
                                                <td>
                                                    <b>{{ $blog->title }}</b>
                                                </td>
                                                <td>{{ $blog->slug }}</td>
                                                <td>{{ $blog->source }}</td>
                                                <td><img src="{{ asset('uploads/blog/' . $blog->image) }}"
                                                    alt="" height="50px" width="50px">
                                                </td>
                                                <td> 
                                                    <a href="{{route('blog.view', $blog->id)}}" class="btn btn-primary btn-sm">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
    
    </div>
    <!-- container -->
@endsection
