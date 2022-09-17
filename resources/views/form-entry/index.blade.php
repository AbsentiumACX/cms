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
                                <h2>{{ __('Contactform Submissions') }}</h2>
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
                            <th scope="col">{{ __('Entry Id') }}</th>
                            <th scope="col">{{ __('Sender') }}</th>
                            <th scope="col">{{ __('Subject') }}</th>
                            <th class="text-end" scope="col"></th>
                        </tr>
                        @foreach($entries as $entry)
                            <tr>
                                <td>{{ $entry->id }}</td>
                                <td>{{ $entry->sendername }}</td>
                                <td>{{ $entry->subject }}</td>
                                <td class="text-end">
                                    <form action="{{ route('form-entry.destroy', $entry->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('form-entry.show', $entry->id) }}" class="btn btn-primary">{{ __('Show details') }}</a>
                                        <button type="submit" title="delete" class="btn btn-danger">
                                            {{ __('Delete the entry') }}
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