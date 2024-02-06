<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="imagens/favicon.png">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8"/>
	<title> Câmara Municipal de Tabira-PE - Casa Eduardo Domingos de Lima</title>
	<link rel="stylesheet" type="text/css" href="arquivos/main.v1549631203.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
	<script src="https://kit.fontawesome.com/819cb1918b.js" crossorigin="anonymous"></script>
	<script src="arquivos/jquery.min.js"></script>
	<style type="text/css">
		.fancybox-margin {
			margin-right: 17px;
		}
	</style>
	<link rel="stylesheet" href="css/contrast.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type='text/javascript'>
		jQuery(document).ready(function() {
			jQuery('#scrollUp').hide();
			jQuery('a#scrollUp').click(function() {
				jQuery('body,html').animate({
					scrollTop: 0
				}, 300);
				return false;
			});
			jQuery(window).scroll(function() {
				if (jQuery(this).scrollTop() > 100) {
					jQuery('#scrollUp').fadeIn();
				} else {
					jQuery('#scrollUp').fadeOut();
				}
			});
		});
	</script>

	<style type="text/css">
		html {
			scroll-behavior: smooth;
		}

		#scrollUp {
			bottom: 35px;
			right: 35px;
			width: 35px;
		}

		.scrollToTop {
			border-radius: 4px;
			bottom: 60px;
			color: #fff;
			display: none;
			font-size: 30px;
			line-height: 50px;
			height: 50px;
			font-family: "Montserrat", sans-serif;
			padding: 5px 0;
			position: fixed;
			right: 20px;
			text-align: center;
			text-decoration: none;
			width: 50px;
			z-index: 999;
			-webkit-transition: all 0.5s ease 0s;
			-moz-transition: all 0.5s ease 0s;
			-ms-transition: all 0.5s ease 0s;
			-o-transition: all 0.5s ease 0s;
			transition: all 0.5s ease 0s;
		}

		.scrollToTop i {
			display: block;
		}

		.scrollToTop span {
			display: block;
			text-transform: uppercase;
			font-size: 14px;
			font-weight: bold;
		}

		.scrollToTop:hover,
		.scrollToTop:focus {
			color: #fff;
		}
	</style>

	<style>
		#fixo #links-fixos {
			/*você pode alterar largura usando width*/
			padding: 5px;
			background: rgba(0, 0, 0, 0.2);
			position: fixed !Important;
			margin-left: 5px;
		}
	</style>
	<style type="text/css">
		.card-margin {
			margin-bottom: 1.875rem;
		}

		.card {
			border: 0;
			box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
			-webkit-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
			-moz-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
			-ms-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
		}

		.card {
			position: relative;
			display: flex;
			flex-direction: column;
			min-width: 0;
			word-wrap: break-word;
			background-color: #ffffff;
			background-clip: border-box;
			border: 1px solid #e6e4e9;
			border-radius: 20px;
		}

		.card .card-header.no-border {
			border: 0;
		}

		.card .card-header {
			background: none;
			padding: 0 2rem !important;
			font-weight: 500;
			display: flex;
			align-items: center;
			min-height: 50px;
		}

		.card-header:first-child {
			border-radius: calc(8px - 1px) calc(8px - 1px) 0 0;
		}

		.widget-49 .widget-49-title-wrapper {
			display: flex;
			align-items: center;
			padding: 0 2rem !important;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-primary {
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			background-color: #edf1fc;
			width: 6rem !important;
			height: 6rem !important;
			border-radius: 50%;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-day {
			color: #4e73e5;
			font-weight: 500;
			font-size: 1.5rem;
			line-height: 1;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-month {
			color: #4e73e5;
			line-height: 1;
			font-size: 1.4rem;
			text-transform: uppercase;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-secondary {
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			background-color: #fcfcfd;
			width: 4rem;
			height: 4rem;
			border-radius: 50%;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-day {
			color: #dde1e9;
			font-weight: 500;
			font-size: 1.5rem;
			line-height: 1;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-month {
			color: #dde1e9;
			line-height: 1;
			font-size: 1rem;
			text-transform: uppercase;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-success {
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			background-color: #e8faf8;
			width: 4rem;
			height: 4rem;
			border-radius: 50%;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-day {
			color: #17d1bd;
			font-weight: 500;
			font-size: 1.5rem;
			line-height: 1;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-month {
			color: #17d1bd;
			line-height: 1;
			font-size: 1rem;
			text-transform: uppercase;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-info {
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			background-color: #ebf7ff;
			width: 4rem;
			height: 4rem;
			border-radius: 50%;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-day {
			color: #36afff;
			font-weight: 500;
			font-size: 1.5rem;
			line-height: 1;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-month {
			color: #36afff;
			line-height: 1;
			font-size: 1rem;
			text-transform: uppercase;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-warning {
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			background-color: floralwhite;
			width: 7rem !important;
			height: 7rem !important;
			border-radius: 50%;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-day {
			color: #FFC868;
			font-weight: 500;
			font-size: 2.5rem;
			line-height: 1;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-month {
			color: #FFC868;
			line-height: 1;
			font-size: 1.5rem;
			text-transform: uppercase;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-danger {
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			background-color: #feeeef;
			width: 7rem !important;
			height: 7rem !important;
			border-radius: 50%;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-day {
			color: #F95062;
			font-weight: 500;
			font-size: 2.5rem;
			line-height: 1;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-month {
			color: #F95062;
			line-height: 1;
			font-size: 1.5rem;
			text-transform: uppercase;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-light {
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			background-color: #fefeff;
			width: 4rem;
			height: 4rem;
			border-radius: 50%;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-day {
			color: #f7f9fa;
			font-weight: 500;
			font-size: 1.5rem;
			line-height: 1;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-month {
			color: #f7f9fa;
			line-height: 1;
			font-size: 1rem;
			text-transform: uppercase;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-dark {
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			background-color: #ebedee;
			width: 4rem;
			height: 4rem;
			border-radius: 50%;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-day {
			color: #394856;
			font-weight: 500;
			font-size: 1.5rem;
			line-height: 1;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-month {
			color: #394856;
			line-height: 1;
			font-size: 1rem;
			text-transform: uppercase;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-base {
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			background-color: #f0fafb;
			width: 4rem;
			height: 4rem;
			border-radius: 50%;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-day {
			color: #68CBD7;
			font-weight: 500;
			font-size: 1.5rem;
			line-height: 1;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-month {
			color: #68CBD7;
			line-height: 1;
			font-size: 1rem;
			text-transform: uppercase;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-meeting-info {
			display: flex;
			flex-direction: column;
			margin-left: 1rem;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-pro-title {
			color: #3c4142;
			font-size: 14px;
		}

		.widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-meeting-time {
			color: #B1BAC5;
			font-size: 13px;
		}

		.widget-49 .widget-49-meeting-points {
			font-weight: 400;
			font-size: 13px;
			margin-left: 6rem;
			margin-top: 2rem;
		}

		.widget-49 .widget-49-meeting-points .widget-49-meeting-item {
			display: list-item;
			color: #727686;
		}

		.widget-49 .widget-49-meeting-points .widget-49-meeting-item span {
			margin-left: .5rem;
		}

		.widget-49 .widget-49-meeting-action {
			text-align: right;
		}

		.widget-49 .widget-49-meeting-action a {
			text-transform: uppercase;
		}
	</style>

	<style type="text/css">
		.timeline {
			list-style: none;
			padding: 20px 0 20px;
			position: relative;
		}

		.timeline:before {
			top: 0;
			bottom: 0;
			position: absolute;
			content: " ";
			width: 3px;
			background-color: #eeeeee;
			left: 50%;
			margin-left: -1.5px;
		}

		.timeline>li {
			margin-bottom: 20px;
			position: relative;
		}

		.timeline>li:before,
		.timeline>li:after {
			content: " ";
			display: table;
		}

		.timeline>li:after {
			clear: both;
		}

		.timeline>li:before,
		.timeline>li:after {
			content: " ";
			display: table;
		}

		.timeline>li:after {
			clear: both;
		}

		.timeline>li>.timeline-panel {
			width: 46%;
			float: left;
			border: 1px solid #d4d4d4;
			border-radius: 2px;
			padding: 20px;
			position: relative;
			-webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
			box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
		}

		.timeline>li>.timeline-panel:before {
			position: absolute;
			top: 26px;
			right: -15px;
			display: inline-block;
			border-top: 15px solid transparent;
			border-left: 15px solid #ccc;
			border-right: 0 solid #ccc;
			border-bottom: 15px solid transparent;
			content: " ";
		}

		.timeline>li>.timeline-panel:after {
			position: absolute;
			top: 27px;
			right: -14px;
			display: inline-block;
			border-top: 14px solid transparent;
			border-left: 14px solid #fff;
			border-right: 0 solid #fff;
			border-bottom: 14px solid transparent;
			content: " ";
		}

		.timeline>li>.timeline-badge {
			color: #fff;
			width: 50px;
			height: 50px;
			line-height: 50px;
			font-size: 1.4em;
			text-align: center;
			position: absolute;
			top: 16px;
			left: 50%;
			margin-left: -25px;
			background-color: #999999;
			z-index: 100;
			border-top-right-radius: 50%;
			border-top-left-radius: 50%;
			border-bottom-right-radius: 50%;
			border-bottom-left-radius: 50%;
		}

		.timeline>li.timeline-inverted>.timeline-panel {
			float: right;
		}

		.timeline>li.timeline-inverted>.timeline-panel:before {
			border-left-width: 0;
			border-right-width: 15px;
			left: -15px;
			right: auto;
		}

		.timeline>li.timeline-inverted>.timeline-panel:after {
			border-left-width: 0;
			border-right-width: 14px;
			left: -14px;
			right: auto;
		}

		.timeline-badge.primary {
			background-color: #2e6da4 !important;
		}

		.timeline-badge.success {
			background-color: #3f903f !important;
		}

		.timeline-badge.warning {
			background-color: #f0ad4e !important;
		}

		.timeline-badge.danger {
			background-color: #d9534f !important;
		}

		.timeline-badge.info {
			background-color: #5bc0de !important;
		}

		.timeline-title {
			margin-top: 0;
			color: inherit;
		}

		.timeline-body>p,
		.timeline-body>ul {
			margin-bottom: 2;
		}

		.timeline-body a {
			color: #428BD4;
		}

		.timeline-body>p+p {
			margin-top: 5px;
		}

		@media (max-width: 767px) {
			ul.timeline:before {
				left: 40px;
			}

			ul.timeline>li>.timeline-panel {
				width: calc(100% - 90px);
				width: -moz-calc(100% - 90px);
				width: -webkit-calc(100% - 90px);
			}

			ul.timeline>li>.timeline-badge {
				left: 15px;
				margin-left: 0;
				top: 16px;
			}

			ul.timeline>li>.timeline-panel {
				float: right;
			}

			ul.timeline>li>.timeline-panel:before {
				border-left-width: 0;
				border-right-width: 15px;
				left: -15px;
				right: auto;
			}

			ul.timeline>li>.timeline-panel:after {
				border-left-width: 0;
				border-right-width: 14px;
				left: -14px;
				right: auto;
			}
		}

		.link-table {
			color: black;
			font-family: "Conv_segoeuib", sans-serif;
			font-weight: normal;
			font-size: 16px;
			display: block;
			min-height: 70px;
			padding: 25px;
		}

		.link-table p {
			color: #6d8282;

		}

		.link-table:hover {
			color: black;
		}
	</style>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<?php require_once("menu.php") ?>