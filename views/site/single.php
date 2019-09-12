<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<!--================Blog Area =================-->
<section class="blog_area p_120 single-post-area" style="padding-top: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="main_blog_details">
                    <?= Html::img($article->imgfull, ['alt' => $article->title , 'class' => 'img-fluid']) ?>
                    <a href="#">
                        <h4>
                            <?= $article->title ?>
                        </h4>
                    </a>

                    <?= $article->content ?>
                </div>
                <?php if(!empty($comments)) : ?>
                <div class="comments-area">
                    <h4><?php echo count($comments)?> Comments</h4>
                    <?php foreach ($comments as $comment) : ?>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <?= Html::img($comment->image , ['alt' => $comment->name]) ?>
                                </div>
                                <div class="desc">
                                    <h5>
                                        <a href="#">
                                            <?= $comment->name ?>
                                        </a>
                                    </h5>
                                    <p class="date">
                                        <?php
                                        $data = $comment->posted;
                                        $data = Yii::$app->formatter->asDate($comment->posted , 'long')
                                        ?>
                                        <?= $data ; ?>
                                    </p>
                                    <p class="comment">
                                        <?= $comment->message ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else : ?>
                <div class="comments-area">
                    <h4>No comments</h4>
                </div>
                <?php endif; ?>
                <div class="comment-form">
                    <h4>Leave a Reply</h4>

                    <?php if(Yii::$app->session->hasFlash('success')) : ?>
                        <div class="echo-success">
                            <?php echo Yii::$app->session->getFlash('success') ?>
                        </div>
                    <?php endif; ?>
                    <?php if(Yii::$app->session->hasFlash('error')) : ?>
                        <div class="echo-error">
                            <?php echo Yii::$app->session->getFlash('error') ?>
                        </div>
                    <?php endif; ?>

                    <?php $form = ActiveForm::begin([
                        'id' => 'comment-form',
                        'class' => ''
                    ]) ?>


                    <div class="form-group form-inline">
                        <div class="form-group col-lg-6 col-md-6 name">
                            <?= $form->field($model , 'name' ,['inputOptions' => ['class' => 'form-control']] )->input('name' , ['placeholder' => 'Name'])->label(false) ?>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 email">
                            <?= $form->field($model , 'email' ,['inputOptions' => ['class' => 'form-control']  ] )->input('email' , ['placeholder' => 'Email'])->label(false) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model , 'subject' , [   'inputOptions' => ['class' => 'form-control']  ] )->input('subject' , ['placeholder' => 'Subject'])->label(false) ?>
                    </div>

                    <div class="form-group">
                        <?= $form->field($model , 'message' )->textarea(['rows' => 5 ])->label(false)?>
                    </div>

                    <?= Html::submitButton('Post comment' , ['class' => 'primary-btn submit_btn']) ?>
                    <?php ActiveForm::end() ?>

                </div>
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
                        <h3 class="widget_title">Recommend Posts</h3>

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
                </div>
            </div>
        </div>
    </div>
</section>