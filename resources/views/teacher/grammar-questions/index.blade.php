@extends('layouts.teacher')

@section('title', 'All Grammar Questions')

@section('content')
    @if($grammarQuestions->count() > 0)

        @foreach($authTeacherExams as $authTeacherExam)
            <div class="card">
                <div class="card-header ">
                    <h3 class="card-title"><span class="text-uppercase">{{ $authTeacherExam->name }}</span> (<span class="font-weight-bold">Grammar</span>)</h3>
                </div>
                <div class="card-body">
                    <div class="p-3 shadow-sm mb-5 count-section bg-white rounded border-top border-primary">
                        <div class="row">
                            @php
                                $countGrammarQuestionSetA = 0;
                                $countGrammarQuestionSetB = 0;
                                $countGrammarQuestionSetC = 0;
                                $countGrammarQuestionSetD = 0;
                            @endphp
                            @foreach($authTeacherExam->grammarQuestions as $authTeacherExamGrammarQuestion)
                                @if($authTeacherExamGrammarQuestion->set->id === 1)
                                    @php $countGrammarQuestionSetA++ @endphp
                                @elseif($authTeacherExamGrammarQuestion->set->id === 2)
                                    @php $countGrammarQuestionSetB++ @endphp
                                @elseif($authTeacherExamGrammarQuestion->set->id === 3)
                                    @php $countGrammarQuestionSetC++ @endphp
                                @elseif($authTeacherExamGrammarQuestion->set->id === 4)
                                    @php $countGrammarQuestionSetD++ @endphp
                                @endif
                            @endforeach

                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="info-box bg-white border-primary border">
                                    <span class="info-box-icon text-primary" style="font-weight: 900">A</span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Set: <strong>A</strong></span>
                                        <span class="info-box-number">{{ $countGrammarQuestionSetA }} questions</span>

                                        <div class="progress">
                                            <div class="progress-bar"
                                                 style="width: {{ ($countGrammarQuestionSetA*100)/25 }}%"></div>
                                        </div>
                                        <span class="progress-description">
                            {{ $countGrammarQuestionSetA }} questions of 25 questions
                            </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div><!-- /.col -->

                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="info-box bg-white border-primary border">
                                    <span class="info-box-icon text-primary" style="font-weight: 900">B</span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Set: <strong>B</strong></span>
                                        <span class="info-box-number">{{ $countGrammarQuestionSetB }} questions</span>

                                        <div class="progress">
                                            <div class="progress-bar"
                                                 style="width: {{ ($countGrammarQuestionSetB*100)/25 }}%"></div>
                                        </div>
                                        <span class="progress-description">
                            {{ $countGrammarQuestionSetB }} questions of 25 questions
                            </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div><!-- /.col -->

                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="info-box bg-white border-primary border">
                                    <span class="info-box-icon text-primary" style="font-weight: 900">C</span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Set: <strong>C</strong></span>
                                        <span class="info-box-number">{{ $countGrammarQuestionSetC }} questions</span>

                                        <div class="progress">
                                            <div class="progress-bar"
                                                 style="width: {{ ($countGrammarQuestionSetC*100)/25 }}%"></div>
                                        </div>
                                        <span class="progress-description">
                            {{ $countGrammarQuestionSetC }} questions of 25 questions
                            </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div><!-- /.col -->

                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="info-box bg-white border-primary border">
                                    <span class="info-box-icon text-primary" style="font-weight: 900">D</span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Set: <strong>D</strong></span>
                                        <span class="info-box-number">{{ $countGrammarQuestionSetD }} questions</span>

                                        <div class="progress">
                                            <div class="progress-bar"
                                                 style="width: {{ ($countGrammarQuestionSetD*100)/25 }}%"></div>
                                        </div>
                                        <span class="progress-description">
                            {{ $countGrammarQuestionSetD }} questions of 25 questions
                            </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.p-4 shadow -->
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        @endforeach

        <div class="card">
            <div class="card-header ">
                <h3 class="card-title float-left">All Grammar Questions</h3>
                <a href="{{ route('teachers.grammar-questions.create') }}" class="btn bg-gradient-primary float-right">Add
                    Grammar Questions</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example"
                       class="table table-striped table-bordered dt-responsive nowrap border-0 table-hover custom-table-style"
                       style="width: 100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Set</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Exam Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($grammarQuestions as $index => $grammarQuestion)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td title="{{ $grammarQuestion->set->name }}"
                                class="text-bold">{{ $grammarQuestion->set->name }}</td>
                            <td title="{{ $grammarQuestion->question }}">{{ Str::limit($grammarQuestion->question, 50) }}</td>
                            <td title="{{ $grammarQuestion->answer }}">{{ $grammarQuestion->answer }}</td>
                            <td title="{{ $grammarQuestion->exam->name }}">{{ $grammarQuestion->exam->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('teachers.grammar-questions.show', $grammarQuestion->id) }}"
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
            <a href="{{ route('teacher.exams.index') }}" class="btn btn-lg mt-4 bg-gradient-primary">View Exam</a>
        </div><!-- /.empty-data-section -->
    @endif
@endsection

@section('data-table-css')
    @include('partials.data-table-css')
@stop
@section('data-table-js')
    @include('partials.data-table-js')
@stop

