<?php if(!empty($data)){ ?>
    <div>
        <table border="0">
            <tr>
                <?php 
                    $html="";        
                    //var_dump($data[0]);
                   
                        for($i=0;$i<count($data);$i++){ 
                            echo (($i+1)%3==0)?"<tr>":"";
                            $html.="<td><img src='".$data[$i]."' style='max-width:200px;max-height:200px;'></td>" ;

                        }
                  
                    echo $html;
                ?>
            </tr>
        </table>
    </div>    
    <?php } ?>
