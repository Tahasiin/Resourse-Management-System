
<!-- Bootstrap core CSS     -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

<!-- Animation library for notifications   -->
<link href="assets/css/animate.min.css" rel="stylesheet"/>

<!--  Light Bootstrap Table core CSS    -->
<link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


<!--  CSS for Demo Purpose, don't include it in your project     -->
<link href="assets/css/demo.css" rel="stylesheet" />


<link href="assets/css/login.css" rel="stylesheet" />


<!--     Fonts and icons     -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
<style>
    body{background-repeat:no-repeat ;font-family: 'Rajdhani', sans-serif !important;}
    .form{margin: 3% auto;border: 1px solid;min-height: 500px;width:80%;padding: 3%;background-color: #fff;border-radius: 10px}
    .head{font-weight: 400;}
    .bottom h6{font-weight: 600}
    .bottom h6{font-size: 13px}
    form input{ border: 1px solid;background: none;outline: none;width: 100%;height: 35px;color:blue}
    input:focus {
        color: blue;
    }
    button{outline: none}
    .submit{width:100px;float: right;height: 30px;outline: none;border-color: #0067b8;background-color: #0067b8;color: #fff;text-decoration: underline;cursor: pointer;}
    h4{text-align: center;font-weight: bolder}
    .active{color:red}
    .image-upload>input {
        display: none;
    }
    img{ cursor: pointer}

    .image-background{
        background-image: url("../gallery/images.png");
        background-repeat: no-repeat;
        background-position: right top;
        margin-right: 200px;
        background-attachment: fixed;

    }

    label{font-weight: 600}
    body {
        padding : 10px ;

    }

    #exTab1 .tab-content {
        color : white;
        background-color: #428bca;
        padding : 5px 15px;
    }

    #exTab2 h3 {
        color : white;
        background-color: #428bca;
        padding : 5px 15px;
    }

    /* remove border radius for the tab */

    #exTab1 .nav-pills > li > a {
        border-radius: 0;
    }

    /* change border radius for the tab , apply corners on top*/

    #exTab3 .nav-pills > li > a {
        border-radius: 4px 4px 0 0 ;
    }

    #exTab3 .tab-content {
        color : white;
        background-color: #428bca;
        padding : 5px 15px;
    }
    .fieldset {
        border: 2px groove threedface;
        border-top: none;
        padding: 0.5em;
        margin: 1em 2px;
    }

    .fieldset>h1 {
        font: 1em normal;
        margin: -1em -0.5em 0;
    }

    .fieldset>h1>span {
        float: left;
    }

    .fieldset>h1:before {
        border-top: 2px groove threedface;
        content: ' ';
        float: left;
        margin: 0.5em 2px 0 -1px;
        width: 0.75em;
    }

    .fieldset>h1:after {
        border-top: 2px groove threedface;
        content: ' ';
        display: block;
        height: 1.5em;
        left: 2px;
        margin: 0 1px 0 0;
        overflow: hidden;
        position: relative;
        top: 0.5em;
    }


</style>
<script>
    history.pushState(null, null, null);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, null);
    });
</script>