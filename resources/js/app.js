import './bootstrap';
import './middleware';

import {createApp} from "vue";
import router from "./router";
import store from "./store"

window.route = route

const app = createApp();

// const components = require.context('./components/', true, /\.vue$/i);
// components.keys().map(key => app.component(key.split('/').pop().split('.')[0], components(key).default));

app.use(router)
app.use(store)

app.mount("#application");
