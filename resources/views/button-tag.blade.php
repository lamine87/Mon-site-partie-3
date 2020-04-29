@foreach($users->sortByDesc('created_at') as $user)
    @if ($user != $user->hasRole('Administrateur'))
    <a href="{{route('voir_tag',['id'=>$user->id])}}" type="button" class="btn btn-primary">
        {{$user->name}}
    </a>
    @endif
@endforeach


