@extends('layouts.teacher')

@section('title', 'Add Formal Email')


@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="h3 card-title">Add Formal Email</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('teachers.questions.formal-email.store') }}" method="post" id="writingPartForm">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12 col-md-2">
                                <label for="exam">Exam</label>
                            </div><!-- /.col-12 col-md-2 -->
                            <div class="col-12 col-md-10">
                                <select name="exam" id="exam" class="form-control @error('exam') is-invalid @enderror">
                                    <option disabled selected>Select exam</option>
                                    @foreach($authTeacher->exams as $exam)
                                        <option
                                            {{ old('exam') == $exam->id || decrypt(request()->get('exam')) === $exam->id ? 'selected' : '' }} value="{{ $exam->id }}">{{ $exam->name }}</option>
                                    @endforeach
                                </select>
                                @error('exam')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div><!-- /.col-12 col-md-10 -->
                        </div><!-- /.form-group row -->

                        <div class="form-group row">
                            <div class="col-12 col-md-2">
                                <label for="questionSet">Question Set</label>
                            </div><!-- /.col-12 col-md-2 -->
                            <div class="col-12 col-md-10">
                                <select name="questionSet" id="questionSet"
                                        class="form-control @error('questionSet') is-invalid @enderror">
                                    <option disabled selected>Select Set</option>
                                    @foreach($questionSets as $questionSet)
                                        <option
                                            {{ old('questionSet') == $questionSet->id ? 'selected' : '' }} value="{{ $questionSet->id }}">{{ $questionSet->name }}</option>
                                    @endforeach
                                </select>
                                @error('questionSet')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div><!-- /.col-12 col-md-10 -->
                        </div><!-- /.form-group row -->

                        <div class="form-group row">
                            <div class="col-12 col-md-2">
                                <label for="topic">Topic</label>
                            </div><!-- /.col-12 col-md-2 -->
                            <div class="col-12 col-md-10">
                                <input type="text" name="topic" id="topic"
                                       class="form-control @error('topic') is-invalid @enderror" value="{{ old('topic') }}"
                                       required>
                                @error('topic')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div><!-- /.col-12 col-md-10 -->
                        </div><!-- /.form-group -->

                        <div class="form-group row">
                            <div class="col-12 col-md-2">
                                <label for="topic">Received E-mail</label>
                            </div><!-- /.col-12 col-md-2 -->
                            <div class="col-12 col-md-10">
                        <textarea type="text" rows="7" name="received_email" id="received_email"
                                  class="form-control @error('received_email') is-invalid @enderror"
                                  required>
                            {{ old('received_email') }}
                        </textarea>
                                @error('received_email')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div><!-- /.col-12 col-md-10 -->
                        </div><!-- /.form-group -->

                        <div class="form-group row">
                            <div class="col-12 col-md-2">
                            </div><!-- /.col-12 col-md-2 -->
                            <div class="col-12 col-md-10">
                                <div class="row">
                                    <div class="col col-md-6">
                                        <button type="submit" class="btn bg-gradient-primary btn-block"><i class="fas fa-check"></i> Add
                                            Formal Email
                                        </button>
                                    </div><!-- /.col col-md-6 -->
                                </div><!-- /.row -->
                            </div><!-- /.col-12 col-md-10 -->
                        </div><!-- /.form-group -->

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.col-12 col-md-8 -->
    </div><!-- /.row -->
@endsection