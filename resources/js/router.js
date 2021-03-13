import Vue from 'vue';
import VueRouter from 'vue-router';
import Users from './components/Users.vue';
import Posts from './components/Posts.vue';
import Albums from './components/Albums.vue';
import UserDetails from './components/UserDetails.vue';
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Users',
    component: Users
  },
  {
    path: '/users',
    name: 'Users',
    component: Users
  },
  {
    path: '/users/:id',
    name: 'UserDetails',
    component: UserDetails
  },
  {
    path: '/posts',
    name: 'Posts',
    component: Posts
  },
  {
    path: '/albums',
    name: 'Albums',
    component: Albums
  },
]

const router = new VueRouter({
  routes
})

export default router