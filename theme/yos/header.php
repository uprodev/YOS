<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo wp_get_document_title(); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script>
        let element = document.querySelector('html');
        if (element) {
            const setFontSize = () => {
                let value = 10 / 1440 * element.clientWidth;
                element.style.fontSize = value + 'px';
            }

            setFontSize();

            window.addEventListener('resize', setFontSize);
        }
    </script>

		<?php wp_head();?>

    <style>
        body.page-loaded ._preloader {
            opacity: 0;
            visibility: hidden;
        }

        body.page-loaded ._preloader:before {
            display: none;
        }

        ._preloader {
            background-color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 999;
            -webkit-transition: all .6s ease .2s;
            -o-transition: all .6s ease .2s;
            transition: all .6s ease .2s;
        }

        ._preloader:before {
            position: absolute;
            content: '';
            z-index: 999;
            top: 50%;
            left: 50%;
            height: 50px;
            width: 50px;
            border-radius: 50%;
            border: 4px solid #6e6e6e;
            border-right: 4px solid #fff;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-animation: preloadBody 2s linear infinite;
            animation: preloadBody 2s linear infinite;
        }

        @-webkit-keyframes preloadBody {
            from {
                -webkit-transform: translate(-50%, -50%) rotate(0);
                transform: translate(-50%, -50%) rotate(0);
            }

            to {
                -webkit-transform: translate(-50%, -50%) rotate(360deg);
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @keyframes preloadBody {
            from {
                -webkit-transform: translate(-50%, -50%) rotate(0);
                transform: translate(-50%, -50%) rotate(0);
            }

            to {
                -webkit-transform: translate(-50%, -50%) rotate(360deg);
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }
    </style>

</head>

<body <?php body_class() ?>>

    <div class="_preloader"></div>

    <header class="header" data-header data-popup="lock-padding">

        <?php get_template_part('parts/header/header-nav');?>

    </header>

    <?php get_template_part('parts/header/mobile-menu');?>

    <?php get_template_part('parts/header/popup-search');?>

    <?php get_template_part('parts/header/side-basket');?>
