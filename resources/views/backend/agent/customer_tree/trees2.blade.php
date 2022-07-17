@if( $groupL = getGroupMembers($k->member->id))
<ul>
    @foreach( $groupL as $l)
    <li>
        <code>
            <h6> Level L </h6>
            <p>{{ $l->member->username ?: '- - -' }} </p>
        </code>

        @if( $groupM = getGroupMembers($l->member->id))
        <ul>
            @foreach( $groupM as $m)
            <li>
                <code>
                    <h6> Level M </h6>
                    <p>{{ $m->member->username ?: '- - -' }} </p>
                </code>

                @if( $groupN = getGroupMembers($m->member->id))
                <ul>
                    @foreach( $groupN as $n)
                    <li>
                        <code>
                            <h6> Level N </h6>
                            <p>{{ $n->member->username ?: '- - -' }} </p>
                        </code>

                        @if( $groupO = getGroupMembers($n->member->id))
                        <ul>
                            @foreach( $groupO as $o)
                            <li>
                                <code>
                                    <h6> Level O </h6>
                                    <p>{{ $o->member->username ?: '- - -' }} </p>
                                </code>

                                @if( $groupP = getGroupMembers($o->member->id))
                                <ul>
                                    @foreach( $groupP as $p)
                                    <li>
                                        <code>
                                            <h6> Level P </h6>
                                            <p>{{ $p->member->username ?: '- - -' }} </p>
                                        </code>

                                        @if( $groupQ = getGroupMembers($p->member->id))
                                        <ul>
                                            @foreach( $groupQ as $q)
                                            <li>
                                                <code>
                                                    <h6> Level Q </h6>
                                                    <p>{{ $q->member->username ?: '- - -' }} </p>
                                                </code>

                                                @if( $groupR = getGroupMembers($q->member->id))
                                                <ul>
                                                    @foreach( $groupR as $r)
                                                    <li>
                                                        <code>
                                                            <h6> Level R </h6>
                                                            <p>{{ $r->member->username ?: '- - -' }} </p>
                                                        </code>

                                                        @if( $groupS = getGroupMembers($r->member->id))
                                                        <ul>
                                                            @foreach( $groupS as $s)
                                                            <li>
                                                                <code>
                                                                    <h6> Level S </h6>
                                                                    <p>{{ $s->member->username ?: '- - -' }} </p>
                                                                </code>

                                                                @if( $groupT = getGroupMembers($s->member->id))
                                                                <ul>
                                                                    @foreach( $groupT as $t)
                                                                    <li>
                                                                        <code>
                                                                            <h6> Level T </h6>
                                                                            <p>{{ $t->member->username ?: '- - -' }} </p>
                                                                        </code>

                                                                        @if( $groupU = getGroupMembers($t->member->id))
                                                                        <ul>
                                                                            @foreach( $groupU as $u)
                                                                            <li>
                                                                                <code>
                                                                                    <h6> Level U </h6>
                                                                                    <p>{{ $u->member->username ?: '- - -' }} </p>
                                                                                </code>

                                                                                @if( $groupV = getGroupMembers($u->member->id))
                                                                                <ul>
                                                                                    @foreach( $groupV as $v)
                                                                                    <li>
                                                                                        <code>
                                                                                            <h6> Level V </h6>
                                                                                            <p>{{ $v->member->username ?: '- - -' }} </p>
                                                                                        </code>

                                                                                        @if( $groupW = getGroupMembers($v->member->id))
                                                                                        <ul>
                                                                                            @foreach( $groupW as $w)
                                                                                            <li>
                                                                                                <code>
                                                                                                    <h6> Level W </h6>
                                                                                                    <p>{{ $w->member->username ?: '- - -' }} </p>
                                                                                                </code>
                                                                                                
                                                                                                @if( $groupX = getGroupMembers($w->member->id))
                                                                                                <ul>
                                                                                                    @foreach( $groupX as $x)
                                                                                                    <li>
                                                                                                        <code>
                                                                                                            <h6> Level X </h6>
                                                                                                            <p>{{ $x->member->username ?: '- - -' }} </p>
                                                                                                        </code>

                                                                                                        @if( $groupY = getGroupMembers($x->member->id))
                                                                                                        <ul>
                                                                                                            @foreach( $groupY as $y)
                                                                                                            <li>
                                                                                                                <code>
                                                                                                                    <h6> Level Y </h6>
                                                                                                                    <p>{{ $y->member->username ?: '- - -' }} </p>
                                                                                                                </code>
                                                                                                                
                                                                                                                @if( $groupZ = getGroupMembers($y->member->id))
                                                                                                                <ul>
                                                                                                                    @foreach( $groupZ as $z)
                                                                                                                    <li>
                                                                                                                        <code>
                                                                                                                            <h6> Level Z </h6>
                                                                                                                            <p>{{ $z->member->username ?: '- - -' }} </p>
                                                                                                                        </code>  

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