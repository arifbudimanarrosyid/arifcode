import "./bootstrap";

import Alpine from "alpinejs";
import slug from "alpinejs-slug";
import scrollAmount from "alpinejs-scroll-amount";

window.Alpine = Alpine;

Alpine.plugin(slug);
Alpine.plugin(scrollAmount);

Alpine.start();
