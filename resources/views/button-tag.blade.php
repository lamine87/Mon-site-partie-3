@foreach($users as $user)
    <a href="{{route('voir_tag',['id'=>$user->id])}}" type="button" class="btn btn-primary">
        {{$user->name}}</a>
@endforeach

