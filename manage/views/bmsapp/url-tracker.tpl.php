<?php
$xfooter = '<script>
$(\'#ajxspin\').css(\'visibility\',\'hidden\');
				$(\'[data-toggle="modal"]\').click(function(e) {
	e.preventDefault();
	$(\'#ajxspin\').css(\'visibility\',\'visible\');
	var url = $(this).attr(\'href\');
	if (url.indexOf(\'#\') == 0) {
		$(url).modal(\'open\');
	} else {
		$.get(url, function(data) {
			$(\'<div class="modal hide fade">\' + data + \'</div>\').modal();
		}).success(function() {
			$(\'#ajxspin\').css(\'visibility\',\'hidden\');
			 });
	}
});</script>';


?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">
         <form class="form-horizontal" action="<?php echo $self; ?>" method="post">  
        <fieldset>  
          <legend><?php echo $_L['urlTracker'];?></legend>  
          <div class="control-group">  
            <label class="control-label" for="url"><?php echo $_L['originalLink'];?></label>  
            <div class="controls">  
              <input name="url" type="text" class="input-xlarge" id="url">  
               
            </div>  
          </div>  
          
          <div class="control-group">  
            <label class="control-label" for="input01"><?php echo $_L['shortName'];?></label>  
            <div class="controls">  
              <input name="url_name" type="text" class="input-xlarge" id="input01">  
               
            </div>  
          </div>
            
          <div class="control-group">  
            <label class="control-label" for="type"><?php echo $_L['selectList'];?></label>  
            <div class="controls">  
              <select id="type"  name="type">  
               <option selected="selected" value="301">301 Permanent Redirect</option><option value="302">302 Temporary Redirect</option>
              </select>  
            </div>  
          </div>  
            
            
            
          <div class="form-actions">  
           <input type="hidden" value="1" name="url_submitted"/>
            <input name="submit" type="submit" value="Add URL"  class="btn btn-primary"> 
            <input type="reset" class="btn" value="Clear Form">
            
          </div>  
        </fieldset>  
</form> 
 <?php if (isset($_GET['pre_delete'])) { ?>
            <p class="alert">Are you sure you want to delete the link <strong><?php echo SITE_URL; ?>/<?php echo prepOutputText($_GET['pre_delete']) ?></strong> ?  <a class="btn btn-danger" href="?delete=<?php echo prepOutputText($_GET['pre_delete']) ?>">Yes</a> | <a class="btn btn-primary"  data-dismiss="alert" href="">No</a></p>
            <?php } ?>	
				<?php if ($view == 'stats') { ?>                                
                <h2>Statistics for <strong><?php echo $summary->url_name; ?></strong></h2>
					<?php if ($summary->total_clicks > 0) { ?>
                        <div id="click-summary" align="left">
                            <h3>Clicks</h3>                    
                            <table cellspacing="0" cellpadding="2" border="0" class="border"><tbody>                	
                                <tr>
                                    <td class="border"><strong>Month</strong></td>
                                    <td class="border"><strong>Clicks</strong></td>
                                </tr>
                                <?php $summary->showClicks(); ?>
                                <tr>
                                    <td class="border">Total:</td>
                                    <td class="border"><?php echo $summary->total_clicks; ?></td>
                                </tr>
                            </tbody></table>
                            <h3>Top Referring Sites</h3>
                            <table cellspacing="0" cellpadding="2" border="0" class="border"><tbody>                	
                                <tr>
                                    <td class="border"><strong>Referrer</strong></td>
                                    <td class="border"><strong>Clicks</strong></td>
                                </tr>
                                <?php $summary->showReferrers(); ?>                    
                                <tr>
                                    <td class="border">Total:</td>
                                    <td class="border"><?php echo $summary->total_clicks; ?></td>
                                </tr>
                            </tbody></table>
                            <h3>Browsers</h3>
                            <table cellspacing="0" cellpadding="2" border="0" class="border"><tbody>                	
                                <tr>
                                    <td class="border"><strong>Browser</strong></td>
                                    <td class="border"><strong>Clicks</strong></td>
                                </tr>
                                <tr>
                                    <td class="border">Internet Explorer</td>
                                    <td class="border"><?php echo $summary->b_ie; ?></td>
                                </tr>						                  
                                <tr>
                                    <td class="border">Mozilla Firefox</td>
                                    <td class="border"><?php echo $summary->b_firefox; ?></td>
                                </tr>						                  
                                <tr>
                                    <td class="border">Webkit (Safari/Chrome)</td>
                                    <td class="border"><?php echo $summary->b_webkit; ?></td>
                                </tr>						                  
                                <tr>
                                    <td class="border">Opera</td>
                                    <td class="border"><?php echo $summary->b_opera; ?></td>
                                </tr>						                  
                                <tr>
                                    <td class="border">Bots/Unknown</td>
                                    <td class="border"><?php echo $summary->b_none; ?></td>
                                </tr>						                  
        
                                <tr>
                                    <td class="border">Total:</td>
                                    <td class="border"><?php echo $summary->total_clicks; ?></td>
                                </tr>
                            </tbody></table>  					                                          
                            <h3>Operating Systems</h3>  
                            <table cellspacing="0" cellpadding="2" border="0" class="border"><tbody>                	
                                <tr>
                                    <td class="border"><strong>Operating System</strong></td>
                                    <td class="border"><strong>Clicks</strong></td>
                                </tr>
                                <tr>
                                    <td class="border">Windows</td>
                                    <td class="border"><?php echo $summary->o_win; ?></td>
                                </tr>						                  
                                <tr>
                                    <td class="border">Mac</td>
                                    <td class="border"><?php echo $summary->o_mac; ?></td>
                                </tr>						                  
                                <tr>
                                    <td class="border">Linux</td>
                                    <td class="border"><?php echo $summary->o_linux; ?></td>
                                </tr>						                  
                                <tr>
                                    <td class="border">Bots/Unknown</td>
                                    <td class="border"><?php echo $summary->o_none; ?></td>
                                </tr>						                  
                                <tr>
                                    <td class="border">Total:</td>
                                    <td class="border"><?php echo $summary->total_clicks; ?></td>
                                </tr>
                            </tbody></table> 
                        </div>                                                     
                    <?php } else { ?>
                        <p>No clicks yet!</p>
                    <?php } ?>
                <?php } else if ($view == 'edit') { ?>
                 <h2>Edit <strong><?php echo $edit->url_name; ?></strong></h2>
                    <form action="<?php echo $self; ?>" method="post" id="url-form">
                        <label>Original Link</label><input type="text" name="url" size="50" value="<?php echo $edit->url; ?>" /><br />                        
                        <label>Type</label><select name="type"><option <?php if ($edit->type == '301') { echo 'selected="selected"'; } ?> value="301">301 Permanent Redirect</option><option <?php if ($edit->type == '302') { echo 'selected="selected"'; } ?> value="302">302 Temporary Redirect</option></select><br />
                        <input type="hidden" value="1" name="edit_submitted"/>
                        <input type="hidden" value="<?php echo $edit->url_name; ?>" name="url_name"/>
                        <input type="submit" value="Update" class="btn btn-primary" id="form-button"/>
                    </form>
                <?php } else { ?>               	
               
               
				<?php } ?>
      
 
<table class="table table-striped">  
        <thead>  
          <tr>  
            <th><?php echo $_L['linkName'];?></th>  
            <th><?php echo $_L['clicks'];?></th>  
            <th><?php echo $_L['option'];?></th>  
            
          </tr>  
        </thead>  
        <tbody>  
         <?php showLinkHistory(); ?> 
         
        </tbody>  
      </table>    
           

    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
