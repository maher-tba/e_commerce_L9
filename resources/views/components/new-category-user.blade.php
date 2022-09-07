<div class="card card-new-category">
    <div class="card-header">  <strong>صنف جديدة</strong> </div>

    <div class="card-body">
        <form method="POST" action="{{ route('user.categories.store') }}">
            @csrf
            <div class="form-group">
                <label for="title"> الصنف</label>
                <input id="title" name="title" type="text" maxlength="255" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" autocomplete="off" />
                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                @endif

            </div>
                <button type="submit" class="btn btn-primary mt-3">انشاء</button>
        </form>
    </div>
</div>
