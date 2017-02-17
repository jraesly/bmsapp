<?php
$xheader='<link rel="stylesheet" type="text/css" href="../assets/css/left-nav.style.css">
<link rel="stylesheet" type="text/css" href="../assets/lib/prism/prism.css">

';
$xfooter = '<script src="../assets/js/filter.sysfrm.js" type="text/javascript"></script>
<script src="../assets/js/filter.sysfrm.js" type="text/javascript"></script>
<script src="../assets/lib/prism/prism.js" type="text/javascript"></script>
';

?>
<?php require ('sections/header.tpl.php'); ?>
    <div class="container">

        <div id="left-nav" class="hidden-phone">
			<?php require ('sections/dev-tools.section.tpl.php'); ?>
		</div>
 
        <div class="right-container">
        <div class="span8">
        <h4>Admin Portal UI</h4>
        <p>Customized twitter bootstrap css framework is used for designing User Interface</p>
        <p></p>
         <p>Here is the css code available on assets/css/adminstyle.css</p>
          <p></p>
        </div>
       <pre style="width:100%"><code class="language-css">body {
	padding-top: 65px;
	padding-bottom: 20px;
}

.navbar a > i {
	opacity: 0.5;
}

.navbar a:hover > i {
	opacity: 1;
}

section {
	margin-top: 30px;
}

.subhead {
	padding-bottom: 0;
	margin-bottom: 9px;
}

.subhead h1 {
	font-size: 40px;
}

.subnav {
	margin-bottom: 10px;
	width: 100%;
	height: 36px;
	background-color: #eeeeee; /* Old browsers */
	background-repeat: repeat-x; /* Repeat the gradient */
	background-image: -moz-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%); /* FF3.6+ */
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f5f5f5), color-stop(100%,#eeeeee)); /* Chrome,Safari4+ */
	background-image: -webkit-linear-gradient(top, #f5f5f5 0%,#eeeeee 100%); /* Chrome 10+,Safari 5.1+ */
	background-image: -ms-linear-gradient(top, #f5f5f5 0%,#eeeeee 100%); /* IE10+ */
	background-image: -o-linear-gradient(top, #f5f5f5 0%,#eeeeee 100%); /* Opera 11.10+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f5f5f5', endColorstr='#eeeeee',GradientType=0 ); /* IE6-9 */
	background-image: linear-gradient(top, #f5f5f5 0%,#eeeeee 100%); /* W3C */
	border: 1px solid #e5e5e5;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
}

.subnav .nav {
	margin-bottom: 0;
}

.subnav .nav > li > a {
	margin: 0;
	padding-top:    11px;
	padding-bottom: 11px;
	border-left: 1px solid #f5f5f5;
	border-right: 1px solid #e5e5e5;
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;
}

.subnav .nav > .active > a,
.subnav .nav > .active > a:hover {
	padding-left: 13px;
	color: #777;
	background-color: #e9e9e9;
	border-right-color: #ddd;
	border-left: 0;
	-webkit-box-shadow: inset 0 3px 5px rgba(0,0,0,.05);
	-moz-box-shadow: inset 0 3px 5px rgba(0,0,0,.05);
	box-shadow: inset 0 3px 5px rgba(0,0,0,.05);
}

.subnav .nav > .active > a .caret,
.subnav .nav > .active > a:hover .caret {
	border-top-color: #777;
}

.subnav .nav > li:first-child > a,
.subnav .nav > li:first-child > a:hover {
	border-left: 0;
	padding-left: 12px;
	-webkit-border-radius: 4px 0 0 4px;
	-moz-border-radius: 4px 0 0 4px;
	border-radius: 4px 0 0 4px;
}

.subnav .nav > li:last-child > a {
	border-right: 0;
}

.subnav .dropdown-menu {
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
}

.tooltip-inner {
	max-width: 500px;
}

.hero-unit {
	margin-bottom: 10px;
	text-align: center;
}

.hero-unit h1,
.hero-unit p {
	margin-bottom: 15px;
}

#social {
	display: inline-block;
	margin-top: 45px;
	text-align: center;
}

#gh-star {
	margin-right: 10px;
}

.twitter-follow-button {
	width: 60px !important;
}

.twitter-share-button  {
	margin-right: 15px;
}

.rss-button {
	width: 40px;
	height: 14px;
	font-size: 11px;
	line-height: 14px;
	font-weight: bold;
	margin: 0 0 10px;
	padding: 2px 5px 2px 4px;
}

.icon-rss {
	background: url(../img/rss-icons.png) no-repeat 0 0;
	opacity: .65;
	width: 16px;
}

#ticker {
	margin-bottom: 40px;
}

.about {
	margin-top: 20px;
}

.about > div {
	margin-bottom: 20px;
}

.about h3 {
	margin: 0 0 5px 35px;
}

.about img {
	float: left;
	margin-top: 5px;
	opacity: 0.7;
}

#gallery {
	margin: 45px 0 30px 0;
	padding-right: 20px;
	text-align: center;
}

.thumbnail {
	margin-bottom: 20px;
	background-color: rgba(0, 0, 0, 0.05);
}

