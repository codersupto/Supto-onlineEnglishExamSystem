@extends('layouts.teacher')

@section('title', 'All Exams')

@section('content')
    @if($exams->count() > 0)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-left">All Exams</h3>
                <a href="{{ route('teacher.exams.create') }}" class="btn bg-gradient-primary float-right"><i
                        class="fas fa-pen-alt mr-1"></i> Add Exam</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example"
                       class="table table-striped table-bordered dt-responsive nowrap border-0 table-hover custom-table-style"
                       style="width: 100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created Date</th>
                        <th>Grammar</th>
                        <th>Writing</th>
                        <th>Vocabulary</th>
                        <th>Exam Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exams as $index => $exam)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td title="{{ $exam->name }}">{{ Str::limit($exam->name, 30) }}</td>
                            <td title="{{ $exam->created_at->diffForHumans() }}">{{ $exam->created_at->toFormattedDateString() }}</td>
                            <td>
                                @if($exam->grammarQuestions()->count() === 100)
                                    <span class="badge badge-success">Ok</span>
                                @else
                                    <span class="badge badge-warning">Pending</span>
                                @endif
                            </td>
                            <td>
                                @if($exam->dialogs()->count() === 1 && $exam->informalEmails()->count() === 1 && $exam->formalEmails()->count() === 1)
                                    <span class="badge badge-success">Ok</span>
                                @else
                                    <span class="badge badge-warning">Pending</span>
                                @endif
                            </td>
                            <td>
                                @if($exam->synonyms()->count() === 20)
                                    <span class="badge badge-success">Ok</span>
                                @else
                                    <span class="badge badge-warning">Pending</span>
                                @endif
                            </td>
                            <td style="width: 220px !important;">
                                @if($exam->grammarQuestions()->count() === 100)
                                    @if($exam->status === 'pending' || $exam->status === 'cancel')
                                        <form action="{{ route('teacher.exams.status', $exam->id) }}" method="post"
                                              class="">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="status" value="running">
                                            <button type="submit" class="btn btn-primary btn-block btn-sm"
                                                    onclick="return confirm('Are you sure you want to start {{ $exam->name }} exam!')">
                                                Start Exam
                                            </button>
                                        </form>
                                    @elseif($exam->status === 'running')
                                        <form action="{{ route('teacher.exams.status', $exam->id) }}" method="post"
                                              class="float-right">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="status" value="cancel">
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to cancel {{ $exam->name }} exam!')">
                                                Cancel Exam
                                            </button>
                                        </form>
                                        <form action="{{ route('teacher.exams.status', $exam->id) }}" method="post"
                                              class="ml-3">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="status" value="complete">
                                            <button type="submit" class="btn btn-success btn-sm"
                                                    onclick="return confirm('Are you sure you want to start {{ $exam->name }} exam!')">
                                                Complete Exam
                                            </button>
                                        </form>
                                    @elseif($exam->status === 'complete')
                                        <strong class="text-success"><i class="fas fa-check"></i> Completed</strong>
                                    @endif
                                @else
                                    <span class="text-danger font-weight-bolder">Not Ready For Exam</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('teacher.exams.show', $exam->id) }}"
                                   class="btn btn-primary btn-sm btn-block btn-hover-effect">View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    @else
        <div class="empty-data-section">
            <h2 class="text-center text-warning mt-5 display-1 font-weight">Empty.</h2>
            <a href="{{ route('teacher.exams.create') }}" class="btn btn-lg mt-4 bg-gradient-primary"><i class="fas fa-pen-alt mr-1"></i> Add Exam</a>
        </div><!-- /.empty-data-section -->
    @endif
@endsection

@section('data-table-css')
    @include('partials.data-table-css')
@stop
@section('data-table-js')
    @include('partials.data-table-js')
@stop

