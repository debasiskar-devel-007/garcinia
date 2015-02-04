
<?php
    $baseUrl =  Yii::app()->baseUrl; 
     $condition = 'pr_status = 1';
    $limit = 2;
    //$totalItems = $model->count($condition);

    $criteria = new CDbCriteria(array(
        'condition' => $condition,
        'order' => 'priority DESC',
        'limit' => $limit,
        //'offset' => $totalItems - $limit // if offset less, thah 0 - it starts from the beginning
    ));

    $res = Blog::model()->findAll($criteria);                           
    //$res = Blog::model()->findAll('pr_status=1',array('order'=>'priority desc'));
    foreach($res as $r)
    {
    ?>

    <div class="news-row ">

        <div class="nleft-img" "> <img src="<?php echo $baseUrl;?>/uploads/proimage/thumb/<? echo $r['user_image']; ?>"   alt="#" /></div>
        <div class="nright-text">
            <h3><?php echo $r['postby']?></h3> Posted on <?php
                echo $r['pr_date'];

            ?> 

            <strong><?php echo
                    TextHelper::word_limiter($r['pr_desc'],50 );
            ?></strong><br/>

            <a href="<?php echo $baseUrl ?>/blog/default/details/id/<? echo $r['id'] ?>">View More</a>
            <div style="float:right"> <span class='st_sharethis_large' displayText='ShareThis'></span>
                <span class='st_facebook_large' displayText='Facebook'></span>
                <span class='st_twitter_large' displayText='Tweet'></span>
                <span class='st_linkedin_large' displayText='LinkedIn'></span>
                <span class='st_pinterest_large' displayText='Pinterest'></span>
                <span class='st_email_large' displayText='Email'></span>
            </div>
        </div>

        <div class="clear"></div>
    </div>
    <?php
    }
?>