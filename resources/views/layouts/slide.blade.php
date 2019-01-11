<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  @foreach($slide as $s)
  <div class="mySlides">
    <img src="image/thumbs/{{$s->image}}" style="width:100%;" height="600px">
  </div>
	@endforeach
  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  @for($i=1; $i<= count($slide); $i++)
  <span class="dot" onclick="currentSlide({{$i}})"></span>
  @endfor
</div>