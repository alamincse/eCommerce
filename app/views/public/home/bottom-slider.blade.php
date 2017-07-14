<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 970px; height: 150px; overflow: hidden;">

    @if( $bsliders )
        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 970px; height: 150px; overflow: hidden;">
            @foreach( $bsliders as $bslider )
                <div><img u="image" src="{{ $bslider->image }}" /></div>
            @endforeach
        </div>
    @endif
        
    <!-- Arrow Left -->
    <span u="arrowleft" class="jssora03l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
    </span>
    <!-- Arrow Right -->
    <span u="arrowright" class="jssora03r" style="width: 55px; height: 55px; top: 123px; right: 8px">
    </span>
    <!-- Arrow Navigator Skin End -->
</div>