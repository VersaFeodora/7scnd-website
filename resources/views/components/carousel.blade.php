<style>
    .carousel-control-prev,
    .carousel-control-next {
      background: transparent;
      box-shadow: none;
    }
</style>

<div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-inner py-4">
    @foreach ($data->chunk(3) as $chunkIndex => $chunk)
    <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
      <div class="card-wrapper container-sm d-flex justify-content-around">
        @foreach ($chunk as $p)
        <!-- Post preview-->
        <div class="col-3 py-4 border card">
          <div class="d-flex justify-content-center m-4">
            <img src="images/1718284024.png" alt="" class="overflow-hidden" style="background-size: cover;">
          </div>
          <a href="/blog/{{$p->slug}}">
            <h5 class="">{{$p->title}}</h5>
            <h7 class="post-subtitle">{{mb_substr($p->content, 0, 50, 'utf8').'...'}}</h7>
          </a>
          <p class="post-meta">
            {{$p->created_at}}
          </p>
        </div>
        @endforeach  
      </div>
    </div>
    @endforeach
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    adjustCarouselItems();
    window.addEventListener('resize', adjustCarouselItems);
  });

  function adjustCarouselItems() {
    const carouselInner = document.querySelector('.carousel-inner');
    const isMobileView = window.innerWidth < 768 ;
    const chunkSize = isMobileView ? 1 : 3;
    const items = @json($data);

    let chunkedItems = [];
    for (let i = 0; i < items.length; i += chunkSize) {
      chunkedItems.push(items.slice(i, i + chunkSize));
    }

    let innerHTML = '';
    chunkedItems.forEach((chunk, chunkIndex) => {
      innerHTML += `
        <div class="carousel-item ${chunkIndex == 0 ? 'active' : ''}">
          <div class="card-wrapper container-sm d-flex justify-content-around">
            ${chunk.map(p => `
              <div class="col-6 col-sm-3 col-lg-4 py-4 border card">
                <div class="d-flex justify-content-center m-4">
                  <img src="assets" alt="" class="overflow-hidden" style="background-size: cover;">
                </div>
                <a href="/blog/${p.slug}">
                  <h5 class="">${p.title}</h5>
                  <h7 class="post-subtitle">${p.content.substring(0, 50)}...</h7>
                </a>
                <p class="post-meta">${p.created_at}</p>
              </div>
            `).join('')}
          </div>
        </div>
      `;
    });

    carouselInner.innerHTML = innerHTML;
  }
</script>