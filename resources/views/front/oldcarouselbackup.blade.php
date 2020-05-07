


           <!-- All items in a carousel -->


        <div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- indicators -->

<!--   <ol class="carousel-indicators">
  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
  <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
  </ol> -->

  <!-- wrapper for slides -->

  <div class="carousel-inner">
    <?php $count=1; ?>
    @foreach ($relatedProducts->chunk(3) as $chunk)
    <div <?php if ($count==1){ ?> class="carousel-item active"<?php } else { ?> class="carousel-item"<?php } ?>>
        @foreach ($chunk as $item)
      
        
        
      <div class="col-sm-4">
        <a href="{{route('one.print',$item->id)}}">
        <img src="{{url('images',$item->image)}}"/>
        </a>
      <!-- <img src="{{url('images',$item->image)}}"> -->
      <span id="getPrice" class="price-tag">${{$item->price}}</span>
      <p>{{$item->name}}</p>

      <a href="{{route('one.print',$item->id)}}" class="btn btn-primary" style="width: 150px; align-self: center;">View</a>

      <!-- <a href="{{route('one.print',$item->id)}}">View Item</a> -->
      </div>  

      
   

         @endforeach
    </div>

      <?php $count++; ?>
      
      @endforeach
 
  </div>


  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="false"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- END OF ALL ITEMS IN A CAROUSEL -->