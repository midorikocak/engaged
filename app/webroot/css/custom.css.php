<?php
header('Content-type: text/css');

if(isset($_GET['pinBackgroundColor']))
{
    $pinBackgroundColor = $_GET['pinBackgroundColor'];
}
else
{
    $pinBackgroundColor = "white";
}

if(isset($_GET['bodyBackgroundColor']))
{
    $bodyBackgroundColor = $_GET['bodyBackgroundColor'];
}
else
{
    $bodyBackgroundColor = "white";
}

if(isset($_GET['backgroundImage']))
{
    $backgroundImage = $_GET['backgroundImage'];
}
else
{
    $backgroundImage = null;
}

if(isset($_GET['headerBackgroundColor']))
{
    $headerBackgroundColor = $_GET['headerBackgroundColor'];
}
else
{
    $headerBackgroundColor = "white";
}

?>

header
{
    background-color: <?php echo $headerBackgroundColor; ?>;
    -moz-box-shadow: 0 0 20px #666;
    -webkit-box-shadow: 0 0 20px#666;
    box-shadow: 0 0 20px #666;
}

body
{
    <?php
    if($backgroundImage!=null)
    {
        echo "background-image: url('../img/".$backgroundImage."');";
    }
    ?>
    background-color: <?php echo $pinBackgroundColor; ?>;
}

#logo
{
    padding-top: 15px;
    text-align: center;
}

#logo img
{
    display: block;
    margin-left: auto;
    margin-right: auto 
}

.modal-body img
{
    display: block;
    margin-left: auto;
    margin-right: auto 
}

.modal-body p
{
    text-align: center;
}

.modal-header h3
{
    text-align: center;
}

.pin
{
    background-color:<?php echo $pinBackgroundColor; ?>;
    margin-top:10px;
    padding: 15px;
    box-shadow: 0 1px 3px rgba(34,25,25,0.4);
    -moz-box-shadow: 0 1px 2px rgba(34,25,25,0.4);
    -webkit-box-shadow: 0 1px 3px rgba(34,25,25,0.4);
}

.pin p
{
    text-align: center;
}

.pinLabel
{
    background-color:<?php echo $pinBackgroundColor; ?>;
    padding:5px;
    box-shadow: 0 1px 3px rgba(34,25,25,0.4);
    -moz-box-shadow: 0 1px 2px rgba(34,25,25,0.4);
    -webkit-box-shadow: 0 1px 3px rgba(34,25,25,0.4);
}

.pin img
{
    margin-bottom:5px;
}


/* FL UI */

.section {
    margin-top:20px;
    background-color: #fff;
    border: 1px solid #ccc;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
    margin-bottom: 18px;
}

.section-header {
    background-color: #f6f6f6;
    background-image: -moz-linear-gradient(top, #fafafa, #f2f2f2);
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#fafafa), to(#f2f2f2));
    background-image: -webkit-linear-gradient(top, #fafafa, #f2f2f2);
    background-image: -o-linear-gradient(top, #fafafa, #f2f2f2);
    background-image: linear-gradient(to bottom, #fafafa,#f2f2f2);
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFAFAFA', endColorstr='#FFF2F2F2', GradientType=0);
    border-top: 1px solid #fff;
    border-bottom: 1px solid #ccc;
    -moz-border-radius-topleft: 4px;
    -webkit-border-top-left-radius: 4px;
    border-top-left-radius: 4px;
    -moz-border-radius-topright: 4px;
    -webkit-border-top-right-radius: 4px;
    border-top-right-radius: 4px;
    height: 46px;
    padding: 0 15px 0;
}

.section-actions {
    float: right;
    margin-top: 9px;
    margin-bottom: 0;
}

.section-body {
    min-height: 18px;
    padding: 9px 15px 0;
}

.form-actions {
    padding: 17px 20px 18px;
    margin-top: 18px;
    margin-bottom: 18px;
    background-color: #f5f5f5;
    border-top: 1px solid #e5e5e5;
}

.section-actions {
float: right;
margin-top: 9px;
margin-bottom: 0;
}

.section-header h3 {
line-height: 28px;
}

.section-header h3, .section-header h5 {
color: #555;
float: left;
text-transform: uppercase;
text-shadow: 1px 1px 0 #fff;
}

div#aligned
{
position:relative;
}

div.vertical
{
    position:absolute; top:50%; height:10em;
    margin:15px;
}

.thumbnail
{
    margin-top:10px;
}

#submenu
{
    width:202px;
}

#small
{
    margin-bottom: 0px !important;
}


.modal form
{
    margin:0px !important;
}

.modal form
{
    margin:0px !important;
}

.modal .form-actions
{
    margin-bottom:0px !important;
}

.form-actions.no-bottom
{
    margin-bottom:0px !important;
}

#notification
{
    width: 20px !important;
    height: 20px !important;
    padding:3px;
}

.actionButtons
{
    margin-top:10px !important;
}

ul.nav li.dropdown:hover > ul.dropdown-menu{
    display: block;    
}