@extends('backend.layouts.app')

@section('title',__('app.Show Post'))

@push('styles')


@endpush


@section('content')

    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header bg-indigo">
                    <h2>{{strtoupper(__('app.Show Post'))}}</h2>
                </div>

                <div class="header">
                    <h2>
                        {{$post->title}}
                        <br>
                        <small>{{__('app.Posted By ')}}<strong>{{$post->user->name}}</strong>{{__('app. on ')}}{{$post->created_at->toFormattedDateString()}}</small>
                    </h2>
                </div>

                <div class="body">
                    {!!$post->body!!}
                </div>

            </div>

            {{-- COMMENTS --}}
            <div class="card">
                <div class="header">
                    <h2>{{ $post->comments_count }} {{__('app.Comments')}}</h2>
                </div>
                <div class="body">
                    @foreach($post->comments as $comment)
                    
                        @if($comment->parent_id == NULL)
                            <div class="comment">
                                <div class="author-image">
                                    <span style="background-image:url({{ Storage::url('users/'.$comment->users->image) }});"></span>
                                </div>
                                <div class="content">
                                    <div class="author-name">
                                        <strong>{{ $comment->users->name }}</strong>
                                        <span class="right">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="author-comment">
                                        {{ $comment->body }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        @foreach($comment->children as $comment)
                            <div class="comment children">
                                <div class="author-image">
                                    <span style="background-image:url({{ Storage::url('users/'.$comment->users->image) }});"></span>
                                </div>
                                <div class="content">
                                    <div class="author-name">
                                        <strong>{{ $comment->users->name }}</strong>
                                        <span class="right">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="author-comment">
                                        {{ $comment->body }}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endforeach
                </div>
            </div>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-cyan">
                    <h2>{{strtoupper(__('app.selected category'))}}</h2>
                </div>
                <div class="body">
                    @foreach($post->categories as $category)
                        <span class="label bg-cyan">{{$category->name}}</span>
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="header bg-green">
                    <h2>{{strtoupper(__('app.selected tags'))}}</h2>
                </div>
                <div class="body">
                    @foreach($post->tags as $tag)
                        <span class="label bg-green">{{$tag->name}}</span>
                    @endforeach
                </div>
            </div>

            <div class="card">
                <div class="header bg-amber">
                    <h2>{{strtoupper(__('app.featured image'))}}</h2>
                </div>
                <div class="body">

                    <img class="img-responsive thumbnail" src="{{Storage::url('posts/'.$post->image)}}" alt="">
                    

                    <a href="{{route('admin.posts.index',app()->getLocale())}}" class="btn btn-danger btn-lg waves-effect">
                        <i class="material-icons left">arrow_back</i>
                        <span>{{strtoupper(__('app.back'))}}</span>
                    </a>
                    <a href="{{route('admin.posts.edit',[app()->getLocale(),$post->slug])}}" class="btn btn-info btn-lg waves-effect">
                        <i class="material-icons">edit</i>
                        <span>{{strtoupper(__('app.edit'))}}</span>
                    </a>

                </div>
            </div>
        </div>

    </div>


@endsection


@push('scripts')

    <script>


        
    </script>


@endpush
