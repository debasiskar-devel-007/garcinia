<?php

    $base = yii::app()->getBaseUrl(true);
$result=Sport::model()->findAll('id ='.$id.' And isactive=1');

//var_dump($result);
$parent= $result[0]['sport_parentcategory'];

$res = Sport::model()->findAll('sport_parentcategory ='.$id.' And isactive=1 And show1=1');
$c_count = count ( $res );
if($c_count == 0)
    $res = Sport::model()->findAll('sport_parentcategory ='.$parent.' And isactive=1 And show1=1');



foreach($res as $r)
    {


    ?>

        <li style="margin: 4px 0;"><img src="<?php echo $base;?>/uploads/sports_image/additional/thumb/<?php echo $r['additional_image'] ?>"   alt="#" />
            <h2><?php echo $r['sport_name']?></h2>
              
            
                                                  <span>
                                    
                                    <!--<div class="text-div">Bro, those sets were so damn fast and huge. Thanks for the killer </div> -->
                                    
                                    <div class="more"><a class="slink" href="<?php echo $base ?>/sportsmanager/default/index/id/<?php echo $r['id'] ?>/name/<?php echo $r['sport_name'] ?>">MORE &raquo;</a> <div>

                                            <div class="clear"></div>
                                    
                                    </span>



        </li>

    <?php
    }

if(count ( $res ) < 4){
    foreach($res as $r)
    {


        ?>

        <li style="margin: 4px 0;"><img src="<?php echo $base;?>/uploads/sports_image/additional/thumb/<?php echo $r['additional_image'] ?>"   alt="#" />
            <h2><?php echo $r['sport_name']?></h2>


                                                  <span>

                                    <!--<div class="text-div">Bro, those sets were so damn fast and huge. Thanks for the killer </div> -->

                                    <div class="more"><a class="slink" href="<?php echo $base ?>/sportsmanager/default/index/id/<?php echo $r['id'] ?>/name/<?php echo $r['sport_name'] ?>">MORE &raquo;</a> <div>

                                            <div class="clear"></div>

                                    </span>



        </li>

    <?php
    }

}

?>