
import SportsLayout from '@/layouts/sports-layout'
import SportsIndex from '@/pages/sports/index'
import Login from '@/pages/login'

const routes = [
    {
        path: '/sports',
        component: SportsLayout,
        children: [
            {path: 'football', component: SportsIndex},
        ]
    },
    {
        path: '/login',
        component: Login
    },
]

export default routes
