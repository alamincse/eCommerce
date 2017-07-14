<div class="sequence-theme">
    <div id="sequence">
        @if( $slider )
            {{ HTML::image( 'assets/dist/products/slider/bt-prev.png', 'Previous Frame', array('class' => 'sequence-prev') ) }}
            {{ HTML::image( 'assets/dist/products/slider/bt-next.png', 'Next Frame', array('class' => 'sequence-next') ) }}
            
            <ul class="sequence-canvas">
                @foreach( $slider as $slid )
                    <li class="animate-in">
                        <h2 class="title">{{ $slid->name }}</h2>
                        <h3 class="subtitle">{{ $slid->desc }}</h3>
                        {{ HTML::image( $slid->image, null, array( 'class' => 'model img-responsive' ) ) }}
                    </li><!-- .animate-in  -->
                @endforeach
            </ul><!--  .sequence-canvas -->
        @endif
    </div><!-- .sequence  -->
</div><!-- .sequence-theme  -->