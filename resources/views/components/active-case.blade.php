<div class="active-case">
    <h2>{{$case->name}}</h2><h3>{{$case->number}}</h3>
    <p>This is an active case.</p>
    @if($case->userType=="Admin")
    <a href="https://jaredclemence.com" type="button" class="btn btn-primary">View Detail</div></a>
    @endif
</div>
