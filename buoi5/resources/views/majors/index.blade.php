@extends('layout')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {!! session('success_message') !!}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card text-bg-theme">

        <div class="card-header d-flex justify-content-between align-items-center p-3">
            <h4 class="m-0">Majors</h4>
            <div>
                <a href="{{ route('majors.major.create') }}" class="btn btn-secondary" title="Create New Major">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>
            </div>
        </div>
        
        @if(count($majors) == 0)
            <div class="card-body text-center">
                <h4>No Majors Available.</h4>
            </div>
        @else
        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name Major</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($majors as $major)
                        <tr>
                            <td class="align-middle">{{ $major->name_major }}</td>

                            <td class="text-end">

                                <form method="POST" action="{!! route('majors.major.destroy', $major->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('majors.major.show', $major->id ) }}" class="btn btn-info" title="Show Major">
                                            <span class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('majors.major.edit', $major->id ) }}" class="btn btn-primary" title="Edit Major">
                                            <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Major" onclick="return confirm(&quot;Click Ok to delete Major.&quot;)">
                                            <span class="fa-regular fa-trash-can" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

            {!! $majors->links('pagination') !!}
        </div>
        
        @endif
    
    </div>
@endsection