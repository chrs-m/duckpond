@foreach($comments as $comment)
    <ul>
        <li>
            <a href="{{ route('users.profile', $comment->owner) }}"><b>/u/{{$comment->owner->username}}</b></a>
            <p>{{$comment->content}}</p>
            <div>
                <p>
                    {{$comment->vote_count}} points |
                    <a href="{{ route('comment.upvote', ['community' => $community, 'comment' => $comment->getHashId()]) }}">Upvote</a> |
                    <a href="{{ route('comment.downvote', ['community' => $community, 'comment' => $comment->getHashId()]) }}">Downvote</a> |
                    <a href="{{ route('comment.show', ['community' => $community, 'post' => $post->getHashId(), 'comment' => $comment->getHashId()]) }}">Reply</a>
                    @can('delete', $comment)
                        <form action="{{ route('comment.delete', ['community' => $community, 'post' => $post->getHashId(), 'comment' => $comment->getHashId()]) }}" method="post">
                        @csrf
                        @method('DELETE')
                            <button type="submit">Delete comment</button>
                        </form>
                    @endcan
                </p>
            </div>
        </li>
        @include('partials.comments', ['comments' => $comment->allChildren])
    </ul>
@endforeach
