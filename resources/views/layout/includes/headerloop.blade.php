<!-- <ul class="products-dropdown"> -->
                            <ul class="list-group list-group-flush products-dropdown">
                            <?php
	                        $prints = Product:: all();
                            ?>
                            @forelse($prints as $print)

                                <li class="list-group-item">
                                    <a style="font-size: 10px;" class="dropdown-item" href="{{route('one.print',$print->id)}}">
                                        {{$print->name}}
                                    </a>
                                </li>
                            @empty
                                <h3>No Prints Available</h3>

                            @endforelse

                        </ul>
