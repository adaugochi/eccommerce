@if (session()->has('message'))
    <div class="row pt-2">
        <div class="col-md-3 mx-auto alert alert-success text-center animated fadeIn ">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong class="message">
                {!! session()->get('message') !!}
            </strong>
        </div>
    </div>
@elseif (session()->has('error'))
    <div class="alert alert-danger text-center animated fadeIn">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            {!! session()->get('error') !!}
        </strong>
    </div>
@endif