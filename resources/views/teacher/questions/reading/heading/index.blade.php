@extends('layouts.teacher')

@section('title', 'All Heading Questions')

@section('content')
    @if($authTeacher->exams()->count() > 0)
        @foreach($authTeacher->exams()->orderByDesc('id')->get() as $exam)
            @if($exam->headings()->count() > 0)
                <div class="card mb-5 index-card">
                    <div
                        class="card-header">
                        <h3 class="card-title float-left index-card-title {{ $exam->headings()->count() === 20 && $exam->headingOptions()->count() === 40 ? 'text-success' : 'text-warning' }}"
                            title="{{ $exam->name }}"><span
                                class="">{{ Str::limit($exam->name, 30) }}</span>
                            <span class="font-weight-bolder">Heading Matching</span>
                            @if($exam->headings()->count() === 20 && $exam->headingOptions()->count() === 40)
                                <span class="text-success ml-2" title="Ready For Exam">
                                    <i class="fas fa-check-circle"></i>
                                </span>
                            @endif
                        </h3>

                        @if($exam->headings()->count() !== 20)
                            <a href="{{ route('teachers.questions.headings.create') }}?exam={{ encrypt($exam->id) }}"
                               class="btn bg-gradient-primary float-right btn-hover-effect">
                                <i class="fas fa-pen-alt mr-1"></i>
                                Add Heading</a>
                        @endif
                    </div><!-- /.card-header -->
                    @if($exam->headings()->count() === 20 && $exam->headingOptions()->count() === 40)
                        <div class="progress" style="height: 7px">
                            <div class="progress-bar bg-success progress-bar-animated"
                                 role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    @else
                        <div class="progress" style="height: 7px">
                            <div class="progress-bar bg-warning"
                                 role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="row">
                            @foreach($exam->sets as $set)
                                <?php
                                    $headingCountBySet = $exam->headings()->where('set_id', $set->id)->get()->count();
                                    $headingOptionsCountBySet = $exam->headingOptions()->where('set_id', $set->id)->get()->count();
                                ?>
                                <div class="col-12 col-md-6 col-lg-3 count-section">
                                    <div class="info-box bg-white border {{ $headingCountBySet === 5 && $headingOptionsCountBySet === 10? ' border-success': ' border-warning' }}">
                                    <span class="info-box-icon text-white {{ $headingCountBySet === 5 && $headingOptionsCountBySet === 10? 'bg-success': 'bg-warning' }}"
                                          style="font-weight: 900">{{ $set->name }}</span>
                                        <div class="info-box-content">
                                            <span class="info-box-number font-weight-normal">{{ $headingCountBySet }} / 5 Heading.</span>

                                            <div class="progress">
                                                <div class="progress-bar {{ $headingCountBySet === 5 ? 'bg-success': 'bg-warning' }}"
                                                     style="width: {{ ($headingCountBySet*100)/5 }}%"></div>
                                            </div>
                                            <div class="progress-description">
                                                @if($headingCountBySet === 5)
                                                    @if($exam->headingOptions()->where('set_id', $set->id)->get()->count() === 10)
                                                        <a href="{{ route('teachers.questions.headings.options.index') }}?exam={{ encrypt($exam->id) }}&set={{ encrypt($set->id) }}"
                                                           class="btn-link text-success"><i class="fas fa-check-circle mr-1"></i> View extra heading</a>
                                                    @else
                                                        <a href="{{ route('teachers.questions.headings.options.create') }}?exam={{ encrypt($exam->id) }}&set={{ encrypt($set->id) }}"
                                                           class="btn-link text-muted"><i class="fas fa-pen mr-1"></i> Add extra heading</a>
                                                    @endif
                                                @else
                                                    <a href="{{ route('teachers.questions.headings.create') }}?exam={{ encrypt($exam->id) }}&set={{ encrypt($set->id) }}"
                                                       class="btn-link"><i class="fas fa-pen-alt mr-1"></i> Add Heading</a>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                </div><!-- /.col -->
                            @endforeach

                            <div class="col-12">
                                <table
                                    id=""
                                    class="example table table-striped table-bordered dt-responsive nowrap border-0 table-hover custom-table-style"
                                    style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Paragraph</th>
                                        <th>Heading</th>
                                        <th>Set</th>
                                        <th>Exam</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($exam->headings()->orderByDesc('id')->get() as $index => $heading)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td title="{{ $heading->paragraph }}">{{ Str::limit($heading->paragraph, 50) }}</td>
                                            <td title="{{ $heading->answer->headings }}">{{ Str::limit($heading->answer->headings, 30) }}</td>
                                            <td>{{ $heading->set->name }}</td>
                                            <td title="{{ $heading->exam->name }}">{{ Str::limit($heading->exam->name, 40) }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('teachers.questions.headings.show', $heading->id) }}?exam={{ encrypt($heading->exam->id) }}&set={{ encrypt($heading->set->id) }}"
                                                   class="btn btn-primary btn-sm btn-block btn-hover-effect"><i
                                                        class="fas fa-eye mr-1"></i> View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /.col-12 -->
                        </div><!-- /.row -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            @else

                <div class="row">
                    <div class="col col-md-8 offset-md-2">
                        <div class="text-center pt-5 pb-5 shadow-sm mb-5 bg-white rounded empty-data-section shadow">
                            <h1 class="h1" title="{{ $exam->name }}">{{ Str::limit($exam->name, 30) }}</h1>
                            <h2 class="text-center text-warning display-4">Empty.</h2>
                            <a href="{{ route('teachers.questions.headings.create') }}?exam={{ encrypt($exam->id) }}"
                               class="btn btn-lg mt-4 bg-gradient-primary"><i
                                    class="fas fa-pen-alt"></i> Add Heading</a>
                        </div><!-- /.empty-data-section -->
                    </div><!-- /.col col-md-8 offset-md-2 -->
                </div><!-- /.row -->


            @endif
        @endforeach
    @else

        <div class="row">
            <div class="col col-md-8 offset-md-2">
                <div class="empty-data-section add-exam-mini-section">
                    <h1 class="h1">You need to add Exam first.</h1>
                    <a href="{{ route('teacher.exams.create') }}" class="btn btn-lg mt-4 bg-gradient-primary"><i
                            class="fas fa-pen-alt"></i> Add Exam</a>
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

