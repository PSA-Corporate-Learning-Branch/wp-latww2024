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
/* Start the Loop */
while (have_posts()) :
    the_post();
?>
    <div id="content">
        <div class="d-flex p-4 p-md-5 align-items-center bg-gov-blue bg-gradient" style="height: 12vh; min-height: 100px;">
            <div class="container-lg py-4 py-md-5">
                <h1 class="text-white title"><?php the_title() ?></h1>
            </div>
        </div>
        <div class="bg-secondary-subtle">
            <div class="container-lg p-lg-5 p-4 bg-light-subtle">
                <h2>Registration tips</h2>
                
                <ul>
                    <li>The L@WW website provides direct links to register for each session in the learning system. You do not need formal approval from your supervisor to register for most sessions. Fierce Foundations does require supervisor approval.</li>
                    <li>All sessions are fully virtual, taking place on MS Teams or Zoom.</li>
                    <li>If you are unable to attend a session, please drop the course in the learning system as soon as possible. This allows another employee to participate in the learning.</li>
                    <li>Registration closes the morning of the session day. Registration for Fierce Foundations closes 2 days before the session.</li>
                </ul>
                <h3>Accessibility</h3>
                <p>All sessions include ASL interpretation and CART services.</p>
                <!-- <a href="https://www.streamtext.net/player?event=bcpsa" target="_blank" class="btn btn-primary">Access CART services with Streamtext</a> -->
                <p>If you need any accommodations to participate in L@WW, please <a href="https://sfs7.gov.bc.ca/affwebservices/public/saml2sso?SPID=urn:ca:bc:gov:customerportal:prod">submit an AskMyHR service request</a> using the category "Learning Centre" as soon as possible.</p>
                <div class="card card-body mt-5">
                    <h2>Adding a Class to your Outlook Calendar</h2>
                    <p>The following instructions will show you how to import a class into your Outlook calendar. For general instructions on using the Learning System, please visit the <a href="https://learningcentre.gww.gov.bc.ca/learning-system-help/" target="_blank" class="link-text">Learning System Help</a> page. </p>
                    <div class="ratio ratio-16x9 w-75 mx-auto">
                        <iframe width="590" height="315" src="https://www.youtube.com/embed/jZ4adI2woGg" title="How to add your learning session to Outlook Calendar" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="text-center">
                        <p class="fs-6"> Trouble viewing the video? Try opening in a different browser, or <a class="link-text" href="https://youtu.be/jZ4adI2woGg" target="_blank">watch on YouTube</a>. </p>
                    </div>
                    <h3>Steps</h3>
                    <ol>
                        <li> Go to your <a href="https://learning.gov.bc.ca/psc/CHIPSPLM/EMPLOYEE/ELM/c/LM_OD_EMPLOYEE_FL.LM_MYCOURSES_FL.GBL?Page=LM_MYCOURSES_FL&amp;Action=U&amp;ForceSearch=Y&amp;TargetFrameName=None" class="link-text" target="_blank">My Learning - Current</a> and select the class you'd like to add to your calendar </li>
                        <div class="p-2">
                            <img class="shadow-sm mb-1" src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/laww-tile.png" alt="Selecting a class tile">
                        </div>
                        <li>Near the upper right corner of the My Course Progress page, select <img class="shadow-sm mx-2" src="https://learn.bcpublicservice.gov.bc.ca/latww/latww2024/img/add-to-calendar.png" alt="Add to calendar">
                            to download an iCalendar (.ics) file </li>
                        <li>Open the file (either from your browser, or your Downloads folder) </li>
                    </ol>
                    <div class="row justify-content-md-center">
                        <div class="col-md-6">
                            <div class="card card-body mb-3 shadow-sm">
                                <h4>For a single session class:</h4>
                                <!--<div style="background-color: #F2F2F2;">-->
                                <ol type="a">
                                    <li>The iCalendar file will open as a new Outlook item.</li>
                                    <li>Adjust the reminder if desired</li>
                                    <li>Select <strong>Save &amp; Close</strong> to add to your calendar</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-body mb-3 shadow-sm">
                                <h4>For a multi-session class:</h4>
                                <ol type="a">
                                    <li>After opening the iCalendar file, go to your Outlook. You should see a dialog prompt window asking if you would like to open the file as a new calendar, or import into your calendar</li>
                                    <!--<div class="w-100 px-1 pb-2">
						<img class="shadow-sm" 
							src="images/outlook-import-dialog.png" 
							alt="Dialog prompt asking Do you want to open this calendar as a new calendar or import its items into your calendar?">
						</div>-->
                                    <li>Select <strong>Import</strong> to add to your calendar</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <ol start="4">
                        <li> Finally, make sure the items are in your calendar. Outlook does not provide a confirmation message that they have been created. This is also a chance to add a reminder to your session, or a colour (Categorize) to make it stand out </li>
                    </ol>
                    <div class="card bg-dark-subtle shadow-sm">
                        <div class="card-body">
                            <p class="card-text"> <strong>Note</strong>: Each calendar item will contain a link that takes you back to the class in the Learning System. On the start date, this page will have the <strong>Launch</strong> button to join the session. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <?php the_content() ?>
            </div><!-- .entry-content -->
        </article><!-- #post-<?php the_ID(); ?> -->
    </div>
<?php
endwhile; // End of the loop.
get_footer();
