<?php
$xheader = ' <link rel="stylesheet" href="../assets/lib/gui/css/css3-buttons.css" type="text/css"  media="screen">
<link rel="stylesheet" href="../assets/lib/gui/tiptip.css" type="text/css"  media="screen">
';
$xfooter = '<script src="../assets/lib/gui/jquery.tiptip.js"></script>
<script src="../assets/js/widgets-loader.sysfrm.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
		
			
			
			$(\'.tiptip a.button, .tiptip button\').tipTip();
		
		});
</script>

';

 require ('sections/header.tpl.php');
  ?>
<div class="container">
<h4 id="status">Admin Summary</h4>
<div class="row-fluid">

<div class="buttons span12">
  
  
  
  
  <div class="tiptip">
    <a href="#system-overview" class="button left" title="Home"><span class="icon icon108"></span></a>
    <a href="#tickets.10" class="button middle" title="Photos"><span class="icon icon148"></span></a>
    <a href="#b" class="button middle" title="Music"><span class="icon icon134"></span></a>
    <a href="#c" class="button right" title="Save"><span class="icon icon67"></span></a>
  </div> <!-- /.tiptip -->
  
  <a href="#d" class="button left"><span class="icon icon22"></span></a>
  <a href="#e" class="button middle"><span class="icon icon177"></span></a>
  <a href="#" class="button right"><span class="icon icon153"></span></a>
  
  <a href="#" class="button on"><span class="icon icon125"></span></a>
  
  <a href="#" class="button left"><span class="icon icon127"></span></a>
  <a href="#" class="button middle"><span class="icon icon84"></span></a>
  <a href="#" class="button right"><span class="icon icon186"></span></a>
</div>


</div>
  <div class="row-fluid">
  
    <div class="span12">
                        <div class="ajx-box">
                            
                            
                            <div class="ajx-box-content inner-content">
                           
                            <div id="pageContent">
                            
    </div>
    
                          
                            </div>
                        </div>
                    </div>
                      
             </div>
             <hr />
             <div class="row-fluid">
            <div class="span12 box">
                <div  class="title">
                    <h3><i class="icon-white icon-bookmark"></i> Last Notification</h3>
                </div>
                <div class="box-content">
                    <div class="content-inner">
                        <ul class="thumbnails">
                            <li class="span3">
                              <div class="thumbnail">
                                <span class="notif-number">4</span> Award Member
                                <hr />
                                <div class="caption">
                                  <p><span class="label label-success">Award</span> <a href="#">John Doe</a></p>
                                  <p><span class="label label-success">Award</span> <a href="#">Jane Doe</a></p>
                                  <p><span class="label label-success">Award</span> <a href="#">Christina</a></p>
                                  <p><span class="label label-success">Award</span> <a href="#">Tarjono</a></p>
                                </div>
                              </div>
                            </li>
                            <li class="span3">
                              <div class="thumbnail">
                                <span class="notif-number">5</span> New Member
                                <hr />
                                <div class="caption">
                                  <p><span class="label label-info">Member</span> <a href="allmember.html">Bejo</a></p>
                                  <p><span class="label label-info">Member</span> <a href="allmember.html">Didi Kempot</a></p>
                                  <p><span class="label label-info">Member</span> <a href="allmember.html">Paimin</a></p>
                                  <p><span class="label label-info">Member</span> <a href="allmember.html">Tukijo</a></p>
                                  <p><span class="label label-info">Member</span> <a href="allmember.html">Jarwo</a></p>  
                                </div>
                              </div>
                            </li>
                            <li class="span3">
                              <div class="thumbnail">
                                <span class="notif-number">7</span> New Order
                                <hr />
                                <div class="caption">
                                  <p><span class="label label-warning">Order</span> <a href="allorder.html">RHJTI8</a></p>
                                  <p><span class="label label-warning">Order</span> <a href="allorder.html">12J832</a></p>
                                  <p><span class="label label-warning">Order</span> <a href="allorder.html">KRTYSL</a></p>
                                  <p><span class="label label-warning">Order</span> <a href="allorder.html">M12345</a></p>   
                                </div>
                              </div>
                            </li>
                            <li class="span3">
                              <div class="thumbnail">
                                <span class="notif-number">10</span> Confirmation of Payment
                                <hr />
                                <div class="caption">
                                  <p><span class="label label-important">Confirm</span> <a href="konfirm.html">XMJWA8</a></p>
                                  <p><span class="label label-important">Confirm</span> <a href="konfirm.html">12J832</a></p>
                                  <p><span class="label label-important">Confirm</span> <a href="konfirm.html">KRTYSL</a></p>
                                  <p><span class="label label-important">Confirm</span> <a href="konfirm.html">M12345</a></p>
                                  <p><span class="label label-important">Confirm</span> <a href="konfirm.html">RHJTI8</a></p>   
                                </div>
                              </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
          </div>
             <hr />
</div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>
