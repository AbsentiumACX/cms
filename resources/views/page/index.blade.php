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
                                <h2>{{ __('Pages') }}</h2>
                            </div>
                            <div>
                                <a class="btn btn-success" href="{{ route('page.create') }}" title="Create a page">
                                    {{ __('Create a new page') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-striped" width="100%">
                        <tr>
                            <th scope="col">{{ __('Page Id') }}</th>
                            <th scope="col">{{ __('Page Title') }}</th>
                            <th scope="col">{{ __('Parent') }}</th>
                            <th class="text-end" scope="col"></th>
                        </tr>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->title }}</td>
                                <td>
                                    {{ $page->parent }}
                                </td>
                                <td class="text-end">
                                    <form action="{{ route('page.destroy', $page->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-primary" href="{{ route('page.edit', $page->id) }}" title="Create a page">
                                            {{ __('Edit page') }}
                                        </a>
                                        <button type="submit" title="delete" class="btn btn-danger">
                                            {{ __('Delete the page') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection