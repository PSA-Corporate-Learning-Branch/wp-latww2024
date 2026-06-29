<?php get_header() ?>
<div id="content">
    <!-- Banner Section -->
    <div class="d-flex p-4 p-md-5 align-items-center" style="height: 12rem; background: linear-gradient(87deg, rgba(95,33,103,1) 9%, rgba(151, 27, 47,1) 50%, rgba(227,168,43,1) 91%);">
        <div class="container-lg py-4 py-md-5">
            <h1 class="text-white">From Values to Practice</h1>
            <h2 class="text-white h3">Learn @ Work Week: October 7 to 11, 2024</h2>
            <div class="d-none d-md-flex gap-2 gap-lg-3 flex-no-wrap pt-3 justify-content-start" style="margin-bottom: -5rem;">
                <img alt="" src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/integrity-round.png" height="90" width="90" style="max-width: 11vw; max-height: 11vw;" class="object-fit-contain rounded-circle shadow-sm">
                <img alt="" src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/curiosity-round.png" height="90" width="90" style="max-width: 11vw; max-height: 11vw;" class="object-fit-contain rounded-circle shadow-sm">
                <img alt="" src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/service-round.png" height="90" width="90" style="max-width: 11vw; max-height: 11vw;" class="object-fit-contain rounded-circle shadow-sm">
                <img alt="" src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/passion-round.png" height="90" width="90" style="max-width: 11vw; max-height: 11vw;" class="object-fit-contain rounded-circle shadow-sm">
                <img alt="" src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/teamwork-round.png" height="90" width="90" style="max-width: 11vw; max-height: 11vw;" class="object-fit-contain rounded-circle shadow-sm">
                <img alt="" src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/accountability-round.png" height="90" width="90" style="max-width: 11vw; max-height: 11vw;" class="object-fit-contain rounded-circle shadow-sm">
                <img alt="" src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/courage-round.png" height="90" width="90" style="max-width: 11vw; max-height: 11vw;" class="object-fit-contain rounded-circle shadow-sm">
            </div>
        </div>
    </div>
    <!-- Main Content Section -->
    <div class="container-lg p-4 p-md-5">
        <div class="row mt-md-5">
            <!-- Main Content -->
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h2>About Learn @ Work Week</h2>
                <p>Learn @ Work Week (L@WW) is a fully virtual event that aims to reach all BC Public Service employees. Learning activities raise awareness and encourage conversations about key topics relevant to everyone. </p>
                <h3>Theme: From Values to Practice</h3>
                <p>Given the complex work that BC Public Service employees do, this year's theme lets us explore lessons learned from our corporate values in action. Join us to:</p>
                <ul>
                    <li>Create familiarity with the corporate values: Integrity, Curiosity, Service, Passion, Teamwork, Accountability, Courage</li>
                    <li>Hear employee experiences and explore lessons learned from putting our corporate values into practice</li>
                    <li>Trace connections between the big picture values and your day-to-day actions</li>
                    <li>Gain practical knowledge and skills to help embody our values and build a values-driven BC Public Service culture</li>
                </ul>
                <!-- Event Description Section -->
            </div>
            <!-- Sidebar Section -->
            <div class="col-lg-4">
                <div class="card shadow-sm rounded">
                    <div class="card-body fs-6">
                        <h3 class="card-title fs-4">Accessibility</h3>
                        <p class="card-text">All sessions include ASL interpretation and CART services.</p>
                        <!-- <a href="https://www.streamtext.net/player?event=bcpsa" target="_blank" class="btn btn-primary mb-3">Access CART services with Streamtext</a> -->
                        <p class="card-text">If you need any accommodations to participate in L@WW, please <a href="https://sfs7.gov.bc.ca/affwebservices/public/saml2sso?SPID=urn:ca:bc:gov:customerportal:prod">submit an AskMyHR service request</a> using the category "Learning Centre".</p>
                    </div>
                </div>
                <div class="mt-4">
                    <h4 class="fs-5">Our Corporate Values</h4>
                    <p class="fs-6 mb-1">Need a quick refresher on the corporate values? Check out this short video.</p>
                    <div class="ratio ratio-16x9">
                        <iframe width="590" height="315" src="https://www.youtube.com/embed/UvhY8Q-01Rg?si=1sGvFCsQZ_esQZ7i" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Schedule Section -->
    <div class="bg-dark-subtle">
        <div class="container-xl p-4 p-md-5">
            <h3 class="mb-2">Learn @ Work Week 2024 Schedule</h3>
            <p>Select a session to get more details about the event and register. </p>
            <p><strong>All times are shown for the Pacific Time Zone. </strong></p>
            <?php get_template_part('template-parts/schedule') ?>
        </div>
    </div>
    <!-- Keynote promo -->
    <div class="container-lg p-4 p-md-5">
        <div class="row">
            <div class="col-md-8">
                <?php $keynote = get_page(16) ?>
				<?php 
				$eventDateTime = get_post_meta($keynote->ID, 'eventDateTime', TRUE);
				$iso8601_datetime = $eventDateTime;
				// Create a new DateTime object from the ISO8601 string
				$datetime = new DateTime($iso8601_datetime, new DateTimeZone('UTC'));
				// Convert to the "America/Vancouver" timezone
				$datetime->setTimezone(new DateTimeZone('America/Vancouver'));
				// Get the current time in the "America/Vancouver" timezone
				$current_time = new DateTime('now', new DateTimeZone('America/Vancouver'));
				// Convert both DateTime objects to timestamps
				$datetime_timestamp = $datetime->getTimestamp();
				$current_timestamp = $current_time->getTimestamp();
				?>

                <h3><a class="text-decoration-none" href="/latww2024/monday/<?= $keynote->post_name ?>"><?= $keynote->post_title ?></a></h3>
                <h4 class="text-secondary-emphasis">Speaker: <?= $keynote->speakerOne ?>, <?= $keynote->speakerOneTitle ?></h4>
                <p><?= $keynote->shortDesc ?></p>
				<?php if($current_timestamp < $datetime_timestamp): ?>
				<?php if (!empty($keynote->registrationLink) && empty($keynote->sessionFull)): ?>
				<?php $tt = get_the_title() ?>
				<a href="<?= $keynote->registrationLink ?>" class="btn btn-primary">Register: <?= mb_strimwidth($tt, 0, 45, '...') ?></a>
				<?php else: ?>
				<?php if (!empty($keynote->sessionFull)): ?>
				<div class="alert alert-secondary">This session is now full!</div>
				<?php else: ?>
				<div class="alert alert-secondary">Not open for registration yet.</div>
				<?php endif ?>
				<?php endif ?>
				<?php else: ?>
				<div class="alert alert-secondary">No longer open for registration.</div>
				<?php endif ?>
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="<?= $keynote->speakerOneImg ?>" height="300" width="300" class="rounded-circle shadow-sm mb-3" alt="<?= $keynote->speakerOne ?>" style="max-width: 20vw;">
                </div>
                <?php if (!empty($keynote->speakerOneQuote)): ?>
                    <figure>
                        <blockquote class="blockquote">
                            <p><?= $keynote->speakerOneQuote ?></p>
                        </blockquote>
                        <figcaption class="blockquote-footer text-center">
                            <?= $keynote->speakerOne ?><br>
                            <cite title="Source Title"><?= $keynote->speakerOneQuoteSource ?></cite>
                        </figcaption>
                    </figure>
                <?php endif ?>
            </div>
        </div>


    </div> <!-- values posters -->
    <div class="container-xl p-4 p-md-5">
        <div class="d-flex gap-3 justify-content-between">
            <img src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/IntegrityPosterNoText.jpg" alt="Integrity graphic" height="600" width="800" class="h-100 w-auto" style="max-width: 12%;">
            <img src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/CuriosityPosterNoText.jpg" alt="Curiosity graphic" height="600" width="800" class="h-100 w-auto" style="max-width: 12%;">
            <img src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/ServicePosterNoText.jpg" alt="Service graphic" height="600" width="800" class="h-100 w-auto" style="max-width: 12%;">
            <img src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/PassionPosterNoText.jpg" alt="Passion graphic" height="600" width="800" class="h-100 w-auto" style="max-width: 12%;">
            <img src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/TeamworkPosterNoText.jpg" alt="Teamwork graphic" height="600" width="800" class="h-100 w-auto" style="max-width: 12%;">
            <img src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/AccountabilityPosterNoText.jpg" alt="Accountability graphic" height="600" width="800" class="h-100 w-auto" style="max-width: 12%;">
            <img src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/values/CouragePosterNoText.jpg" alt="Courage graphic" height="600" width="800" class="h-100 w-auto" style="max-width: 12%;">
        </div>
    </div>

    <?php get_footer() ?>