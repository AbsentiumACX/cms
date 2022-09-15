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
                                <h2>{{ __('Add the Page') }}</h2>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{ route('page.index') }}" title="Go back">
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
                    <form action="{{ route('page.update', $page) }}" method="POST" >
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>{{ __('Page title:') }}</strong>
                                    <input type="text" name="title" class="form-control" value="{{ $page->title }}" placeholder="Page Title">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                &nbsp;
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>{{ __('Page content:') }}</strong>
                                    <textarea name="content" class="form-control">{{ $page->content }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                &nbsp;
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>{{ __('Parent Page') }}</strong>
                                    <select name="parent" class="form-control" placeholder="Parent page">
                                        <option value="" {{ $page->parent == '' ? 'selected' : '' }}>No parent</option>
                                        @foreach($pages as $fromAllPage)
                                            @if ($page->id == $fromAllPage->id)

                                            @else
                                                <option value="{{ $fromAllPage->id }}" {{ $page->parent == $fromAllPage->id ? 'selected' : '' }}>{{ $fromAllPage->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                &nbsp;
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">{{ __('Update the page') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection