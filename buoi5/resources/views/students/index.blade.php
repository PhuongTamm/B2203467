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
            <h4 class="m-0">Students</h4>
            <div>
                <a href="{{ route('students.student.create') }}" class="btn btn-secondary" title="Create New Student">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>
            </div>
        </div>
        
        @if(count($students) == 0)
            <div class="card-body text-center">
                <h4>No Students Available.</h4>
            </div>
        @else
        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Birthday</th>
                            <th>Reg Date</th>
                            <th>Major</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td class="align-middle">{{ $student->fullname }}</td>
                            <td class="align-middle">{{ $student->email }}</td>
                            <td class="align-middle">{{ $student->Birthday }}</td>
                            <td class="align-middle">{{ $student->reg_date }}</td>
                            <td class="align-middle">{{ optional($student->major)->name_major }}</td>

                            <td class="text-end">

                                <form method="POST" action="{!! route('students.student.destroy', $student->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('students.student.show', $student->id ) }}" class="btn btn-info" title="Show Student">
                                            <span class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('students.student.edit', $student->id ) }}" class="btn btn-primary" title="Edit Student">
                                            <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Student" onclick="return confirm(&quot;Click Ok to delete Student.&quot;)">
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

            {!! $students->links('pagination') !!}
        </div>
        
        @endif
    
    </div>
@endsection