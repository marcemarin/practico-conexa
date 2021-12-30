require('./bootstrap');

import Alpine from 'alpinejs';
import { createApp } from "vue"
import router from "./router"
import MovementsIndex from "./components/movements/MovementsIndex"

createApp({
    components: {
        MovementsIndex
    }
}).use(router).mount("#app")

window.Alpine = Alpine;

Alpine.start();
