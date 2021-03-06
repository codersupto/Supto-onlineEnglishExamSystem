@extends('layouts.admin')

@section('title', 'Show All Teachers')

@section('content')
    @if($teachers->count() > 0)
        <div class="card index-card">
            <div class="card-header">
                <h3 class="card-title index-card-title float-left">Teachers</h3>
                <a class="btn btn-primary btn-lg float-right" href="{{ route('admin.teachers.create') }}"><i class="fas fa-pen mr-1"></i> Add Teacher</a>
            </div>
            <!-- /.card-header -->
            <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100"
                     aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="card-body">
                <table id=""
                       class="example table table-striped table-bordered dt-responsive nowrap border-0 table-hover custom-table-style"
                       style="width: 100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $index => $teacher)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td title="{{ $teacher->name }}">{{ $teacher->name }}</td>
                            <td title="{{ $teacher->email }}">{{ $teacher->email }}</td>
                            <td title="{{ $teacher->location->name }}">{{ $teacher->location->name }}</td>
                            <td>
                                <a href="{{ route('admin.teachers.show', $teacher->id) }}"
                                   class="btn btn-primary btn-block btn-hover-effect"><i class="fas fa-eye mr-1"></i>  View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    @else
        <div class="row">
            <div class="col col-md-8 offset-md-2">
                <div class="text-center pt-5 pb-5 mb-5 rounded empty-data-section">
                    <h2 class="text-center text-warning display-4">Empty.</h2>
                    <a href="{{ route('admin.teachers.create') }}" class="btn btn-lg mt-4 bg-gradient-primary"><i
                            class="fas fa-pen-alt mr-1"></i> Add teacher</a>
                </div><!-- /.empty-data-section -->
            </div><!-- /.col col-md-8 offset-md-2 -->
        </div><!-- /.row -->
    @endif
@endsection

@section('data-table-css')
    @include('partials.data-table-css')
@stop

@section('data-table-js')
    @include('partials.data-table-js')
@stop
