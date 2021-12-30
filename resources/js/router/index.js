import { createRouter, createWebHistory } from "vue-router";

import MovementsIndex from "../components/movements/MovementsIndex.vue"

const routes = [
    {
        path: "/",
        name: "movements.index",
        component: MovementsIndex
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})

