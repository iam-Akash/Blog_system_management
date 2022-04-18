<footer>

    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <p class="copyright">{{config('app.name')}} @ 2017. All rights reserved.</p>
                    <p class="copyright">Designed by <a href="javascript:void(0);"
                            >Colorlib</a>.Downloaded from <a href="javascript:void(0);"
                            >Themeslab</a> and Developed by <a href="javascript:void(0);"> Ziaul haq Akash</a></p>
                    <ul class="icons">
                        <li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
                    </ul>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">
                    <h4 class="title"><b>CATAGORIES</b></h4>
                    <ul>
                       @php 
                       $categories = \App\Models\Category::all();
                       @endphp
               
                       @foreach ($categories as $category)
                           <li><a href="{{route('category.posts',$category->slug)}}">{{$category->name}}</a></li>
                       @endforeach

                    </ul>
                    
                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="footer-section">

                    <h4 class="title"><b>SUBSCRIBE</b></h4>
                    <div class="input-area">
                        <form method="POST" action="{{route('subscriber.store')}}">
                            @csrf
                            <input class="email-input" name="email" type="email" placeholder="Enter your email">
                            <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                        </form>

                    </div>
                    <div>
                        @if (Session::has('success'))
                        <span style="color: green">{{Session::get('success')}}</span>
                        @endif

                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <span style="color: red;">*{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

        </div><!-- row -->
    </div><!-- container -->
</footer>
