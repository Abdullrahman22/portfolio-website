/*================ Web Components ==================*/
import HomePage  from './../pages/Home.vue'
import ProjectPage  from './../pages/Project.vue'
import NotFoundPage  from './../pages/NotFoundPage.vue'

const routes = [
    /*================ Web Routes ==================*/
    { path: '/' , component: HomePage , name: 'HomePage'  },
    { path: '/project/:slug' , component: ProjectPage , name: 'ProjectPage'  },
    { path: '*' , component: NotFoundPage , name: 'NotFoundPage'  },
]
export default routes;