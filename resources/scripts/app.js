import domReady from '@roots/sage/client/dom-ready';
import Alpine from 'alpinejs';
window.Alpine = Alpine;

Alpine.start();

/**
 * Application entrypoint
 */
domReady(async () => {});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);

if (document.querySelector('.application-form-job-id input[type="hidden"]')) {
  if (window.jobApplicationID) {
    document.querySelector(
      '.application-form-job-id input[type="hidden"]',
    ).value = window.jobApplicationID;
  } else
    alert(
      'A job application form was loaded but it is not clear what job it is for. The job ID should be specified in the page url with: \n\n ?job_id=123',
    );
} else if (window.jobApplicationID) {
  alert(
    "A job application ID was found, but a corresponding form element was not found. Please ensure the form contains a hidden element with a class of 'application-form-job-id",
  );
}
