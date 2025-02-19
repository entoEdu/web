import 'bootstrap';
import autocomplete from "./js/autocomplete";
import $ from 'jquery';
import '@fortawesome/fontawesome-free/js/all'
import "jquery.easing";

// Assets
import './scss/index.scss';

document.addEventListener("DOMContentLoaded", function(event) {
    autocomplete();
});