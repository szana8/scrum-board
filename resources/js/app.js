import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from "./Shared/Layout";
import { modal } from "momentum-modal"
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';


createInertiaApp({
    resolve: async name => {
        let page = (await import(`./Pages/${name}`)).default;

        if (page.layout === undefined) {
            page.layout = Layout
        }

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(modal, {
                resolve: (name) => import(`./Pages/${name}`),
            })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el)
    },
})

InertiaProgress.init()
