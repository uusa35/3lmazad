@extends('frontend.layouts.app')

@section('top')
    <section class="content content--fill top-null">
        <div class="container">
            <h2 class="h-pad-sm text-uppercase text-center">Terms Of Condition</h2>
            <h6 class="text-uppercase text-center">Terms of conditions.</h6>
            {{--@include('frontend.partials.components._steps-process')--}}
            <div class="divider divider--sm"></div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">
                    <div class="card card--form">
                        <div class="divider divider--xs"></div>
                        <p class="text-justify">
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto at deleniti dolorum est et eveniet incidunt, ipsum mollitia nam nihil quia recusandae repellat rerum sapiente sit soluta tempora totam voluptatum?</span><span>Accusamus consequatur corporis deleniti dolores ducimus ex impedit itaque iusto molestiae, mollitia omnis optio perferendis reprehenderit rerum suscipit vel veritatis voluptates. Et libero magnam nam odio officia officiis quia! Repellendus.</span><span>Ad adipisci aliquam assumenda consectetur cumque cupiditate dolores, doloribus eos facere in ipsam magni minima modi mollitia nesciunt officiis porro qui quia quisquam quod repellat soluta tenetur unde veritatis voluptatem?</span><span>Alias, consequatur dolor eaque fugit harum illum, in inventore modi molestiae natus perferendis placeat, possimus quas sint sit suscipit vel voluptatum! Alias ducimus laudantium omnis porro, possimus repudiandae sed veritatis.</span><span>Asperiores, doloribus facilis harum itaque maiores quae saepe unde ut vel vero. Accusantium ad architecto eius eum fuga ipsa itaque magnam nesciunt odit perspiciatis rem, rerum tempore
                                voluptas, voluptates voluptatibus.</span><span>Ab aperiam asperiores aut autem consequuntur, delectus dicta doloribus ducimus esse ipsum maxime modi, nobis odit perferendis quidem quos rem repellendus, sit voluptas voluptatum? Delectus doloribus ex facere nemo ullam!</span><span>Ad dolor est impedit inventore ipsum ratione vel veniam. Eos facilis iusto laborum quidem tenetur? Deleniti eum, exercitationem fugit illo ipsum praesentium sed voluptatem. Aliquam ducimus laborum nihil optio quia.</span><span>Ad, excepturi fuga fugit inventore iste minima mollitia necessitatibus optio rem repudiandae. Commodi, eaque eum molestias quaerat repudiandae tempora totam vel! Blanditiis expedita laudantium officia omnis? Accusantium deserunt sit veniam.</span><span>Aliquam beatae, distinctio dolor, eaque eius error excepturi incidunt ipsa ipsam itaque labore minus mollitia nam nesciunt odio officiis pariatur quaerat recusandae saepe suscipit ullam unde veritatis? Adipisci deleniti, molestiae!</span><span>Deleniti ducimus iste odio. A aperiam architecto, aspernatur assumenda aut, cumque distinctio dolor doloremque eligendi exercitationem fugit iste laborum molestiae quam quia quibusdam quod reiciendis rerum similique veritatis! Laboriosam, rerum.</span>
                        </p>
                        <div class="row pull-right">
                            <div class="col-lg-1">
                                <input type="checkbox" name="mark" id="mark">
                            </div>
                            <div class="col-lg-2">
                                <a href="{{ route('register',['sort' => request()->sort]) }}" id="terms"
                                   class="btn btn-info disabled">i agree</a>
                            </div>
                        </div>
                        <div class="divider divider--xs"></div>
                        <div class="card--form__footer btn--with-icon"><a href="{{ route('home') }}">
                                <span class="fa fa-fw fa-arrow-circle-left fa-sm"></span>Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider divider--xl"></div>
        </div>
    </section>
@endsection
