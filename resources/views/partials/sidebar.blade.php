      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <ul class="list-unstyled mb-0" style="column-count:3;">
                  @foreach($categories as $category)
                  <li>
                    <a href="/posts/category/{{ $category->name }}">{{ $category->name }}</a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Tags</h5>
          <div class="card-body">
            <div class="row">
                <div class="col">
                    <ul class="list-unstyled mb-0" style="column-count:3;">
                    @foreach($tags as $tag)
                    <li>
                        <a href="/posts/tag/{{ $tag->name }}">{{ $tag->name }}</a>
                    </li>
                    @endforeach
                    </ul>
                </div>
                </div>  
            </div>
        </div>

      </div>