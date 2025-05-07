// import { algoliasearch } from '@algolia/client-search ';
import { algoliasearch } from 'algoliasearch';

import domReady from '@roots/sage/client/dom-ready';

import Alpine from 'alpinejs';
window.Alpine = Alpine;

const appId = window.algoliaAppId;
const apiKey = window.algoliaApiKey;

const indexName = 'wp_searchable_posts';

document.addEventListener('alpine:init', () => {
  Alpine.data('search', () => ({
    init() {
      this.client = algoliasearch(appId, apiKey);
      this.searchReady = true;
    },
    client: null,
    index: null,
    term: '',
    searchOpen: false,
    searchReady: false,
    noResults: false,
    results: null,
    totalHits: null,
    resultsPerPage: null,
    searching: false,
    async search() {
      this.searching = true;
      const { results } = await this.client.search({
        requests: [
          {
            indexName,
            query: this.term,
            params: {
              facetFilters: [
                [
                  'post_type_label:Events',
                  'post_type_label:Pages',
                  'post_type_label:Posts',
                ],
              ],
              facets: ['*'],
            },
            facetFilters: [
              [
                'post_type_label:Events',
                'post_type_label:Pages',
                'post_type_label:Posts',
              ],
            ],
            facets: ['*'],
          },
        ],
      });

      this.results = results[0].hits;
      this.totalHits = results[0].nbHits;
      this.resultsPerPage = results[0].hitsPerPage;
      this.searching = false;
    },
  }));
});

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
