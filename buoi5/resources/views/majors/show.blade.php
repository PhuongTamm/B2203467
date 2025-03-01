@extends('layouts.app')

@section('content')

<div class="card text-bg-theme">

     <div class="card-header d-flex justify-content-between align-items-center p-3">
        <h4 class="m-0">{{ isset($title) ? $title : 'Major' }}</h4>
        <div>
            <form method="POST" action="{!! route('majors.major.destroy', $major->id) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}

                <a href="{{ route('majors.major.edit', $major->id ) }}" class="btn btn-primary" title="Edit Major">
                    <span class="fa-regular fa-pen-to-square" aria-hidden="true"></span>
                </a>

                <button type="submit" class="btn btn-danger" title="Delete Major" onclick="return confirm(&quot;Click Ok to delete Major.?&quot;)">
                    <span class="fa-regular fa-trash-can" aria-hidden="true"></span>
                </button>

                <a href="{{ route('majors.major.index') }}" class="btn btn-primary" title="Show All Major">
                    <span class="fa-solid fa-table-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('majors.major.create') }}" class="btn btn-secondary" title="Create New Major">
                    <span class="fa-solid fa-plus" aria-hidden="true"></span>
                </a>

            </form>
        </div>
    </div>

    <div class="card-body">
        <dl class="row">
            <dt class="text-lg-end col-lg-2 col-xl-3">Name Major</dt>
            <dd class="col-lg-10 col-xl-9">{{ $major->name_major }}</dd>

        </dl>

    </div>
</div>

@endsection