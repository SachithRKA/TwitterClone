<h4> Share yours ideas </h4>
<div class="row">
    <form action="{{ route('tweets.post') }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" id="tweet" name="tweets" rows="3"></textarea>
            @error('tweets')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type='submit' class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
