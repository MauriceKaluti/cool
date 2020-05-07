		<!-- Accordion -->

<div class="accordion" id="accordionExample">

  @forelse($print->reviews as $review)
  <div class="card">
    <?php $review_user = ProductReview::with( 'user' )->where( 'id', $review->id )->first(); ?>
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          {{ $review_user->user->name }}
        </button>
      </h5>
    </div>

  
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
       {{ $review->headline }}
      </div>
    </div>
  </div>




 @empty
  @endforelse
</div>

<!-- End Accordion -->