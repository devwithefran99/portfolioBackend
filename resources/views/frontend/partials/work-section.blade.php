{{-- 
    Portfolio Controller এ এটা যোগ করো:
    
    use App\Models\Work;
    
    public function index() {
        $works = Work::orderBy('sort_order')->orderBy('created_at','desc')->get();
        return view('frontend.home', compact('works'));
    }
--}}

<section id="workPart">
  <div class="container py-5">

    <div class="section-title-box text-center mb-4">
      <div class="title-3d">
        <h2 class="section-title">My Work</h2>
      </div>
      <p class="section-subtitle mt-3">A quick overview of my Projects & Design</p>
    </div>

    <!-- Filter Buttons -->
    <div class="d-flex justify-content-center gap-2 mb-4">
      <button class="filter-btn active" data-filter="mobile">Social Media</button>
      <button class="filter-btn" data-filter="web">Web Design</button>
      <button class="filter-btn" data-filter="social">Branding</button>
    </div>

    <!-- Work Grid -->
    <div class="row g-4" id="workGrid">

      @forelse($works as $work)
      <div class="col-lg-4 col-md-6 work-item {{ $work->category }} {{ $work->is_extra ? 'extra' : 'visible' }}">

        @if($work->popup_image)
        {{-- Card with popup trigger --}}
        <div class="work-card popup-trigger"
             data-img="{{ asset('storage/' . $work->popup_image) }}">
          <div class="img-wrapper">
            <img src="{{ asset('storage/' . $work->cover_image) }}"
                 class="w-100" alt="{{ $work->title }}">
            <div class="overlay">
              <div class="icons">
                <span class="icon view"><i class="bi bi-eye"></i></span>
                <span class="icon love"><i class="bi bi-heart"></i></span>
              </div>
            </div>
          </div>
          <div class="content">
            <span class="date">{{ $work->work_date ? $work->work_date->format('d M Y') : '' }}</span>
            <h6>{{ $work->title }}</h6>
          </div>
        </div>

        @else
        {{-- Card without popup --}}
        <div class="work-card">
          <div class="img-wrapper">
            <img src="{{ asset('storage/' . $work->cover_image) }}"
                 class="w-100" alt="{{ $work->title }}">
            <div class="overlay">
              <div class="icons">
                <span class="icon love"><i class="bi bi-heart"></i></span>
              </div>
            </div>
          </div>
          <div class="content">
            <span class="date">{{ $work->work_date ? $work->work_date->format('d M Y') : '' }}</span>
            <h6>{{ $work->title }}</h6>
          </div>
        </div>
        @endif

      </div>
      @empty
      <div class="col-12 text-center py-5">
        <p class="text-muted">এখনো কোনো কাজ যোগ করা হয়নি।</p>
      </div>
      @endforelse

    </div>

    <!-- Button -->
    <div class="text-center mt-3">
      <button id="toggleBtn" class="moreBtn">Show More</button>
    </div>

  </div>
</section>