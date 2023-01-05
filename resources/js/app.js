import "./bootstrap";
// import './tinymce';
// import tinymce
// import tinymce from 'tinymce/tinymce';

import Alpine from "alpinejs";
import slug from "alpinejs-slug";
import scrollAmount from "alpinejs-scroll-amount";

window.Alpine = Alpine;

Alpine.plugin(slug, scrollAmount);

Alpine.start();
