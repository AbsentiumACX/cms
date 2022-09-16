@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb d-flex justify-content-between align-items-center">
                            <div>
                                <h2>{{ __('Add New Skill') }}</h2>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{ route('skill.index') }}" title="Go back">
                                    {{ __('Back to overview') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('skill.store') }}" method="POST" >
                        @csrf

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>{{ __('Skill name:') }}</strong>
                                    <input type="text" name="skill" class="form-control" placeholder="Skill name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                &nbsp;
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>{{ __('Years of experience:') }}</strong>
                                    <input type="number" name="years" class="form-control" placeholder="Years of experience" min="1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                &nbsp;
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">{{ __('Add a skill') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection