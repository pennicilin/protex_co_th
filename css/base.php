<?php
header('content-type: text/css');
/* http://meyerweb.com/eric/tools/css/reset/ 
   v2.0 | 20110126
   License: none (public domain)
*/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
	font-size:75%;
	font-family: tahoma,arial,sans-serif;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}


#cssmenu > ul li {
  display: inline-block;
  *display: inline;
  zoom: 1;
}
#cssmenu > ul li.right {
  float: right;
}
#cssmenu > ul li.has-sub {
  position: relative;
}
#cssmenu > ul li.has-sub:hover ul {
  display: block;
}
#cssmenu > ul li.has-sub ul {
  display: none;
  width: 250px;
  position: absolute;
  margin: 0;
  padding: 0;
  list-style-type: none;

}
#cssmenu > ul li.has-sub ul li {
  display: block;
}


#cssmenu > ul li a {
  display: block;
  padding: 12px 24px 11px 24px;

}








@font-face {
    font-family: 'psl_display_proregular';
    src: url('psl029pro_0-webfont.eot');
    src: url('psl029pro_0-webfont.eot?#iefix') format('embedded-opentype'),
         url('psl029pro_0-webfont.woff') format('woff'),
         url('psl029pro_0-webfont.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'psl_display_probold';
    src: url('psl030pro_0-webfont.eot');
    src: url('psl030pro_0-webfont.eot?#iefix') format('embedded-opentype'),
         url('psl030pro_0-webfont.woff') format('woff'),
         url('psl030pro_0-webfont.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'psl_display_proitalic';
    src: url('psl031pro_0-webfont.eot');
    src: url('psl031pro_0-webfont.eot?#iefix') format('embedded-opentype'),
         url('psl031pro_0-webfont.woff') format('woff'),
         url('psl031pro_0-webfont.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'psl_display_probold_italic';
    src: url('psl032pro_0-webfont.eot');
    src: url('psl032pro_0-webfont.eot?#iefix') format('embedded-opentype'),
         url('psl032pro_0-webfont.woff') format('woff'),
         url('psl032pro_0-webfont.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;

}
/* End Html Reset */



.main{width:100%;}
#men{background:url("../images/bg-men.jpg") repeat scroll center 0; overflow:hidden;height: 800px;}
#header{width:100%;float:left;clear:both;  border-top: 7px solid #003A9B;   position: relative;z-index:10;}
#sub-header{width:1170px;margin:0 auto;     padding-bottom: 15px;    padding-top: 15px; }
#logo{float:left;width:196px;}
#container{float:left;clear:both;width:100%;}
#footer {
    border-top: 3px solid #EFEFEF;
    clear: both;
    float: left;

    padding-top: 45px;
    width: 100%;
	 background: none repeat scroll 0 0 #FFFFFF;
}
.top-menu{float:right;width:974px; margin-top: 20px;}
.top-menuul{float:right;}
.top-menuul li{
float:left;
width:150px;
   line-height: 60px;
    text-align: center;
}
.top-menu ul li a{
color:#003a9b;
text-decoration: none;
    text-transform: none;
	   font-family: psl_display_proregular;
    font-size: 25px;
}

#product .level-2 li.mega{
background:url("../images/menu.png") repeat scroll 0 0 !important;    
border: medium none;
    display: block;
    height: 190px;
    left: -110px;
    position: relative;
    width: 748px !important;
	}

.family-bar  li {
    float: left;
}
.family-bar {
    width: 100% !important;
}
#sub-men{
    margin-left: 271px;
}
#nav {
    float: right;
}
#slider{
    position: relative;
    z-index: 0;
}
#men .top-menu ul li a{color:#fff;}
.level-2 a {color:#000 !important;}
#breadcrumb{background-color:#1d96d3;width:100%;color:#FFF;float:left;    height: 75px;  margin-top: 20px;}
#breadcrumb-detail{width:1170px;margin:0 auto;}
#navigation-list{clear: both;float: left;  margin-top: 7px;}
#head-section{clear: both;float: left;   font-family: psl_display_probold;    font-size: 40px; margin-top: 10px;}
ul.crumb li{float:left; font-size: 13px;}
#sub-content{margin: 0 auto;  width: 1170px;}
#main-box {margin: 0 auto; width: 1170px;margin: 30px auto 0;}

#box1{    float: left;    width: 270px;}
#box2{    float: left;    width: 424px;margin-left: 30px;}
#box3{    float: left;    width: 421px;margin-left: 25px;}
.footer-detail{   margin: 0 auto;    width: 1170px;}
.social{float:right;}
.copyright {float: left; line-height: 20px;width: 777px; color: #ACACAC;}
#content-family{ font-family: psl_display_proregular;   font-size: 24px; text-align: center; margin-bottom: 50px; color: #666666;}
.left-box{float:left;  width: 670px;}
.left-box h2{    color: #003A9B;    font-family: psl_display_probold;    font-size: 35px;text-align: center;  }
.right-box{float:left; width: 500px;}
.font-bold{font-family: psl_display_probold;}


#article-view li {
    border-bottom: 3px solid #EFEFEF;
    clear: both;
    float: left;
    padding-bottom: 30px;
	margin-top: 20px;
}

.health-head {
    color: #003A9B;
    float: left;
    font-family: psl_display_probold;
    font-size: 35px;
    height: 40px;
    text-align: left;
    width: 215px;
}

.btn-more {
    float: right;
    height: 40px;
}
.img-article {
    float: left;
    width: 215px;
}
#family .text-article {    float: left;  margin-left:20px;  width: 265px;}
#family .text-article p{color:#999999;  line-height: 17px;}
#family .text-article h2{  font-family: psl_display_probold;    font-size: 25px;    color: #003A9B;}
.family-bar #sub-family a{ background: url("../images/arrow.jpg") no-repeat scroll 0 6px transparent; font-family: psl_display_proregular;color:#3b67b0;    margin: 0;    padding: 0 0 0 25px !important;}
.family-bar #sub-men a{ background: url("../images/arrow-men.png") no-repeat scroll 0 6px transparent; font-family: psl_display_proregular;color:#FFF !important;    margin: 0;    padding: 0 0 0 25px !important;}
.family-bar {left: 205px;top: 65px;}
#article-menu ul{
background:url("../images/bg-menu.png") no-repeat scroll 0 0 !important;    
border: medium none;

    left: 25px;
    position: relative;
	display: block;
    height: 125px;
    padding-left: 20px !important;
    padding-top: 25px !important;
    width: 220px !important;
}
#article-menu ul li{float:left;clear:both; margin-top: 10px;}
#article-menu li a{ background: url("../images/arrow.jpg") no-repeat scroll 0 6px transparent; font-family: psl_display_proregular;color:#3b67b0;    margin: 0;    padding: 0 0 0 25px !important;}
.btn-more {
    background: url("../images/btn_more.jpg") no-repeat scroll 0 0 transparent;
    cursor: pointer;
    height: 26px;
    text-align: left;
    text-indent: -9999px;
    width: 98px;
}
#men .btn-more {
    background: url("../images/btn_more_men.png") no-repeat scroll 0 0 transparent;
	}
 .level-2 {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: medium none;
    display: block;
    width: 748px;
}
#nav li a:hover span{border-bottom: 3px solid #003A9B ;}
.family-bar a:hover {
    text-decoration: underline !important;
}
/*End-Family*/
#men #breadcrumb{background-color:#3A5A7F;width:100%;color:#FFF;float:left;    height: 75px;  margin-top: 20px;}
#content-men{ font-family: psl_display_proregular;   font-size: 24px; text-align: center; margin-bottom: 50px; color: #fff;}
#men .left-box h2{color: #FFF;}
#men .health-head {
    color: #FFF;
    float: left;
    font-family: psl_display_probold;
    font-size: 35px;
    height: 40px;
    text-align: left;
    width: 215px;
}

#men .text-article h2 {
    color: #FFF;
    font-family: psl_display_probold;
    font-size: 25px;
}
#men .text-article {    float: left;  margin-left:20px;  width: 265px;}
#men .text-article p{color:#FFF;  line-height: 17px;}
#men .text-article h2{  font-family: psl_display_probold;    font-size: 25px;    color: #FFF;}
#article-main{
    margin: 0 auto;
    width: 1170px;
	padding-top: 25px;
}
#article-details{
    float: left;
	    max-height: 399px;
    overflow: auto;
    width: 860px;
}
#article-details p{   font-size: 13px;    line-height: 24px;}
#article-details h2{
font-family: psl_display_probold;    font-size: 25px;    color: #003A9B; margin-bottom: 15px;
}
.line-art{
float:left;
background: url("../images/line-bg.png") no-repeat scroll 0 0 transparent;
    height: 418px;
    width: 20px;
	margin: 0 10px;
}
#right-panel{
    float: left;
    width: 260px;
}
#right-panel  h2{font-family: psl_display_probold;    font-size: 30px;    color: #1d96d3;}
#right-panel ul li{    border-bottom: 1px solid #EEEEEE;
    clear: both;
    float: left;
    padding: 10px 0;
    width: 270px;
	}
#activity #right-panel ul li{ width: 272px !important;padding:0px !important;  }
#activity #right-panel ul li a{background:none !important; width: 272px !important;margin:20px  0!important;padding:0px !important;   float: left;}
#activity-main #right-panel ul li a{font-family: psl_display_proregular;   font-size: 24px; color:#555555; background: url("../images/arrow-art.jpg") no-repeat scroll 0 6px transparent !important;      padding-left: 21px !important;}

#activity-main{    margin: 20px auto;    width: 1170px;}
#activity-details{
    float: left;
    width: 830px;
}