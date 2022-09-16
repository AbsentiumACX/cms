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
                                <h2>{{ __('Skills') }}</h2>
                            </div>
                            <div>
                                <a class="btn btn-success" href="{{ route('skill.create') }}" title="Add a skill">
                                    {{ __('Add a new skill') }}
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
                            <th scope="col">{{ __('Skill Id') }}</th>
                            <th scope="col">{{ __('Skill') }}</th>
                            <th scope="col">{{ __('Years of experience') }}</th>
                            <th class="text-end" scope="col"></th>
                        </tr>
                        @foreach($skills as $skill)
                            <tr>
                                <td>{{ $skill->id }}</td>
                                <td>{{ $skill->skill }}</td>
                                <td>
                                    {{ $skill->years }}
                                </td>
                                <td class="text-end">
                                    <form action="{{ route('skill.destroy', $skill->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-primary" href="{{ route('skill.edit', $skill->id) }}" title="Create a skill">
                                            {{ __('Edit skill') }}
                                        </a>
                                        <button type="submit" title="delete" class="btn btn-danger">
                                            {{ __('Delete the skill') }}
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