<?php
/**
 * Template Name: Video Index
 * Description: Displays all events that have associated video recordings
 */

get_header();
date_default_timezone_set('America/Vancouver');
?>

<div id="content">
    <div class="d-flex p-4 p-md-5 align-items-center bg-gov-blue bg-gradient" style="min-height: 100px;">
        <div class="container-lg">
            <h1 class="text-white">Session Recordings</h1>
            <h2 class="text-white h3">Learn @ Work Week 2024 Video Archive</h2>
        </div>
    </div>
    
    <div class="container-lg py-4 py-md-5">
        <?php
        // Query all pages that have a recordingURL custom field
        $args = array(
            'post_type' => 'page',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key' => 'recordingURL',
                    'value' => '',
                    'compare' => '!='
                )
            ),
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );
        
        $video_pages = get_posts($args);
        
        if ($video_pages): 
            // Debug: Let's see what we're working with
            // echo '<pre>Total pages found: ' . count($video_pages) . '</pre>';
            
            // Group videos by day of the week
            $videos_by_day = array();
            $day_order = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
            
            // Initialize arrays for each day
            foreach ($day_order as $day) {
                $videos_by_day[$day] = array();
            }
            
            // Group videos by their dayOfWeek
            foreach ($video_pages as $page) {
                $dayOfWeek = get_post_meta($page->ID, 'dayOfWeek', true);
                
                if ($dayOfWeek) {
                    // Extract just the day name from "Monday, October 7" format
                    $dayName = '';
                    foreach ($day_order as $day) {
                        if (stripos($dayOfWeek, $day) === 0) {
                            $dayName = $day;
                            break;
                        }
                    }
                    
                    if ($dayName) {
                        $videos_by_day[$dayName][] = $page;
                    }
                }
            }
            
            // Sort videos within each day by start time
            foreach ($videos_by_day as $day => $pages) {
                if (!empty($pages)) {
                    usort($videos_by_day[$day], function($a, $b) {
                        $startTimeA = get_post_meta($a->ID, 'startTime', true);
                        $startTimeB = get_post_meta($b->ID, 'startTime', true);
                        
                        // Convert times to comparable format (assuming HH:MM format)
                        $timeA = strtotime($startTimeA);
                        $timeB = strtotime($startTimeB);
                        
                        return $timeA - $timeB;
                    });
                }
            }
            
            // Display videos grouped by day
            foreach ($day_order as $day): 
                if (!empty($videos_by_day[$day])): ?>
                    <div class="mb-5">
                        <h2 class="h3 mb-4 pb-2 border-bottom border-primary"><?= esc_html($day) ?></h2>
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <?php foreach ($videos_by_day[$day] as $page): 
                                // Get all the custom fields for this page
                                $recordingURL = get_post_meta($page->ID, 'recordingURL', true);
                                $recordingVTT = get_post_meta($page->ID, 'recordingVTT', true);
                                $recordingPoster = get_post_meta($page->ID, 'recordingPoster', true);
                                $recordingTranscript = get_post_meta($page->ID, 'recordingTranscript', true);
                                $startTime = get_post_meta($page->ID, 'startTime', true);
                                $endTime = get_post_meta($page->ID, 'endTime', true);
                                $dayOfWeek = get_post_meta($page->ID, 'dayOfWeek', true);
                                $shortDesc = get_post_meta($page->ID, 'shortDesc', true);
                                
                                // Get speaker information from child pages
                                $speakers = get_posts(array(
                                    'post_type' => 'page',
                                    'post_parent' => $page->ID,
                                    'posts_per_page' => -1,
                                    'orderby' => 'menu_order',
                                    'order' => 'ASC'
                                ));
                                ?>
                                
                                <div class="col">
                                    <div class="card h-100 shadow-sm">
                                        <div class="ratio ratio-16x9">
                                            <video class="card-img-top" controls poster="<?= esc_url($recordingPoster) ?>">
                                                <source src="<?= esc_url($recordingURL) ?>" type="video/mp4">
                                                <?php if ($recordingVTT): ?>
                                                    <track src="<?= esc_url($recordingVTT) ?>" kind="captions" srclang="en" label="English">
                                                <?php endif; ?>
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                        
                                        <div class="card-body d-flex flex-column small">
                                            <h3 class="card-title h5">
                                                <a href="<?= get_permalink($page->ID) ?>" class="text-decoration-none"><?= esc_html($page->post_title) ?></a>
                                            </h3>
                                            
                                            <?php if ($startTime && $endTime): ?>
                                                <p class="card-text small text-muted mb-2">
                                                    <i class="bi bi-clock me-1"></i><?= esc_html($startTime) ?> to <?= esc_html($endTime) ?>
                                                </p>
                                            <?php endif; ?>
                                            
                                            <?php if ($shortDesc): ?>
                                                <p class="card-text flex-grow-1"><?= esc_html($shortDesc) ?></p>
                                            <?php endif; ?>
                                            
                                            <?php if ($speakers): ?>
                                                <div class="mt-auto">
                                                    <p class="card-text small mb-2"><strong>Speakers:</strong></p>
                                                    <ul class="list-unstyled small">
                                                        <?php foreach ($speakers as $speaker): 
                                                            $speakerName = get_post_meta($speaker->ID, 'speakerName', true);
                                                            $speakerRole = get_post_meta($speaker->ID, 'speakerRole', true);
                                                            ?>
                                                            <li><?= esc_html($speakerName) ?><?php if ($speakerRole): ?>, <?= esc_html($speakerRole) ?><?php endif; ?></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <div class="mt-3 d-flex flex-wrap gap-2">
                                                <a href="<?= get_permalink($page->ID) ?>" class="btn btn-primary btn-sm">View Full Details</a>
                                                <?php if ($recordingTranscript): ?>
                                                    <a href="<?= esc_url($recordingTranscript) ?>" target="_blank" rel="noopener noreferrer" class="small align-content-center">
                                                        <i class="bi bi-file-text me-1"></i>Transcript (opens in new tab)
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">No Video Recordings Available</h4>
                <p>Session recordings will be posted here after Learn @ Work Week. Please check back later.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>