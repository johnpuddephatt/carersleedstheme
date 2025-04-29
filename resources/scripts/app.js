// import { algoliasearch } from '@algolia/client-search ';
import { algoliasearch } from 'algoliasearch';

import domReady from '@roots/sage/client/dom-ready';

import Alpine from 'alpinejs';
window.Alpine = Alpine;

const appId = '4XIM8DEENA';
const apiKey = 'e1f78d985745a4d6f156b18ef93d2b6c';
const indexName = 'wp_searchable_posts';

document.addEventListener('alpine:init', () => {
  Alpine.data('search', () => ({
    init() {
      this.client = algoliasearch(appId, apiKey);

      // this.index = client.initSearch(indexName);

      // Search for "test"

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
          },
        ],
      });

      this.results = results[0].hits;
      this.totalHits = results[0].nbHits;
      this.resultsPerPage = results[0].hitsPerPage;
      this.searching = false;
      //   if (this.term === '') return;
      //   this.noResults = false;
      //   console.log(`search for ${this.term}`);

      //   //          let rawResults = await this.index.search(this.term);
      //   let rawResults = await this.index.search(this.term, {
      //     attributesToSnippet: ['content'],
      //   });

      //   if (rawResults.nbHits === 0) {
      //     this.noResults = true;
      //     return;
      //   }
      //   this.totalHits = rawResults.nbHits;
      //   this.resultsPerPage = rawResults.hitsPerPage;
      //   this.results = rawResults.hits.map((h) => {
      //     h.snippet = h._snippetResult.content.value;
      //     h.date = new Intl.DateTimeFormat('en-us').format(new Date(h.date));
      //     return h;
      //   });
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
