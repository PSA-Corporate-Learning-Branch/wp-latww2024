<?php

/**
 * The template for displaying all single pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
get_header();
date_default_timezone_set('America/Vancouver');
/* Start the Loop */
while (have_posts()) :
    the_post();

    $start = get_post_meta(get_the_ID(), 'startTime', TRUE);
    $end = get_post_meta(get_the_ID(), 'endTime', TRUE);
    $dayOfWeek = get_post_meta(get_the_ID(), 'dayOfWeek', TRUE);
    $shortDesc = get_post_meta(get_the_ID(), 'shortDesc', TRUE);
    $abstract = get_post_meta(get_the_ID(), 'abstract', TRUE);
    $platform = get_post_meta(get_the_ID(), 'platform', TRUE);
    $registrationLink = get_post_meta(get_the_ID(), 'registrationLink', TRUE);
    $sessionFull = get_post_meta(get_the_ID(), 'sessionFull', TRUE);
    $slideDeck = get_post_meta(get_the_ID(), 'slideDeck', TRUE);
    $toBeRecorded = get_post_meta(get_the_ID(), 'toBeRecorded', TRUE);
    $resourceOneName = get_post_meta(get_the_ID(), 'resourceOneName', TRUE);
    $resourceOneLink = get_post_meta(get_the_ID(), 'resourceOneLink', TRUE);
    $resourceTwoName = get_post_meta(get_the_ID(), 'resourceTwoName', TRUE);
    $resourceTwoLink = get_post_meta(get_the_ID(), 'resourceTwoLink', TRUE);
    $resourceThreeName = get_post_meta(get_the_ID(), 'resourceThreeName', TRUE);
    $resourceThreeLink = get_post_meta(get_the_ID(), 'resourceThreeLink', TRUE);
    $resourceFourName = get_post_meta(get_the_ID(), 'resourceFourName', TRUE);
    $resourceFourLink = get_post_meta(get_the_ID(), 'resourceFourLink', TRUE);
    $eventDateTime = get_post_meta(get_the_ID(), 'eventDateTime', TRUE);
    $recordingURL = get_post_meta(get_the_ID(), 'recordingURL', TRUE);
    $recordingVTT = get_post_meta(get_the_ID(), 'recordingVTT', TRUE);
    $recordingPoster = get_post_meta(get_the_ID(), 'recordingPoster', TRUE);
    $recordingTranscript = get_post_meta(get_the_ID(), 'recordingTranscript', TRUE);

    $iso8601_datetime = $eventDateTime;
    // Create a new DateTime object from the ISO8601 string
    $datetime = new DateTime($iso8601_datetime, new DateTimeZone('UTC'));
    // Convert to the "America/Vancouver" timezone
    $datetime->setTimezone(new DateTimeZone('America/Vancouver'));
    // Get the current time in the "America/Vancouver" timezone
    $current_time = new DateTime('now', new DateTimeZone('America/Vancouver'));
    // Convert both DateTime objects to timestamps
    $datetime_timestamp = $datetime->getTimestamp();
    $current_timestamp = $current_time->getTimestamp(); ?>

    <div id="content">
        <div class="d-flex p-4 p-md-5 align-items-center bg-gov-blue bg-gradient" style="min-height: 100px;">
            <div class="container-lg">
                <h1 class="text-white title"><?php the_title() ?></h1>
                <h2 class="text-white h3"><?= $dayOfWeek ?> | <?= $start ?> to <?= $end ?></h2>
            </div>
        </div>
        <div class="bg-secondary-subtle">
            <div class="container-lg py-md-5 py-4 ps-3 pe-4 pe-md-5 bg-light-subtle">
                <div class="d-flex justify-content-between gap-5">
                    <!-- decorative vertical banner, displays on medium screens and higher -->
                    <div class="d-none d-md-flex flex-column gap-3 flex-no-wrap flex-shrink-0 flex-grow-0">
                        <img src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/integrity-round.png" height="90" width="90" style="max-width: 8vw; max-height: 8vw;" class="object-fit-contain rounded-circle shadow-sm">
                        <img src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/curiosity-round.png" height="90" width="90" style="max-width: 8vw; max-height: 8vw;" class="object-fit-contain rounded-circle shadow-sm">
                        <img src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/service-round.png" height="90" width="90" style="max-width: 8vw; max-height: 8vw;" class="object-fit-contain rounded-circle shadow-sm">
                        <img src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/passion-round.png" height="90" width="90" style="max-width: 8vw; max-height: 8vw;" class="object-fit-contain rounded-circle shadow-sm">
                        <img src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/teamwork-round.png" height="90" width="90" style="max-width: 8vw; max-height: 8vw;" class="object-fit-contain rounded-circle shadow-sm">
                        <img src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/accountability-round.png" height="90" width="90" style="max-width: 8vw; max-height: 8vw;" class="object-fit-contain rounded-circle shadow-sm">
                        <img src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/courage-round.png" height="90" width="90" style="max-width: 8vw; max-height: 8vw;" class="object-fit-contain rounded-circle shadow-sm">
                    </div>
                    <div id="main">
                        <div class="row">
                            <!-- Session Description -->
                            <div class="col-lg-8">
                                <?php if ($recordingURL): ?>
                                    <h2>Session recording</h2>
                                    <video class="ratio ratio-16x9 mb-2" controls poster="<?= $recordingPoster ?>">
                                        <source src="<?= $recordingURL ?>" type="video/mp4">
                                        <track src="<?= $recordingVTT ?>" kind="captions" srclang="en" label="English">
                                        Your browser does not support the video tag.
                                    </video>
                                    <?php if(!empty($recordingTranscript)): ?>
                                    <p class="mb-5 text-end"><a href="<?= $recordingTranscript ?>" target="_blank" rel="noopener noreferrer"><i class="bi bi-universal-access-circle me-2"></i>Open the session transcript in a new window</a>.</p>
								    <?php else: ?>
								    <p class="mb-5 text-end">No transcript available.</p>
								    <?php endif ?>
                                <?php endif ?>

                                <h2>About the session</h2>
                                <!-- full abstract -->
                                <p><?= the_content() ?></p>

                                <?php if ($current_timestamp < $datetime_timestamp): ?>
                                    <?php if (!empty($registrationLink) && empty($sessionFull)): ?>
                                        <?php $tt = get_the_title() ?>
                                        <a href="<?= $registrationLink ?>" class="btn btn-primary">Register: <?= mb_strimwidth($tt, 0, 45, '...') ?></a>
                                    <?php else: ?>
                                        <?php if (!empty($sessionFull)): ?>
                                            <div class="alert alert-secondary">This session is now full!</div>
                                        <?php else: ?>
                                            <div class="alert alert-secondary">Not open for registration yet.</div>
                                        <?php endif ?>
                                    <?php endif ?>
                                <?php else: ?>
                                    <div class="alert alert-secondary">No longer open for registration.</div>
                                <?php endif ?>
                                <p class="fs-6 mt-3">
                                    <span class="icon-svg baseline-svg">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path fill="currentColor" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"></path>
                                        </svg>
                                    </span>Learn how to <a href="/latww2024/how-to-register/">import the event details to your Outlook calendar</a> from the learning system.
                                </p>
                            </div>
                            <!-- At a glance and materials -->
                            <div class="col-lg-4">
                                <div class="card bg-dark-subtle mb-4">
                                    <div class="card-body">
                                        <h3 class="card-title">Session at a glance</h3>
                                        <ul class="list-unstyled mb-0">
                                            <li><strong>Date:</strong> <?= $dayOfWeek ?></li>
                                            <li><strong>Start time:</strong> <?= $start ?></li>
                                            <li><strong>End time:</strong> <?= $end ?></li>
                                            <li><strong>Platform:</strong> <?= $platform ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <h4>Session Materials</h4>

                                <?php if ($slideDeck || $resourceOneLink || $resourceTwoLink || $resourceThreeLink || $resourceFourLink): ?>
                                    <?php if ($slideDeck): ?>
                                        <p><a href="<?= $slideDeck ?>" class="btn btn-secondary">Download Slide Deck (PPT)</a></p>
                                    <?php endif ?>
                                    <ul>
                                        <?php if ($resourceOneLink && $resourceOneName): ?>
                                            <li><a href="<?= $resourceOneLink ?>"><?= $resourceOneName ?></a></li>
                                        <?php endif ?>

                                        <?php if ($resourceTwoLink && $resourceTwoName): ?>
                                            <li><a href="<?= $resourceTwoLink ?>"><?= $resourceTwoName ?></a></li>
                                        <?php endif ?>

                                        <?php if ($resourceThreeLink && $resourceThreeName): ?>
                                            <li><a href="<?= $resourceThreeLink ?>"><?= $resourceThreeName ?></a></li>
                                        <?php endif ?>

                                        <?php if ($resourceFourLink && $resourceFourName): ?>
                                            <li><a href="<?= $resourceFourLink ?>"><?= $resourceFourName ?></a></li>
                                        <?php endif ?>
                                    </ul>
                                <?php else: ?>
                                    <p>No materials posted yet.</p>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="my-4"><!-- Speakers Section - new row -->
                            <?php
                            // Get child pages (speakers)
                            $child_pages = get_posts(array(
                                'post_type'      => 'page',
                                'post_parent'    => get_the_ID(),
                                'posts_per_page' => -1,
                                'orderby'        => 'menu_order',
                                'order'          => 'ASC',
                            ));

                            if (!empty($child_pages)):
                            ?>
                                <h2>Speakers</h2>
                                <div class="d-flex mt-3 justify-content-start flex-wrap">
                                    <?php foreach ($child_pages as $child_page): ?>
                                        <?php
                                        // Get custom fields
                                        $speakerImg   = get_post_meta($child_page->ID, 'speakerImg', true);
                                        $speakerName  = get_post_meta($child_page->ID, 'speakerName', true);
                                        $speakerRole  = get_post_meta($child_page->ID, 'speakerRole', true);
                                        $speakerTitle = get_post_meta($child_page->ID, 'speakerTitle', true);
                                        ?>
                                        <div class="mb-4 px-3 flex-shrink-1 flex-grow-1" style="flex-basis: 200px; min-width: 100px; max-width: 250px;">
                                            <?php if (!empty($speakerImg)): ?>
                                                <img src="<?= esc_url($speakerImg) ?>" height="250" width="250" class="rounded-circle object-fit-contain shadow-sm mb-3" alt="">
                                            <?php endif; ?>
                                            <h4 class="mb-0 fw-bold"><?= esc_html($speakerName) ?></h4><?php if (!empty($speakerRole)): ?>
                                                <h5 class="text-secondary-emphasis"><?= esc_html($speakerRole) ?></h5>
                                            <?php endif; ?>
                                            <?php if (!empty($speakerTitle)): ?>
                                                <p class="fs-6 small lh-sm"><small><?= esc_html($speakerTitle) ?></small></p>
                                            <?php endif; ?>

                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>



                            <hr>
                            <h3>Accessibility</h3>
                            <p>All sessions include ASL interpretation and CART services.</p>
                            <!-- <a href="https://www.streamtext.net/player?event=bcpsa" target="_blank" class="btn btn-primary mb-3">Access CART services with Streamtext</a> -->
                            <p>If you need any accommodations to participate in L@WW, please <a href="https://sfs7.gov.bc.ca/affwebservices/public/saml2sso?SPID=urn:ca:bc:gov:customerportal:prod">submit an AskMyHR service request</a> using the category "Learning Centre".</p>
                            <h3>Session Recording</h3>
                            <?php if (!empty($toBeRecorded)): ?>
                                <p>This session will be recorded and will be available for viewing after Learn @ Work Week. The video will be posted here as well as listed in the LearningHUB.</p>

                            <?php else: ?>
                                <p>This session will not be recorded due to copyrighted content.</p>
                            <?php endif ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php
endwhile; // End of the loop.
get_footer();