.thumbnail img {
	width: 100%;
	-webkit-border-radius: 7px;
	-moz-border-radius: 7px;
	border-radius: 7px;
}

.thumbnail .caption {
	color: inherit !important;
}

.thumbnail h3 {
	margin-bottom: 0;
}

.thumbnail .btn-toolbar {
	margin-top: 15px;
	text-align: right;
}

.links {
	margin-bottom: 20px;
}

.links > a {
	margin-right: 10px;
} 

div.one .bsa_it_ad {
	padding: 25px 25px 15px 25px;
}

div.one .bsa_it_p {
	display: none;
}

.bsa {
	float: right;
	max-width: 400px;
	padding: 0;
}

body .one .bsa_it_ad {
	margin-bottom: -10px;
	background: none;
	border: none;
	font-family: inherit;
	color: inherit;
}

body .one .bsa_it_ad .bsa_it_t,
body .one .bsa_it_ad .bsa_it_d {
	color: inherit;
	font-size: inherit;
}

body .one .bsa_it_p {
	display: none;
}

.links {
	margin-bottom: 20px;
}

.links > a {
	margin-right: 10px;
}

@media (max-width: 480px) {

	.hero-unit {
		padding: 20px 20px 0;
		margin: 0 0 20px;
	}

	.hero-unit h1 {
		font-size: 36px;
	}

	.hero-unit iframe {
		margin-right: 0 !important;
	}

	#social {
		margin-top: 0px;
		margin-bottom: 20px;
	}

	#social > span {
		display: block;
	}

	.about {
		margin-top: 0;
	}

	.about h3 {
		margin-top: 20px;
	}

	.about p {
		margin-bottom: 0;
	}

	.modal {
		position: fixed !important;
		top: 25% !important;
	}
}

/* Landscape phone to portrait tablet */
@media (min-width: 481px) and (max-width: 767px) {

	.hero-unit {
		margin-top: 0;
		padding: 30px;
	}

	.about {
		margin-top: 0;
	}
}

@media (max-width: 767px) {

	body {
		padding-top: 0;
	}

	.subnav {
		position: static;
		top: auto;
		z-index: auto;
		width: auto;
		height: auto;
		background: #fff; /* whole background property since we use a background-image for gradient */
		-webkit-box-shadow: none;
		-moz-box-shadow: none;
		box-shadow: none;
	}

	.subnav .nav > li {
		float: none;
	}

	.subnav .nav > li > a {
		border: 0;
	}

	.subnav .nav > li + li > a {
		border-top: 1px solid #e5e5e5;
	}

	.subnav .nav > li:first-child > a,
	.subnav .nav > li:first-child > a:hover {
		-webkit-border-radius: 4px 4px 0 0;
		-moz-border-radius: 4px 4px 0 0;
		border-radius: 4px 4px 0 0;
	}

	.bsa {
		float: none;
	}
}

/* Portrait tablet to landscape and desktop */
@media (min-width: 768px) and (max-width: 979px) {

	.hero-unit {
		margin-top: 0;
	}

	.thumbnail p {
		font-size: 12px;
	}

	.thumbnail .btn {
		padding: 8px 12px;
		font-size: 12px;
	}
}

/* Fixed subnav on scroll, but only for 980px and up (sorry IE!) */
@media (min-width: 980px) {
	.subnav-fixed {
		position: fixed;
		top: 20px;
		left: 0;
		right: 0;
		z-index: 1020; /* 10 less than .navbar-fixed to prevent any overlap */
		border-color: #d5d5d5;
		border-width: 0 0 1px; /* drop the border on the fixed edges */
		-webkit-border-radius: 0;
		-moz-border-radius: 0;
		border-radius: 0;
		-webkit-box-shadow: inset 0 1px 0 #fff, 0 1px 5px rgba(0,0,0,.1);
		-moz-box-shadow: inset 0 1px 0 #fff, 0 1px 5px rgba(0,0,0,.1);
		box-shadow: inset 0 1px 0 #fff, 0 1px 5px rgba(0,0,0,.1);
		filter: progid:DXImageTransform.Microsoft.gradient(enabled=false); /* IE6-9 */
	}
	.subnav-fixed .nav {
		width: 938px;
		margin: 0 auto;
		padding: 0 1px;
	}
	.subnav .nav > li:first-child > a,
	.subnav .nav > li:first-child > a:hover {
		-webkit-border-radius: 0;
		-moz-border-radius: 0;
		border-radius: 0;
	}
}

@media (min-width: 768px) and (max-width: 979px) {

	/* Remove any padding from the body */
	body {
		padding-top: 0;
	}
}

@media (min-width: 1210px) {

	.subnav-fixed .nav {
		width: 1168px; /* 2px less to account for left/right borders being removed when in fixed mode */
	}
}
/*   #PART# FooTable  */
.footable > thead > tr > th,.footable > thead > tr > td {
  position: relative;
}

.footable {
  
  width: 100%;
  border: solid #ccc 1px;
  -moz-border-radius: 0px;
  -webkit-border-radius: 0px;
  border-radius: 0px;
  font-family: 'trebuchet MS' , 'Lucida sans' , Arial;
  font-size: 14px;
  color: #444;
  -webkit-box-shadow: 1px 1px 5px rgba(50, 50, 50, 0.75);
-moz-box-shadow:    1px 1px 5px rgba(50, 50, 50, 0.75);
box-shadow:         1px 1px 5px rgba(50, 50, 50, 0.75);
}

.footable.breakpoint > tbody > tr > td.expand {
  background: url('../img/plus.png') no-repeat 5px center;
  padding-left: 40px;
}

.footable.breakpoint > tbody > tr.footable-detail-show > td.expand {
  background: url('../img/minus.png') no-repeat 5px center;
}

.footable.breakpoint > tbody > tr.footable-row-detail {
  background: #eee;
}

.footable > tbody > tr:hover {
  background: #e5f3fb;
 /* border:2px solid #70c0e7; */
  text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
             0px 8px 13px rgba(0,0,0,0.1),
             0px 18px 23px rgba(0,0,0,0.1);
}

.footable.breakpoint > tbody > tr:hover:not(.footable-row-detail) {
  cursor: pointer;
}

.footable > tbody > tr > td, .footable > thead > tr > th {
  border-left: 1px solid #ccc;
  border-top: 1px solid #ccc;
  padding: 10px;
  text-align: left;
}

.footable > thead > tr > th, .footable > thead > tr > td {
 background: #FAFBFC;
	background-image:-moz-linear-gradient(center top , #FAFBFC, #E2E5E9);
	background-image: -webkit-gradient(linear, left top, left bottom, from(#FAFBFC), to(#E2E5E9));
	
	font-size: 11px;
	padding: 7px 4px;
	text-shadow:1px 1px 1px white;
}

.footable > thead > tr > th:first-child, .footable > thead > tr > td:first-child {
  -moz-border-radius: 6px 0 0 0;
  -webkit-border-radius: 6px 0 0 0;
  border-radius: 6px 0 0 0;
}

.footable > thead > tr > th.footable-last-column, .footable > thead > tr > td.footable-last-column {
  -moz-border-radius: 0 6px 0 0;
  -webkit-border-radius: 0 6px 0 0;
  border-radius: 0 6px 0 0;
}

.footable > thead > tr > th:only-child, .footable > thead > tr > td:only-child {
  -moz-border-radius: 6px 6px 0 0;
  -webkit-border-radius: 6px 6px 0 0;
  border-radius: 6px 6px 0 0;
}

.footable > tbody > tr:last-child > td:first-child {
  -moz-border-radius: 0 0 0 6px;
  -webkit-border-radius: 0 0 0 6px;
  border-radius: 0 0 0 6px;
}

.footable > tbody > tr:last-child > td.footable-last-column {
  -moz-border-radius: 0 0 6px 0;
  -webkit-border-radius: 0 0 6px 0;
  border-radius: 0 0 6px 0;
}

.footable > tbody img {
  vertical-align:middle;
}
.footable > thead > tr > th > span.footable-sort-indicator {
  width: 16px;
  height: 16px;
  display: block;
  float:right;
  background: url('../img/sorting_sprite.png') no-repeat top left;
}

.footable > thead > tr > th.footable-sortable:hover {
  cursor:pointer;
}

.footable > thead > tr > th.footable-sortable > span {
  
}

.footable > thead > tr > th.footable-sorted > span.footable-sort-indicator {
  background-position: 0 -16px;
}

.footable > thead > tr > th.footable-sorted-desc > span.footable-sort-indicator {
  background-position: 0 -32px;
}

/*
style the nav bar
*/

    .navbar-inner {
        background: #3892b9;
		background: linear-gradient(top, #3892b9 0%,#057cab 100%);
		background: -webkit-linear-gradient(top, #3892b9 0%,#057cab 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#3892b9), color-stop(100%,#057cab));
		 background: -moz-linear-gradient(top, #3892b9 0%, #057cab 100%);
        background: -o-linear-gradient(top, #3892b9 0%,#057cab 100%);
        background: -ms-linear-gradient(top, #3892b9 0%,#057cab 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3892b9', endColorstr='#057cab',GradientType=0 );
    }
    .navbar .nav > li > a {
        color: #bfdbe7;
    }
    .navbar .nav > li:hover > a {
        color:#fff;
    }
    .navbar .nav .active > a, .navbar .nav .active > a:hover {
        background: #206281 !important;
    }
    
	
	.navbar .caret {opacity: .6; filter: alpha(opacity=60)}
	/*
	Loading Spinner
	*/

.buttons {
			background: #F1F1F1;
			padding: 0px;
			border: 1px solid #D2D2D2;
			
			
		}


/* ajax box*/
.ajx-box {
	border: 1px solid #D2D2D2;
	border-color:#999;
	background:#fff;
}
.ajx-box-content.inner-content {
	padding:10px
}

/* custom */</code></pre>

      
        </div>
    </div><!-- /container -->
<?php require ('sections/footer.tpl.php'); ?>