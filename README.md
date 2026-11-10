# Learn @ Work Week 2024

A custom theme for latww2024.

## Captions on session recordings

Session recordings use a captions file (.vtt) set in each page's `recordingVTT` custom field.

Browsers only load a captions file from the same site as the page. If the file is on another site, or its link redirects to another site, the browser drops the captions and the CC button disappears. There's no error message on the page.

To keep captions working:

- Upload the .vtt files to this WordPress site (Media), not to the server that holds the videos.
- Paste the file's link into `recordingVTT` as usual. The theme turns links to this site into site-relative paths, so captions keep working if the site's domain changes again.

### Why the 2024 captions stopped working

The 2024 captions were first stored next to the videos on learn.bcpublicservice.gov.bc.ca, but browsers blocked them because that's a different site. They were moved into WordPress, which worked while the site was at learningcentre.gww.gov.bc.ca. When the site moved to corporatelearning.gww.gov.bc.ca, the old links redirected to the new domain, and browsers won't follow that redirect for captions.

The `latww_caption_url()` function in `functions.php` fixes this for links on either domain. If the site moves to a new domain, add the new domain to the list in that function.

### Checking captions

On a video page, open the browser developer tools (F12), go to the Network tab, filter by `vtt` and refresh the page. The captions file should load with status 200. If you see a redirect (301 or 302), a blocked request or "Provisional headers are shown", the link points to a different site.
