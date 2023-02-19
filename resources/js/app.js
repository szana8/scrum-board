import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/vue3'
import Layout from './Shared/Layout'
import {modal} from 'momentum-modal'
import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist/vue.m'
import PerfectScrollbar from 'vue3-perfect-scrollbar'
import 'vue3-perfect-scrollbar/dist/vue3-perfect-scrollbar.css'

createInertiaApp({
    resolve: async (name) => {
        let page = (await import(`./Pages/${name}`)).default

        if (page.layout === undefined) {
            page.layout = Layout
        }

        if (page.floating === undefined) {
            page.floating = false
        }

        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(modal, {
                resolve: (name) => import(`./Pages/${name}`),
            })
            .use(plugin)
            .use(ZiggyVue)
            .use(PerfectScrollbar)
            .mount(el)
    },
    progress: {
        // The delay after which the progress bar will appear
        // during navigation, in milliseconds.
        delay: 250,

        // The color of the progress bar.
        color: '#29d',

        // Whether to include the default NProgress styles.
        includeCSS: true,

        // Whether the NProgress spinner will be shown.
        showSpinner: false,
    },
})
