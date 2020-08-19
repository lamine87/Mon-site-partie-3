@extends('page2')
@section('content')
    <div class="container">
        <div class="row" >
            <div class="col-md-8 col-sm-12 col-lg-8" id="piste" style="float: left">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" class="embed-responsive-item" src="{{$mouve->url_video}}" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                </div>
                <div class="partage-reseaux">
                <a class="partage" onclick="share()" title="Partager sur facebook">
                    <img src="{{asset('img/icon/facebook-c32.png')}}" height="18px" width="18px" frameborder="0"/>
                </a>
                    <img src="{{asset('img/icon/icon-partager-24.png')}}" height="15px" width="15px" frameborder="0"/>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-3">
                        <div class="votecell post-layout--left">
                          <div class="js-voting-container">
{{--                                <div id="photo">--}}

                          <form action="{{ route('like',['id'=>$mouve->id]) }}" method="post" id="plateform"
                                enctype="multipart/form-data">
                              @csrf
                            <button type="submit" id="likeVideo">
                              <img src="{{asset('img/icon/like.png')}}" height="20px" width="20px" frameborder="0"/>
                              </button>
                          </form>

{{--      <div class="interaction">--}}
{{--          <a href="#" class="btn btn-xs btn-warning like">--}}
{{--          </a>--}}


{{--          <a href="#" class="btn btn-xs btn-danger like">--}}
{{--          </a>--}}
{{--       </div>--}}

{{--                              @foreach($likes as $like)--}}
{{--                                  @if($mouve->id == $like->mouve_id)--}}
{{--                                      {{$like->like_id}}--}}
{{--                                  @endif--}}
{{--                              @endforeach--}}
{{--                                </div>--}}

                                <p id='counter'></p>
{{--                                <div id="photo2">--}}

{{--                              <form action="{{ route('postDislike',['id'=>$mouve->id]) }}" method="post"--}}
{{--                                  enctype="multipart/form-data">--}}
{{--                                  @csrf--}}
{{--                                <button type="submit" class="dislike" href="">--}}
{{--                                 <img src="{{asset('img/icon/dislike.png')}}" height="20px" width="20px" frameborder="0" />--}}
{{--                                </button>--}}
{{--                              </form>--}}
{{--                              @foreach($dislikes as $dislike)--}}
{{--                                  @if($mouve->id == $dislike->mouve_id)--}}
{{--                                      {{$dislike->dislike_id}}--}}
{{--                                  @endif--}}
{{--                              @endforeach--}}
{{--                                </div>--}}
{{--                              @endif--}}
                          </div>

{{--                        <p id='counter2'></p>--}}
                        <div class="voteBar">
                          <div class="progress-bar"></div>
                        </div>
                        <br>
                    </div>
                 </div>

{{--                    <div class="row-like">--}}
{{--                        <div class="post-like">--}}
{{--                            <a href="{{route('poste_like')}}"class="">--}}
{{--                                <img src="{{asset('img/icon/like.png')}}" height="30px" width="30px" frameborder="0"/>--}}
{{--                            </a>--}}
{{--                            Like--}}
{{--                            --}}{{--                             ({{}})--}}
{{--                        </div>--}}

{{--                        <div class="post-dislike">--}}
{{--                            <a href="">--}}
{{--                                <img src="{{asset('img/icon/dislike.png')}}" height="30px" width="30px" frameborder="0"/>--}}
{{--                            </a>--}}
{{--                            Dislike--}}
{{--                            --}}{{--                             ({{}})--}}
{{--                        </div>--}}
{{--                        <br><br>--}}
{{--                    </div>--}}

                <div class="col-md-6 col-lg-6 ">
                    <p class="card-text"><strong>{{$mouve->description}}</strong></p>
                </div>
              </div>
          </div>

          @include('comment')

    </div>
 </div>

    <br><br>

    <div class="album py-5 bg-light">
        <div class="container" style="float: bottom">
            <div class="row">
                @foreach($mouves as $mouve)
                    <div class="col-md-2 box-shadow">
                        <a href="{{route('voirArtiste',['id'=>$mouve->id])}}" target="_self">
                            <img src="{{asset('storage/uploads/'.$mouve->photo_principale)}}"  class="card-img-top img-fluid" alt="Mali Rap">

                            <div class="text-center">
                                @foreach($users as $user)
                                    @if($user->id == $mouve->user_id)
                                        <strong>{{$user->name}}</strong>
                                    @endif
                                @endforeach
                                <p class="card-text">{{$mouve->description}}</p>
                                <br>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <br>
        </div>
    </div>
@endsection



