export const PAGE_MODULES = {
    'login': () => import('../pages/auth/login'),
    'blogs.index': () => import('../pages/blog/index'),
    'blogs.show': () => import('../pages/blog/show'),
    'blogs.create': () => import('../pages/blog/create'),
}