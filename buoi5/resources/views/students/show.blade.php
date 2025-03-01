@extends('layouts.app')

@section('content')

<div class="card text-bg-theme">

     <div class="card-header d-flex justify-content-between align-items-center p-3">
        <h4 class="m-0">{{ isset($title) ? $title : 'Student' }}</h4>
        <div>
            <form method="POST" action="{!! route('students.student.destroy', $student->id) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}

                <a href="{{ route('students.student.edit', $student->id ) }}" class="btn btn-primary" title="Edit Student">
                    <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                </a>

                <button type="submit" class="btn btn-danger" title="Delete Student" onclick="return confirm(&quot;Click Ok to delete Student.?&quot;)">
                    <span class="fa-regular fa-trash-can" aria-hidden="true"></span>
                </button>

                <a href="{{ route('students.student.index') }}" class="btn btn-primary" title="Show All Student">
                    <span class="fa-solid fa-table-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('students.student.create') }}" class="btn btn-secondary" title="Create New Student">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>

            </form>
        </div>
    </div>

    <div class="card-body">
        <dl class="row">
            <dt class="text-lg-end col-lg-2 col-xl-3">Fullname</dt>
            <dd class="col-lg-10 col-xl-9">{{ $student->fullname }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Email</dt>
            <dd class="col-lg-10 col-xl-9">{{ $student->email }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Birthday</dt>
            <dd class="col-lg-10 col-xl-9">{{ $student->Birthday }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Reg Date</dt>
            <dd class="col-lg-10 col-xl-9">{{ $student->reg_date }}</dd>
            <dt class="text-lg-end col-lg-2 col-xl-3">Major</dt>
            <dd class="col-lg-10 col-xl-9">{{ optional($student->major)->name_major }}</dd>

        </dl>

    </div>
</div>

@endsection