<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
    <span>SEARCH</span>
</h6>
  <form action="/products">
    <div class="d-flex">
      <input class="search-input" type="text" placeholder="Type your Choice.." name="search" value="{{ request('search') }}">
      <button class="search-btn search-btnfill" type="submit">
        <span data-feather="search" class="color-span"></span>
      </button>
     
    </div>
  </form>