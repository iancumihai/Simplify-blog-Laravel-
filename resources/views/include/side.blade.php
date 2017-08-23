
<div class="row" id="socialcounter">
            <h2><span>Media Sosial</span></h2>
            <div class="hline"></div>
            <ul>
              <li class="social_item-wrapper">
                <a class="social_item social_facebook" href="#" rel="nofollow" target="_blank" title="Follow us on Facebook"><i class="fa fa-facebook social_icon"></i><span class="social_num">Facebook</span></a>
              </li>
              <li class="social_item-wrapper">
                <a class="social_item social_twitter" href="#" rel="nofollow" target="_blank" title="Follow us on Twitter"><i class="fa fa-twitter social_icon"></i><span class="social_num">Twitter</span></a>
              </li>
              <li class="social_item-wrapper">
                <a class="social_item social_rss" href="#" rel="nofollow" target="_blank" title="Follow our blog"><i class="fa fa-user-plus social_icon"></i><span class="social_num">Blogger</span></a>
              </li>
              <li class="social_item-wrapper">
                <a class="social_item social_google-plus" href="#" rel="nofollow" target="_blank" title="Follow us on Google+"><i class="fa fa-google-plus social_icon"></i><span class="social_num">Google+</span></a>
              </li>
            </ul>
          </div>
          <div class="row sidebar-content1">
            <h2><span>Artikel Pilihan</span></h2>
            <div class="hline"></div>
            <div class="col-xs-12 col-md-12 popular-posts1">
              <div class="row">
                <ul>
                  @foreach($random as $row)
                  <li>
                    <div class="item-thumbnail">
                      <a href="{{ url('post/'.$post->url) }}"><img src="{{asset('images/'.$row->image)}}" alt="" width="100%">
                      </a>
                    </div>
                    <div class=" item-title">
                      <a href="{{ url('post/'.$post->url) }}" title="Smooth Sweet Tea with Cookies"><span>{{$row->title}}</span></a>
                    </div>
                    <div class="clear"></div>
                    @endforeach
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row category">
            <div class="col-xs-12 popular-posts1">
              <h2><span>Kategori</span></h2>
              <div class="hline"></div>
              <select class="form-control" placeholder="Pilih Kategori">
                @foreach($category as $row)
                  <option>{{$row->name}}</option>
                @endforeach
              </select>

            </div>
          </div>
          <div class="row sidebar-content1">
            <h2><span>Artikel Pilihan</span></h2>
            <div class="hline"></div>
            <div class="col-xs-12 col-md-12 popular-posts1">
              <div class="row">
                <ul>
                @foreach($view as $row)
                  <li>
                    <div class="item-thumbnail">
                      <a href="{{ url('post/'.$post->url) }}"><img src="{{asset('images/'.$row->image)}}" alt="" width="100%">
                      </a>
                    </div>
                    <div class=" item-title">
                      <a href="{{ url('post/'.$post->url) }}"><span>{{$row->title}}</span></a>
                    </div>
                    <div class="clear"></div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
</div>