@if( count($users))
    <ul class="tree">
        @foreach($users as $user )
        <li>
            <code>
                <h6> Level A </h6>
                <p> {{ $user->username }} </p>                                
            </code>                                        
        
            @include("backend.agent.customer_tree.trees1")
        
        </li>
        @endforeach
    </ul>
@else
<p class="text-center my-5"> No Data Available. </p>
@endif

{{ $users->links() }}