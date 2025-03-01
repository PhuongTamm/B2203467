
<div class="mb-3 row">
    <label for="fullname" class="col-form-label text-lg-end col-lg-2 col-xl-3">Fullname</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('fullname') ? ' is-invalid' : '' }}" name="fullname" type="text" id="fullname" value="{{ old('fullname', optional($student)->fullname) }}" minlength="1" placeholder="Enter fullname here...">
        {!! $errors->first('fullname', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="email" class="col-form-label text-lg-end col-lg-2 col-xl-3">Email</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" type="email" id="email" value="{{ old('email', optional($student)->email) }}" placeholder="Enter email here...">
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="Birthday" class="col-form-label text-lg-end col-lg-2 col-xl-3">Birthday</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('Birthday') ? ' is-invalid' : '' }}" name="Birthday" type="text" id="Birthday" value="{{ old('Birthday', optional($student)->Birthday) }}" minlength="1" placeholder="Enter birthday here...">
        {!! $errors->first('Birthday', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="reg_date" class="col-form-label text-lg-end col-lg-2 col-xl-3">Reg Date</label>
    <div class="col-lg-10 col-xl-9">
        <input class="form-control{{ $errors->has('reg_date') ? ' is-invalid' : '' }}" name="reg_date" type="text" id="reg_date" value="{{ old('reg_date', optional($student)->reg_date) }}" placeholder="Enter reg date here...">
        {!! $errors->first('reg_date', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="mb-3 row">
    <label for="major_id" class="col-form-label text-lg-end col-lg-2 col-xl-3">Major</label>
    <div class="col-lg-10 col-xl-9">
        <select class="form-select{{ $errors->has('major_id') ? ' is-invalid' : '' }}" id="major_id" name="major_id">
        	    <option value="" style="display: none;" {{ old('major_id', optional($student)->major_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select major</option>
        	@foreach ($majors as $key => $major)
			    <option value="{{ $key }}" {{ old('major_id', optional($student)->major_id) == $key ? 'selected' : '' }}>
			    	{{ $major }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('major_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

