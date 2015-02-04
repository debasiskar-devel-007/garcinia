<?php
    $baseUrl =  Yii::app()->BaseUrl;

$sess = Yii::app()->session['sess_user'];
   
?>


<div class="account-right">
   
   
   <h2>Grab Affiliate Code</h2>
   
<div class="account-text">
     
    <input class="input-medium aff_link" value="<?php echo Yii::app()->getBaseUrl(true)."/user/default/set-affiliate-code/id/".$sess['id'];?>" type="text" readonly="readonly" style="margin: 10px; width:50%">

    <a class="copy-button" href="javascript:void(0);">Copy Home Page URL </a>

<br/>
    <input class="input-medium aff_link1"  value="<?php echo Yii::app()->getBaseUrl(true)."/user/default/set-affiliate-code1/id/".$sess['id'];?>" type="text" readonly="readonly" style="margin: 10px; width:50%">

    <a class="copy-button1" href="javascript:void(0);">Copy Landing Page URL </a>


    <script language="JavaScript">
        $(function(){
            $('.copy-button').each(function(){
                // Disables other default handlers on click (avoid issues)
                $(this).on('click', function(e) {
                    e.preventDefault();

                });

                // Apply clipboard click event
                $(this).clipboard({
                    path: asset_url+'/js/jquery.clipboard.swf',

                    copy: function() {
                        var this_sel = $(this);
                        //alert(8);
                        var str = $(this).prev('.aff_link').val();
                        // var str = str1;

                        // Hide "Copy" and show "Copied, copy again?" message in link
                        //  this_sel.find('.code-copy-first').hide();
                        //  this_sel.find('.code-copy-done').show();

                        // Return text in closest element (useful when you have multiple boxes that can be copied)
                        return str;
                    }
                });

            });

            $('.copy-button1').each(function(){
                // Disables other default handlers on click (avoid issues)
                $(this).on('click', function(e) {
                    e.preventDefault();

                });

                // Apply clipboard click event
                $(this).clipboard({
                    path: asset_url+'/js/jquery.clipboard.swf',

                    copy: function() {
                        var this_sel = $(this);
                        //alert(8);
                        var str = $(this).prev('.aff_link1').val();
                        // var str = str1;

                        // Hide "Copy" and show "Copied, copy again?" message in link
                        //  this_sel.find('.code-copy-first').hide();
                        //  this_sel.find('.code-copy-done').show();

                        // Return text in closest element (useful when you have multiple boxes that can be copied)
                        return str;
                    }
                });

            });


        });
    </script>
     
     
   
   </div>
   
   </div>