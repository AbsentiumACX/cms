@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb d-flex justify-content-between align-items-center">
                            <div class="pull-left">
                                <h2>{{ __('Show entry') }}</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('form-entry.index') }}">{{ __('Return to overview') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Sender name:') }}</strong>
                                {{ $entry->sendername }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Sender email:') }}</strong>
                                {{ $entry->senderemail }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Subject:') }}</strong>
                                {{ $entry->subject }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Message:') }}</strong>
                                {{ $entry->content }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection