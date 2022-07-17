@if( $groupB = getGroupMembers($user->id))
<ul>
    @foreach( $groupB as $b)
    <li>
        <code>
            <h6> Level B </h6>
            <p>{{ $b->member->username ?: '- - -' }} </p>
        </code>

        @if( $groupC = getGroupMembers($b->member->id))
        <ul>
            @foreach( $groupC as $c)
            <li>
                <code>
                    <h6> Level C </h6>
                    <p>{{ $c->member->username ?: '- - -' }} </p>
                </code>

                @if( $groupD = getGroupMembers($c->member->id))
                <ul>
                    @foreach( $groupD as $d)
                    <li>
                        <code>
                            <h6> Level D </h6>
                            <p>{{ $d->member->username ?: '- - -' }} </p>
                        </code>

                        @if( $groupE = getGroupMembers($d->member->id))
                        <ul>
                            @foreach( $groupE as $e)
                            <li>
                                <code>
                                    <h6> Level E </h6>
                                    <p>{{ $e->member->username ?: '- - -' }} </p>
                                </code>

                                @if( $groupF = getGroupMembers($e->member->id))
                                <ul>
                                    @foreach( $groupF as $f)
                                    <li>
                                        <code>
                                            <h6> Level F </h6>
                                            <p>{{ $f->member->username ?: '- - -' }} </p>
                                        </code>

                                        @if( $groupG = getGroupMembers($f->member->id))
                                        <ul>
                                            @foreach( $groupG as $g)
                                            <li>
                                                <code>
                                                    <h6> Level G </h6>
                                                    <p>{{ $g->member->username ?: '- - -' }} </p>
                                                </code>

                                                @if( $groupH = getGroupMembers($g->member->id))
                                                <ul>
                                                    @foreach( $groupH as $h)
                                                    <li>
                                                        <code>
                                                            <h6> Level H </h6>
                                                            <p>{{ $h->member->username ?: '- - -' }} </p>
                                                        </code>

                                                        @if( $groupI = getGroupMembers($h->member->id))
                                                        <ul>
                                                            @foreach( $groupI as $i)
                                                            <li>
                                                                <code>
                                                                    <h6> Level I </h6>
                                                                    <p>{{ $i->member->username ?: '- - -' }} </p>
                                                                </code>

                                                                @if( $groupJ = getGroupMembers($i->member->id))
                                                                <ul>
                                                                    @foreach( $groupJ as $j)
                                                                    <li>
                                                                        <code>
                                                                            <h6> Level J </h6>
                                                                            <p>{{ $j->member->username ?: '- - -' }} </p>
                                                                        </code>

                                                                        @if( $groupK = getGroupMembers($j->member->id))
                                                                        <ul>
                                                                            @foreach( $groupK as $k)
                                                                            <li>
                                                                                <code>
                                                                                    <h6> Level K </h6>
                                                                                    <p>{{ $k->member->username ?: '- - -' }} </p>
                                                                                </code>

                                                                                @include('backend.agent.customer_tree.trees2')
                                                                            </li>
                                                                            @endforeach                                                            
                                                                        </ul>
                                                                        @endif
                                                                    </li>
                                                                    @endforeach                                                            
                                                                </ul>
                                                                @endif

                                                            </li>
                                                            @endforeach                                                            
                                                        </ul>
                                                        @endif

                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endif

                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif

                                    </li>
                                    @endforeach
                                </ul>
                                @endif

                            </li>
                            @endforeach
                        </ul>
                        @endif

                    </li>
                    @endforeach
                </ul>
                @endif

            </li>
            @endforeach
        </ul>
        @endif

    </li>
    @endforeach
</ul>
@endif