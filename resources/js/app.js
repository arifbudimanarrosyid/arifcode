import "./bootstrap";
// import './tinymce';
// import tinymce
// import tinymce from 'tinymce/tinymce';

import Alpine from "alpinejs";
import slug from "alpinejs-slug";

window.Alpine = Alpine;

Alpine.plugin(slug);

Alpine.start();
