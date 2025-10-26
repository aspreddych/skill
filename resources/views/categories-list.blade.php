@php
    // Function to generate a consistent color based on category name
    function getColor($string) {
        $hash = substr(md5($string), 0, 6);
        return '#' . $hash;
    }
@endphp
@foreach ($categories as $category)
    <div class="col-md-3">
        <div class="home-banner-label">
            @php
                // Extract only letters from each word, ignore symbols
                $words = preg_split('/\s+/', $category->name); // split by spaces
                $initials = '';

                foreach ($words as $word) {
                    // Get first alphabet character of the word
                    if (preg_match('/[A-Za-z]/', $word[0])) {
                        $initials .= strtoupper($word[0]);
                    }
                }
            @endphp
            <div class="label-icon me-3"
                style="background-color: {{ getColor($category->name) }};
                        width: 50px; height: 50px;
                        display: flex; align-items: center; justify-content: center;
                        color: #0d6efd; font-weight: bold;">
                {{ $initials }}
            </div>
            <div class="content-space">
                <h6 class="sub-title">{{ $category->name}}</h6>
                <p class="label-content">{{ $category->active_jobs_count }} Open position</p>
            </div>
        </div>
    </div>
@endforeach