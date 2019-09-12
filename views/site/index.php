
<!--================Blog Area =================-->
<section class="blog_area p_120" style="padding-top: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php if(!empty($articles)) : ?>
                <div class="blog_left_sidebar">
                    <?php foreach ($articles as $article) : ?>
                    <article class="blog_style1">
                        <div class="blog_img">
                            <?= \yii\helpers\Html::img($article->image , ['alt' => $article->title , 'class' => 'img-fluid']) ?>
                        </div>
                        <div class="blog_text">
                            <div class="blog_text_inner">
                                <div class="cat">
                                    <a class="cat_btn" href="<?= \yii\helpers\Url::to(['category' , 'id' => $article->categoryid]) ?>">
                                        <?= $article->category->title ?>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <?php
                                        $data = $article->posted;
                                        $data = Yii::$app->formatter->asDate($article->posted , 'long')
                                        ?>
                                        <?= $data ; ?>
                                    </a>
                                </div>
                                <a href="<?= \yii\helpers\Url::to(['single' , 'id' => $article->id ]) ?>">
                                    <h4>
                                        <?= $article->title ?>
                                    </h4>
                                </a>
                                <p>
                                    <?= $article->description ?>
                                </p>
                                <a class="blog_btn" href="<?= \yii\helpers\Url::to(['single' , 'id' => $article->id ]) ?>">Read More</a>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-left"></span>
		                                    </span>
                                </a>
                            </li>
                            <li class="page-item"><a href="#" class="page-link">01</a></li>
                            <li class="page-item active"><a href="#" class="page-link">02</a></li>
                            <li class="page-item"><a href="#" class="page-link">03</a></li>
                            <li class="page-item"><a href="#" class="page-link">04</a></li>
                            <li class="page-item"><a href="#" class="page-link">09</a></li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-right"></span>
		                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <?php else : ?>
                <h4>No articles</h4>
                <?php endif; ?>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Posts">
                            <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                    </span>
                        </div><!-- /input-group -->
                        <div class="br"></div>
                    </aside>
                    <?php if(!empty($about)) : ?>
                    <aside class="single_sidebar_widget author_widget">
                        <?php foreach ($about as $item) : ?>
                        <?= \yii\helpers\Html::img($item->image, ['alt' => $item->name , 'class' => 'author_img img-fluid']) ?>
                        <h4>
                            <?= $item->name ?>
                        </h4>
                        <p>
                            <?= $item->position ?>

                        </p>
                        <p>
                            <?= $item->content ?>
                        </p>
                        <div class="social_icon">
                            <a href="<?= $item->facebook ?>"><i class="fa fa-facebook"></i></a>
                            <a href="<?= $item->twitter ?>"><i class="fa fa-twitter"></i></a>
                            <a href="<?= $item->github ?>"><i class="fa fa-github"></i></a>
                            <a href="<?= $item->behance ?>"><i class="fa fa-behance"></i></a>
                        </div>
                        <div class="br"></div>
                        <?php endforeach; ?>
                    </aside>
                    <?php endif; ?>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Popular Posts</h3>

                        <?php if(!empty($popular)) : ?>
                        <?php foreach ($popular as $item) : ?>
                        <div class="media post_item">
                            <?= \yii\bootstrap\Html::img($item->popularimg , ['alt' => $item->title]) ?>
                            <div class="media-body">
                                <a href="<?= \yii\helpers\Url::to(['single' , 'id' => $item->id]) ?>">
                                    <h3>
                                        <?= $item->title ?>
                                    </h3>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="br"></div>

                        <?php else : ?>
                            <h5>No popular articles</h5>
                        <?php endif; ?>
                    </aside>
                    <aside class="single-sidebar-widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>
                        <div class="form-group d-flex flex-row">
                            <div class="input-group">
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                            </div>
                            <a href="#" class="bbtns"><i class="lnr lnr-arrow-right"></i></a>
                        </div>
                        <div class="br"></div>
                    </aside>
                    <?php if(!empty($category)) : ?>
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Post Categories</h4>
                        <ul class="list cat-list">
                            <?php foreach ($category as $item) : ?>
                            <li>
                                <a href="<?= \yii\helpers\Url::to(['category' , 'id' => $item->id ]) ?>" class="d-flex justify-content-between">
                                    <p>
                                        <?= $item->title ?>
                                    </p>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->