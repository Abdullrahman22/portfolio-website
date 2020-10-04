import VueRouter from 'vue-router'
window.Vue = require('vue');
Vue.use(VueRouter)

import routes from './routes'  // import routes

const router = new VueRouter({
    mode: "history",
    routes: routes  ,  // OR only routes in ES6
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }   // at click router link vuejs go top page "vue router scroll behavior"
    }
})

export default router;