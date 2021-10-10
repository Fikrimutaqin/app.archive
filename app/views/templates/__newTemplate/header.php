<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $data['title']; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="#" />

    <link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/css/backend.min.css?v=<?php echo rand(); ?>">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/vendor/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/dist/css/context-menu.css?v=<?php echo rand(); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/r-2.2.9/sp-1.3.0/datatables.min.css" />

    <style>
        #customFile .custom-file-input:lang(en)::after {
            content: "Select file...";
        }

        #customFile .custom-file-input:lang(en)::before {
            content: "Click me";
        }

        /*when a value is selected, this class removes the content */
        .custom-file-input.selected:lang(en)::after {
            content: "" !important;
        }

        .custom-file {
            overflow: hidden;
        }

        .custom-file-input {
            white-space: nowrap;
        }
    </style>

</head>

<body class="color-light dark">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">