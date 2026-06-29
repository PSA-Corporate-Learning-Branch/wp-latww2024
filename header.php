<!doctype html>
<html <?php language_attributes(); ?> data-bs-theme="auto">

<head>
    <title><?= the_title() ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <script src="https://unpkg.com/htmx.org@2.0.0"></script> -->
    <script>
        /*!
         * Color mode toggler for Bootstrap's docs (https://getbootstrap.com/)
         * Copyright 2011-2024 The Bootstrap Authors
         * Licensed under the Creative Commons Attribution 3.0 Unported License.
         */
        (() => {
            'use strict'

            const getStoredTheme = () => localStorage.getItem('theme')
            const setStoredTheme = theme => localStorage.setItem('theme', theme)

            const getPreferredTheme = () => {
                const storedTheme = getStoredTheme()
                if (storedTheme) {
                    return storedTheme
                }

                return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
            }

            const setTheme = theme => {
                if (theme === 'auto') {
                    document.documentElement.setAttribute('data-bs-theme', (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'))
                } else {
                    document.documentElement.setAttribute('data-bs-theme', theme)
                }
            }

            setTheme(getPreferredTheme())

            const showActiveTheme = (theme, focus = false) => {
                const themeSwitcher = document.querySelector('#bd-theme')

                if (!themeSwitcher) {
                    return
                }

                const themeSwitcherText = document.querySelector('#bd-theme-text')
                const activeThemeIcon = document.querySelector('.theme-icon-active')
                const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                const iconOfActiveBtn = btnToActive.querySelector('i').className

                document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                    element.classList.remove('active')
                    element.setAttribute('aria-pressed', 'false')
                })

                btnToActive.classList.add('active')
                btnToActive.setAttribute('aria-pressed', 'true')
                activeThemeIcon.querySelector('i').className = iconOfActiveBtn


                const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`
                themeSwitcher.setAttribute('aria-label', themeSwitcherLabel)

                if (focus) {
                    themeSwitcher.focus()
                }
            }

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                const storedTheme = getStoredTheme()
                if (storedTheme !== 'light' && storedTheme !== 'dark') {
                    setTheme(getPreferredTheme())
                }
            })

            window.addEventListener('DOMContentLoaded', () => {
                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            setStoredTheme(theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })
            })
        })();
    </script>
    <?php wp_head(); ?>
</head>

<body class="bg-body-light">
    <?php wp_body_open(); ?>
    <a class="skip-link screen-reader-text" href="#content">
        Skip to content </a>
    <header id="mainheader" role="banner" class="sticky-top">
        <nav class="navbar navbar-expand-lg px-3 bg-gov-purple" data-bs-theme="dark" aria-label="<?php esc_attr_e('Primary menu', 'wp-learninghub'); ?>">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-white"></span>
                </button>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="wordmark navbar-brand order-lg-first me-lg-3">
                    <?php //the_custom_logo(); 
                    ?>
                    L@WW 2024
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
                    <span class="search-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 order-1 order-lg-2">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/latww2024/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/latww2024/session-schedule/">Session Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/latww2024/how-to-register/">How to Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/latww2024/video-index/">Session Recordings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/learn-at-work-week/">L@WW Event Archive</a>
                        </li>
                        <li class="nav-item dropdown">
                            <button class="btn btn-link nav-link ml-3 py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static" aria-label="Toggle theme (dark)">
                                <span class="theme-icon-active"><i class="me-2"></i></span>
                                <span class="d-none ms-2" id="bd-theme-text">Toggle theme</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme-text">
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                                        <i class="bi bi-sun-fill me-2" data-icon="bi-sun-fill"></i>
                                        Light
                                        <i class="bi bi-check2 d-none" data-icon="check2"></i>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="dark" aria-pressed="true">
                                        <i class="bi bi-moon-stars-fill me-2" data-icon="bi-moon-stars-fill"></i>
                                        Dark
                                        <i class="bi bi-check2 d-none" data-icon="check2"></i>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
                                        <i class="bi bi-circle-half me-2" data-icon="bi-circle-half"></i>
                                        Auto
                                        <i class="bi bi-check2 d-none" data-icon="check2"></i>
                                    </button>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header><!-- #masthead -->